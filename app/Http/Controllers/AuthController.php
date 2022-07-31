<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

// php artisan make:controller AuthController
class AuthController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $data = $request->all();
        $email = $data['email'];
        $password = $data['password'];

        // $email = $request->email;
        // $password = $request->password;

        // $email = $request->input('email');
        // $password = $request->input('password');
        // attempt sẽ có key là tên cột trong DB, value sẽ lấy từ form
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Nếu khớp thông tin thì sẽ đăng nhập thành công, lưu thông tin vào session
            // Điều hướng quay về quản trị
            return redirect()->route('users.list');
        }
        // Nếu không thì quay ngược về login
        return redirect()->route('auth.getLogin');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.getLogin');
    }
}
