@extends('app')

@section('content')
    <div class="p-4 space-y-4 sm:p-6 sm:space-y-6">
        <!-- Grid -->
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 lg:grid-cols-4">
            <!-- Card -->
            <div class="flex flex-col bg-white rounded-xl border shadow-sm dark:bg-neutral-800 dark:border-neutral-700">
                <div class="p-4 md:p-5">
                    <div class="flex gap-x-2 items-center">
                        <p class="text-xs tracking-wide text-gray-500 uppercase dark:text-neutral-500">
                            Total Revenue
                        </p>
                        <div class="hs-tooltip">
                            <div class="hs-tooltip-toggle">
                                <svg class="flex-shrink-0 text-gray-500 size-4 dark:text-neutral-500"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                                    <path d="M12 17h.01" />
                                </svg>
                                <span
                                    class="inline-block absolute invisible z-10 py-1 px-2 text-xs font-medium text-white bg-gray-900 rounded shadow-sm opacity-0 transition-opacity hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible dark:bg-neutral-700"
                                    role="tooltip">
                                    The number of daily users
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="flex gap-x-2 items-center mt-1">
                        <h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
                            ${{ Number::format($revenue, 2) }}
                        </h3>
                        <span class="flex gap-x-1 items-center text-green-600">
                            <svg class="inline-block self-center size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="22 7 13.5 15.5 8.5 10.5 2 17" />
                                <polyline points="16 7 22 7 22 13" />
                            </svg>
                            <span class="inline-block text-sm">
                                1.7%
                            </span>
                        </span>
                    </div>
                </div>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="flex flex-col bg-white rounded-xl border shadow-sm dark:bg-neutral-800 dark:border-neutral-700">
                <div class="p-4 md:p-5">
                    <div class="flex gap-x-2 items-center">
                        <p class="text-xs tracking-wide text-gray-500 uppercase dark:text-neutral-500">
                            Outstanding
                        </p>
                    </div>

                    <div class="flex gap-x-2 items-center mt-1">
                        <h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
                            ${{ Number::format($outstanding, 2) }}
                        </h3>
                    </div>
                </div>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="flex flex-col bg-white rounded-xl border shadow-sm dark:bg-neutral-800 dark:border-neutral-700">
                <div class="p-4 md:p-5">
                    <div class="flex gap-x-2 items-center">
                        <p class="text-xs tracking-wide text-gray-500 uppercase dark:text-neutral-500">
                            Overdue
                        </p>
                    </div>

                    <div class="flex gap-x-2 items-center mt-1">
                        <h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
                            {{ $overdueInvoices }}
                        </h3>
                    </div>
                </div>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="flex flex-col bg-white rounded border shadow-sm dark:bg-neutral-800 dark:border-neutral-700">
                <div class="p-4 md:p-5">
                    <div class="flex gap-x-2 items-center">
                        <p class="text-xs tracking-wide text-gray-500 uppercase dark:text-neutral-500">
                            Clients
                        </p>
                    </div>

                    <div class="flex gap-x-2 items-center mt-1">
                        <h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
                            {{ $totalClients }}
                        </h3>
                    </div>
                </div>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Grid -->

        <div class="grid gap-4 sm:gap-6 lg:grid-cols-1">
            <!-- Card -->
            <div
                class="flex flex-col p-4 bg-white rounded border shadow-sm md:p-5 min-h-[410px] dark:bg-neutral-800 dark:border-neutral-700">
                <!-- Header -->
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-sm text-gray-500 dark:text-neutral-500">
                            Income
                        </h2>
                        <p class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
                            ${{ Number::format($revenue, 2) }}
                        </p>
                    </div>

                </div>
                <!-- End Header -->

                <div id="hs-multiple-bar-charts"
                    {{ stimulus_controller('apexcharts', [
                        'options' => [
                            'chart' => [
                                'type' => 'area',
                                'sparkline' => [
                                    'enabled' => true,
                                ],
                            ],
                            'stroke' => [
                                'curve' => 'smooth',
                            ],
                            'fill' => [
                                'opacity' => 1,
                            ],
                            'series' => [
                                [
                                    'name' => 'Income',
                                    'data' => $incomeChart->values()->toArray(),
                                ],
                            ],
                            'labels' => $incomeChart->keys()->toArray(),
                            'colors' => ['#3b82f6'],

                            'xaxis' => [
                                'type' => 'category',
                            ],
                        ],
                    ]) }}>
                </div>
            </div>
            <!-- End Card -->

            <!-- Card -->
        </div>

        <!-- Card -->
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
                                    Invoices
                                </h2>
                                <p class="text-sm text-gray-600 dark:text-neutral-400">
                                    Recent invoices, create new, edit and more
                                </p>
                            </div>

                            <div>
                                <div class="inline-flex gap-x-2">
                                    <a class="inline-flex gap-x-2 items-center py-2 px-3 text-sm font-medium text-gray-800 bg-white rounded border border-gray-200 shadow-sm dark:text-white hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:hover:bg-neutral-800"
                                        href="{{ route('app.invoices.index') }}">
                                        View all
                                    </a>

                                    <a class="inline-flex gap-x-2 items-center py-2 px-3 text-sm font-semibold text-white bg-blue-600 rounded border border-transparent hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                        href="{{ route('app.invoices.create') }}">
                                        <i class="bi bi-plus-lg"></i>
                                        Add invoice
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- End Header -->

                        <!-- Table -->
                        <div class="flex flex-col">
                            <div class="overflow-x-auto -my-2 sm:-mx-6 lg:-mx-8">
                                <div class="inline-block py-2 min-w-full align-middle md:px-6 lg:px-8">
                                    <div
                                        class="overflow-hidden border shadow-sm md:rounded border-slate-200 dark:border-slate-700">
                                        <div class="min-w-full border-b divide-y dark:divide-slate-700">
                                            @each('app.invoices._invoice', $invoices, 'invoice')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>

    <!-- End Content -->
    <!-- ========== END MAIN CONTENT ========== -->
@endsection
