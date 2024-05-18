<?php

namespace App\Listeners\Invoice;

use App\Enum\InvoiceStatus;
use App\Events\PaymentSaved;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateBalance implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PaymentSaved $event): void
    {
        $delta = $event->payment->amount - $event->payment->getOriginal('amount');

        $invoice = $event->payment->payable;
        $balance = $invoice->balance - $delta;

        $invoice->update([
            'balance' => $balance,
            'status' => $balance <= 0 ? InvoiceStatus::PAID : InvoiceStatus::PARTIALLY_PAID,
        ]);
    }
}
