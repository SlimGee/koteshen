@extends('app')

@section('content')
    <section>
        <div class="flex justify-between items-center md:items-baseline">
            <div>
                <h1 class="text-xl font-semibold md:text-2xl text-slate-700">Estimates</h1>
            </div>
            <div>
                <a href="{{ route('app.estimates.create') }}">
                    <x-button>Add new Estimate</x-button>
                </a>
            </div>
        </div>
    </section>


    <div class="mt-10 md:flex md:justify-between md:items-center">
        <div
            class="inline-flex overflow-hidden bg-white rounded border divide-x rtl:flex-row-reverse text-slate-700 dark:bg-slate-800 dark:border-slate-700 dark:divide-slate-700">
            <a href="{{ route('app.estimates.index') }}">
                <button @class([
                    'py-2 px-5 text-xs font-medium transition-colors duration-200 sm:text-sm  dark:text-slate-300 ',
                    'bg-blue-700 text-white ' =>
                        (request()->query('filter', [])['status'] ?? null) == null,
                ])>
                    View all
                </button>
            </a>

            <a
                href="{{ route('app.estimates.index', [
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
                href="{{ route('app.estimates.index', [
                    'filter' => [
                        'status' => 'accepted',
                    ],
                ]) }}">
                <button @class([
                    'py-2 px-5 text-xs font-medium transition-colors duration-200 sm:text-sm text-slate-600  dark:text-slate-300 ',
                    'bg-blue-700 text-white' =>
                        (request()->query('filter', [])['status'] ?? '') == 'accepted',
                ])>
                    Accepted
                </button>
            </a>

            <a
                href="{{ route('app.estimates.index', [
                    'filter' => [
                        'status' => 'rejected',
                    ],
                ]) }}">
                <button @class([
                    'py-2 px-5 text-xs font-medium transition-colors duration-200 sm:text-sm text-slate-600  dark:text-slate-300 ',
                    'bg-blue-700 text-white' =>
                        (request()->query('filter', [])['status'] ?? '') == 'rejected',
                ])>
                    Rejected
                </button>
            </a>

            <a
                href="{{ route('app.estimates.index', [
                    'filter' => [
                        'status' => 'sent',
                    ],
                ]) }}">
                <button @class([
                    'py-2 px-5 text-xs font-medium transition-colors duration-200 sm:text-sm text-slate-600  dark:text-slate-300 ',
                    'bg-blue-700 text-white' =>
                        (request()->query('filter', [])['status'] ?? '') == 'sent',
                ])>
                    Sent
                </button>
            </a>



        </div>

        <div class="flex relative items-center mt-4 md:mt-0">
            <span class="absolute">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="mx-3 w-5 h-5 text-slate-400 dark:text-slate-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </span>

            <input type="text" value="{{ request()->query('filter', [])['search'] ?? '' }}" placeholder="Search"
                {{ stimulus_controller('search', [
                    'url' => route('app.estimates.index', [
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
        <div class="overflow-x-auto -my-2 -mx-4 sm:-mx-6 lg:-mx-8">
            <div class="inline-block py-2 min-w-full align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border shadow-sm md:rounded border-slate-200 dark:border-slate-700">
                    <div class="min-w-full border-b divide-y dark:divide-slate-700">
                        @each('app.estimates._estimate', $estimates, 'estimate')
                    </div>

                    <div class="py-10 px-5">
                        {{ $estimates->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
