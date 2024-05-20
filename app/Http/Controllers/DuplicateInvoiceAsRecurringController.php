<?php

namespace App\Http\Controllers;

use App\Enum\InvoiceStatus;
use App\Models\Invoice;
use Illuminate\Http\RedirectResponse;

class DuplicateInvoiceAsRecurringController extends Controller
{
    public function store(Invoice $invoice): RedirectResponse
    {
        $duplicate = $invoice->replicate();
        $duplicate->number = null;
        $duplicate->status = InvoiceStatus::DRAFT;
        $duplicate->emailed_at = null;
        $duplicate->emailed = false;
        $duplicate->date = now();
        $duplicate->reminder_last_sent_at = null;
        $duplicate->save();
        $duplicate->items()->createMany(
            $invoice->items->map->only(['description', 'quantity', 'price', 'total', 'name'])
        );

        $duplicate->subscription()->create([
            'starts_at' => now(),
            'ends_at' => null,
            'interval' => '30 days',
            'status' => 'active',
            'business_id' => $invoice->business_id,
        ]);

        return to_route('app.invoices.edit', $duplicate)->with('success', 'Invoice duplicated successfully');
    }
}
