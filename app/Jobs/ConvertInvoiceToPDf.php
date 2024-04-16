<?php

namespace App\Jobs;

use App\Models\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\LaravelPdf\Facades\Pdf;

class ConvertInvoiceToPDf implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Invoice $invoice)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Pdf::view('invoices.template', ['invoice' => $this->invoice])
            ->format('a4')
            ->withBrowsershot(function ($browsershot) {
                $browsershot
                    ->noSandbox();
                $browsershot->scale(0.8);
            })
            ->disk('local')
            ->save($this->invoice->number . '.pdf');
    }
}
