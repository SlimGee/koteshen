<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Butschster\Head\Facades\Meta;
use Illuminate\Contracts\Support\Renderable;
use Spatie\Activitylog\Models\Activity;

class InvoiceActivityController extends Controller
{
    public function index(Invoice $invoice): Renderable
    {
        Meta::prependTitle('Invoice Activity')
            ->setDescription('Create and manage invoices for your business')
            ->setKeywords(['billing', 'invoicing', 'online payments', 'small business']);

        $invoiceActivity = Activity::where('subject_id', $invoice->id)
            ->where('subject_type', Invoice::class)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('app.invoices.activities.index', [
            'activities' => $invoiceActivity,
            'invoice' => $invoice,
        ]);
    }
}
