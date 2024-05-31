<?php

namespace App\Pipes\Invoice;

use App\Transport\Invoice\CreateInvoiceTransport;
use Closure;

class MapItems
{
    public function handle(CreateInvoiceTransport $transport, Closure $next): mixed
    {
        $items = collect($transport->getRequest()->validated('items'))->map(
            fn($item) => [
                ...$item,
                'total' => $item['quantity'] * $item['price'],
            ]
        );

        $transport->setItems($items);

        return $next($transport);
    }
}
