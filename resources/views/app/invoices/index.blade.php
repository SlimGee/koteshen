@extends('app')

@section('content')
    <section>
        <div class="flex justify-between items-center md:items-baseline">
            <div>
                <h1 class="text-lg font-semibold md:text-xl md:text-2xl text-slate-700">Invoices</h1>
            </div>
            <div>
                <a href="{{ route('app.invoices.create') }}">
                    <x-button>Add new invoice</x-button>
                </a>
            </div>
        </div>
    </section>


    <div class="mt-10 md:flex md:justify-between md:items-center">
        <div
            class="inline-flex overflow-hidden bg-white rounded border divide-x sm:flex rtl:flex-row-reverse text-slate-700 dark:bg-slate-800 dark:border-slate-700 dark:divide-slate-700">
            <a href="{{ route('app.invoices.index') }}">
                <button @class([
                    'py-2 px-5 text-xs font-medium transition-colors duration-200 sm:text-sm  dark:text-slate-300 ',
                    'bg-blue-700 text-white ' =>
                        (request()->query('filter', [])['status'] ?? null) == null,
                ])>
                    View all
                </button>
            </a>

            <a
                href="{{ route('app.invoices.index', [
                    'filter' => [
                        'status' => 'draft',
                    ],
                ]) }}">
                <button @class([
                    'py-2 px-5 text-xs font-medium transition-colors duration-200 sm:text-sm text-slate-600  dark:text-slate-300 ',
                    'bg-blue-700 text-white' =>
                        (request()->query('filter', [])['status'] ?? '') == 'draft',
                ])>
                    Draft
                </button>
            </a>

            <a
                href="{{ route('app.invoices.index', [
                    'filter' => [
                        'status' => 'paid',
                    ],
                ]) }}">
                <button @class([
                    'py-2 px-5 text-xs font-medium transition-colors duration-200 sm:text-sm text-slate-600  dark:text-slate-300 ',
                    'bg-blue-700 text-white' =>
                        (request()->query('filter', [])['status'] ?? '') == 'paid',
                ])>
                    Paid
                </button>
            </a>

            <a
                href="{{ route('app.invoices.index', [
                    'filter' => [
                        'status' => 'unpaid',
                    ],
                ]) }}">
                <button @class([
                    'py-2 px-5 text-xs font-medium transition-colors duration-200 sm:text-sm text-slate-600  dark:text-slate-300 ',
                    'bg-blue-700 text-white' =>
                        (request()->query('filter', [])['status'] ?? '') == 'unpaid',
                ])>
                    Unpaid
                </button>
            </a>

            <a
                href="{{ route('app.invoices.index', [
                    'filter' => [
                        'status' => 'overdue',
                    ],
                ]) }}">
                <button @class([
                    'py-2 px-5 text-xs font-medium transition-colors duration-200 sm:text-sm text-slate-600  dark:text-slate-300 ',
                    'bg-blue-700 text-white' =>
                        (request()->query('filter', [])['status'] ?? '') == 'overdue',
                ])>
                    Overdue
                </button>
            </a>
        </div>

        <div class="flex relative items-center mt-4 w-full md:mt-0 md:w-auto">
            <span class="absolute">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="mx-3 w-5 h-5 text-slate-400 dark:text-slate-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </span>

            <input type="text" value="{{ request()->query('filter', [])['search'] ?? '' }}" placeholder="Search"
                {{ stimulus_controller('search', [
                    'url' => route('app.invoices.index', [
                        'filter' => [
                            'search' => 'QUERY',
                        ],
                    ]),
                ]) }}
                {{ stimulus_action('search', 'search') }}
                class="block py-1.5 pr-5 pl-11 w-full bg-white rounded border md:w-80 focus:border-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none text-slate-700 border-slate-200 placeholder-slate-400/70 rtl:pr-11 rtl:pl-5 dark:text-slate-300 dark:bg-slate-800 dark:border-slate-600 dark:focus:border-blue-300">
        </div>
    </div>

    <div class="flex flex-col mt-6">
        <div class="overflow-x-auto -my-2 sm:-mx-6 lg:-mx-8">
            <div class="inline-block py-2 min-w-full align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden bg-white border shadow-sm md:rounded border-slate-200 dark:border-slate-700">
                    <div class="min-w-full border-b divide-y dark:divide-slate-700">
                        @each('app.invoices._invoice', $invoices, 'invoice')
                    </div>

                    @if ($invoices->isEmpty())
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
                                No invoices found
                            </h2>
                            <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                                Draft an invoice and send it to a customer.
                            </p>

                            <div class="mt-5">
                                <a href="{{ route('app.invoices.create') }}">
                                    <x-button type="button">
                                        Create a new invoice
                                    </x-button>
                                </a>
                            </div>
                        </div>
                    @endif
                    <div class="py-10 px-5">
                        {{ $invoices->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
