<?php

namespace App\Pipes\Invoice;

use App\Transport\Invoice\CreateInvoiceTransport;
use Closure;

class CreateDiscount
{
    /**
     * Create a new class instance.
     */
    public function handle(CreateInvoiceTransport $transport, Closure $next): mixed
    {
        $transport->getRequest()->whenFilled('discount', function ($discount) use ($transport) {
            $transport->getInvoice()->discount()->updateOrCreate([], [
                'rate' => $discount,
                'amount' => ($discount / 100) * $transport->getInvoice()->subtotal,
            ]);

            $transport->getInvoice()->total -= ($discount / 100) * $transport->getInvoice()->subtotal;
            $transport->getInvoice()->balance = $transport->getInvoice()->total;

            $transport->getInvoice()->save();
        });

        return $next($transport);
    }
}
