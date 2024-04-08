<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect(string $driver): RedirectResponse
    {
        return Socialite::driver($driver)->redirect();
    }

    public function callback(string $driver): RedirectResponse
    {
        try {
            $socilite = Socialite::driver($driver)->user();
        } catch (Exception) {
            return to_route('login')->with('error', 'Something went during. Please try again.');
        }

        $user = User::whereEmail($socilite->getEmail())->first();

        if (is_null($user)) {
            $user = User::create([
                'name' => $socilite->getName(),
                'email' => $socilite->getEmail(),
                'password' => Hash::make($socilite->getId()),
            ]);

            event(new Registered($user));
        }

        auth()->login($user, true);
        session()->regenerate();

        return redirect()->intended(config('fortify.home'));
    }
}
