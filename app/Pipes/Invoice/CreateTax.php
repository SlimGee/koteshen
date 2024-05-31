<?php

namespace App\Pipes\Invoice;

use App\Transport\Invoice\CreateInvoiceTransport;
use Closure;

class CreateTax
{
    /**
     * Create a new class instance.
     */
    public function handle(CreateInvoiceTransport $transport, Closure $next): mixed
    {
        $invoice = $transport->getInvoice();

        $invoice->taxes()->sync($transport->getRequest()->validated('tax_ids', []));
        $invoice->tax()->delete();

        $invoice
            ->taxes()
            ->each(function ($tax) use ($invoice) {
                $amount = ($tax->rate / 100) * $invoice->subtotal;
                $invoice->total += $amount;

                $invoice->tax()->updateOrCreate(
                    ['tax_id' => $tax->id], [
                        'name' => $tax->name,
                        'rate' => $tax->rate,
                        'amount' => $amount,
                        'tax_id' => $tax->id,
                        'business_id' => $invoice->business_id,
                    ]
                );
            });

        $invoice->balance = $invoice->total;
        $invoice->save();

        return $next($transport);
    }
}
