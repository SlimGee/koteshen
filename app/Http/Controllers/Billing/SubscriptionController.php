<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Billing\Concerns\CreatesInvoices;
use App\Http\Controllers\Controller;
use Flixtechs\Subby\Models\Plan;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

class SubscriptionController extends Controller
{
    use CreatesInvoices;

    public function create(): Renderable
    {
        return view('app.subscription.create', [
            'plans' => Plan::all(),
        ]);
    }

    public function store(Plan $plan): RedirectResponse
    {
        if (auth()->user()->subscriptions()->count() === 0) {
            auth()->user()->newSubscription('main', $plan, $plan->description, $plan->description);

            return redirect()->intended(route('app.home.index'))->with('success', 'You have started your free trial');
        }

        return redirect()->route('app.billing.payments.redirect', [$this->createInvoice($plan), $plan]);
    }
}
