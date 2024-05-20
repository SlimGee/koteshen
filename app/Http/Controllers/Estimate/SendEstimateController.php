<?php

namespace App\Http\Controllers\Estimate;

use App\Enum\EstimateStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Estimate\SendEstimateRequest;
use App\Mail\Estimate\EstimateDelivery;
use App\Models\EmailTemplate;
use App\Models\Estimate;
use Butschster\Head\Facades\Meta;
use Butschster\Head\Packages\Entities\OpenGraphPackage;
use Butschster\Head\Packages\Entities\TwitterCardPackage;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Arr;

class SendEstimateController extends Controller
{
    public function create(Estimate $estimate): Renderable
    {
        Meta::prependTitle('Send Estimate')
            ->setDescription('Create and manage estimates for your business')
            ->setKeywords(['billing', 'invoicing', 'online payments', 'small business'])
            ->registerPackage(
                (new OpenGraphPackage('website'))
                    ->setUrl(route('app.estimates.index'))
                    ->setTitle('Send estimate')
                    ->setDescription('Create and manage estimates for your business.')
                    ->addImage(asset('images/cover.jpg'))
            )
            ->registerPackage(
                (new TwitterCardPackage('summary_large_image'))
                    ->setType('summary')
                    ->setSite('@koteshen')
                    ->setCreator('@ncubegiven_')
                    ->setTitle('Send Estimate')
                    ->setDescription('Create and manage estimates for your business.')
                    ->setImage(asset('images/cover.jpg'))
            );

        $template = EmailTemplate::whereName('estimate delivery 2')->first();

        $data = array_merge(
            Arr::dot([
                'estimate' => $estimate->toArray(),
                'client' => Arr::dot($estimate->client->toArray()),
            ]),
            [
                'estimate.link' => route('estimates.preview', $estimate),
                'payment_link' => route('estimates.preview', $estimate),
                ...Arr::dot([
                    'business' => $estimate->business->toArray(),
                ]),
            ]
        );

        $template->content = str_replace(
            array_map(fn($key) => '{{' . $key . '}}', array_keys($data)),
            array_values($data),
            $template->content
        );

        return view('app.estimate-emails.create', [
            'estimate' => $estimate,
            'template' => $template->content,
        ]);
    }

    public function store(SendEstimateRequest $request, Estimate $estimate): RedirectResponse
    {
        Mail::send(new EstimateDelivery($estimate, $request->validated()));

        $estimate->update([
            'emailed' => true,
            'emailed_at' => now(),
            'status' => EstimateStatus::SENT,
        ]);

        return to_route('app.estimates.show', $estimate)->with('success', 'Estimate was sent successfully!');
    }
}
