<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Contracts\Support\Renderable;

class PreviewInvoiceController extends Controller
{
    public function show(Invoice $invoice): Renderable {}
}
