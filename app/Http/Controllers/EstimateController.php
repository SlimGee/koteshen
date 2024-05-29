<?php

namespace App\Http\Controllers;

use App\Enum\EstimateStatus;
use App\Http\Requests\StoreEstimateRequest;
use App\Http\Requests\UpdateEstimateRequest;
use App\Models\Currency;
use App\Models\Estimate;
use Butschster\Head\Facades\Meta;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
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
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEstimateRequest $request): RedirectResponse
    {
        $items = collect($request->validated('items'))->map(
            fn($item) => [
                ...$item,
                'total' => $item['quantity'] * $item['price'],
            ]
        );

        $data = [
            ...$request->safe()->except('items', 'expires_at'),
            'total' => $items->sum('total'),
            'subtotal' => $items->sum('total'),
            'date' => now(),
            'status' => EstimateStatus::DRAFT,
            'expires_at' => $request->validated('expires_in') === 'custom' ? $request->validated('expires_at') : Carbon::parse($request->validated('expires_in')),
        ];

        $estimate = auth()
            ->user()
            ->business
            ->estimates()
            ->create($data);

        $estimate->items()->createMany($items);

        return to_route('app.estimates.show', $estimate)->with('success', 'You have successfully added a new estimate');
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
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEstimateRequest $request, Estimate $estimate): RedirectResponse
    {
        $items = collect($request->validated('items'))->map(
            fn($item) => [
                ...$item,
                'total' => $item['quantity'] * $item['price'],
            ]
        );

        $data = [
            ...$request->safe()->except('items', 'expires_at'),
            'total' => $items->sum('total'),
            'subtotal' => $items->sum('total'),
            'date' => now(),
            'status' => EstimateStatus::DRAFT,
            'expires_at' => $request->validated('expires_in') === 'custom' ? $request->validated('expires_at') : Carbon::parse($request->validated('expires_in')),
        ];

        $estimate->update($data);

        $estimate->items()->sync($items->toArray());

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
