<?php

namespace App\Listeners;

use App\Events\PaymentSuccess;
use App\Notifications\PaymentReceived;

class SendInternalPaymentReceivedNote
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
    public function handle(PaymentSuccess $event): void
    {
        $event->user->notify(new PaymentReceived($event->payment));
    }
}
