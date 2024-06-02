<?php

namespace App\Pipes\Pesepay;

use App\Events\PaymentSuccess;
use App\Models\Invoice;
use App\Models\User;
use App\Transport\Pesepay\PaymentTransport;
use Closure;

class PayInvoice
{
    public function handle(PaymentTransport $transport, Closure $next)
    {
        $details = $transport->getDetails();
        $invoice = Invoice::find($details['metadata']['invoice_id']);
        $user = User::find($details['metadata']['user_id']);

        $invoice->payments()->create([
            'amount' => $details['amountDetails']['totalTransactionAmount'],
            'paid_at' => now(),
            'channel' => 'pesepay',
            'reference' => null,
            'currency' => $details['amountDetails']['currencyCode'],
            'business_id' => $invoice->business_id,
            'user_id' => $details['metadata']['user_id'],
            'client_id' => $invoice->client_id,
        ]);

        event(new PaymentSuccess($invoice->payments->last(), $user));

        $transport->setUser($user);
        $transport->setInvoice($invoice);

        return $next($transport);
    }
}
