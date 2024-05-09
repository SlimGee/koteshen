@extends('app')

@section('content')
    <section>
        <div class="flex justify-between items-center md:items-baseline">
            <div class="flex items-center space-x-6">
                <a href="{{ route('app.estimates.index') }}">
                    <x-secondary-button class="!py-2 !px-3 !text-xs">
                        <i class="bi bi-caret-left-fill"></i>
                        Estimates
                    </x-secondary-button>
                </a>
                <h1 class="ml-4 text-xl font-semibold md:text-2xl text-slate-700">Estimate #{{ $estimate->number }}</h1>
            </div>
            <div class="flex space-x-2">
                <div>
                    <a href="{{ URL::signedRoute('invoices.preview', $estimate) }}" target="_blank">
                        <x-secondary-button class="!py-2 !px-3 !text-xs">
                            <i class="mr-1 bi bi-eye"></i>
                            Preview
                        </x-secondary-button>
                    </a>
                </div>

                <div>
                    <a href="{{ route('app.estimates.edit', $estimate) }}">
                        <x-secondary-button class="!py-2 !px-3 !text-xs">
                            <i class="mr-1 bi bi-pencil-square"></i>
                            Edit
                        </x-secondary-button>
                    </a>
                </div>
                <div>
                    <div data-controller="dropdown" class="relative w-full md:w-1/2 float-end">
                        <x-secondary-button class="!items-baseline float-end !py-2 !px-3 !text-xs" type="button"
                            data-action="dropdown#toggle click@window->dropdown#hide">
                            Actions
                            <i class="ml-1 bi bi-caret-down-fill"></i>
                        </x-secondary-button>

                        <div data-dropdown-target="menu"
                            class="hidden absolute right-0 top-10 w-48 bg-white rounded-b border shadow-sm transition transform origin-top-right"
                            data-transition-enter-from="opacity-0 scale-95" data-transition-enter-to="opacity-100 scale-100"
                            data-transition-leave-from="opacity-100 scale-100"
                            data-transition-leave-to="opacity-0 scale-95">
                            <div class="">
                                <ul class="list-unstyled">
                                    @if ($estimate->status->value == 'sent' || $estimate->status->value == 'draft' || $estimate->status->value == 'rejected')
                                        <li class="py-3 px-2.5 hover:bg-slate-100">
                                            <a href="{{ route('app.estimates.status.update', [$estimate, 'accepted']) }}"
                                                data-turbo-method="post"
                                                class="flex items-center space-x-2 w-full text-sm font-semibold text-slate-700">
                                                <i class="mr-1 bi bi-check2-square"></i>
                                                Mark as Accepted
                                            </a>
                                        </li>
                                    @endif

                                    @if ($estimate->status->value == 'accepted')
                                        <li class="py-3 px-2.5 hover:bg-slate-100">
                                            <a href="{{ route('app.estimates.status.update', [$estimate, 'rejected']) }}"
                                                data-turbo-method="post"
                                                class="flex items-center space-x-2 w-full text-sm font-semibold text-slate-700">
                                                <i class="mr-1 bi bi-check2-square"></i>
                                                Mark as Rejected
                                            </a>
                                        </li>
                                    @endif

                                    @if ($estimate->status->value == 'draft')
                                        <li class="py-3 px-2.5 hover:bg-slate-100">
                                            <a href="{{ route('app.estimates.status.update', [$estimate, 'sent']) }}"
                                                data-turbo-method="post"
                                                class="flex items-center space-x-2 w-full text-sm font-semibold text-slate-700">
                                                <i class="mr-1 bi bi-check2-square"></i>
                                                Mark as Sent
                                            </a>
                                        </li>
                                    @endif

                                    @if (
                                        $estimate->status->value == 'sent' ||
                                            $estimate->status->value == 'rejected' ||
                                            $estimate->status->value == 'accepted')
                                        <li class="py-3 px-2.5 hover:bg-slate-100">
                                            <a href="{{ route('app.estimates.status.update', [$estimate, 'draft']) }}"
                                                data-turbo-method="post"
                                                class="flex items-center space-x-2 w-full text-sm font-semibold text-slate-700">
                                                <i class="mr-1 bi bi-check2-square"></i>
                                                Mark as Draft
                                            </a>
                                        </li>
                                    @endif


                                    <li class="flex items-center py-3 px-2 hover:bg-slate-100">
                                        <a href="{{ route('app.invoices.send', $estimate) }}"
                                            class="w-full text-sm font-semibold text-slate-700">
                                            <i class="mr-1 bi bi-send"></i>
                                            @if ($estimate->emailed)
                                                Resend Estimate
                                            @else
                                                Send Estimate
                                            @endif
                                        </a>
                                    </li>

                                    <li class="flex items-center py-3 px-2 hover:bg-slate-100">
                                        <a data-turbo="false" href="{{ route('estimates.download', $estimate) }}"
                                            class="w-full text-sm font-semibold text-slate-700">
                                            <i class="mr-1 bi bi-file-pdf"></i>
                                            Download as PDF
                                        </a>
                                    </li>

                                    <li class="flex items-center py-3 px-2 hover:bg-slate-100">
                                        <a href="{{ route('app.invoices.activities.index', $estimate) }}"
                                            class="w-full text-sm font-semibold text-slate-700">
                                            <i class="mr-1 bi bi-activity"></i>
                                            Estimate Activity
                                        </a>
                                    </li>

                                    <li class="flex items-center py-3 px-2 hover:bg-slate-100">
                                        <a href="{{ route('app.invoices.comments.index', $estimate) }}"
                                            class="w-full text-sm font-semibold text-slate-700">
                                            <i class="mr-1 bi bi-chat-left"></i>
                                            Comments
                                        </a>
                                    </li>

                                    <li class="flex items-center py-3 px-2 hover:bg-slate-100">
                                        <a href="{{ route('app.estimates.show', $estimate) }}" data-turbo-method="post"
                                            class="w-full text-sm font-semibold text-slate-700">
                                            <i class="mr-1 bi bi-copy"></i>
                                            Create Invoice
                                        </a>
                                    </li>

                                    @if ($estimate->status->value != 'archived')
                                        <li class="flex items-center py-3 px-2 hover:bg-slate-100">
                                            <a href="{{ route('app.estimates.status.update', [$estimate, 'archived']) }}"
                                                data-turbo-method="post"
                                                data-turbo-confirm="Are you sure, this could have unintended consequences?"
                                                class="w-full text-sm font-semibold text-slate-700">
                                                <i class="mr-1 bi bi-archive"></i>
                                                Archive
                                            </a>
                                        </li>
                                    @endif

                                    @if ($estimate->status->value == 'archived')
                                        <li class="flex items-center py-3 px-2 hover:bg-slate-100">
                                            <a href="{{ route('app.estimates.status.update', [$estimate, 'draft']) }}"
                                                data-turbo-method="post"
                                                data-turbo-confirm="Are you sure, this could have unintended consequences?"
                                                class="w-full text-sm font-semibold text-slate-700">
                                                <i class="mr-1 bi bi-archive"></i>
                                                Unarchive
                                            </a>
                                        </li>
                                    @endif


                                    <li class="flex items-center py-3 px-2 hover:bg-slate-100">
                                        <a href="{{ route('app.estimates.destroy', $estimate) }}"
                                            data-turbo-method="delete"
                                            data-turbo-confirm="This action cannot be undone. Are you sure?"
                                            class="w-full text-sm font-semibold text-slate-700">
                                            <i class="mr-1 bi bi-trash"></i>

                                            Delete
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>



    <div class="flex">
        <!-- estimate -->
        <div class="flex-1 px-2 my-4 sm:px-6 sm:my-10 lg:px-2 max-w-[60rem]">
            <div class="w-full">
                <!-- Card -->
                <div class="flex flex-col p-4 bg-white rounded border shadow-sm sm:p-10 dark:bg-neutral-800">
                    <!-- Grid -->
                    <div class="flex justify-between">
                        <div>
                            <svg class="size-10" width="26" height="26" viewBox="0 0 26 26" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1 26V13C1 6.37258 6.37258 1 13 1C19.6274 1 25 6.37258 25 13C25 19.6274 19.6274 25 13 25H12"
                                    class="stroke-blue-600 dark:stroke-white" stroke="currentColor" stroke-width="2" />
                                <path
                                    d="M5 26V13.16C5 8.65336 8.58172 5 13 5C17.4183 5 21 8.65336 21 13.16C21 17.6666 17.4183 21.32 13 21.32H12"
                                    class="stroke-blue-600 dark:stroke-white" stroke="currentColor" stroke-width="2" />
                                <circle cx="13" cy="13.0214" r="5" fill="currentColor"
                                    class="fill-blue-600 dark:fill-white" />
                            </svg>

                            <h1 class="mt-2 text-lg font-semibold text-blue-600 md:text-xl dark:text-white">Preline Inc.
                            </h1>
                        </div>
                        <!-- Col -->

                        <div class="text-end">
                            <h2
                                class="flex items-center space-x-3 text-2xl font-semibold text-gray-800 md:text-3xl dark:text-neutral-200">
                                <span
                                    class="py-1.5 px-3 text-sm font-semibold mr-2 {{ $estimate->status->classes() }} rounded-sm">{{ $estimate->status }}</span>
                                #{{ $estimate->number }}
                            </h2>
                            <!--span class="block mt-1 text-gray-500 dark:text-neutral-500">{{ $estimate->number }}</span -->

                            <address class="mt-4 not-italic text-gray-800 dark:text-neutral-200">
                                {{ $estimate->business->name }}<br>
                                {{ $estimate->business->address }}<br>
                                {{ $estimate->business->city }}, {{ $estimate->business->country }}<br>
                                {{ phone($estimate->business->phone, format: 'national') }}<br>
                            </address>
                        </div>
                        <!-- Col -->
                    </div>
                    <!-- End Grid -->

                    <!-- Grid -->
                    <div class="grid gap-3 mt-8 sm:grid-cols-2">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">Estimate for:</h3>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                                {{ $estimate->client->name }}
                            </h3>
                            <address class="mt-2 not-italic text-gray-500 dark:text-neutral-500">
                                {{ $estimate->client->address }},<br>
                                {{ $estimate->client->city }}, {{ $estimate->client->country }}<br>
                                {{ $estimate->client->phone }}<br>
                            </address>
                        </div>
                        <!-- Col -->

                        <div class="space-y-2 sm:text-end">
                            <!-- Grid -->
                            <div class="grid grid-cols-2 gap-3 sm:grid-cols-1 sm:gap-2">
                                <dl class="grid gap-x-3 sm:grid-cols-5">
                                    <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Estimate date:
                                    </dt>
                                    <dd class="col-span-2 text-gray-500 dark:text-neutral-500">
                                        {{ $estimate->created_at->format('d M Y') }}</dd>
                                </dl>
                                <dl class="grid gap-x-3 sm:grid-cols-5">
                                    <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Expiry date:
                                    </dt>
                                    <dd class="col-span-2 text-gray-500 dark:text-neutral-500">
                                        {{ $estimate->expires_at->format('d M Y') }}
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
                                <div
                                    class="text-xs font-medium text-gray-500 uppercase sm:col-span-2 dark:text-neutral-500">
                                    Item</div>
                                <div class="text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500">
                                    Qty
                                </div>
                                <div class="text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500">
                                    Rate
                                </div>
                                <div class="text-xs font-medium text-gray-500 uppercase text-end dark:text-neutral-500">
                                    Amount
                                </div>
                            </div>

                            <div class="hidden border-b border-gray-200 sm:block dark:border-neutral-700"></div>
                            @foreach ($estimate->items as $item)
                                <div class="grid grid-cols-3 gap-2 sm:grid-cols-5">
                                    <div class="col-span-full sm:col-span-2">
                                        <h5
                                            class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">
                                            Item</h5>
                                        <p class="font-medium text-gray-800 dark:text-neutral-200">{{ $item->name }}</p>
                                    </div>
                                    <div>
                                        <h5
                                            class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">
                                            Qty
                                        </h5>
                                        <p class="text-gray-800 dark:text-neutral-200">{{ $item->quantity }}</p>
                                    </div>
                                    <div>
                                        <h5
                                            class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">
                                            Rate</h5>
                                        <p class="text-gray-800 dark:text-neutral-200">
                                            {{ Number::format($item->price, $estimate->currency->decimal_digits) }}</p>
                                    </div>
                                    <div>
                                        <h5
                                            class="text-xs font-medium text-gray-500 uppercase sm:hidden dark:text-neutral-500">
                                            Amount</h5>
                                        <p class="text-gray-800 sm:text-end dark:text-neutral-200">
                                            {{ $estimate->currency->symbol }}
                                            {{ Number::format($item->total, $estimate->currency->decimal_digits) }}</p>
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
                                            {{ $estimate->currency->symbol }}
                                            {{ Number::format($estimate->subtotal, $estimate->currency->decimal_digits) }}
                                        </dd>
                                    </dl>

                                    <dl class="grid gap-x-3 sm:grid-cols-5">
                                        <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Total:
                                        </dt>
                                        <dd class="col-span-2 text-gray-500 dark:text-neutral-500">
                                            {{ $estimate->currency->symbol }}
                                            {{ Number::format($estimate->total, $estimate->currency->decimal_digits) }}
                                        </dd>
                                    </dl>

                                    <dl class="grid gap-x-3 sm:grid-cols-5">
                                        <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Tax:</dt>
                                        <dd class="col-span-2 text-gray-500 dark:text-neutral-500">$39.00</dd>
                                    </dl>

                                    <dl class="grid gap-x-3 sm:grid-cols-5">
                                        <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Amount
                                            paid:
                                        </dt>
                                        <dd class="col-span-2 text-gray-500 dark:text-neutral-500">
                                            {{ $estimate->currency->symbol }}
                                            {{ Number::format($estimate->total - $estimate->balance, $estimate->currency->decimal_digits) }}

                                        </dd>
                                    </dl>

                                    <dl class="grid gap-x-3 sm:grid-cols-5">
                                        <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Due
                                            balance:
                                        </dt>
                                        <dd class="col-span-2 text-gray-500 dark:text-neutral-500">
                                            {{ $estimate->currency->symbol }}
                                            {{ Number::format($estimate->total, $estimate->currency->decimal_digits) }}
                                        </dd>
                                    </dl>
                                </div>
                                <!-- End Grid -->
                            </div>
                        </div>
                        <!-- End Flex -->

                        <div class="mt-8 sm:mt-12">
                            <h4 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">Thank you!</h4>
                            <p class="text-gray-500 dark:text-neutral-500">
                                {{ $estimate->notes }}
                            </p>
                            <div class="mt-2">
                                <p class="block text-sm font-medium text-gray-800 dark:text-neutral-200">
                                    {{ $estimate->business->user->email }}</p>
                                <p class="block text-sm font-medium text-gray-800 dark:text-neutral-200">
                                    {{ $estimate->business->phone }}</p>
                            </div>
                        </div>

                    </div>
                    <!-- End Card -->

                    <!-- Buttons -->
                    <!-- End Buttons -->
                </div>
            </div>
        </div>

    </div>
@endsection
