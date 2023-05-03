<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // Clear the session values
        session()->forget('coupon_code');
        session()->forget('discounted_amount');
        $categories = Category::whereNull('parent_id')->with('children')->get();
        $orders = Order::where('user_id', Auth::id())->get();
        return view('frontend.orders.index', compact('orders','categories'));
    }

    public function view($id)
    {
        // Clear the session values
        session()->forget('coupon_code');
        session()->forget('discounted_amount');
        $categories = Category::whereNull('parent_id')->with('children')->get();
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('frontend.orders.view', compact('orders','categories'));
    }


}
