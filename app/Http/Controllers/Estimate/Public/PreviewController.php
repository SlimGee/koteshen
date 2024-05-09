<?php

namespace App\Http\Controllers\Estimate\Public;

use App\Http\Controllers\Controller;
use App\Models\Estimate;
use Butschster\Head\Facades\Meta;
use Butschster\Head\Packages\Entities\OpenGraphPackage;
use Butschster\Head\Packages\Entities\TwitterCardPackage;
use Illuminate\Contracts\Support\Renderable;

class PreviewController extends Controller
{
    public function show(Estimate $estimate): Renderable
    {
        Meta::prependTitle($estimate->number)
            ->setDescription('Create and manage invoices for your business')
            ->setKeywords(['billing', 'invoicing', 'online payments', 'small business'])
            ->registerPackage(
                (new OpenGraphPackage('website'))
                    ->setUrl(route('app.invoices.index'))
                    ->setTitle($estimate->number)
                    ->setDescription('Create and manage invoices for your business.')
                    ->addImage(asset('images/cover.jpg'))
            )
            ->registerPackage(
                (new TwitterCardPackage('summary_large_image'))
                    ->setType('summary')
                    ->setSite('@koteshen')
                    ->setCreator('@ncubegiven_')
                    ->setTitle($estimate->number)
                    ->setDescription('Create and manage invoices for your business.')
                    ->setImage(asset('images/cover.jpg'))
            );

        return view('estimates.preview', [
            'estimate' => $estimate,
        ]);
    }
}
