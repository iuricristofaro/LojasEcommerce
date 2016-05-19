<?php

namespace CodeCommerce\Http\Middleware;

use Closure;
//use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class Admin
{
    
    public function handle($request, Closure $next)
    {
        if ( ! Auth::user()->is_admin)
        {
            return redirect()->guest('auth/login');
        }

        return $next($request);
    }
}
