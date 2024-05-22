@extends('app')

@section('title', 'Payments')

@section('content')
    <section>
        <div class="flex justify-between items-center md:items-baseline">
            <div>
                <h1 class="text-lg font-semibold md:text-xl md:text-2xl text-slate-700">Payments</h1>
            </div>
            <div>
                <a href="{{ route('app.payments.create') }}">
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

                        @if ($payments->isEmpty())
                            <div class="flex flex-col justify-center py-4 px-6 mx-auto w-full max-w-sm min-h-[400px]">
                                <div
                                    class="flex justify-center items-center bg-gray-100 rounded-lg size-[46px] dark:bg-neutral-800">
                                    <svg class="flex-shrink-0 text-gray-600 size-6 dark:text-neutral-400"
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                                        <path
                                            d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                    </svg>
                                </div>

                                <h2 class="mt-5 font-semibold text-gray-800 dark:text-white">
                                    No payments found
                                </h2>
                                <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                                    Enter a payment from a customer.
                                </p>

                                <div class="mt-5">
                                    <a href="{{ route('app.payments.create') }}">
                                        <x-button type="button">
                                            Create a new payment

                                        </x-button>
                                    </a>
                                </div>
                            </div>
                        @else
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
                                                        href="{{ route('app.payments.edit', $payment) }}">
                                                        Edit
                                                    </a>

                                                    <a href="{{ route('app.payments.destroy', $payment) }}"
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
                        @endif
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
