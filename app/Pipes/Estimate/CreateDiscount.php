<?php

namespace App\Pipes\Estimate;

use App\Transport\Estimate\EstimateTransport;
use Closure;

class CreateDiscount
{
    public function handle(EstimateTransport $transport, Closure $next)
    {
        $transport->getRequest()->whenFilled('discount', function ($discount) use ($transport) {
            $transport->getEstimate()->discount()->updateOrCreate([], [
                'rate' => $discount,
                'amount' => ($discount / 100) * $transport->getEstimate()->subtotal,
            ]);

            $transport->getEstimate()->total = $transport->getEstimate()->subtotal - ($discount / 100) * $transport->getEstimate()->subtotal;

            $transport->getEstimate()->save();
        });

        return $next($transport);
    }
}
