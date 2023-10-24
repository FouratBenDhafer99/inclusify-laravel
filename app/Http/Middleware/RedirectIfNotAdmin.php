<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Closure;

class RedirectIfNotAdmin
{

    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (auth()->user()->role !='ADMIN')
            return redirect(RouteServiceProvider::UNAUTHORIZED);

        return $next($request);
    }
}
