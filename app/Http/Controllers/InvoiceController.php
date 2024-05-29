<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Invoice;
use App\Pipes\Invoice\CreateInvoice;
use App\Pipes\Invoice\CreateItems;
use App\Pipes\Invoice\MapItems;
use App\Transport\Invoice\CreateInvoiceTransport;
use Butschster\Head\Facades\Meta;
use Butschster\Head\Packages\Entities\OpenGraphPackage;
use Butschster\Head\Packages\Entities\TwitterCardPackage;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use MichaelRubel\EnhancedPipeline\Pipeline;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Renderable
    {
        Meta::prependTitle('Invoices')
            ->setDescription('Create and manage invoices for your business')
            ->setKeywords(['billing', 'invoicing', 'online payments', 'small business'])
            ->registerPackage(
                (new OpenGraphPackage('website'))
                    ->setUrl(route('app.invoices.index'))
                    ->setTitle('Invoices')
                    ->setDescription('Create and manage invoices for your business.')
                    ->addImage(asset('images/cover.jpg'))
            )
            ->registerPackage(
                (new TwitterCardPackage('summary_large_image'))
                    ->setType('summary')
                    ->setSite('@koteshen')
                    ->setCreator('@ncubegiven_')
                    ->setTitle('Invoices')
                    ->setDescription('Create and manage invoices for your business.')
                    ->setImage(asset('images/cover.jpg'))
            );

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
        Meta::prependTitle('Create Invoices')
            ->setDescription('Create and manage invoices for your business')
            ->setKeywords(['billing', 'invoicing', 'online payments', 'small business'])
            ->registerPackage(
                (new OpenGraphPackage('website'))
                    ->setUrl(route('app.invoices.index'))
                    ->setTitle('Create Invoices')
                    ->setDescription('Create and manage invoices for your business.')
                    ->addImage(asset('images/cover.jpg'))
            )
            ->registerPackage(
                (new TwitterCardPackage('summary_large_image'))
                    ->setType('summary')
                    ->setSite('@koteshen')
                    ->setCreator('@ncubegiven_')
                    ->setTitle('Create Invoices')
                    ->setDescription('Create and manage invoices for your business.')
                    ->setImage(asset('images/cover.jpg'))
            );

        $clients = auth()->user()->business->clients;
        $taxes = auth()->user()->business->taxes;

        session()->put('url.intended', url()->current());

        return view('app.invoices.create', [
            'clients' => $clients,
            'business' => auth()->user()->business,
            'taxes' => $taxes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceRequest $request): RedirectResponse
    {
        $transport = CreateInvoiceTransport::make()->setRequest($request);

        Pipeline::make()
            ->withTransaction()
            ->send($transport)
            ->through([
                MapItems::class,
                CreateInvoice::class,
                CreateItems::class,
            ])
            ->thenReturn();

        return to_route('app.invoices.show', $transport->getInvoice())->with('success', 'Invoices created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        Meta::prependTitle($invoice->number)
            ->setDescription('Create and manage invoices for your business')
            ->setKeywords(['billing', 'invoicing', 'online payments', 'small business'])
            ->registerPackage(
                (new OpenGraphPackage('website'))
                    ->setUrl(route('app.invoices.index'))
                    ->setTitle($invoice->number)
                    ->setDescription('Create and manage invoices for your business.')
                    ->addImage(asset('images/cover.jpg'))
            )
            ->registerPackage(
                (new TwitterCardPackage('summary_large_image'))
                    ->setType('summary')
                    ->setSite('@koteshen')
                    ->setCreator('@ncubegiven_')
                    ->setTitle($invoice->number)
                    ->setDescription('Create and manage invoices for your business.')
                    ->setImage(asset('images/cover.jpg'))
            );

        return view('app.invoices.show', ['invoice' => $invoice]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        Meta::prependTitle('Edit Invoice ' . $invoice->number)
            ->setDescription('Create and manage invoices for your business')
            ->setKeywords(['billing', 'invoicing', 'online payments', 'small business'])
            ->registerPackage(
                (new OpenGraphPackage('website'))
                    ->setUrl(route('app.invoices.index'))
                    ->setTitle('Edit Invoice ' . $invoice->number)
                    ->setDescription('Create and manage invoices for your business.')
                    ->addImage(asset('images/cover.jpg'))
            )
            ->registerPackage(
                (new TwitterCardPackage('summary_large_image'))
                    ->setType('summary')
                    ->setSite('@koteshen')
                    ->setCreator('@ncubegiven_')
                    ->setTitle('Edit Invoice ' . $invoice->number)
                    ->setDescription('Create and manage invoices for your business.')
                    ->setImage(asset('images/cover.jpg'))
            );

        $clients = auth()->user()->business->clients;
        $taxes = auth()->user()->business->taxes;
        session()->put('url.intended', url()->current());

        return view('app.invoices.edit', [
            'invoice' => $invoice,
            'clients' => $clients,
            'business' => auth()->user()->business,
            'taxes' => $taxes,
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
