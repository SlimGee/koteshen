<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Payment;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  any<Model>  $payable
     */
    public function index($payable): Renderable
    {
        return view('app.payments.index', [
            'payments' => $payable->payments,
            'payable' => $payable,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($payable): Renderable
    {
        return view('app.payments.create', [
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
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('app.payments.index', $payable)->with('success', 'Payment successfully saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment): Renderable
    {
        return view('app.payments.show', [
            'payment' => $payment,
            'payable' => $payment->payable,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment): Renderable
    {
        return view('app.payments.edit', [
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

        return redirect()->route('app.payments.index', $payable)->with('success', 'Payment successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment): RedirectResponse
    {
        $payment->delete();

        return back()->with('success', 'Payment successfully deleted');
    }
}
