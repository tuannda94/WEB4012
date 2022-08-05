<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// use Auth;
use Illuminate\Support\Facades\Auth;

// php artisan make:middleware CheckAdmin
class CheckAdmin
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
        $user = Auth::user();
        // Nếu tồn tại user và user có role admin
        if ($user && $user->role === 1) {
            // Cho đi tiếp
            return $next($request);
        }
        // Nếu không thì quay về dashboard
        return redirect()->route('dashboard');
    }
}
