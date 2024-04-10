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

<body class="relative min-h-screen font-sans bg-white">
    <div id="app">

        <div class="flex flex-col md:flex-row">

            @include('includes.sidebar')
            @include('includes.flash')

            <div class="w-full md:flex-1">
                <nav class="hidden justify-between items-center p-4 h-16 bg-white border-b md:flex">
                    <div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="p-1 px-2 rounded-full bg-slate-300">
                            <div class="relative">
                                @if (auth()->user()->notifications->count() > 0)
                                    <span
                                        class="absolute -top-3 -right-3 p-0.5 px-1 text-sm font-semibold text-white rounded-full bg-red-accent-400">
                                        {{ auth()->user()->notifications->count() }}
                                    </span>
                                @endif
                                <i class="bi bi-bell"></i>
                            </div>
                        </div>
                        <div class="flex items-center p-1 px-2 space-x-2 rounded-full bg-slate-300">
                            <div class="w-6 h-6 rounded-full">
                                <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&color=7F9CF5&background=EBF4FF"
                                    alt="John Doe" class="w-6 h-6 rounded-full">
                            </div>
                            <div>
                                <span class="font-medium md:text-sm">{{ auth()->user()->name }}</span>
                            </div>
                        </div>
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
