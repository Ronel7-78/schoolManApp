<?php

namespace Illuminate\Foundation\Http\Middleware;

use Closure;

class HandlePrecognitiveRequests
{
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
