<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->guard('web')->check()) {
            return redirect()->route('login.view');
        }
        return $next($request);
    }
}