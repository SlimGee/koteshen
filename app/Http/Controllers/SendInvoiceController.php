<?php

namespace App\Http\Controllers;

use App\Models\Invoice;

class SendInvoiceController extends Controller
{
    public function create(Invoice $invoice)
    {
        return view('app.invoice-emails.create', [
            'invoice' => $invoice,
        ]);
    }
}
