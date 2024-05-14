@extends('template')

@section('content')
    <div class="mx-auto w-full">
        <div class="mx-auto">
            <!-- Card -->
            <div class="flex flex-col bg-white sm:p-10 dark:bg-neutral-800">
                <!-- Grid -->
                <div class="flex justify-between">
                    <div class="max-w-32">
                        <img src="{{ asset($invoice->business->logo) }}" alt="logo" class="object-contain">
                    </div>
                    <!-- Col -->

                    <div class="text-end">
                        <h2
                            class="flex items-center space-x-3 text-2xl font-semibold md:text-3xl text-slate-800 dark:text-neutral-200">
                            <span
                                class="py-1.5 px-3 text-sm font-semibold mr-2 {{ $invoice->status->classes() }} rounded-sm">{{ $invoice->status }}</span>
                            #{{ $invoice->number }}
                        </h2>
                        <!--span class="block mt-1 text-slate-500 dark:text-neutral-500">{{ $invoice->number }}</span -->

                        <address class="mt-4 not-italic text-slate-800 dark:text-neutral-200">
                            {{ $invoice->business->name }}<br>
                            {{ $invoice->business->address }}<br>
                            {{ $invoice->business->city }}, {{ $invoice->business->country }}<br>
                            {{ phone($invoice->business->phone, format: 'national') }}<br>
                        </address>
                    </div>
                    <!-- Col -->
                </div>
                <!-- End Grid -->

                <!-- Grid -->
                <div class="grid gap-3 mt-8 sm:grid-cols-2">
                    <div>
                        <h3 class="text-lg font-semibold text-slate-800 dark:text-neutral-200">Bill to:</h3>
                        <h3 class="text-lg font-semibold text-slate-800 dark:text-neutral-200">
                            {{ $invoice->client->name }}
                        </h3>
                        <address class="mt-2 not-italic text-slate-500 dark:text-neutral-500">
                            {{ $invoice->client->address }},<br>
                            {{ $invoice->client->city }}, {{ $invoice->client->country }}<br>
                            {{ $invoice->client->phone }}<br>
                        </address>
                    </div>
                    <!-- Col -->

                    <div class="space-y-2 sm:text-end">
                        <!-- Grid -->
                        <div class="grid grid-cols-2 gap-3 sm:grid-cols-1 sm:gap-2">
                            <dl class="grid gap-x-3 sm:grid-cols-5">
                                <dt class="col-span-3 font-semibold text-slate-800 dark:text-neutral-200">Invoice date:</dt>
                                <dd class="col-span-2 text-slate-500 dark:text-neutral-500">
                                    {{ $invoice->created_at->format('d M Y') }}</dd>
                            </dl>
                            <dl class="grid gap-x-3 sm:grid-cols-5">
                                <dt class="col-span-3 font-semibold text-slate-800 dark:text-neutral-200">Due date:</dt>
                                <dd class="col-span-2 text-slate-500 dark:text-neutral-500">
                                    {{ $invoice->due_at->format('d M Y') }}
                                </dd>
                            </dl>
                        </div>
                        <!-- End Grid -->
                    </div>
                    <!-- Col -->
                </div>
                <!-- End Grid -->

                <!-- Table -->
                <div class="mt-6">
                    <div class="p-4 space-y-4 rounded-lg border border-slate-200 dark:border-neutral-700">
                        <div class="hidden sm:grid sm:grid-cols-5">
                            <div class="text-xs font-medium uppercase sm:col-span-2 text-slate-500 dark:text-neutral-500">
                                Item</div>
                            <div class="text-xs font-medium uppercase text-slate-500 text-start dark:text-neutral-500">Qty
                            </div>
                            <div class="text-xs font-medium uppercase text-slate-500 text-start dark:text-neutral-500">Rate
                            </div>
                            <div class="text-xs font-medium uppercase text-slate-500 text-end dark:text-neutral-500">Amount
                            </div>
                        </div>

                        <div class="hidden border-b sm:block border-slate-200 dark:border-neutral-700"></div>
                        @foreach ($invoice->items as $item)
                            <div class="grid grid-cols-3 gap-2 sm:grid-cols-5">
                                <div class="col-span-full sm:col-span-2">
                                    <h5
                                        class="text-xs font-medium uppercase sm:hidden text-slate-500 dark:text-neutral-500">
                                        Item</h5>
                                    <p class="font-medium text-slate-800 dark:text-neutral-200">{{ $item->name }}</p>
                                </div>
                                <div>
                                    <h5
                                        class="text-xs font-medium uppercase sm:hidden text-slate-500 dark:text-neutral-500">
                                        Qty
                                    </h5>
                                    <p class="text-slate-800 dark:text-neutral-200">{{ $item->quantity }}</p>
                                </div>
                                <div>
                                    <h5
                                        class="text-xs font-medium uppercase sm:hidden text-slate-500 dark:text-neutral-500">
                                        Rate</h5>
                                    <p class="text-slate-800 dark:text-neutral-200">
                                        {{ Number::format($item->price, $invoice->currency->decimal_digits) }}</p>
                                </div>
                                <div>
                                    <h5
                                        class="text-xs font-medium uppercase sm:hidden text-slate-500 dark:text-neutral-500">
                                        Amount</h5>
                                    <p class="text-slate-800 sm:text-end dark:text-neutral-200">
                                        {{ $invoice->currency->symbol }}
                                        {{ Number::format($item->total, $invoice->currency->decimal_digits) }}</p>
                                </div>
                            </div>

                            <div class="border-b sm:hidden border-slate-200 dark:border-neutral-700"></div>
                        @endforeach


                    </div>
                    <!-- End Table -->

                    <!-- Flex -->
                    <div class="flex mt-8 sm:justify-end">
                        <div class="space-y-2 w-full max-w-2xl sm:text-end">
                            <!-- Grid -->
                            <div class="grid grid-cols-2 gap-3 sm:grid-cols-1 sm:gap-2">
                                <dl class="grid gap-x-3 sm:grid-cols-5">
                                    <dt class="col-span-3 font-semibold text-slate-800 dark:text-neutral-200">Subtotal:</dt>
                                    <dd class="col-span-2 text-slate-500 dark:text-neutral-500">
                                        {{ $invoice->currency->symbol }}
                                        {{ Number::format($invoice->subtotal, $invoice->currency->decimal_digits) }}
                                    </dd>
                                </dl>

                                <dl class="grid gap-x-3 sm:grid-cols-5">
                                    <dt class="col-span-3 font-semibold text-slate-800 dark:text-neutral-200">Total:</dt>
                                    <dd class="col-span-2 text-slate-500 dark:text-neutral-500">
                                        {{ $invoice->currency->symbol }}
                                        {{ Number::format($invoice->total, $invoice->currency->decimal_digits) }}
                                    </dd>
                                </dl>

                                <dl class="grid gap-x-3 sm:grid-cols-5">
                                    <dt class="col-span-3 font-semibold text-slate-800 dark:text-neutral-200">Tax:</dt>
                                    <dd class="col-span-2 text-slate-500 dark:text-neutral-500">$39.00</dd>
                                </dl>

                                <dl class="grid gap-x-3 sm:grid-cols-5">
                                    <dt class="col-span-3 font-semibold text-slate-800 dark:text-neutral-200">Amount paid:
                                    </dt>
                                    <dd class="col-span-2 text-slate-500 dark:text-neutral-500">
                                        {{ $invoice->currency->symbol }}
                                        {{ Number::format($invoice->total - $invoice->balance, $invoice->currency->decimal_digits) }}

                                    </dd>
                                </dl>

                                <dl class="grid gap-x-3 sm:grid-cols-5">
                                    <dt class="col-span-3 font-semibold text-slate-800 dark:text-neutral-200">Due balance:
                                    </dt>
                                    <dd class="col-span-2 text-slate-500 dark:text-neutral-500">
                                        {{ $invoice->currency->symbol }}
                                        {{ Number::format($invoice->total, $invoice->currency->decimal_digits) }}
                                    </dd>
                                </dl>
                            </div>
                            <!-- End Grid -->
                        </div>
                    </div>
                    <!-- End Flex -->

                    <div class="mt-8 sm:mt-12">
                        <h4 class="text-lg font-semibold text-slate-800 dark:text-neutral-200">Thank you!</h4>
                        <p class="text-slate-500 dark:text-neutral-500">
                            {{ $invoice->notes }}
                        </p>
                        <div class="mt-2">
                            <p class="block text-sm font-medium text-slate-800 dark:text-neutral-200">
                                {{ $invoice->business->user->email }}</p>
                            <p class="block text-sm font-medium text-slate-800 dark:text-neutral-200">
                                {{ $invoice->business->phone }}</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
