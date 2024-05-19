<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Estimate;
use App\Models\Invoice;
use App\Models\Payment;
use Butschster\Head\Facades\Meta;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Renderable
    {
        Meta::prependTitle('Payments');

        $payments = QueryBuilder::for(Payment::class)
            ->defaultSort('-created_at')
            ->paginate(10);

        return view('app.payments.index', [
            'payments' => $payments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Meta::prependTitle('Enter Payment');

        $clients = Client::all();
        $invoices = Invoice::all();
        $estimates = Estimate::all();

        return view('app.payments.create', [
            'clients' => $clients,
            'invoices' => $invoices,
            'estimates' => $estimates,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'invoice_id' => 'required|integer|exists:invoices,id|bail',
            'estimate_id' => 'nullable|integer',
            'amount' => 'required|numeric',
            'channel' => 'required|string',
            'currency' => 'required|string',
            'paid_at' => 'required|date',
        ]);

        $invoice = Invoice::find($data['invoice_id']);

        if ($data['amount'] > round($invoice->balance) + 2) {
            return back()->withErrors([
                'amount' => 'amount cannot be greater than ' . round($invoice->balance) + 2,
            ]);
        }

        $payment = $invoice->payments()->create([
            'client_id' => $invoice->client_id,
            'amount' => $data['amount'],
            'channel' => $data['channel'],
            'currency' => $data['currency'],
            'reference' => null,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('app.payments.index')->with('success', 'Payment successfully saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        return view('app.payments.show', [
            'payment' => $payment,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        $clients = Client::all();
        $invoices = Invoice::all();

        return view('app.payments.edit', [
            'payment' => $payment,
            'invoices' => $invoices,
            'clients' => $clients,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        $data = $request->validate([
            'invoice_id' => 'required|integer|exists:invoices,id|bail',
            'estimate_id' => 'nullable|integer',
            'amount' => 'required|numeric',
            'channel' => 'required|string',
            'currency' => 'required|string',
            'paid_at' => 'required|date',
        ]);

        $invoice = Invoice::find($data['invoice_id']);

        if ($data['amount'] > round($invoice->balance + $payment->amount) + 2) {
            return back()->withErrors([
                'amount' => 'amount cannot be greater than ' . round($invoice->balance + $payment->amount) + 2,
            ]);
        }

        $payment->update([
            'client_id' => $invoice->client_id,
            'amount' => $data['amount'],
            'channel' => $data['channel'],
            'currency' => $data['currency'],
        ]);

        return redirect()->route('app.payments.index')->with('success', 'Payment successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()->route('app.payments.index')->with('success', 'Payment successfully deleted');
    }
}
