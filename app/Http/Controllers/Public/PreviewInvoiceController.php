<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Butschster\Head\Facades\Meta;
use Butschster\Head\Packages\Entities\OpenGraphPackage;
use Butschster\Head\Packages\Entities\TwitterCardPackage;
use Illuminate\Contracts\Support\Renderable;

class PreviewInvoiceController extends Controller
{
    public function show(Invoice $invoice): Renderable
    {
        Meta::prependTitle($invoice->number)
            ->setDescription('Create and manage invoices for your business')
            ->setKeywords(['billing', 'invoicing', 'online payments', 'small business'])
            ->registerPackage(
                (new OpenGraphPackage('website'))
                    ->setUrl(route('app.invoices.index'))
                    ->setTitle($invoice->number)
                    ->setDescription('Create and manage invoices for your business.')
                    ->addImage(asset('images/cover.jpg'))
            )
            ->registerPackage(
                (new TwitterCardPackage('summary_large_image'))
                    ->setType('summary')
                    ->setSite('@koteshen')
                    ->setCreator('@ncubegiven_')
                    ->setTitle($invoice->number)
                    ->setDescription('Create and manage invoices for your business.')
                    ->setImage(asset('images/cover.jpg'))
            );

        return view('invoices.preview', [
            'invoice' => $invoice,
        ]);
    }
}
