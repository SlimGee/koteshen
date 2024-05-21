<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! Meta::toHtml() !!}

    <link rel="apple-touch-icon" sizes="144x144" href="/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/icons/favicon-16x16.png">
    <link rel="manifest" href="/images/icons/site.webmanifest">
    <link rel="mask-icon" href="/images/icons/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/images/icons/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:300,400,500,600,700,800,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/js/app.js', 'resources/css/app.css'])

    @production
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-EKXDK8KVML"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'G-EKXDK8KVML');
        </script>

    @endproduction


</head>

<body class="relative min-h-screen font-sans bg-white" {{ stimulus_controller('menu') }}>

    <header
        class="flex sticky inset-x-0 top-0 flex-wrap py-2.5 w-full text-sm bg-white border-b sm:flex-nowrap sm:justify-start sm:py-4 z-[48] lg:ps-64 dark:bg-neutral-800 dark:border-neutral-700">
        <nav class="flex items-end px-4 mx-auto w-full sm:px-6 basis-full" aria-label="Global">
            <div class="lg:hidden me-5 lg:me-0">
                <!-- Logo -->
                <a href="{{ route('app.home.index') }}"
                    class="inline-block flex-none text-xl font-semibold rounded-xl focus:opacity-80 focus:outline-none">
                    <img src="{{ asset('images/logo/koteshen_cropped.png') }}" alt="Koteshen logo" class="w-32">
                </a>
                <!-- End Logo -->
            </div>

            <div class="flex justify-end items-center self-end ml-auto w-full sm:order-3 sm:gap-x-3">

                <div class="flex flex-row gap-2 justify-end items-center">
                    <button type="button"
                        class="inline-flex gap-x-2 justify-center items-center text-sm font-semibold rounded-full border border-transparent dark:text-white disabled:opacity-50 disabled:pointer-events-none text-slate-800 w-[2.375rem] h-[2.375rem] dark:hover:bg-neutral-700 hover:bg-slate-100">
                        <i class="bi bi-bell"></i>
                    </button>

                    <div data-controller="dropdown" class="inline-flex relative hs-dropdown [--placement:bottom-right]">
                        <button type="button" data-action="dropdown#toggle click@window->dropdown#hide"
                            class="inline-flex gap-x-2 justify-center items-center text-sm font-semibold rounded-full border border-transparent dark:text-white disabled:opacity-50 disabled:pointer-events-none text-slate-800 w-[2.375rem] h-[2.375rem] dark:hover:bg-neutral-700 hover:bg-slate-100">
                            <img class="inline-block rounded-full ring-2 ring-white size-[38px] dark:ring-neutral-800"
                                src="{{ route('avatars.show', auth()->user()) }}" alt="{{ auth()->user()->name }}">
                        </button>

                        <div data-dropdown-target="menu"
                            class="hidden absolute right-0 top-10 p-2 bg-white rounded-b border shadow-md transition transform origin-top-right min-w-60"
                            data-transition-enter-from="opacity-0 scale-95"
                            data-transition-enter-to="opacity-100 scale-100"
                            data-transition-leave-from="opacity-100 scale-100"
                            data-transition-leave-to="opacity-0 scale-95" aria-labelledby="hs-dropdown-with-header">

                            <div class="py-3 px-5 -m-2 bg-slate-100 dark:bg-neutral-800">
                                <p class="text-sm text-slate-500 dark:text-neutral-400">Signed in as</p>
                                <p class="text-sm font-medium text-slate-800 dark:text-neutral-300">
                                    {{ auth()->user()->name }}
                                </p>
                            </div>
                            <div class="py-2 mt-2 first:pt-0 last:pb-0">
                                <a class="flex gap-x-3.5 items-center py-2 px-3 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 text-slate-800 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 hover:bg-slate-100"
                                    href="{{ route('app.profile.edit') }}">
                                    <i class="bi bi-person"></i>
                                    My Account
                                </a>
                                <a class="flex gap-x-3.5 items-center py-2 px-3 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 text-slate-800 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 hover:bg-slate-100"
                                    href="#">
                                    <i class="bi bi-currency-dollar"></i>
                                    Billing
                                </a>

                                <a class="flex gap-x-3.5 items-center py-2 px-3 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 text-slate-800 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 hover:bg-slate-100"
                                    href="{{ route('logout') }}" data-turbo-method="post">
                                    <i class="bi bi-box-arrow-left"></i>
                                    Logout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div
        class="sticky inset-x-0 top-0 z-20 px-4 bg-white sm:px-6 md:px-8 lg:hidden border-y dark:bg-neutral-800 dark:border-neutral-700">
        <div class="flex justify-between items-center py-2">
            <!-- Breadcrumb -->
            <ol class="flex items-center whitespace-nowrap ms-3">
                <li class="flex items-center text-sm text-gray-800 dark:text-neutral-400">
                    Application
                    <svg class="overflow-visible flex-shrink-0 mx-3 text-gray-400 size-2.5 dark:text-neutral-500"
                        width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </li>
                <li class="text-sm font-semibold text-gray-800 truncate dark:text-neutral-400" aria-current="page">
                    @yield('title', 'Dashboard')
                </li>
            </ol>
            <!-- End Breadcrumb -->

            <!-- Sidebar -->
            <button type="button" {{ stimulus_action('menu', 'toggle') }}
                class="flex gap-x-1.5 justify-center items-center py-2 px-3 text-xs text-gray-500 rounded-lg border border-gray-200 hover:text-gray-600 dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-200">
                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M17 8L21 12L17 16M3 12H13M3 6H13M3 18H13" />
                </svg>
                <span class="sr-only">Sidebar</span>
            </button>
            <!-- End Sidebar -->
        </div>
    </div>

    @include('includes.sidebar')
    @include('includes.flash')

    <div class="w-full lg:ps-64">

        <main>
            <!-- Replace with your content -->
            <div class="relative py-6 px-3 min-h-screen md:px-8 xl:px-28 bg-slate-50">
                @yield('content')
            </div>
            <!-- /End replace -->
        </main>
    </div>

</body>

</html>
