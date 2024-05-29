<?php

namespace App\Pipes\Invoice;

use App\Transport\Invoice\CreateInvoiceTransport;
use Carbon\Carbon;
use Closure;

class CreateInvoice
{
    /**
     * Create a new class instance.
     */
    public function handle(CreateInvoiceTransport $transport, Closure $next): mixed
    {
        $items = $transport->getItems();
        $request = $transport->getRequest();

        $invoice = $transport
            ->getRequest()
            ->user()
            ->business
            ->invoices()
            ->create([
                ...$request->withoutOtherFields(),
                'total' => $items->sum('total'),
                'balance' => $items->sum('total'),
                'subtotal' => $items->sum('total'),
                'status' => 'created',
                'due_at' => $request->validated('due_in') === 'custom' ? $request->validated('due_at') : Carbon::parse($request->validated('due_in')),
            ]);

        $transport->setInvoice($invoice);

        return $next($transport);
    }
}
