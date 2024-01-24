<?php

namespace App\Http\Middleware;

use Closure;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Gate::denies('access-post')) {
            abort(403,'Not allowed!!!');
        }
        return $next($request);
    }
}
