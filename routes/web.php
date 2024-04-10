<?php

use App\Http\Controllers\Onboarding\BusinessController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SocialiteController;
use App\Http\Middleware\RedirectToUnfinishedOnboardingStep;
use Illuminate\Support\Facades\Route;

Route::get('/auth/{social}/redirect', [SocialiteController::class, 'redirect'])
    ->name('socialite.redirect')
    ->whereIn('social', ['google']);

Route::get('/auth/{social}/callback', [SocialiteController::class, 'callback'])
    ->name('socialite.callback')
    ->whereIn('social', ['google']);

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', RedirectToUnfinishedOnboardingStep::class])
    ->prefix('app')
    ->name('app.')
    ->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('home.index');

        Route::prefix('onboarding')
            ->name('onboarding.')
            ->group(function () {
                Route::resource('business', BusinessController::class)
                    ->only(['create', 'store'])
                    ->withoutMiddleware([RedirectToUnfinishedOnboardingStep::class]);
            });

        Route::resource('clients', ClientController::class);
    });
