<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        // Clear the session values
        session()->forget('coupon_code');
        session()->forget('discounted_amount');
        return view('admin.index');
    }
}
