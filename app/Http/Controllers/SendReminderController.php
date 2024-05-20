<?php

namespace App\Http\Controllers;

use App\Http\Requests\Invoice\SendReminderRequest;
use App\Mail\Invoice\InvoiceReminder;
use App\Models\EmailTemplate;
use App\Models\Invoice;
use Butschster\Head\Facades\Meta;
use Butschster\Head\Packages\Entities\OpenGraphPackage;
use Butschster\Head\Packages\Entities\TwitterCardPackage;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Arr;

class SendReminderController extends Controller
{
    public function create(Invoice $invoice): Renderable
    {
        Meta::prependTitle('Send Invoice Reminder')
            ->setDescription('Create and manage invoices for your business')
            ->setKeywords(['billing', 'invoicing', 'online payments', 'small business'])
            ->registerPackage(
                (new OpenGraphPackage('website'))
                    ->setUrl(route('app.invoices.index'))
                    ->setTitle('Send Invoice Reminder')
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

        $template = EmailTemplate::whereName('Reminder 5 Manual')->first();

        $data = array_merge(
            Arr::dot([
                'invoice' => $invoice->toArray(),
                'client' => Arr::dot($invoice->client->toArray()),
            ]),
            [
                'link' => route('invoices.preview', $invoice),
                'payment_link' => route('invoices.preview', $invoice),
                ...Arr::dot([
                    'business' => auth()->user()->business->toArray(),
                ]),
            ]
        );

        $template->content = str_replace(
            array_map(fn($key) => '{{' . $key . '}}', array_keys($data)),
            array_values($data),
            $template->content
        );

        return view('app.invoice-reminders.create', [
            'invoice' => $invoice,
            'template' => $template->content,
        ]);
    }

    public function store(SendReminderRequest $request, Invoice $invoice)
    {
        Mail::send(new InvoiceReminder($invoice, $request->validated()));

        $invoice->update([
            'reminder_last_sent_at' => now(),
        ]);

        return to_route('app.invoices.show', $invoice)->with('success', 'Reminder sent successfully');
    }
}
