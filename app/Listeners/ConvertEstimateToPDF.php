<?php

namespace App\Listeners;

use App\Events\EstimateSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Spatie\LaravelPdf\Facades\Pdf;

class ConvertEstimateToPDF implements ShouldQueue
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
    public function handle(EstimateSaved $event): void
    {
        Pdf::view('estimates.template', ['estimate' => $event->estimate])
            ->format('a4')
            ->withBrowsershot(function ($browsershot) {
                $browsershot
                    ->noSandbox();
                $browsershot->scale(0.8);
            })
            ->disk('local')
            ->save($event->estimate->number . '.pdf');
    }
}
