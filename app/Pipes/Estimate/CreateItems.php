<?php

namespace App\Pipes\Estimate;

use App\Transport\Estimate\EstimateTransport;
use Closure;

class CreateItems
{
    /**
     * Create a new class instance.
     */
    public function handle(EstimateTransport $transport, Closure $next)
    {
        $transport
            ->getEstimate()
            ->items()
            ->sync($transport->getItems()->toArray());

        return $next($transport);
    }
}
