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
            ->sync($transport->getItems()->toArray());

        return $next($transport);
    }
}
