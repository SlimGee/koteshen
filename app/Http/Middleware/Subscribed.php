<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Closure;

class Subscribed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user()?->subscribed()) {
            // Redirect user to billing page and ask them to subscribe...
            return redirect('/app/billing/change-plan')->with('error', 'You need to subscribe to access this page');
        }

        return $next($request);
    }
}
