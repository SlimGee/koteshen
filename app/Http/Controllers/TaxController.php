<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaxRequest;
use App\Http\Requests\UpdateTaxRequest;
use App\Models\Tax;
use Butschster\Head\Facades\Meta;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Spatie\QueryBuilder\QueryBuilder;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Renderable
    {
        Meta::prependTitle('Tax Settings');

        $taxes = QueryBuilder::for(auth()->user()->business->taxes())
            ->defaultSort('-created_at')
            ->allowedSorts(['rate', 'name'])
            ->paginate();

        return view('app.taxes.index', [
            'taxes' => $taxes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Renderable
    {
        return view('app.taxes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaxRequest $request): RedirectResponse
    {
        auth()
            ->user()
            ->business
            ->taxes()
            ->create($request->validated());

        return to_route('app.taxes.index')->with('success', 'Tax has been saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tax $tax): Renderable
    {
        return view('app.taxes.show', [
            'tax' => $tax,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tax $tax): Renderable
    {
        return view('app.taxes.edit', [
            'tax' => $tax,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaxRequest $request, Tax $tax): RedirectResponse
    {
        $tax->update($request->validated());

        return to_route('app.taxes.index')->with('success', 'You have successfully updated tax information');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tax $tax): RedirectResponse
    {
        $tax->delete();

        return to_route('app.taxes.index')->with('success', 'You have successfully removed this tax');
    }
}
