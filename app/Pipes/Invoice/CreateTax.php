<?php

namespace App\Pipes\Invoice;

use App\Models\Tax;
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

        $transport
            ->getRequest()
            ->safe()
            ->collect('tax_ids')
            ->map(fn($id) => Tax::find($id))
            ->filter()
            ->each(function ($tax) use ($invoice) {
                $amount = ($tax->rate / 100) * $invoice->subtotal;
                $invoice->total += $amount;
                dd($amount, $invoice->subtotal, $invoice->total);
                $invoice->tax()->create([
                    'name' => $tax->name,
                    'rate' => $tax->rate,
                    'amount' => $amount,
                ]);
            });

        $invoice->save();

        return $next($transport);
    }
}
