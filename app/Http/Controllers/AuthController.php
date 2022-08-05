<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// php artisan make:controller AuthController
class AuthController extends Controller
{
    // Hàm hiển thị giao diện login
    public function getLogin()
    {
        return view('auth.login');
    }
    // Hàm nhận thông tin login gửi lên
    public function postLogin(LoginRequest $request)
    {
        // Lấy dữ liệu email, password người dùng gửi lên
        $email = $request->email;
        $password = $request->password;
        // $email = $request->input('email');
        // $data = $request->except('_token');

        // Kiểm tra thông tin đăng nhập của người dùng
        if (Auth::attempt([
            'email' => $email, // trường thông tin email trong DB => giá trị
            'password' => $password // trường thông tin password trong DB => giá trị
        ])) {
            // Nếu kết quả trả về true thì điều hướng vào trong
            return redirect()->route('users.list');
        } else {
            // Nếu không khớp bản ghi nào trong DB thì quay về
            return redirect()->route('auth.getLogin');
        }
    }

    public function getGoogleLogin()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleLoginCallback()
    {
        // dd(config('roles.ROLES'));

        $googleUser = Socialite::driver('google')->user();
        $user = User::where('email', $googleUser->email)->first();

        if ($user) {
            Auth::login($user);

            return redirect()->route('users.list');
        } else {
            $newUser = new User();
            // Lưu nốt thông tin
            $newUser->role = config('roles.ADMIN');
            $newUser->status = config('statuses.ACTIVE');
            $newUser->code = '';
            $newUser->username = '';
            $newUser->password = '';

            $newUser->save();
            Auth::login($newUser); // đăng nhập trước rồi đổi password để update password mới cho user đó luôn

            return redirect()->route('auth.create-password');
        }
    }

    public function createPasswordForm()
    {
        return view('auth.create-password');
    }

    public function savePassword(Request $request)
    {
        $password = $request->password;
        $loginUserId = Auth::id();

        if ($loginUserId) {
            $user = User::find($loginUserId);
            $user->password = Hash::make($password);
            $user->save();

            return redirect()->route('users.list');
        } else {
            $this->logout($request);
        }
    }


    public function logout(Request $request)
    {
        // xoá session user đã đăng nhập
        Auth::logout();
        // 2 câu lệnh bên dưới có ở laravel 8 và 9
        // Huỷ toàn bộ session đi
        $request->session()->invalidate();
        // Tạo token mới
        $request->session()->regenerateToken();
        // Quay về màn login
        return redirect()->route('auth.getLogin');
    }
}
