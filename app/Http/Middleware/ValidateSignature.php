<?php

namespace Illuminate\Routing\Middleware;

use Closure;
use Illuminate\Routing\Exceptions\InvalidSignatureException;

class ValidateSignature
{
    public function handle($request, Closure $next)
    {
        if (! $request->hasValidSignature()) {
            throw new InvalidSignatureException;
        }

        return $next($request);
    }
}
