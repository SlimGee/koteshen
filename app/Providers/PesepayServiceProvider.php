<?php

namespace App\Providers;

use App\Pesepay\Pesepay;
use Illuminate\Support\ServiceProvider;

class PesepayServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('laravel-pesepay', function () {
            return new Pesepay;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
