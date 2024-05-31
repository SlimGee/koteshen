@extends('app')

@section('title', 'Dashboard')

@section('content')

    <section class="flex space-x-3">

        @include('app.settings._sidebar')


        <div class="flex flex-col">
            <div class="overflow-x-auto -m-1.5">
                <div class="inline-block p-1.5 min-w-full align-middle">
                    <div
                        class="overflow-hidden bg-white rounded border border-gray-200 shadow-sm dark:bg-neutral-800 dark:border-neutral-700">
                        <!-- Header -->
                        <div
                            class="grid gap-3 py-4 px-6 border-b border-gray-200 md:flex md:justify-between md:items-center dark:border-neutral-700">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                                    Taxes
                                </h2>
                                <p class="text-sm text-gray-600 dark:text-neutral-400">
                                    Add and manage taxes for your business
                                </p>
                            </div>

                            <div>
                                <div class="inline-flex gap-x-2">
                                    <a href="{{ route('app.taxes.create') }}">
                                        <x-button>
                                            Create new
                                        </x-button>
                                    </a>

                                </div>
                            </div>
                        </div>


                        @if ($taxes->isEmpty())
                            <div class="flex flex-col justify-center py-4 px-6 mx-auto w-full max-w-sm min-h-[400px]">

                                <h2 class="mt-5 font-semibold text-gray-800 dark:text-white">
                                    You haven't made any taxes
                                </h2>
                                <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                                    Once you subscribe to a plan, your tax history will appear here
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
                                    @foreach ($taxes as $tax)
                                        <tr>
                                            <td class="w-72 h-px whitespace-nowrap">
                                                <div class="py-3 px-6">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        <a class="text-blue-600" href="{{ route('app.taxes.edit', $tax) }}">
                                                            {{ $tax->name }}
                                                        </a>
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap size-px">
                                                <div class="py-3 px-6">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        %{{ Number::format($tax->rate, 2) }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap size-px">
                                                <div class="py-3 px-6">
                                                    <div class="flex gap-x-3 items-center">
                                                        <span
                                                            class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                            {{ Str::upper($tax->channel) }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap size-px">
                                                <div class="py-3 px-6">
                                                    <span class="text-sm text-gray-500 dark:text-neutral-500">
                                                        {{ $tax->created_at->format('M d, Y') }}
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if ($taxes->hasPages())
                                <div class="py-5 px-4 border-t">
                                    {{ $taxes->links() }}
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
