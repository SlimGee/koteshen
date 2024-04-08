<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Butschster\Head\Facades\Meta;
use Butschster\Head\Packages\Entities\OpenGraphPackage;
use Butschster\Head\Packages\Entities\TwitterCardPackage;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
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

        Fortify::loginView(static function () {
            Meta::prependTitle('Login')
                ->setDescription('Login in to your account')
                ->registerPackage(
                    (new TwitterCardPackage('login'))
                        ->setDescription('Login to your account - AppName')
                        ->setTitle('Login to your account - AppName')
                        ->setSite('@welodgeofficial')
                        ->setImage(asset('images/cover.jpg'))
                        ->setType('summary_large_image'),
                )
                ->registerPackage(
                    (new OpenGraphPackage('og_login'))
                        ->setType('website')
                        ->setTitle('Login to your account - AppName')
                        ->setDescription('Login to your account - AppName')
                        ->addImage(asset('images/cover.jpg')),
                );

            return view('auth.login');
        });

        Fortify::registerView(static function () {
            Meta::prependTitle('Create Account')
                ->setDescription('Create your account')
                ->registerPackage(
                    (new TwitterCardPackage('register'))
                        ->setDescription('Create your account - AppName')
                        ->setTitle('Create your account - Welodge Marketplac')
                        ->setSite('@welodgeofficial')
                        ->setImage(asset('images/cover.jpg'))
                        ->setType('summary_large_image'),
                )
                ->registerPackage(
                    (new OpenGraphPackage('og_register'))
                        ->setType('website')
                        ->setTitle('Create your account - AppName')
                        ->setDescription('Create your account - AppName')
                        ->addImage(asset('images/cover.jpg')),
                );

            return view('auth.register');
        });

        Fortify::requestPasswordResetLinkView(static function () {
            Meta::prependTitle('Forgot Password')->setDescription('Reset your password');

            return view('auth.forgot-password');
        });

        Fortify::resetPasswordView(static function ($request) {
            Meta::prependTitle('Reset Password')->setDescription('Reset your password');

            return view('auth.reset-password', ['request' => $request]);
        });

        Fortify::verifyEmailView(static function () {
            Meta::prependTitle('Verify Email')->setDescription('Verify your email address');

            return view('auth.verify-email');
        });

        Fortify::confirmPasswordView(static function () {
            Meta::prependTitle('Confirm Password')->setDescription('Confirm your password');

            return view('auth.confirm-password');
        });

        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
