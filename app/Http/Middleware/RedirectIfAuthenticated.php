<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard('web')->check()) {
            if (Auth::user()->isManajer()) {
                return redirect()->route('home-manajer');
            } elseif (Auth::user()->isPegawai()) {
                return redirect()->route('home-pegawai');
            }
//            return response(view('errors.403'), 403);
        }

        return $next($request);
    }
}
