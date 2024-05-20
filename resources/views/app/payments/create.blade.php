@extends('app')

@section('title', 'Payments')

@section('content')
    <section class="mb-10">
        <div class="flex justify-between items-center md:items-baseline">
            <div class="flex items-center space-x-6">
                <a href="{{ route('app.payments.index') }}">
                    <x-secondary-button class="!py-2 !px-3 !text-xs">
                        <i class="bi bi-caret-left-fill"></i>
                        Payments
                    </x-secondary-button>
                </a>
                <h1 class="ml-4 text-xl font-semibold md:text-2xl text-slate-700">Create new payment</h1>
            </div>
        </div>
    </section>


    <section>

        <div class="md:w-1/2">
            <form action="{{ route('app.payments.store') }}" method="POST">
                @csrf

                <div class="px-3 bg-white rounded border shadow-sm">



                    <div class="p-3 mt-3">



                        <div class="mb-3">
                            <x-form.label for="invoice_id" class="mb-1">Select Invoice</x-form.label>
                            <x-form.select name="invoice_id" class="w-full" data-controller="choices">
                                @foreach ($invoices as $invoice)
                                    <option value="{{ $invoice->id }}" @selected(old('invoice_id') == $invoice->id)>
                                        {{ $invoice->number }} {{ $invoice->currency->symbol }}{{ $invoice->balance }}
                                    </option>
                                @endforeach
                            </x-form.select>
                        </div>

                        <div class="mb-3">
                            <x-form.label for="date">
                                Date
                            </x-form.label>
                            <x-form.input data-controller="datepicker" name="paid_at" class="mt-1 w-full" />
                        </div>

                        <div class="mb-3">
                            <x-form.label for="amount">
                                Amount
                            </x-form.label>

                            <x-form.input name="amount" class="mt-1 w-full" />
                        </div>

                        <div class="mb-3" data-controller="choices">
                            <x-form.label for="last_name">
                                Currency
                            </x-form.label>

                            <x-form.select name="currency" class="mt-1 w-full" data-choices-target="element">
                                @foreach ($currencies as $currency)
                                    <option value="{{ $currency->code }}" @selected(old('currency') == $currency->code)>
                                        {{ $currency->name }} ({{ $currency->code }})
                                    </option>
                                @endforeach
                            </x-form.select>
                        </div>

                        <div class="mb-3">
                            <x-form.label for="amount">
                                Channel
                            </x-form.label>

                            <x-form.select name="channel" class="mt-1 w-full" data-controller="choices">
                                <option value="cash">Cash</option>
                                <option value="card">Card</option>
                                <option value="bank transfer">Bank transfer</option>
                                <option value="mobile money">Mobile money</option>
                            </x-form.select>
                        </div>


                        <div class="mb-3">
                            <x-button type="submit">Save payment</x-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
