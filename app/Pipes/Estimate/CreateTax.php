<?php

namespace App\Pipes\Estimate;

use App\Transport\Estimate\EstimateTransport;
use Closure;

class CreateTax
{
    /**
     * Create a new class instance.
     */
    public function handle(EstimateTransport $transport, Closure $next)
    {
        $estimate = $transport->getEstimate();

        $estimate->taxes()->sync($transport->getRequest()->validated('tax_ids', []));
        $estimate->tax()->delete();

        $estimate
            ->taxes()
            ->each(function ($tax) use ($estimate) {
                $amount = ($tax->rate / 100) * $estimate->subtotal;
                $estimate->total += $amount;

                $estimate->tax()->updateOrCreate(
                    ['tax_id' => $tax->id], [
                        'name' => $tax->name,
                        'rate' => $tax->rate,
                        'amount' => $amount,
                        'tax_id' => $tax->id,
                        'business_id' => $estimate->business_id,
                    ]
                );
            });

        $estimate->save();

        return $next($transport);
    }
}
