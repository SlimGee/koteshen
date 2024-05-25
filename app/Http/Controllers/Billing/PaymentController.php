<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\User;
use Flixtechs\Subby\Models\Plan;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller
{
    public function redirect(Invoice $invoice, Plan $plan)
    {
        $data = [
            'amount' => round($invoice->balance * 18 * 100),
            'email' => $invoice->client->email,
            'currency' => 'ZAR',
            'callback_url' => route('app.billing.payments.callback'),
            'metadata' => [
                'invoice_id' => $invoice->id,
                'plan_id' => $plan->id,
            ],
        ];

        return Paystack::getAuthorizationUrl($data)->redirectNow();
    }

    public function callback()
    {
        $details = Paystack::getPaymentData();

        if ($details['status'] !== true) {
            return redirect()->route('app.billing.edit')->with('error', 'Payment failed');
        }

        $invoice = Invoice::find($details['data']['metadata']['invoice_id']);

        $invoice->payments()->create([
            'amount' => ($details['data']['amount'] / 100) / 18,
            'paid_at' => now(),
            'channel' => $details['data']['channel'],
            'reference' => null,
            'currency' => $invoice->currency->code,
            'business_id' => $invoice->business_id,
            'user_id' => auth()->id(),
            'client_id' => $invoice->client_id,
        ]);

        $plan = Plan::find($details['data']['metadata']['plan_id']);

        $user = User::find(auth()->id());

        $user->subscribe($plan);

        return redirect()->route('app.billing.edit')->with('success', 'You have successfully subscribed to ' . $plan->name . ' plan');
    }
}
