<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Billing\Concerns\CreatesInvoices;
use App\Http\Controllers\Controller;
use App\Models\User;
use Flixtechs\Subby\Models\Plan;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

class ChangePlanController extends Controller
{
    use CreatesInvoices;

    public function create(): Renderable
    {
        $plans = Plan::all();

        return view('app.billing.create', ['plans' => $plans]);
    }

    public function store(Plan $plan): RedirectResponse
    {
        $user = User::find(auth()->id());

        if ($user->isSubscribedTo($plan->id)) {
            return redirect()->route('app.billing.edit')->with('error', 'You are already subscribed to this plan!');
        }

        return redirect()->route('app.billing.payments.redirect', [$this->createInvoice($plan), $plan]);
    }
}
