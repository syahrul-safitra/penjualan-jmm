<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use illuminate\Support\Facades\Auth;

class isCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (!Auth::guard('customer')->check() && !Auth::guard('admin')->check()) {
            return redirect('/login');
        }

        if (!Auth::guard('customer')->check()) {
            return redirect('/dashboard');
        }

        return $next($request);
    }
}
