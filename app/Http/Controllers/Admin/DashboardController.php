<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function users()
    {
        // Clear the session values
        session()->forget('coupon_code');
        session()->forget('discounted_amount');
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function viewuser($id)
    {
        // Clear the session values
        session()->forget('coupon_code');
        session()->forget('discounted_amount');
        $users = User::find($id);
        return view('admin.users.view', compact('users'));
    }
}
