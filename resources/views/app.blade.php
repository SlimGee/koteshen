<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! Meta::toHtml() !!}
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/js/app.js', 'resources/css/app.css'])


</head>

<body class="min-h-screen bg-gray-200 font-base">
    <div id="app">

        <div class="flex flex-col md:flex-row">

            @include('includes.sidebar')

            <div class="w-full md:flex-1">
                <nav class="hidden justify-between items-center p-4 h-16 bg-white shadow-md md:flex">
                    <div>
                    </div>
                    <div>
                        <a href="{{ route('logout') }}" class="mx-2 text-gray-700 focus:outline-none">
                            <svg class="h-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                </path>
                            </svg>
                        </a>
                    </div>
                </nav>
                <main>
                    <!-- Replace with your content -->
                    <div class="py-6 px-8">
                        @yield('content')
                    </div>
                    <!-- /End replace -->
                </main>
            </div>
        </div>
    </div>
</body>

</html>
