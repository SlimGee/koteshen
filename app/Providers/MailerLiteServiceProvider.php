<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use MailerLite\MailerLite;

class MailerLiteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(MailerLite::class, function () {
            return new MailerLite(['api_key' => config('services.mailerlite.key')]);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void {}
}
