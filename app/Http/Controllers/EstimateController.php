<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstimateRequest;
use App\Http\Requests\UpdateEstimateRequest;
use App\Models\Currency;
use App\Models\Estimate;
use App\Pipes\Estimate\CreateDiscount;
use App\Pipes\Estimate\CreateEstimate;
use App\Pipes\Estimate\CreateItems;
use App\Pipes\Estimate\CreateTax;
use App\Pipes\Estimate\MapItems;
use App\Pipes\Estimate\UpdateEstimate;
use App\Transport\Estimate\EstimateTransport;
use Butschster\Head\Facades\Meta;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use MichaelRubel\EnhancedPipeline\Pipeline;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class EstimateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Renderable
    {
        Meta::prependTitle('Estimates')
            ->setDescription('Create and manage invoices for your business')
            ->setKeywords(['billing', 'invoicing', 'online payments', 'small business']);

        $estimates = QueryBuilder::for(auth()->user()->business->estimates())
            ->defaultSort('-created_at')
            ->allowedFilters([
                'status',
                AllowedFilter::scope('search', 'whereScout'),
            ])
            ->paginate();

        return view('app.estimates.index', [
            'estimates' => $estimates,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Renderable
    {
        Meta::prependTitle('Create Estimate')
            ->setDescription('Create and manage invoices for your business')
            ->setKeywords(['billing', 'invoicing', 'online payments', 'small business']);

        session()->put('url.intended', url()->current());

        return view('app.estimates.create', [
            'clients' => auth()->user()->business->clients,
            'currencies' => Currency::all(),
            'business' => auth()->user()->business,
            'taxes' => auth()->user()->business->taxes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEstimateRequest $request): RedirectResponse
    {
        $transport = EstimateTransport::make()->setRequest($request);

        Pipeline::make()
            ->withTransaction()
            ->send($transport)
            ->through([
                MapItems::class,
                CreateEstimate::class,
                CreateItems::class,
                CreateDiscount::class,
                CreateTax::class,
            ])
            ->thenReturn();

        return to_route('app.estimates.show', $transport->getEstimate())->with('success', 'You have successfully added a new estimate');
    }

    /**
     * Display the specified resource.
     */
    public function show(Estimate $estimate): Renderable
    {
        Meta::prependTitle($estimate->number)
            ->setDescription('Create and manage invoices for your business')
            ->setKeywords(['billing', 'invoicing', 'online payments', 'small business']);

        return view('app.estimates.show', [
            'estimate' => $estimate,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estimate $estimate): Renderable
    {
        Meta::prependTitle('Edit ' . $estimate->number)
            ->setDescription('Create and manage invoices for your business')
            ->setKeywords(['billing', 'invoicing', 'online payments', 'small business']);

        session()->put('url.intended', url()->current());

        return view('app.estimates.edit', [
            'estimate' => $estimate,
            'clients' => auth()->user()->business->clients,
            'currencies' => Currency::all(),
            'business' => auth()->user()->business,
            'taxes' => auth()->user()->business->taxes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEstimateRequest $request, Estimate $estimate): RedirectResponse
    {
        $transport = EstimateTransport::make()->setEstimate($estimate)->setRequest($request);

        Pipeline::make()
            ->withTransaction()
            ->send($transport)
            ->through([
                MapItems::class,
                UpdateEstimate::class,
                CreateItems::class,
                CreateDiscount::class,
                CreateTax::class,
            ])
            ->thenReturn();

        return to_route('app.estimates.show', $estimate)->with('success', 'You have updated this estimate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estimate $estimate): RedirectResponse
    {
        $estimate->delete();

        return to_route('app.estimates.index')->with('success', 'Estimate was successfully removed');
    }
}
