<?php

namespace App\Pipes\Estimate;

use App\Enum\EstimateStatus;
use App\Transport\Estimate\EstimateTransport;
use Carbon\Carbon;
use Closure;

class CreateEstimate
{
    public function handle(EstimateTransport $transport, Closure $next)
    {
        $request = $transport->getRequest();
        $items = $transport->getItems();

        $estimate = auth()
            ->user()
            ->business
            ->estimates()
            ->create([
                ...$request->estimateParams(),
                'total' => $items->sum('total'),
                'subtotal' => $items->sum('total'),
                'date' => now(),
                'status' => EstimateStatus::DRAFT,
                'expires_at' => $request->validated('expires_in') === 'custom' ? $request->validated('expires_at') : Carbon::parse($request->validated('expires_in')),
            ]);
        $transport->setEstimate($estimate);

        return $next($transport);
    }
}
