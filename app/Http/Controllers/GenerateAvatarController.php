<?php

namespace App\Http\Controllers;

use App\Models\User;
use LasseRafn\InitialAvatarGenerator\InitialAvatar;
use Psr\Http\Message\StreamInterface;

class GenerateAvatarController extends Controller
{
    public function show(User $user): StreamInterface
    {
        $avatar = new InitialAvatar();

        return $avatar
            ->name($user->name)
            ->autoFont()
            ->color('#fff')
            ->background('#5576ff')
            ->rounded()
            ->smooth()
            ->generate()
            ->stream('png', 100);
    }
}
