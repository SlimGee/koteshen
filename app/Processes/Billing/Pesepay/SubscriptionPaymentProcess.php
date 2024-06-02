<?php

namespace App\Processes\Billing\Pesepay;

use App\Pipes\Pesepay\PayInvoice;
use App\Pipes\Pesepay\SubscribeUser;
use App\Pipes\Pesepay\VerifyTranscation;
use App\Processes\Process;

class SubscriptionPaymentProcess extends Process
{
    protected array $tasks = [
        VerifyTranscation::class,
        PayInvoice::class,
        SubscribeUser::class,
    ];
}
