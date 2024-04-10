<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
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
        return view('app.clients.show', ['client' => $client]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client): Renderable
    {
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
