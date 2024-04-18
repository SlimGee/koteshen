<?php

namespace App\Listeners;

use App\Events\InvoiceSaved;
use App\Jobs\ConvertInvoiceToPDf;
use Illuminate\Contracts\Queue\ShouldQueue;

class GeneratePDF implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(InvoiceSaved $event): void
    {
        dispatch(new ConvertInvoiceToPDf($event->invoice));
    }
}
