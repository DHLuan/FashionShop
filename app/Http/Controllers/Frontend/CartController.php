<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Session;

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

    public function viewcart(Request $request)
    {
        $categories = Category::whereNull('parent_id')->with('children')->get();
        $cartItems = Cart::with('products')->where('user_id', Auth::user()->id)->get();
        $Coupon = Coupon::all();
        $total = 0;
        foreach ($cartItems as $cartItem) {
            $total += $cartItem->products->selling_price * $cartItem->prod_qty;
        }
        if ($request->session()->has('coupon_code')) {
            $couponCode = session()->get('coupon_code');
            $coupon = Coupon::where('code', $couponCode)->first();

            if ($coupon) {
                // Kiểm tra xem mã giảm giá có hợp lệ và còn trong khoảng thời gian hiệu lực hay không
                if ($this->isValidCoupon($coupon)) {
                    if ($coupon->type == 'Fixed') {
                        // Giảm giá theo giá trị cố định
                        $total -= $coupon->value;
                    } elseif ($coupon->type == 'Percent') {
                        // Giảm giá theo phần trăm
                        $discount = $total * ($coupon->value / 100);
                        $total -= $discount;
                    }
                } else {
                    // Mã giảm giá không hợp lệ, xóa mã giảm giá khỏi session
                    session()->forget('coupon_code');
                }
            } else {
                // Mã giảm giá không tồn tại, xóa mã giảm giá khỏi session
                session()->forget('coupon_code');
            }
        }

//        $cartitems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.cart', compact('cartItems', 'categories','total','Coupon'));
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
        $couponCode = $request->input('coupon_code');

        // Kiểm tra xem mã giảm giá có tồn tại trong cơ sở dữ liệu hay không
        $coupon = Coupon::where('code', $couponCode)->first();

        if ($coupon) {
            // Kiểm tra xem mã giảm giá có hợp lệ hay không (ví dụ: còn trong khoảng thời gian hiệu lực, số lượng còn đủ...)
            if ($this->isValidCoupon($coupon)) {
                // Lưu mã giảm giá vào session
                session()->put('coupon_code', $couponCode);

                // Redirect về trang giỏ hàng với thông báo thành công
                return redirect('/cart')->with('status', "Coupon applied successfully");
            } else {
                return redirect('/cart')->with('status', "Invalid coupon");
            }
        } else {
            return redirect('/cart')->with('status', "Coupon not found");
        }
    }

    private function isValidCoupon($coupon)
    {
        $currentDate = now();

        if ($coupon->start_date && $coupon->start_date > $currentDate) {
            return false; // Mã giảm giá chưa bắt đầu hiệu lực
        }

        if ($coupon->end_date && $coupon->end_date < $currentDate) {
            return false; // Mã giảm giá đã hết hiệu lực
        }

        if ($coupon->qty !== null && $coupon->qty <= 0) {
            return false; // Mã giảm giá đã hết số lượng
        }

        if ($coupon->status !== 1) {
            return false; // Mã giảm giá chưa được duyệt
        }

        // Các kiểm tra khác tùy theo yêu cầu của ứng dụng của bạn

        return true;
    }

}
