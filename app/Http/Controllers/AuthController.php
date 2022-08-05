<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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

    public function getLoginGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function loginGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        if ($googleUser) {
            // 1. Xem xem user này đã tồn tại trong DB chưa
            $user = User::where('email', $googleUser->email)->first();
            // 2. Nếu tồn tại rồi thì cho đăng nhập
            if ($user) {
                Auth::login($user); // không cần check password vẫn cho đăng nhập vào
                return redirect()->route('users.list');
            }
            // 3. Nếu không có $user thì tạo 1 bản ghi mới từ thông tin google
            $newUser = new User();
            $newUser->fill($googleUser->user);
            $newUser->room_id = Room::first()->id;
            $newUser->phone = '';
        // 'password',

        // 'username',
        // 'birthday',
        // 'phone',
        // 'role',
        // 'status',
        // 'room_id',
        // 'avatar'
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.getLogin');
    }
}
