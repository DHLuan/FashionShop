<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Hiển thị form để yêu cầu liên kết đặt lại mật khẩu.
     *
     * @return \Illuminate\View\View
     */
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Lấy thông tin người dùng từ email
        $response = Password::sendResetLink(['email' => $request->email]);

        // Nếu gửi email thành công
        if ($response == Password::RESET_LINK_SENT) {
            // Gửi email đến người dùng với link đặt lại mật khẩu
            Mail::to($request->email)->send(new ResetPasswordEmail($response));

            // Thông báo cho người dùng biết rằng email đã được gửi đi
            return back()->with('status', trans($response));
        }

        // Nếu gửi email không thành công
        return back()->withErrors(['email' => trans($response)]);
    }
}
