<?php

namespace App\Pipes\Invoice;

use App\Transport\Invoice\CreateInvoiceTransport;
use Carbon\Carbon;
use Closure;

class UpdateInvoice
{
    public function handle(CreateInvoiceTransport $transport, Closure $next): mixed
    {
        $request = $transport->getRequest();

        $transport->getInvoice()->update([
            ...$transport->getRequest()->withoutOtherFields(),
            'subtotal' => $transport->getItems()->sum('total'),
            'total' => $transport->getItems()->sum('total'),
            'balance' => $transport->getItems()->sum('total'),
            'due_at' => $request->validated('due_in') === 'custom' ? $request->validated('due_at') : Carbon::parse($request->validated('due_in')),
        ]);

        return $next($transport);
    }
}
