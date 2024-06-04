<?php

namespace App\Http\Middleware;

use Flixtechs\Subby\Models\Plan;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Closure;

class SubscribeCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('selected_plan')) {
            $plan = Plan::find(session()->get('selected_plan'));

            if (!is_null($plan)) {
                session()->forget('selected_plan');

                return to_route('app.subscriptions.store', $plan);
            }
        }

        return $next($request);
    }
}
