<?php

namespace Illuminate\Auth\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Database\Eloquent\Model;

class Authorize
{
    protected $gate;

    public function __construct(Gate $gate)
    {
        $this->gate = $gate;
    }

    public function handle($request, Closure $next, $ability, ...$models)
    {
        $this->gate->authorize($ability, $this->getGateArguments($request, $models));

        return $next($request);
    }

    protected function getGateArguments($request, $models)
    {
        return array_map(function ($model) use ($request) {
            return $model ? $this->resolveModel($request, $model) : null;
        }, $models);
    }

    protected function resolveModel($request, $model)
    {
        return $model instanceof Model ? $model : $request->route($model);
    }
}
