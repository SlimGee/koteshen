<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Billing\Concerns\CreatesInvoices;
use App\Http\Controllers\Controller;
use App\Jobs\SubscriptionRenewalPaymentJob;
use Flixtechs\Subby\Models\Plan;
use Illuminate\Http\RedirectResponse;

class RenewSubscriptionController extends Controller
{
    use CreatesInvoices;

    public function store(): RedirectResponse
    {
        $plan = Plan::find(auth()->user()->subscription()->plan_id);

        if (auth()->user()->cards->defaultCard) {
            SubscriptionRenewalPaymentJob::dispatch(auth()->user()->subscription()->id);

            return back(fallback: route('app.home.index'))->with('success', 'We are processing your payment');
        }

        return redirect()->route('app.billing.payments.redirect', [$this->createInvoice($plan), $plan]);
    }
}
