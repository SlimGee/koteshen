<?php

namespace App\Providers;

use App\Models\Country;
use App\Models\Currency;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Spatie\Onboard\Facades\Onboard;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            return;
        }

        View::share('countries', Cache::remember('db-countries', 60 * 60 * 24 * 7, function () {
            return Country::all();
        }));

        View::share('currencies', Cache::remember('db-currencies', 60 * 60 * 24 * 7, function () {
            return Currency::all();
        }));

        Gate::before(fn (User $user) => $user->hasRole('super admin') ? true : null);

        Onboard::addStep('Setup your business')
            ->link('/app/onboarding/business/create')
            ->cta('Create your first business')
            ->completeIf(function (User $model) {
                return $model->businesses()->exists();
            });
    }
}
