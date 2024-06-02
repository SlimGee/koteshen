<?php

namespace App\Http\Controllers\Billing\Pesepay;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pesepay\PaymentResultRequest;
use App\Models\Invoice;
use App\Pesepay\Facade\Pesepay;
use App\Processes\Billing\Pesepay\SubscriptionPaymentProcess;
use App\Transport\Pesepay\PaymentTransport;
use Flixtechs\Subby\Models\Plan;
use Illuminate\Support\Facades\URL;

class PaymentController extends Controller
{
    public function redirect(Invoice $invoice, Plan $plan)
    {
        $data = [
            'amount' => auth()->user()->hasRole('super admin') ? 0.1 : $invoice->balance,
            'currency' => 'USD',
            'reason' => 'Koteshen ' . $plan->name . ' subscription',
            'result_url' => URL::temporarySignedRoute('app.billing.payments.callback', now()->addMinutes(3)),
            'return_url' => route('app.billing.edit'),
            'metadata' => [
                'invoice_id' => $invoice->id,
                'plan_id' => $plan->id,
                'user_id' => auth()->id(),
            ],
        ];

        return Pesepay::getPaymentUrl($data)->redirectNow();
    }

    public function callback(PaymentResultRequest $request, SubscriptionPaymentProcess $process)
    {
        $transport = PaymentTransport::make()->setRequest($request);

        $process->run($transport);
    }
}
