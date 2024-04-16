<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DownloadInvoiceController extends Controller
{
    public function show(Invoice $invoice): StreamedResponse
    {
        if (!Storage::exists($invoice->number . '.pdf')) {
            abort(404);
        }

        return Storage::disk('local')->download($invoice->number . '.pdf');
    }
}
