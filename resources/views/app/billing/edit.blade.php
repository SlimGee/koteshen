@extends('app')

@section('title', 'Billing')


@section('content')
    <section class="flex space-x-3">

        @include('app.settings._sidebar')

        <div class="w-full max-w-3xl">

            <section class="container p-5 max-w-3xl bg-white rounded border shadow-sm">

                <div class="flex justify-between">
                    <div>
                        <div class="flex gap-x-3 items-center">
                            <h2 class="text-lg font-medium text-slate-800">{{ $user->subscription('main')->plan->name }}</h2>
                        </div>
                        <p class="mt-1 text-sm text-slate-500">
                            {{ $user->subscription('main')->plan->description }}
                        </p>
                    </div>
                    <div>
                        <div class="items-end tex-end">
                            <h2 class="text-lg font-bold text-slate-800 text-end">
                                {{ $user->subscription('main')->plan->price }} /
                                {{ $user->subscription('main')->plan->invoice_interval }}</h2>
                        </div>
                        <div>
                            <p class="mt-1 text-sm text-slate-500">
                                @if ($user->subscription('main')->isOnTrial())
                                    Your trial ends on {{ $user->subscription('main')->trial_ends_at->format('d M Y') }}
                                @else
                                    Your subscription ends on
                                    {{ $user->subscription('main')->ends_at->format('d M Y') }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{ route('app.subscriptions.renew') }}">
                        <x-button>Renew</x-button>
                    </a>

                    <a href="{{ route('app.subscriptions.create') }}">
                        <x-secondary-button>Change Plan</x-secondary-button>
                    </a>
                </div>
            </section>
            @if ($cards->isNotEmpty())
                <section class="py-6">

                    <div class="flex flex-wrap space-x-2">
                        @foreach ($cards as $card)
                            <div class="overflow-hidden bg-white rounded border shadow-sm">
                                <div class="py-4 px-6 border-b border-gray-200 dark:border-neutral-700">
                                    <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                                        {{ Str::upper($card->brand) }} ending in {{ $card->last4 }}
                                    </h2>
                                    <p class="text-base font-medium text-gray-700">
                                        {{ $card->exp_month }} / {{ $card->exp_year }}
                                    </p>
                                    <div class="mt-2">
                                        <a href="{{ route('app.cards.destroy', $card) }}" data-turbo-method="delete"
                                            data-turbo-confirm="Are you sure? This might cause some problems when renewing your plan">
                                            <x-button class="bg-red-600 !text-xs !px-1.5 !py-1">Remove card</x-button>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </section>
            @endif

            <section class="py-6">

                <div class="flex flex-col">
                    <div class="overflow-x-auto -m-1.5">
                        <div class="inline-block p-1.5 min-w-full align-middle">
                            <div
                                class="overflow-hidden bg-white rounded border border-gray-200 shadow-sm dark:bg-neutral-800 dark:border-neutral-700">
                                <!-- Header -->
                                <div class="py-4 px-6 border-b border-gray-200 dark:border-neutral-700">
                                    <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                                        Payment History
                                    </h2>
                                    <p class="text-sm text-gray-600 dark:text-neutral-400">
                                        Here is a list of all the payments you have made.
                                    </p>
                                </div> <!-- End Header -->

                                @if ($payments->isEmpty())
                                    <div
                                        class="flex flex-col justify-center py-4 px-6 mx-auto w-full max-w-sm min-h-[400px]">

                                        <h2 class="mt-5 font-semibold text-gray-800 dark:text-white">
                                            You haven't made any payments
                                        </h2>
                                        <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                                            Once you subscribe to a plan, your payment history will appear here
                                        </p>

                                    </div>
                                @else
                                    <!-- Table -->
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                        <thead class="bg-gray-50 dark:bg-neutral-800">
                                            <tr>

                                                <th scope="col" class="py-3 px-6 text-start">
                                                    <div class="flex gap-x-2 items-center">
                                                        <span
                                                            class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                            Invoice
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

                                            </tr>
                                        </thead>

                                        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                            @foreach ($payments as $payment)
                                                <tr>
                                                    <td class="w-72 h-px whitespace-nowrap">
                                                        <div class="py-3 px-6">
                                                            <span
                                                                class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                                <a class="text-blue-600"
                                                                    href="{{ route('invoices.preview', $payment->payable) }}">
                                                                    {{ $payment->payable->number }}
                                                                </a>
                                                            </span>
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
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <div class="py-5 px-4 border-t">
                                        {{ $payments->links() }}
                                    </div>

                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </section>



@endsection
