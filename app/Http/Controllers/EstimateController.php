<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstimateRequest;
use App\Http\Requests\UpdateEstimateRequest;
use App\Models\Estimate;
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
        return view('app.estimates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEstimateRequest $request): RedirectResponse
    {
        $estimate = auth()
            ->user()
            ->business
            ->estimates()
            ->create($request->validated());

        return to_route('app.estimates.show', $estimate)->with('success', 'You have successfully added a new estimate');
    }

    /**
     * Display the specified resource.
     */
    public function show(Estimate $estimate): Renderable
    {
        return view('app.estimates.show', [
            'estimate' => $estimate,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estimate $estimate): Renderable
    {
        return view('app.estimates.edit', [
            'estimate' => $estimate,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEstimateRequest $request, Estimate $estimate): RedirectResponse
    {
        $estimate->update($request->validated());

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
