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

    public function updateRole(Request $request, $id)
    {
        // Lấy thông tin người dùng từ id
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'Người dùng không tồn tại.');
        }

        // Kiểm tra xem vai trò được chọn là User hay Admin
        if ($request->role == '0') {
            $user->role_as = '0'; // User
        } elseif ($request->role == '1') {
            $user->role_as = '1'; // Admin
        } else {
            return redirect()->back()->with('error', 'Vai trò không hợp lệ.');
        }

        $user->save();

        return redirect('/dashboard')->with('status',"user update Successfully");
    }

}
