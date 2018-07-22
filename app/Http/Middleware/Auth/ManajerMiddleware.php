<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Support\Facades\Auth;

class ManajerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->isManajer()) {
                return $next($request);
            }
        } else {
            return $next($request);
        }
        return back()->withWarning('Anda Tidak Memiliki Akses Untuk Melakukan TIndakan Ini!');

    }
}
