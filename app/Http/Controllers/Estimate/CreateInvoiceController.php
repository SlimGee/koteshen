<?php

namespace App\Http\Controllers\Estimate;

use App\Enum\EstimateStatus;
use App\Enum\InvoiceStatus;
use App\Http\Controllers\Controller;
use App\Models\Estimate;
use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;

class CreateInvoiceController extends Controller
{
    public function store(Estimate $estimate): RedirectResponse
    {
        $invoice = Invoice::create([
            'client_id' => $estimate->client_id,
            'business_id' => $estimate->business_id,
            'currency_id' => $estimate->currency_id,
            'total' => $estimate->total,
            'balance' => $estimate->total,
            'subtotal' => $estimate->subtotal,
            'status' => InvoiceStatus::DRAFT,
            'date' => now(),
            'due_in' => '14 days',
            'due_at' => Carbon::parse('14 days'),
            'number' => null,
        ]);

        $invoice->items()->createMany(
            $estimate->items->map->only(['description', 'quantity', 'price', 'total', 'name'])
        );

        $estimate->update([
            'status' => EstimateStatus::INVOICED,
        ]);

        return to_route('app.invoices.edit', $invoice)->with('success', 'You have successfully created a new invoice');
    }
}
