<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSubscriptionRequest;
use App\Models\Invoice;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RecurringInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Invoice $invoice)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice, Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice, Subscription $subscription) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function restore(Invoice $invoice, Subscription $subscription)
    {
        $subscription->update(['status' => 'active']);

        return redirect()->route('app.invoices.show', $invoice)->with('success', 'You have successfully restored this reccurring invoice.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubscriptionRequest $request, Invoice $invoice, Subscription $subscription): RedirectResponse
    {
        $interval = $request->validated('interval') . ' ' . $request->validated('interval_unit');

        $subscription->update([
            'interval' => $interval,
            'ends_at' => $request->validated('ends_at') == 'indef' ? null : Carbon::parse($request->validated('ends_at')),
        ]);

        return redirect()->route('app.invoices.show', $invoice)->with('success', 'You have successfully updated this reccurring invoice');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice, Subscription $subscription): RedirectResponse
    {
        $subscription->update(['status' => 'cancelled']);

        return redirect()->route('app.invoices.show', $invoice)->with('success', 'You have successfully cancelled this reccurring invoice.');
    }
}
