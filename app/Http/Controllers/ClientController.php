<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use Butschster\Head\Facades\Meta;
use Butschster\Head\Packages\Entities\OpenGraphPackage;
use Butschster\Head\Packages\Entities\TwitterCardPackage;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Spatie\QueryBuilder\QueryBuilder;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Renderable
    {
        Meta::prependTitle('Clients')
            ->setDescription('Manage your clients and their details.')
            ->setKeywords(['billing', 'invoicing', 'online payments', 'small business'])
            ->registerPackage(
                (new OpenGraphPackage('website'))
                    ->setUrl(route('app.invoices.index'))
                    ->setTitle('Clients')
                    ->setDescription('Create and manage invoices for your business.')
                    ->addImage(asset('images/cover.jpg'))
            )
            ->registerPackage(
                (new TwitterCardPackage('summary_large_image'))
                    ->setType('summary')
                    ->setSite('@koteshen')
                    ->setCreator('@ncubegiven_')
                    ->setTitle('Clients')
                    ->setDescription('Manage your clients and their details.')
                    ->setImage(asset('images/cover.jpg'))
            );

        $clients = QueryBuilder::for(auth()->user()->business->clients())
            ->allowedFilters(['name', 'email', 'phone'])
            ->allowedSorts('name', 'email', 'phone')
            ->defaultSort('-created_at')
            ->paginate();

        return view('app.clients.index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Renderable
    {
        Meta::prependTitle('Create Client')
            ->setDescription('Manage your clients and their details.')
            ->setKeywords(['billing', 'invoicing', 'online payments', 'small business'])
            ->registerPackage(
                (new OpenGraphPackage('website'))
                    ->setUrl(route('app.invoices.index'))
                    ->setTitle('Create Client')
                    ->setDescription('Create and manage invoices for your business.')
                    ->addImage(asset('images/cover.jpg'))
            )
            ->registerPackage(
                (new TwitterCardPackage('summary_large_image'))
                    ->setType('summary')
                    ->setSite('@koteshen')
                    ->setCreator('@ncubegiven_')
                    ->setTitle('Create Client')
                    ->setDescription('Manage your clients and their details.')
                    ->setImage(asset('images/cover.jpg'))
            );

        return view('app.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request): RedirectResponse
    {
        auth()
            ->user()
            ->business
            ->clients()
            ->create($request->validated());

        return redirect()->route('app.clients.index')->with('success', 'You have successfully created a client.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client): Renderable
    {
        Meta::prependTitle($client->name)
            ->setDescription('Manage your clients and their details.')
            ->setKeywords(['billing', 'invoicing', 'online payments', 'small business'])
            ->registerPackage(
                (new OpenGraphPackage('website'))
                    ->setUrl(route('app.invoices.index'))
                    ->setTitle($client->name)
                    ->setDescription('Create and manage invoices for your business.')
                    ->addImage(asset('images/cover.jpg'))
            )
            ->registerPackage(
                (new TwitterCardPackage('summary_large_image'))
                    ->setType('summary')
                    ->setSite('@koteshen')
                    ->setCreator('@ncubegiven_')
                    ->setTitle($client->name)
                    ->setDescription('Manage your clients and their details.')
                    ->setImage(asset('images/cover.jpg'))
            );

        return view('app.clients.show', ['client' => $client]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client): Renderable
    {
        Meta::prependTitle('Edit client ' . $client->name)
            ->setDescription('Manage your clients and their details.')
            ->setKeywords(['billing', 'invoicing', 'online payments', 'small business'])
            ->registerPackage(
                (new OpenGraphPackage('website'))
                    ->setUrl(route('app.invoices.index'))
                    ->setTitle('Edit client ' . $client->name)
                    ->setDescription('Create and manage invoices for your business.')
                    ->addImage(asset('images/cover.jpg'))
            )
            ->registerPackage(
                (new TwitterCardPackage('summary_large_image'))
                    ->setType('summary')
                    ->setSite('@koteshen')
                    ->setCreator('@ncubegiven_')
                    ->setTitle('Edit client ' . $client->name)
                    ->setDescription('Manage your clients and their details.')
                    ->setImage(asset('images/cover.jpg'))
            );

        return view('app.clients.edit', ['client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client): RedirectResponse
    {
        $client->update($request->validated());

        return redirect()->route('app.clients.index')->with('success', 'You have successfully updated the client.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('app.clients.index')->with('success', 'You have successfully deleted the client.');
    }
}
