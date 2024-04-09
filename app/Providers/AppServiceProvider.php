<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
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
        Gate::before(fn(User $user) => $user->hasRole('super admin') ? true : null);

        Onboard::addStep('Setup your business')
            ->link('/app/onboarding/business/create')
            ->cta('Create your first business')
            ->completeIf(function (User $model) {
                return $model->businesses()->exists();
            });
    }
}
