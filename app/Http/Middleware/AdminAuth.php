<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->email !== 'admin123@gmail.com') {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
