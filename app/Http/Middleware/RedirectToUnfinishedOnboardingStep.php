<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Closure;

class RedirectToUnfinishedOnboardingStep
{
    /**
     * Handle an incoming request.
     *
     * @param  $next  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->onboarding()->inProgress()) {
            return redirect()->to(
                auth()->user()->onboarding()->nextUnfinishedStep()->link
            );
        }

        return $next($request);
    }
}
