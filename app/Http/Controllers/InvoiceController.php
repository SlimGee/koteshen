<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Invoice;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
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
            ->paginate();

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
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceRequest $request): RedirectResponse
    {
        auth()->user()->business->invoices()->create($request->validated());

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
        return view('app.invoices.edit', ['invoice' => $invoice]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        //
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
