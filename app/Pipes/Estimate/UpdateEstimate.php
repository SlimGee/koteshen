<?php

namespace App\Pipes\Estimate;

use App\Transport\Estimate\EstimateTransport;
use Carbon\Carbon;
use Closure;

class UpdateEstimate
{
    public function handle(EstimateTransport $transport, Closure $next)
    {
        $items = $transport->getItems();
        $request = $transport->getRequest();

        $transport->getEstimate()->update([
            ...$request->estimateParams(),
            'total' => $items->sum('total'),
            'subtotal' => $items->sum('total'),
            'expires_at' => $request->validated('expires_in') === 'custom' ? $request->validated('expires_at') : Carbon::parse($request->validated('expires_in')),
        ]);

        return $next($transport);
    }
}
