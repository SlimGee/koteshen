<?php

namespace App\Pipes\Pesepay;

use App\Transport\Pesepay\PaymentTransport;
use Flixtechs\Subby\Models\Plan;
use Closure;

class SubscribeUser
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
        //
    }

    public function handle(PaymentTransport $transport, Closure $next)
    {
        $plan = Plan::find($transport->getDetails()['metadata']['plan_id']);

        $transport->getUser()->subscribe($plan);
    }
}
