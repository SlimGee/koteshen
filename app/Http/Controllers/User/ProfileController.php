<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Butschster\Head\Facades\Meta;
use Illuminate\Contracts\Support\Renderable;

class ProfileController extends Controller
{
    public function edit(): Renderable
    {
        Meta::prependTitle('Profile');

        return view('app.users.profile.edit', [
            'user' => auth()->user(),
        ]);
    }
}
