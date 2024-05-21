<?php

namespace App\Http\Controllers;

use Butschster\Head\Facades\Meta;
use Illuminate\Contracts\Support\Renderable;

class BillingController extends Controller
{
    public function edit(): Renderable
    {
        Meta::prependTitle('Billing');

        return view('app.billing.edit', [
            'user' => auth()->user(),
        ]);
    }
}
