<?php

namespace App\Providers;

use Codevirtus\Payments\Pesepay;
use Illuminate\Support\ServiceProvider;

class PesepayServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('laravel-pesepay', function () {
            $pesepay = new Pesepay(config('services.pesepay.key'), config('services.pesepay.secret'));
            $pesepay->returnUrl = 'https://koteshen.test/gateway/return';
            $pesepay->resultUrl = 'http://koteshen.test/gateway/return';

            return $pesepay;
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
