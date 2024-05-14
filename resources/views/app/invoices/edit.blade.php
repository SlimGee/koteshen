@extends('app')

@section('content')
    <section class="mb-10">
        <div class="flex justify-between items-center md:items-baseline">
            <div class="flex items-center space-x-6">
                <a href="{{ route('app.invoices.show', $invoice) }}">
                    <x-secondary-button class="!py-2 !px-3 !text-xs">
                        <i class="bi bi-caret-left-fill"></i>
                        Invoice
                    </x-secondary-button>
                </a>
                <h1 class="ml-4 text-xl font-semibold md:text-2xl text-slate-700">Invoice #{{ $invoice->number }}</h1>
            </div>
        </div>
    </section>



    <section
        {{ stimulus_controller('invoice', [
            'clients' => $clients,
            'currencies' => $currencies,
        ]) }}>
        <form action="{{ route('app.invoices.update', $invoice) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="p-4 py-10 w-full rounded border md:w-6/12">
                <div class="mb-10">
                    <h1 class="text-lg font-semibold md:text-2xl text-slate-700">Invoices</h1>
                </div>

                <div class="flex justify-between space-x-4">
                    <div class="w-full md:w-8/12">
                        <div class="mb-3">
                            <x-form.label for="number">Number</x-form.label>
                            <x-form.input class="mt-1 w-full" id="number" name="number" type="text"
                                :value="$invoice->number" />
                        </div>
                        <div class="flex flex-col mb-3 space-y-3 md:flex-row md:space-y-0 md:space-x-3">
                            <div class="w-full md:w-1/2">
                                <x-form.label for="date">Date</x-form.label>
                                <x-form.input class="mt-1 w-full" id="date" name="date" :value="$invoice->date?->format('Y-m-d')"
                                    data-controller="datepicker" />
                            </div>
                            <div class="w-full md:w-1/2">
                                <x-form.label for="due_in">Invoice Due</x-form.label>
                                <x-form.select class="mt-1 w-full" id="due_in" name="due_in" data-controller="choices"
                                    data-action="invoice#selectDueDate" data-invoice-target="customDateSelect"
                                    data-choices-config="{{ json_encode([
                                        'shouldSort' => false,
                                    ]) }}">
                                    <option value="now" @selected(old('due_in', $invoice->due_in) == 'now')>Due on Receipt</option>
                                    <option value="7 days" @selected(old('due_in', $invoice->due_in) == '7 days')>After 7 days</option>
                                    <option value="14 days" @selected(old('due_in', $invoice->due_in) == '14 days')>After 14 days</option>
                                    <option value="30 days" @selected(old('due_in', $invoice->due_in) == '30 days')>After 30 days</option>
                                    <option value="45 days" @selected(old('due_in', $invoice->due_in) == '45 days')>After 45 days</option>
                                    <option value="60 days" @selected(old('due_in', $invoice->due_in) == '60 days')>After 60 days</option>
                                    <option value="custom" @selected(old('due_in', 'custom') === 'custom')>Custom</option>
                                </x-form.select>
                            </div>
                        </div>
                        <div class="hidden mt-3" {{ stimulus_target('invoice', 'customDueDate') }}>
                        </div>

                        <template {{ stimulus_target('invoice', 'customDueDateTemplate') }}>
                            <x-form.label for="due_date">Custom Due Date</x-form.label>
                            <x-form.input data-controller="datepicker" name="due_at" id="due_date" class="mt-1 w-full"
                                type="text" />
                        </template>

                        <div class="my-3" data-controller="choices">
                            <x-form.label for="last_name">
                                Currency
                            </x-form.label>

                            <x-form.select name="currency_id" class="mt-1 w-full" data-choices-target="element"
                                data-action="invoice:currency-changed@window->choices#update invoice#setCurrentCurrey">
                                @foreach ($currencies as $currency)
                                    <option value="{{ $currency->id }}" @selected(old('currency_id', $invoice->currency_id) == $currency->id)>{{ $currency->name }}
                                        ({{ $currency->code }})
                                    </option>
                                @endforeach
                            </x-form.select>
                        </div>

                    </div>

                    <div class="px-2">
                        <div class="max-w-32">
                            <img src="{{ asset($business->logo) }}" alt="logo" class="object-contain">
                        </div>
                    </div>
                </div>

                <div class="flex my-8 space-x-4">
                    <div class="w-full md:w-1/2">
                        <x-form.label for="customer">Bill from</x-form.label>

                        <div class="p-3 mt-4 rounded bg-slate-100">
                            <div class="flex justify-between items-start">
                                <h2>{{ $business->name }}</h2>
                                <span>
                                    <a href="#" class="text-sm font-bold text-blue-500">Edit</a>
                                </span>
                            </div>
                            <div>
                                {{ $business->address }}<br>
                                {{ $business->city }}, {{ $business->country }}<br>
                                {{ $business->phone }}<br>
                                {{ $business->user->email }}
                            </div>
                        </div>
                    </div>

                    <div class="w-full md:w-1/2">
                        <div class="flex justify-between items-center">
                            <x-form.label for="customer">To</x-form.label>
                            <span>
                                <a href="#" class="text-sm font-bold text-blue-500">New Client</a>
                            </span>
                        </div>
                        <div {{ stimulus_target('invoice', 'select') }} class="mt-2">
                            <x-form.select name="client_id" class="w-full" data-controller="choices"
                                data-action="invoice#selectClient">
                                <option selected>Select client</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}" @selected(old('client_id', $invoice->client_id) == $client->id)>
                                        {{ $client->name }}
                                    </option>
                                @endforeach
                            </x-form.select>
                        </div>

                        <template {{ stimulus_target('invoice', 'clientTemplate') }}>
                            <div class="p-3 mt-2 rounded border bg-slate-100 border-slate-300">

                                <div class="flex justify-between items-start">
                                    <h2>NAME</h2>
                                    <span>
                                        <span class="p-2 text-sm font-bold text-blue-500 hover:cursor-pointer"
                                            data-action="click->invoice#removeClient">
                                            <i class="bi bi-x-lg"></i>
                                        </span>
                                    </span>
                                </div>
                                <div>
                                    ADDRESS<br>
                                    CITY, COUNTRY<br>
                                    PHONE<br>
                                    EMAIL
                                </div>
                            </div>
                        </template>
                    </div>

                </div>


                <div class="mt-4 rounded border">
                    <div class="grid grid-cols-12">
                        <div class="col-span-5 p-3 bg-slate-100">Description</div>
                        <div class="col-span-1 p-3 bg-slate-100">Qty</div>
                        <div class="col-span-2 p-3 bg-slate-100">Rate</div>
                        <div class="col-span-3 p-3 bg-slate-100">Total Price</div>
                        <div class="col-span-1 p-3 bg-slate-100"></div>
                    </div>
                    <div {{ stimulus_target('invoice', 'lineItemsContainer') }}>
                        <template {{ stimulus_target('invoice', 'lineItemTemplate') }}>

                            <div class="grid grid-cols-12" {{ stimulus_target('invoice', 'lineItem') }}
                                {{ stimulus_controller('line-item') }}>
                                <div class="col-span-5 py-3 px-2"
                                    {{ stimulus_action('line-item', 'setCurrentCurrency', 'invoice:client-selected@window') }}>
                                    <x-form.input class="mt-1 w-full !p-2.5" id="description" name="items[INDEX][name]"
                                        type="text" placeholder="Item name" />
                                </div>
                                <div class="col-span-1 py-3 px-1">
                                    <x-form.input class="mt-1 w-full" id="quantity" name="items[INDEX][quantity]"
                                        type="text" value="1" data-line-item-target="quantity"
                                        data-action="line-item#updateTotal" />
                                </div>
                                <div class="col-span-2 py-3 px-1">
                                    <div class="flex items-center mt-1">
                                        <x-form.input class="w-full" id="rate" name="items[INDEX][price]"
                                            type="text" :value="0" data-line-item-target="price"
                                            data-action="line-item#updateTotal" />
                                    </div>
                                </div>
                                <div class="col-span-1 col-span-3 py-3 px-1">
                                    <div class="flex items-center mt-1">
                                        <x-secondary-button class="!py-3 !bg-slate-200 !border-r-0"
                                            data-line-item-target="symbol">$</x-secondary-button>
                                        <x-form.input class="w-full" id="rate" name="total" type="text"
                                            :value="number_format(0.0, 2)" data-line-item-target="total" />
                                    </div>
                                </div>
                                <div class="col-span-1 py-3 mt-1" data-remove="">
                                    <div data-controller="dropdown" class="relative">
                                        <x-secondary-button class="!py-3 !px-2" type="button"
                                            data-action="dropdown#toggle click@window->dropdown#hide">
                                            <i class="bi bi-gear"></i>
                                            <i class="ml-1 bi bi-caret-down-fill"></i>
                                        </x-secondary-button>

                                        <div data-dropdown-target="menu"
                                            class="hidden absolute right-0 z-50 w-32 bg-white rounded-b border shadow transition transform origin-top-right"
                                            data-transition-enter-from="opacity-0 scale-95"
                                            data-transition-enter-to="opacity-100 scale-100"
                                            data-transition-leave-from="opacity-100 scale-100"
                                            data-transition-leave-to="opacity-0 scale-95">

                                            <ul class="">
                                                <li
                                                    class='py-3 px-2 text-slate-700 hover:bg-slate-900 hover:text-slate-200'>
                                                    <a href="#" {{ stimulus_action('line-item', 'remove:prevent') }}
                                                        class="flex items-center">
                                                        <span class="mx-2">Delete</span>
                                                    </a>
                                                </li>
                                                <li
                                                    class='py-3 px-2 text-slate-700 hover:bg-slate-900 hover:text-slate-200'>
                                                    <a href="{{ route('app.home.index') }}" class="flex items-center">
                                                        <span class="mx-2">Save item</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>


                        @foreach (old('items', $invoice->items->toArray()) as $index => $value)
                            <div class="grid grid-cols-12" {{ stimulus_target('invoice', 'lineItem') }}
                                {{ stimulus_controller('line-item') }}>
                                <div class="col-span-5 py-3 px-2"
                                    {{ stimulus_action('line-item', 'setCurrentCurrency', 'invoice:client-selected@window') }}>
                                    <x-form.input class="mt-1 w-full !p-2.5" id="description" :name="'items[' . $index . '][name]'"
                                        type="text" placeholder="Item name" :value="$value['name'] ?? ''" />
                                    <input type="hidden" name="items[{{ $index }}][id]"
                                        value="{{ $value['id'] ?? null }}">
                                </div>
                                <div class="col-span-1 py-3 px-1">
                                    <x-form.input class="mt-1 w-full" id="quantity" :name="'items[' . $index . '][quantity]'" type="text"
                                        value="1" data-line-item-target="quantity"
                                        data-action="line-item#updateTotal" :value="$value['quantity'] ?? ''" />
                                </div>
                                <div class="col-span-2 py-3 px-1">
                                    <div class="flex items-center mt-1">
                                        <x-form.input class="w-full" id="rate" :name="'items[' . $index . '][price]'" type="text"
                                            :value="0" data-line-item-target="price"
                                            data-action="line-item#updateTotal" :value="$value['price'] ?? ''" />
                                    </div>
                                </div>
                                <div class="col-span-3 py-3 px-1">
                                    <div class="flex items-center mt-1">
                                        <x-secondary-button class="!py-3 !bg-slate-200 !border-r-0"
                                            data-line-item-target="symbol">$</x-secondary-button>
                                        <x-form.input class="w-full" id="rate" name="total" type="text"
                                            :value="$value['total'] ?? ''" data-line-item-target="total" />
                                    </div>
                                </div>
                                <div class="col-span-1 py-3 mt-1" data-remove="">
                                    <div data-controller="dropdown" class="relative">
                                        <x-secondary-button class="!py-3 !px-2" type="button"
                                            data-action="dropdown#toggle click@window->dropdown#hide">
                                            <i class="bi bi-gear"></i>
                                            <i class="ml-1 bi bi-caret-down-fill"></i>
                                        </x-secondary-button>

                                        <div data-dropdown-target="menu"
                                            class="hidden absolute right-0 z-50 w-32 bg-white rounded-b border shadow transition transform origin-top-right"
                                            data-transition-enter-from="opacity-0 scale-95"
                                            data-transition-enter-to="opacity-100 scale-100"
                                            data-transition-leave-from="opacity-100 scale-100"
                                            data-transition-leave-to="opacity-0 scale-95">

                                            <ul class="">
                                                <li
                                                    class='py-3 px-2 text-slate-700 hover:bg-slate-900 hover:text-slate-200'>
                                                    <a href="#" {{ stimulus_action('line-item', 'remove:prevent') }}
                                                        class="flex items-center">
                                                        <span class="mx-2">Delete</span>
                                                    </a>
                                                </li>
                                                <li
                                                    class='py-3 px-2 text-slate-700 hover:bg-slate-900 hover:text-slate-200'>
                                                    <a href="{{ route('app.home.index') }}" class="flex items-center">
                                                        <span class="mx-2">Save item</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="flex justify-center mt-3">
                        <x-secondary-button class="justify-center w-full !border-x-0 !border-b-0"
                            data-action="invoice#addLineItem">
                            + Add Line Item
                        </x-secondary-button>
                    </div>
                </div>

                <div class="flex justify-end mt-8"
                    {{ stimulus_action('invoice', 'updateTotal', 'line-item:total@window') }}>
                    <div class="space-y-4 w-full md:w-7/12">
                        <div class="flex justify-between items-start">
                            <div>
                                <h2>Subtotal</h2>
                            </div>
                            <div>
                                <span {{ stimulus_target('invoice', 'subtotal') }}>0.00</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-start">
                            <div>
                                <h2>Tax</h2>
                            </div>
                            <div>
                                <span>0.00</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-start">
                            <div>
                                <h2 class="font-semibold text-slate-900">
                                    Total (<span {{ stimulus_target('invoice', 'currencyCode') }}>USD</span>)
                                </h2>
                            </div>
                            <div>
                                <span {{ stimulus_target('invoice', 'total') }}>0.00</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-start">
                            <div>
                                <h2>Amount Due (<span {{ stimulus_target('invoice', 'currencyCode') }}>USD</span>)</h2>
                            </div>
                            <div>
                                <span {{ stimulus_target('invoice', 'balance') }}>0.00</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <x-form.label for="notes">
                        Invoice Note (<a href="#" class="text-sm font-bold text-blue-800">Default Note</a>)
                    </x-form.label>
                    <x-form.textarea class="mt-1 w-full" id="notes" name="notes"
                        rows="3">{{ old('notes', $invoice->notes) }}</x-form.textarea>
                </div>

                <div class="my-8 w-full border-t"></div>

                <div class="">
                    <div class="text-sm"><span class="text-sm font-semibold text-slate-900">Email:</span>
                        {{ $business->user->email }}</div>
                </div>

                <div class="flex justify-between items-center mt-8">
                    <div>
                        <a href="#" class="text-sm font-medium text-blue-800">Edit default footer</a>
                    </div>

                    <div>
                        <x-secondary-button type="submit">
                            Save invoice and review
                        </x-secondary-button>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
