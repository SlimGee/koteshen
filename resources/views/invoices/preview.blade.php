@extends('minimal')

@section('content')
    <div class="px-2 my-4 mx-auto sm:px-6 sm:my-10 lg:px-2 max-w-[85rem]">
        <div class="mx-auto sm:w-11/12 lg:w-3/4">
            <!-- Card -->
            <div class="flex flex-col p-4 bg-white rounded border shadow-sm sm:p-10 dark:bg-neutral-800">
                <!-- Grid -->
                <div class="flex justify-between">
                    <div class="max-w-32">
                        <img src="data:image/png; base64, {{ base64_encode(Storage::disk('public')->get($invoice->business->logo)) }}"
                            alt="logo" class="object-contain">
                    </div>
                    <!-- Col -->

                    <div class="text-end">
                        <h2
                            class="flex items-center space-x-3 text-2xl font-semibold text-gray-800 md:text-3xl dark:text-neutral-200">
                            <span
                                class="py-1.5 px-3 text-sm font-semibold mr-2 {{ $invoice->status->classes() }} rounded-sm">{{ $invoice->status }}</span>
                            #{{ $invoice->number }}
                        </h2>
                        <!--span class="block mt-1 text-gray-500 dark:text-neutral-500">{{ $invoice->number }}</span -->

                        <address class="mt-4 not-italic text-gray-800 dark:text-neutral-200">
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
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">Bill to:</h3>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                            {{ $invoice->client->name }}
                        </h3>
                        <address class="mt-2 not-italic text-gray-500 dark:text-neutral-500">
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
                                <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Invoice date:</dt>
                                <dd class="col-span-2 text-gray-500 dark:text-neutral-500">
                                    {{ $invoice->created_at->format('d M Y') }}</dd>
                            </dl>
                            <dl class="grid gap-x-3 sm:grid-cols-5">
                                <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Due date:</dt>
                                <dd class="col-span-2 text-gray-500 dark:text-neutral-500">
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
                    <div class="p-4 space-y-4 rounded-lg border border-gray-200 dark:border-neutral-700">
                        <div class="hidden sm:grid sm:grid-cols-5">
                            <div class="text-xs font-medium text-gray-500 uppercase sm:col-span-2 dark:text-neutral-500">
                                Item</div>
                            <div class="text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500">Qty
                            </div>
                            <div class="text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500">Rate
                            </div>
                            <div class="text-xs font-medium text-gray-500 uppercase text-end dark:text-neutral-500">Amount
                            </div>
                        </div>

                        <div class="hidden border-b border-gray-200 sm:block dark:border-neutral-700"></div>
                        @foreach ($invoice->items as $item)
                            <div class="grid grid-cols-3 gap-2 sm:grid-cols-5">
                                <div class="col-span-full sm:col-span-2">
                                    <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">
                                        Item</h5>
                                    <p class="font-medium text-gray-800 dark:text-neutral-200">{{ $item->name }}</p>
                                </div>
                                <div>
                                    <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">
                                        Qty
                                    </h5>
                                    <p class="text-gray-800 dark:text-neutral-200">{{ $item->quantity }}</p>
                                </div>
                                <div>
                                    <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">
                                        Rate</h5>
                                    <p class="text-gray-800 dark:text-neutral-200">
                                        {{ Number::format($item->price, $invoice->currency->decimal_digits) }}</p>
                                </div>
                                <div>
                                    <h5 class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">
                                        Amount</h5>
                                    <p class="text-gray-800 sm:text-end dark:text-neutral-200">
                                        {{ $invoice->currency->symbol }}
                                        {{ Number::format($item->total, $invoice->currency->decimal_digits) }}</p>
                                </div>
                            </div>

                            <div class="border-b border-gray-200 sm:hidden dark:border-neutral-700"></div>
                        @endforeach


                    </div>
                    <!-- End Table -->

                    <!-- Flex -->
                    <div class="flex mt-8 sm:justify-end">
                        <div class="space-y-2 w-full max-w-2xl sm:text-end">
                            <!-- Grid -->
                            <div class="grid grid-cols-2 gap-3 sm:grid-cols-1 sm:gap-2">
                                <dl class="grid gap-x-3 sm:grid-cols-5">
                                    <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Subtotal:
                                    </dt>
                                    <dd class="col-span-2 text-gray-500 dark:text-neutral-500">
                                        {{ $invoice->currency->symbol }}{{ Number::format($invoice->subtotal, $invoice->currency->decimal_digits) }}
                                    </dd>
                                </dl>

                                <dl class="grid gap-x-3 sm:grid-cols-5">
                                    <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Total:
                                    </dt>
                                    <dd class="col-span-2 text-gray-500 dark:text-neutral-500">
                                        {{ $invoice->currency->symbol }}{{ Number::format($invoice->total, $invoice->currency->decimal_digits) }}
                                    </dd>
                                </dl>
                                @foreach ($invoice->tax as $tax)
                                    <dl class="grid gap-x-3 sm:grid-cols-5">
                                        <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">
                                            {{ $tax->name }} ({{ $tax->rate }}%):
                                        </dt>
                                        <dd class="col-span-2 text-gray-500 dark:text-neutral-500">
                                            {{ $invoice->currency->symbol }}{{ $tax->amount }}
                                        </dd>
                                    </dl>
                                @endforeach

                                @if ($invoice->discount)
                                    <dl class="grid gap-x-3 sm:grid-cols-5">
                                        <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">
                                            Discount ({{ $invoice->discount->rate }}%):
                                        </dt>
                                        <dd class="col-span-2 text-gray-500 dark:text-neutral-500">
                                            -{{ $invoice->currency->symbol }}{{ Number::format($invoice->discount->amount) }}
                                        </dd>
                                    </dl>
                                @endif

                                <dl class="grid gap-x-3 sm:grid-cols-5">
                                    <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">
                                        Amount paid:
                                    </dt>
                                    <dd class="col-span-2 text-gray-500 dark:text-neutral-500">
                                        {{ $invoice->currency->symbol }}{{ Number::format($invoice->total - $invoice->balance, $invoice->currency->decimal_digits) }}
                                    </dd>
                                </dl>

                                <dl class="grid gap-x-3 sm:grid-cols-5">
                                    <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">
                                        Due balance:
                                    </dt>
                                    <dd class="col-span-2 text-gray-500 dark:text-neutral-500">
                                        {{ $invoice->currency->symbol }}{{ Number::format($invoice->balance, $invoice->currency->decimal_digits) }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 sm:mt-12">
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">Thank you!</h4>
                        <p class="text-gray-500 dark:text-neutral-500">
                            {{ $invoice->notes }}
                        </p>
                        <div class="mt-2">
                            <p class="block text-sm font-medium text-gray-800 dark:text-neutral-200">
                                {{ $invoice->business->user->email }}</p>
                            <p class="block text-sm font-medium text-gray-800 dark:text-neutral-200">
                                {{ $invoice->business->phone }}</p>
                        </div>
                    </div>

                </div>
                <!-- End Card -->

                <!-- Buttons -->
                <div class="flex gap-x-3 justify-end mt-6">
                    <a class="inline-flex gap-2 justify-center items-center py-2 px-3 text-sm font-medium text-gray-700 align-middle bg-white rounded-lg border shadow-sm transition-all hover:bg-gray-50 focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white focus:outline-none dark:bg-neutral-800 dark:hover:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-white dark:focus:ring-offset-gray-800"
                        href="#">
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                            <polyline points="7 10 12 15 17 10" />
                            <line x1="12" x2="12" y1="15" y2="3" />
                        </svg>
                        Invoice PDF
                    </a>
                    <a class="inline-flex gap-x-2 items-center py-2 px-3 text-sm font-semibold text-white bg-blue-600 rounded-lg border border-transparent hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                        href="#">
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <polyline points="6 9 6 2 18 2 18 9" />
                            <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
                            <rect width="12" height="8" x="6" y="14" />
                        </svg>
                        Print
                    </a>
                </div>
                <!-- End Buttons -->
            </div>
        </div>
    @endsection
