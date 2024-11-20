<?php

namespace Illuminate\Http\Middleware;

use Closure;

class SetCacheHeaders
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        return $response->header('Cache-Control', 'nocache, no-store, max-age=0, must-revalidate');
    }
}
