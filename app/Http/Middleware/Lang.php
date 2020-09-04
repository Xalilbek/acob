<?php

namespace App\Http\Middleware;

use App\Http\Helper\Standard;
use Closure;
use Illuminate\Http\Request;

class Lang
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        app()->setLocale(Standard::locale());
        return $next($request);
    }
}
