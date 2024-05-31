<?php

namespace App\Pipes\Estimate;

use App\Transport\Estimate\EstimateTransport;
use Closure;

class MapItems
{
    public function handle(EstimateTransport $transport, Closure $next)
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
