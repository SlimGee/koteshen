<?php

namespace App\Http\Controllers;

use App\Enum\InvoiceStatus;
use App\Models\Invoice;
use Illuminate\Http\RedirectResponse;

class InvoiceStatusController extends Controller
{
    public function update(Invoice $invoice, InvoiceStatus $status): RedirectResponse
    {
        $invoice->update([
            'status' => $status,
        ]);

        return to_route('app.invoices.show', $invoice)->with('success', 'Invoice status updated successfully.');
    }
}
