@extends('app')

@section('title', 'Payments')

@section('content')
    <section>
        <div class="flex justify-between items-center md:items-baseline">
            <div>
                <h1 class="text-lg font-semibold md:text-xl md:text-2xl text-slate-700">Payments</h1>
            </div>
            <div>
                <a href="{{ route('app.payables.payments.create', payable($payable)) }}">
                    <x-button>Enter payment</x-button>
                </a>
            </div>
        </div>
    </section>


    <section class="py-16">

        <div class="flex flex-col">
            <div class="overflow-x-auto -m-1.5">
                <div class="inline-block p-1.5 min-w-full align-middle">
                    <div
                        class="overflow-hidden bg-white rounded border border-gray-200 shadow-sm dark:bg-neutral-800 dark:border-neutral-700">
                        <!-- Header -->

                        <!-- End Header -->

                        <!-- Table -->
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead class="bg-gray-50 dark:bg-neutral-800">
                                <tr>

                                    <th scope="col" class="py-3 ps-6 pe-6 text-start">
                                        <div class="flex gap-x-2 items-center">
                                            <span
                                                class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                Client
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="py-3 px-6 text-start">
                                        <div class="flex gap-x-2 items-center">
                                            <span
                                                class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                Reference
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="py-3 px-6 text-start">
                                        <div class="flex gap-x-2 items-center">
                                            <span
                                                class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                Amount
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="py-3 px-6 text-start">
                                        <div class="flex gap-x-2 items-center">
                                            <span
                                                class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                Channel
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="py-3 px-6 text-start">
                                        <div class="flex gap-x-2 items-center">
                                            <span
                                                class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                Created
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="py-3 px-6 text-end"></th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @foreach ($payments as $payment)
                                    <tr>
                                        <td class="whitespace-nowrap size-px">
                                            <div class="py-3 ps-6 pe-6">
                                                <div class="flex gap-x-3 items-center">
                                                    <div class="grow">
                                                        <span
                                                            class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                            {{ $payment->client->name }}
                                                        </span>
                                                        <span class="block text-sm text-gray-500 dark:text-neutral-500">
                                                            {{ $payment->client->email }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="w-72 h-px whitespace-nowrap">
                                            <div class="py-3 px-6">
                                                <span
                                                    class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $payment->reference }}</span>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap size-px">
                                            <div class="py-3 px-6">
                                                <span
                                                    class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                    {{ $payment->currency }}
                                                    {{ Number::format($payment->amount, 2) }}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap size-px">
                                            <div class="py-3 px-6">
                                                <div class="flex gap-x-3 items-center">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{ Str::upper($payment->channel) }}
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap size-px">
                                            <div class="py-3 px-6">
                                                <span class="text-sm text-gray-500 dark:text-neutral-500">
                                                    {{ $payment->created_at->format('M d, Y') }}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap size-px">
                                            <div class="py-1.5 px-6">
                                                <a class="inline-flex gap-x-1 items-center text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline decoration-2"
                                                    href="{{ route('app.payables.payments.edit', [payable($payment->payable), $payment]) }}">
                                                    Edit
                                                </a>

                                                <a href="{{ route('app.payables.payments.destroy', [payable($payment->payable), $payment]) }}"
                                                    data-turbo-method="delete"
                                                    data-turbo-confirm="This cannot be undone. Are you sure?">
                                                    <button
                                                        class="transition-colors duration-200 hover:text-red-500 focus:outline-none ms-3 text-slate-500 dark:text-slate-300 dark:hover:text-red-500">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </a>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table -->

                        <!-- Footer -->
                        <div class="py-5 px-4 border-t">
                            {{ $payments->links() }}
                        </div>
                        <!-- End Footer -->
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
