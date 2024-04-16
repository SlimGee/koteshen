<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Contracts\Support\Renderable;

class PreviewInvoiceController extends Controller
{
    public function show(Invoice $invoice): Renderable
    {
        return view('invoices.template', [
            'invoice' => $invoice,
        ]);
    }
}
