<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateWithBasicAuth
{
    public function handle($request, Closure $next, ...$guards)
    {
        if (Auth::guard($guards)->basic() === null) {
            return $next($request);
        }

        return Auth::guard($guards)->basic();
    }
}
