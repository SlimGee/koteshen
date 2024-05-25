<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Billing\Concerns\CreatesInvoices;
use App\Http\Controllers\Controller;
use Flixtechs\Subby\Models\Plan;
use Illuminate\Http\RedirectResponse;

class RenewSubscriptionController extends Controller
{
    use CreatesInvoices;

    public function store(): RedirectResponse
    {
        $plan = Plan::find(auth()->user()->subscription()->plan_id);

        return redirect()->route('app.billing.payments.redirect', [$this->createInvoice($plan), $plan]);
    }
}
