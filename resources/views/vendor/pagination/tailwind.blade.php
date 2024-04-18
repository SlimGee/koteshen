@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex justify-between items-center">
        <div class="flex flex-1 justify-between sm:hidden">
            @if ($paginator->onFirstPage())
                <span
                    class="inline-flex relative items-center py-2 px-4 text-sm font-medium leading-5 text-gray-500 bg-white rounded-md border border-gray-300 cursor-default dark:text-gray-600 dark:bg-gray-800 dark:border-gray-600">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="inline-flex relative items-center py-2 px-4 text-sm font-medium leading-5 text-gray-700 bg-white rounded-md border border-gray-300 ring-gray-300 transition duration-150 ease-in-out dark:text-gray-300 dark:bg-gray-800 dark:border-gray-600 hover:text-gray-500 focus:border-blue-300 focus:ring focus:outline-none active:text-gray-700 active:bg-gray-100 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="inline-flex relative items-center py-2 px-4 ml-3 text-sm font-medium leading-5 text-gray-700 bg-white rounded-md border border-gray-300 ring-gray-300 transition duration-150 ease-in-out dark:text-gray-300 dark:bg-gray-800 dark:border-gray-600 hover:text-gray-500 focus:border-blue-300 focus:ring focus:outline-none active:text-gray-700 active:bg-gray-100 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span
                    class="inline-flex relative items-center py-2 px-4 ml-3 text-sm font-medium leading-5 text-gray-500 bg-white rounded-md border border-gray-300 cursor-default dark:text-gray-600 dark:bg-gray-800 dark:border-gray-600">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        <div class="hidden sm:flex sm:flex-1 sm:justify-between sm:items-center">
            <div>
                <p class="text-sm leading-5 text-gray-700 dark:text-gray-400">
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div>
                <span class="inline-flex relative z-0 rounded-md shadow-sm rtl:flex-row-reverse">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span
                                class="inline-flex relative items-center py-2 px-2 text-sm font-medium leading-5 text-gray-500 bg-white rounded-l-md border border-gray-300 cursor-default dark:bg-gray-800 dark:border-gray-600"
                                aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                            class="inline-flex relative items-center py-2 px-2 text-sm font-medium leading-5 text-gray-500 bg-white rounded-l-md border border-gray-300 ring-gray-300 transition duration-150 ease-in-out dark:bg-gray-800 dark:border-gray-600 hover:text-gray-400 focus:z-10 focus:border-blue-300 focus:ring focus:outline-none active:text-gray-500 active:bg-gray-100 dark:active:bg-gray-700 dark:focus:border-blue-800"
                            aria-label="{{ __('pagination.previous') }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span
                                    class="inline-flex relative items-center py-2 px-4 -ml-px text-sm font-medium leading-5 text-gray-700 bg-white border border-gray-300 cursor-default dark:bg-gray-800 dark:border-gray-600">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span
                                            class="inline-flex relative items-center py-2 px-4 -ml-px text-sm font-medium leading-5 text-white bg-blue-700 border border-gray-300 cursor-default dark:bg-gray-800 dark:border-gray-600">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}"
                                        class="inline-flex relative items-center py-2 px-4 -ml-px text-sm font-medium leading-5 text-gray-700 bg-white border border-gray-300 ring-gray-300 transition duration-150 ease-in-out dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600 hover:text-gray-500 focus:z-10 focus:border-blue-300 focus:ring focus:outline-none active:text-gray-700 active:bg-gray-100 dark:hover:text-gray-300 dark:active:bg-gray-700 dark:focus:border-blue-800"
                                        aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                            class="inline-flex relative items-center py-2 px-2 -ml-px text-sm font-medium leading-5 text-gray-500 bg-white rounded-r-md border border-gray-300 ring-gray-300 transition duration-150 ease-in-out dark:bg-gray-800 dark:border-gray-600 hover:text-gray-400 focus:z-10 focus:border-blue-300 focus:ring focus:outline-none active:text-gray-500 active:bg-gray-100 dark:active:bg-gray-700 dark:focus:border-blue-800"
                            aria-label="{{ __('pagination.next') }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span
                                class="inline-flex relative items-center py-2 px-2 -ml-px text-sm font-medium leading-5 text-gray-500 bg-white rounded-r-md border border-gray-300 cursor-default dark:bg-gray-800 dark:border-gray-600"
                                aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
