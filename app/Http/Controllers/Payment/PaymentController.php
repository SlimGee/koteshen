<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Payment;
use Butschster\Head\Facades\Meta;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;
use Spatie\QueryBuilder\QueryBuilder;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  any<Model>  $payable
     */
    public function index($payable): Renderable
    {
        Meta::prependTitle('Payments');

        $payments = QueryBuilder::for($payable->payments())
            ->defaultSort('-created_at')
            ->paginate(10);

        return view('app.payables.payments.index', [
            'payments' => $payments,
            'payable' => $payable,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($payable): Renderable
    {
        return view('app.payables.payments.create', [
            'payable' => $payable,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentRequest $request, $payable): RedirectResponse
    {
        $payment = $payable->payments()->create([
            ...$request->validated(),
            'paid_at' => Carbon::parse($request->validated('paid_at')),
            'reference' => null,
            'user_id' => auth()->user()->id,
            'client_id' => $payable->client_id,
            'business_id' => auth()->user()->business->id,
        ]);

        return redirect()->route('app.payables.payments.index', payable($payable))->with('success', 'Payment successfully saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment): Renderable
    {
        return view('app.payables.payments.show', [
            'payment' => $payment,
            'payable' => $payment->payable,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($payable, Payment $payment): Renderable
    {
        return view('app.payables.payments.edit', [
            'payment' => $payment,
            'payable' => $payment->payable,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  any<Model>  $payable
     */
    public function update(UpdatePaymentRequest $request, $payable, Payment $payment): RedirectResponse
    {
        $payment->update($request->validated());

        return redirect()->route('app.payables.payments.index', payable($payable))->with('success', 'Payment successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($payable, Payment $payment): RedirectResponse
    {
        $payment->delete();

        return back()->with('success', 'Payment successfully deleted');
    }
}
