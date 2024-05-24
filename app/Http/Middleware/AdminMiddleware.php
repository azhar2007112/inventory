<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {

        if ($request->user() && Auth::user()->role == $role) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }

    
}
