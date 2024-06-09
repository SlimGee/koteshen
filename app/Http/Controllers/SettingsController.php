<?php

namespace App\Http\Controllers;

use Butschster\Head\Facades\Meta;

class SettingsController extends Controller
{
    public function index()
    {
        Meta::prependTitle('Settings');

        return view('app.settings.index');
    }
}
