@extends('app')

@section('content')
    <section class="">
        <div class="flex sticky top-0 justify-between items-center md:items-baseline">
            <div class="flex items-center space-x-6">
                <a href="{{ route('app.estimates.show', $estimate) }}">
                    <x-secondary-button class="!py-2 !px-3 !text-xs">
                        <i class="bi bi-caret-left-fill"></i>
                        Estimate
                    </x-secondary-button>
                </a>
                <h1 class="ml-4 text-xl font-semibold md:text-2xl text-slate-700">Estimate #{{ $estimate->number }}</h1>
            </div>
        </div>
    </section>


    <!-- Timeline -->
    <div class="mt-16 max-w-2xl">

        <ol class="relative border-gray-200 dark:border-gray-700 border-s">
            @foreach ($activities as $activity)
                <li class="mb-10 ms-6">
                    <span
                        class="flex absolute justify-center items-center w-3 h-3 bg-blue-900 rounded-full ring-8 ring-white dark:ring-gray-900 -start-2">
                    </span>
                    <div
                        class="justify-between items-center p-4 bg-white rounded-lg border border-gray-200 shadow-sm sm:flex dark:bg-gray-700 dark:border-gray-600">
                        <time
                            class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0">{{ $activity->created_at->diffForHumans() }}</time>
                        <div class="text-sm font-normal text-gray-500 dark:text-gray-300">
                            {{ $activity->description }} by {{ $activity->causer?->name ?? 'System' }}
                        </div>
                    </div>
                </li>
            @endforeach
        </ol>
    </div>
    <!-- End Timeline -->
@endsection
