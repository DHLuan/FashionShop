<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('parent_id')->with('children')->get();
        $old_cartitems = Cart::where('user_id', Auth::id())->get();
        foreach ($old_cartitems as $item) {
            if (!Product::where('id', $item->prod_id)->where('qty', '>=', $item->prod_qty)->exists()) {
                $removeItem = Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeItem->delete();
            }
        }
//        $cartitems = Cart::where('user_id', Auth::id())->get();
        $discountedAmount = session()->get('discounted_amount', 0);

        $cartItems = Cart::with('products')->where('user_id', Auth::user()->id)->get();
        $total = 0;
        foreach ($cartItems as $cartItem) {
            $total += $cartItem->products->selling_price * $cartItem->prod_qty;
        }

        return view('frontend.checkout', compact('cartItems', 'categories', 'total', 'discountedAmount'));
    }

    public function placeOrder(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->pincode = $request->input('pincode');
        $order->message = $request->input('message');
        $order->coupon_code = session()->get('coupon_code');
        $order->payment_mode = $request->input('payment_mode');
        $order->payment_id = $request->input('payment_id');

        $total = 0;
        $cartitems_total = Cart::where('user_id', Auth::id())->get();
        foreach ($cartitems_total as $prod) {
            $total += $prod->products->selling_price;
        }

        $couponCode = session()->get('coupon_code');

//        $discountedAmount = session()->get('discounted_amount', 0);
//        $order->total_price = $total - $discountedAmount;
//        $order->discounted_amount = $discountedAmount;
//        return redirect('checkout')->with('status',"Coupon error");
//
//        $order->total_price = $total;

        if ($couponCode !== null) {
            $coupon = Coupon::where('code', $couponCode)->first();

            if ($coupon) {
                if ($coupon->qty > 0) {
                    $coupon->qty -= 1;
                    $coupon->save();
                    // Trừ thành công số lượng mã giảm giá

                    // Lấy discounted_amount từ session
                    $discountedAmount = session()->get('discounted_amount', 0);

                    // Tính total_price với mã giảm giá
                    $order->total_price = $total - $discountedAmount;

                    // Tiếp tục xử lý đặt hàng
                } else {
                    // Số lượng mã giảm giá đã hết, xử lý tương ứng (ví dụ: hiển thị thông báo lỗi)
                    return redirect('checkout')->with('status',"Số lượng mã giảm giá đã hết.");
                }
            } else {
                // Mã giảm giá không tồn tại, xử lý tương ứng (ví dụ: hiển thị thông báo lỗi)
                return redirect('checkout')->with('status',"Mã giảm giá không hợp lệ.");
            }
        } else {
            // Không có mã giảm giá, tính total_price bình thường
            $order->total_price = $total;
        }

        $order->tracking_no = 'sharma' . rand(1111, 9999);
        $order->save();

        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartitems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => $item->products->selling_price,
            ]);

            $prod = Product::where('id', $item->prod_id)->first();
            $prod->qty = $prod->qty - $item->prod_qty;
            $prod->update();
        }

        if (Auth::user()->address1 == NULL) {
            $user = User::where('id', Auth::id())->first();
            $user->name = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->country = $request->input('country');
            $user->pincode = $request->input('pincode');
            $user->update();
        }

        $cartitems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitems);

        if ($request->input('payment_mode') == "Paid by Razorpay" || $request->input('payment_mode') == "Paid by Paypal") {
            return response()->json(['status' => "Order placed Successfully"]);
        }
        return redirect('/')->with('status', "Order placed Successfully");
    }

    public function zalopaycheck(Request $request)
    {
        $cartitems = Cart::where('user_id', Auth::id())->get();
        $total_price = 0;
        foreach ($cartitems as $item) {
            $total_price += $item->products->selling_price * $item->prod_qty;
        }

        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address1 = $request->input('address1');
        $address2 = $request->input('address2');
        $city = $request->input('city');
        $state = $request->input('state');
        $country = $request->input('country');
        $pincode = $request->input('pincode');

        return response()->json([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'phone' => $phone,
            'address1' => $address1,
            'address2' => $address2,
            'city' => $city,
            'state' => $state,
            'country' => $country,
            'pincode' => $pincode,
            'total_price' => $total_price
        ]);
    }
}
