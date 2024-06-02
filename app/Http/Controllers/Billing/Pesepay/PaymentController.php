<?php

namespace App\Http\Controllers\Billing\Pesepay;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pesepay\PaymentResultRequest;
use App\Models\Invoice;
use App\Models\User;
use App\Pesepay\Facade\Pesepay;
use Flixtechs\Subby\Models\Plan;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function redirect(Invoice $invoice, Plan $plan)
    {
        $data = [
            'amount' => auth()->user()->hasRole('super admin') ? 0.1 : $invoice->balance,
            'currency' => 'USD',
            'reason' => 'Koteshen ' . $plan->name . ' subscription',
            'result_url' => route('app.billing.payments.callback'),
            'return_url' => route('app.billing.edit'),
            'metadata' => [
                'invoice_id' => $invoice->id,
                'plan_id' => $plan->id,
                'user_id' => auth()->id(),
            ],
        ];

        return Pesepay::getPaymentUrl($data)->redirectNow();
    }

    public function callback(PaymentResultRequest $request)
    {
        $details = Pesepay::verifyTransaction($request->validated('referenceNumber'));

        if ($details == false || $details['transactionStatus'] !== 'SUCCESS') {
            return;
        }

        $user = User::find($details['metadata']['user_id']);
        $invoice = Invoice::find($details['metadata']['invoice_id']);

        Auth::login($user);

        $invoice->payments()->create([
            'amount' => $details['amountDetails']['totalTransactionAmount'],
            'paid_at' => now(),
            'channel' => 'pesepay',
            'reference' => null,
            'currency' => $details['amountDetails']['currencyCode'],
            'business_id' => $invoice->business_id,
            'user_id' => auth()->id(),
            'client_id' => $invoice->client_id,
        ]);

        $plan = Plan::find($details['metadata']['plan_id']);

        $user->subscribe($plan);
    }
}
