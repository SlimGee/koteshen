<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Renderable
    {
        $invoice = QueryBuilder::for(auth()->user()->business->invoices())
            ->allowedSorts(['created_at', 'due_at', 'total'])
            ->defaultSort('-created_at')
            ->allowedFilters([
                'status',
                AllowedFilter::scope('search', 'whereScout'),
            ])
            ->paginate(7);

        return view('app.invoices.index', ['invoices' => $invoice]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Renderable
    {
        $clients = auth()->user()->business->clients;

        return view('app.invoices.create', [
            'clients' => $clients,
            'business' => auth()->user()->business,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceRequest $request): RedirectResponse
    {
        $items = collect($request->validated('items'))->map(
            fn($item) => [
                ...$item,
                'total' => $item['quantity'] * $item['price'],
            ]
        );

        $data = [
            ...$request->safe()->except('items', 'due_at'),
            'total' => $items->sum('total'),
            'balance' => $items->sum('total'),
            'status' => 'created',
            'due_at' => $request->validated('due_in') === 'custom' ? $request->validated('due_at') : Carbon::parse($request->validated('due_in')),
        ];

        $invoice = auth()->user()->business->invoices()->create($data);

        $invoice->items()->createMany($items);

        return to_route('app.invoices.index')->with('success', 'Invoices created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        return view('app.invoices.show', ['invoice' => $invoice]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        $clients = auth()->user()->business->clients;

        return view('app.invoices.edit', [
            'invoice' => $invoice,
            'clients' => $clients,
            'business' => auth()->user()->business,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        $items = collect($request->validated('items'))->map(
            fn($item) => [
                ...$item,
                'total' => $item['quantity'] * $item['price'],
            ]
        );

        $data = [
            ...$request->safe()->except('items', 'due_at'),
            'total' => $items->sum('total'),
            'balance' => $items->sum('total'),
            'status' => 'created',
            'due_at' => $request->validated('due_in') === 'custom' ? $request->validated('due_at') : Carbon::parse($request->validated('due_in')),
        ];

        $invoice->update($data);

        $invoice->items()->sync($items->toArray());

        return to_route('app.invoices.show', $invoice)->with('success', 'Invoice updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice): RedirectResponse
    {
        $invoice->delete();

        return to_route('app.invoices.index')->with('success', 'Invoice deleted successfully');
    }
}
