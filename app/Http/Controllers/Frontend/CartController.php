<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if(Auth::check())
        {
            $prod_check = Product::where('id',$product_id)->first();

            if($prod_check)
            {
                if(Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists())
                {
                    return response()->json(['status' => $prod_check->name."Already Added to cart"]);
                }
                else
                {
                    $cartItem = new Cart();
                    $cartItem->prod_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->prod_qty = $product_qty;
                    $cartItem->save();
                    return response()->json(['status'=> $prod_check->name."Added to cart"]);
                }

            }
        }
        else
        {
            return response()->json(['status'=>"Login to Continue"]);
        }
    }

    public function viewcart()
    {
        $categories = Category::whereNull('parent_id')->with('children')->get();
        $cartitems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.cart', compact('cartitems', 'categories'));
    }

    public function updateCart(Request $request)
    {
        $prod_id = $request->input('prod_id');
        $product_qty = $request->input('prod_qty');

        if(Auth::check())
        {
            if (Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
            {
                $cart = Cart::where('prod_id',$prod_id)->where('user_id', Auth::id())->first();
                $cart -> prod_qty = $product_qty;
                $cart -> update();
                return response()->json(['status'=> "Quantity updated"]);
            }
        }
    }

    public function deleteProduct(Request $request)
    {
        if(Auth::check())
        {
            $prod_id = $request->input('prod_id');
            if(Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
            {
                $cartItem = Cart::where('prod_id',$prod_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status' => "Product Deleted Successfully"]);
            }
        }
        else
        {
            return  response()->json(['status' => "Login to Coutinue"]);
        }
    }

    public function cartcount()
    {
        $cartcount = Cart::where('user_id', Auth::id())->count();
        return response()->json(['count'=> $cartcount]);
    }

    public function applyCoupon(Request $request)
    {
        $code = $request->input('code');
        $coupon = Coupon::where('code', $code)->where('status', 1)
            ->where(function ($query) {
                $query->whereNull('start_date')
                    ->orWhere('start_date', '<=', Carbon::now());
            })
            ->where(function ($query) {
                $query->whereNull('end_date')
                    ->orWhere('end_date', '>=', Carbon::now());
            })
            ->first();

        if (!$coupon) {
            return response()->json(['status' => 'Coupon is invalid or expired'], 404);
        }

        $cart_value = $this->getCartValue();

        if ($cart_value < $coupon->cart_value) {
            return response()->json(['status' => 'Coupon is invalid'], 404);
        }

        $discount = 0;

        if ($coupon->type == 'fixed') {
            $discount = $coupon->value;
        } else {
            $discount = $cart_value * ($coupon->value / 100);
        }

        $cartitems = Cart::where('user_id', Auth::id())->get();

        foreach ($cartitems as $cartitem) {
            $product = Product::find($cartitem->prod_id);

            if ($product) {
                $subtotal = $product->price * $cartitem->prod_qty;

                if ($subtotal >= $discount) {
                    $cartitem->discount = $discount;
                    $cartitem->coupon_code = $coupon->code;
                    $cartitem->update();

                    $coupon->qty = $coupon->qty - 1;
                    $coupon->update();

                    return response()->json(['status' => 'Coupon applied successfully'], 200);
                } else {
                    $discount -= $subtotal;
                    $cartitem->discount = $subtotal;
                    $cartitem->coupon_code = $coupon->code;
                    $cartitem->update();
                }
            }
        }

        return response()->json(['status' => 'Coupon applied successfully'], 200);
    }
}
