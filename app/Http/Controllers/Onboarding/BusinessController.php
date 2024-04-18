<?php

namespace App\Http\Controllers\Onboarding;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBusinessRequest;
use Butschster\Head\Facades\Meta;
use Butschster\Head\Packages\Entities\OpenGraphPackage;
use Butschster\Head\Packages\Entities\TwitterCardPackage;
use Illuminate\Contracts\Support\Renderable;

class BusinessController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(): Renderable
    {
        Meta::prependTitle('Create your business profile')
            ->setDescription('Start by creating your business profile to get started with invoicing.')
            ->setKeywords(['billing', 'invoicing', 'online payments', 'small business'])
            ->registerPackage(
                (new OpenGraphPackage('website'))
                    ->setUrl(route('app.onboarding.business.create'))
                    ->setTitle('Create your business profile')
                    ->setDescription('Start by creating your business profile to get started with invoicing.')
                    ->addImage(asset('images/cover.jpg'))
            )
            ->registerPackage(
                (new TwitterCardPackage('summary_large_image'))
                    ->setType('summary')
                    ->setSite('@koteshen')
                    ->setCreator('@ncubegiven_')
                    ->setTitle('Create your business profile')
                    ->setDescription('Start by creating your business profile to get started with invoicing.')
                    ->setImage(asset('images/cover.jpg'))
            );

        return view('app.onboarding.business.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBusinessRequest $request)
    {
        $data = $request->validated();

        $request->user()->businesses()->create([
            'phone_country' => $request->phone_country,
            'current' => !auth()->user()->businesses()->exists(),
            ...$data,
        ]);

        return redirect()->route('app.home.index');
    }
}
