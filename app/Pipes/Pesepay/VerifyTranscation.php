<?php

namespace App\Pipes\Pesepay;

use App\Pesepay\Facade\Pesepay;
use App\Transport\Pesepay\PaymentTransport;
use Closure;

class VerifyTranscation
{
    public function handle(PaymentTransport $transport, Closure $next): mixed
    {
        $details = Pesepay::verifyTransaction($transport->getRequest()->validated('referenceNumber'));

        if ($details == false || $details['transactionStatus'] !== 'SUCCESS') {
            return null;
        }

        $transport->setDetails($details);

        return $next($transport);
    }
}
