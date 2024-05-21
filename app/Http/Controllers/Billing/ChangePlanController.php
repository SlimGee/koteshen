<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Controller;
use Flixtechs\Subby\Models\Plan;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

class ChangePlanController extends Controller
{
    public function create(): Renderable
    {
        $plans = Plan::all();

        return view('app.billing.create', ['plans' => $plans]);
    }

    public function store(Plan $plan): RedirectResponse
    {
        $user = auth()->user();
        $user->subscription('main')->changePlan($plan);

        return redirect()->route('app.billing.edit')->with('success', 'Your plan has been changed successfully!');
    }
}
