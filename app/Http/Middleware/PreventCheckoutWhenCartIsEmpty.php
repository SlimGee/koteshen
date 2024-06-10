<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Jackiedo\Cart\Facades\Cart;
use Symfony\Component\HttpFoundation\Response;
use Closure;

class PreventCheckoutWhenCartIsEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Cart::isEmpty()) {
            return to_route('app.billing.edit')->with('success', 'Hold on tiger, first things first');
        }

        return $next($request);
    }
}
