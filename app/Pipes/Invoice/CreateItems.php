<?php

namespace App\Pipes\Invoice;

use App\Transport\Invoice\CreateInvoiceTransport;
use Closure;

class CreateItems
{
    /**
     * Create a new class instance.
     */
    public function handle(CreateInvoiceTransport $transport, Closure $next): mixed
    {
        $transport
            ->getInvoice()
            ->items()
            ->createMany($transport->getItems());

        return $next($transport);
    }
}
