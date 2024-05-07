<?php

namespace App\Http\Controllers;

use App\Enum\InvoiceStatus;
use App\Http\Requests\SendInvoiceRrequest;
use App\Mail\InvoiceDelivery;
use App\Models\EmailTemplate;
use App\Models\Invoice;
use Butschster\Head\Facades\Meta;
use Butschster\Head\Packages\Entities\OpenGraphPackage;
use Butschster\Head\Packages\Entities\TwitterCardPackage;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class SendInvoiceController extends Controller
{
    public function create(Invoice $invoice): Renderable
    {
        Meta::prependTitle('Send Invoice')
            ->setDescription('Create and manage invoices for your business')
            ->setKeywords(['billing', 'invoicing', 'online payments', 'small business'])
            ->registerPackage(
                (new OpenGraphPackage('website'))
                    ->setUrl(route('app.invoices.index'))
                    ->setTitle('Send Invoice')
                    ->setDescription('Create and manage invoices for your business.')
                    ->addImage(asset('images/cover.jpg'))
            )
            ->registerPackage(
                (new TwitterCardPackage('summary_large_image'))
                    ->setType('summary')
                    ->setSite('@koteshen')
                    ->setCreator('@ncubegiven_')
                    ->setTitle('Send Invoice')
                    ->setDescription('Create and manage invoices for your business.')
                    ->setImage(asset('images/cover.jpg'))
            );

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
            'status' => InvoiceStatus::SENT,
        ]);

        return to_route('app.invoices.show', $invoice)->with('success', 'Invoice sent successfully!');
    }
}
