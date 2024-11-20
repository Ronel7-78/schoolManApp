<?php

namespace Illuminate\Session\Middleware;

use Illuminate\Support\Facades\Auth;

class AuthenticateSession
{
    public function handle($request, $next)
    {
        if (Auth::check()) {
            Auth::logoutOtherDevices($request->session()->token());
        }

        return $next($request);
    }
}
