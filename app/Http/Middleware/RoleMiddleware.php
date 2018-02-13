<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role_name)
    {
        if (auth()->check() && ! auth()->user()->hasRole($role_name))
        {
            return abort(401, 'Unauthorized');
        }

        return $next($request);
    }
}
