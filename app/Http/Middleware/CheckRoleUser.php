<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// use Auth;
use Illuminate\Support\Facades\Auth;

// php artisan make:middleware CheckRoleUser
class CheckRoleUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Nếu return $next($request) thì được vào tiếp

        // Lấy thông tin user đang đăng nhập
        $user = Auth::user();
        if ($user && $user->role === 1) {
            // Nếu có thông tin user và role user đó = 1 -> đi tiếp

            return $next($request);
        }

        // Nếu không sẽ điều hướng quay về
        return redirect()->route('dashboard');
    }
}
