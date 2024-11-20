<?php

namespace Illuminate\Auth\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class RequirePassword
{
    public function handle($request, Closure $next, $guard = null)
    {
        if ($request->user($guard) &&
            $this->shouldConfirmPassword($request)) {
            return redirect()->route('password.confirm');
        }

        return $next($request);
    }

    protected function shouldConfirmPassword($request)
    {
        $confirmedAt = time() - $request->session()->get('auth.password_confirmed_at', 0);

        return $confirmedAt > config('auth.password_timeout', 10800);
    }
}
