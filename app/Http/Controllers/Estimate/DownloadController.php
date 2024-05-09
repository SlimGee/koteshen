<?php

namespace App\Http\Controllers\Estimate;

use App\Http\Controllers\Controller;
use App\Models\Estimate;
use Butschster\Head\Facades\Meta;
use Butschster\Head\Packages\Entities\OpenGraphPackage;
use Butschster\Head\Packages\Entities\TwitterCardPackage;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DownloadController extends Controller
{
    public function show(Estimate $estimate): StreamedResponse
    {
        Meta::prependTitle('Download Estimate')
            ->setDescription('Create and manage invoices for your business')
            ->setKeywords(['billing', 'invoicing', 'online payments', 'small business'])
            ->registerPackage(
                (new OpenGraphPackage('website'))
                    ->setUrl(route('app.invoices.index'))
                    ->setTitle('Download Estimate')
                    ->setDescription('Create and manage invoices for your business.')
                    ->addImage(asset('images/cover.jpg'))
            )
            ->registerPackage(
                (new TwitterCardPackage('summary_large_image'))
                    ->setType('summary')
                    ->setSite('@koteshen')
                    ->setCreator('@ncubegiven_')
                    ->setTitle('Download Estimate')
                    ->setDescription('Create and manage invoices for your business.')
                    ->setImage(asset('images/cover.jpg'))
            );

        if (!Storage::exists($estimate->number . '.pdf')) {
            abort(404);
        }

        return Storage::disk('local')->download($estimate->number . '.pdf');
    }
}
