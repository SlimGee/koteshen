<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Billing\Concerns\CreatesInvoices;
use App\Http\Controllers\Controller;
use App\Http\Requests\Pesepay\PaymentResultRequest;
use App\Models\Invoice;
use App\Models\User;
use App\Pesepay\Pesepay;
use Flixtechs\Subby\Models\Plan;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
            auth()->user()->subscribe($plan);

            return redirect()->intended(route('app.home.index'))->with('success', 'You have started your free trial');
        }

        return redirect()->route('app.billing.payments.redirect', [$this->createInvoice($plan), $plan]);
    }

    public function test()
    {
        $pesepay = app(Pesepay::class);

        return $pesepay->getPaymentUrl([
            'amount' => 0.2,
            'currency' => 'USD',
            'reason' => 'Test payment',
            'metadata' => [
                'invoice_id' => 1,
                'plan_id' => 1,
                'user_id' => auth()->id(),
            ],
        ])->redirectNow();
    }

    public function callback(Request $request)
    {
        $pesepay = app(Pesepay::class);

        dd($pesepay->verifyTransaction('20240602012809847-304B2A19'));
    }

    public function webook(PaymentResultRequest $request)
    {
        $details = app(Pesepay::class)->verifyTransaction($request->validated('referenceNumber'));

        if ($details == false || $details['transactionStatus'] !== 'SUCCESS') {
            return;
        }

        dd($details);

        $invoice = Invoice::find($details['metadata']['invoice_id']);

        $invoice->payments()->create([
            'amount' => $details['amountDetails']['totalTransactionAmount'],
            'paid_at' => now(),
            'channel' => 'pesepay',
            'reference' => $details['referenceNumber'],
            'currency' => $details['amountDetails']['currencyCode'],
            'business_id' => $invoice->business_id,
            'user_id' => auth()->id(),
            'client_id' => $invoice->client_id,
        ]);

        $plan = Plan::find($details['metadata']['plan_id']);

        $user = User::find($details['metadata']['user_id']);

        $user->subscribe($plan);
    }
}
