<?php

namespace App\Console\Commands;

use App\Enum\InvoiceStatus;
use App\Mail\InvoiceDelivery;
use App\Models\EmailTemplate;
use App\Models\Subscription;
use Carbon\CarbonInterval;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Arr;

class GenerateRecurringInvoices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoices:generate-recurring';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate recurring invoices';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $subscriptions = Subscription::where('ends_at', '>', now())
            ->orWhereNull('ends_at')
            ->where('status', 'active')
            ->get();

        $subscriptions->each(function (Subscription $subscription) {
            $interval = CarbonInterval::createFromDateString($subscription->interval);
            $generateNewInvoiceAt = $subscription->starts_at->add($interval);

            if ($generateNewInvoiceAt->isFuture() && !is_null($subscription->starts_at)) {
                return;
            }

            $subscription->update([
                'starts_at' => $generateNewInvoiceAt,
            ]);

            $invoice = $subscription->invoice->replicate();
            $invoice->number = null;
            $invoice->status = InvoiceStatus::DRAFT;
            $invoice->due_at = now()->addDays($subscription->invoice->due_at->diffInDays($subscription->invoice->date));

            $invoice->emailed_at = null;
            $invoice->emailed = false;
            $invoice->date = now();
            $invoice->reminder_last_sent_at = null;
            $invoice->save();
            $invoice->items()->createMany(
                $subscription->invoice->items->map->only(['description', 'quantity', 'price', 'total', 'name'])
            );

            $template = EmailTemplate::whereName('invoice delivery 1')->first();

            $data = array_merge(
                Arr::dot([
                    'invoice' => $invoice->toArray(),
                    'client' => Arr::dot($invoice->client->toArray()),
                ]),
                [
                    'link' => route('invoices.preview', $invoice),
                    'payment_link' => route('invoices.preview', $invoice),
                    ...Arr::dot([
                        'business' => $invoice->business->toArray(),
                    ]),
                ]
            );

            $template->content = str_replace(
                array_map(fn($key) => '{{' . $key . '}}', array_keys($data)),
                array_values($data),
                $template->content
            );

            $invoice = $invoice->fresh();

            Mail::send(new InvoiceDelivery($invoice, [
                'subject' => 'Your invoice is ready',
                'to' => $invoice->client->email,
                'copy' => $invoice->business->user->email,
                'message' => $template->content,
                'attach' => true,
            ]));

            $invoice->update([
                'emailed' => true,
                'emailed_at' => now(),
                'status' => InvoiceStatus::SENT,
            ]);
        });
    }
}
