<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendInvoiceRrequest;
use App\Mail\InvoiceDelivery;
use App\Models\EmailTemplate;
use App\Models\Invoice;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class SendInvoiceController extends Controller
{
    public function create(Invoice $invoice): Renderable
    {
        $template = EmailTemplate::whereName('Default Invoice Email Template')->first();

        $data = [
            'name' => $invoice->client->name,
            'invoice_number' => $invoice->number,
            'amount' => $invoice->total,
            'due_date' => $invoice->due_at->format('d M Y'),
            'business_name' => $invoice->business->name,
            'link' => route('invoices.preview', $invoice),
        ];

        $template->content = str_replace(
            array_map(fn($key) => '{{' . $key . '}}', array_keys($data)),
            array_values($data),
            $template->content
        );

        return view('app.invoice-emails.create', [
            'invoice' => $invoice,
            'template' => $template->content,
        ]);
    }

    public function store(SendInvoiceRrequest $request, Invoice $invoice): RedirectResponse
    {
        Mail::send(new InvoiceDelivery($invoice, $request->validated()));

        $invoice->update([
            'emailed' => true,
            'emailed_at' => now(),
        ]);

        return to_route('app.invoices.show', $invoice)->with('success', 'Invoice sent successfully!');
    }
}
