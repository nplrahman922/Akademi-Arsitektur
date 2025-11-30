<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserExpiry
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->expired_at !== null && now()->greaterThan(Auth::user()->expired_at)) {
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'email' => 'Akun Anda sudah kedaluwarsa.',
            ]);
        }

        return $next($request);
    }
}
