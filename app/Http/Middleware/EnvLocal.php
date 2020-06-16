<?php

namespace App\Http\Middleware;

use Closure;

class EnvLocal
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $local = env('APP_ENV');
        if ($local == 'production') {
            abort(401);
        }
        return $next($request);
    }
}
