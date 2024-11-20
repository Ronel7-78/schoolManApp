<?php

namespace Spark\Http\Middleware;

use Closure;

class VerifyBillableIsSubscribed
{
    public function handle($request, Closure $next)
    {
        if (! $request->user() || ! $request->user()->subscribed()) {
            return redirect()->route('subscription.plans');
        }

        return $next($request);
    }
}
