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

    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
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

<body class="relative min-h-screen font-sans bg-slate-100">

    @include('includes.flash')

    <div
        class="sticky inset-x-0 top-0 z-20 px-4 bg-white sm:px-6 md:px-8 lg:hidden border-y dark:bg-neutral-800 dark:border-neutral-700">
        <div class="flex items-center py-4">
            <button type="button" class="text-gray-500 hover:text-gray-600"
                data-hs-overlay="#application-sidebar-brand" aria-controls="application-sidebar-brand"
                aria-label="Toggle navigation">
                <span class="sr-only">Toggle Navigation</span>
                <svg class="size-5" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </button>

            <ol class="flex items-center whitespace-nowrap ms-3">
                <li class="flex items-center text-sm text-gray-800 dark:text-neutral-400">
                    Application Layout
                    <svg class="overflow-visible flex-shrink-0 mx-3 text-gray-400 size-2.5 dark:text-neutral-600"
                        width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </li>
                <li class="text-sm font-semibold text-gray-800 truncate dark:text-neutral-400" aria-current="page">
                    Dashboard
                </li>
            </ol>
        </div>
    </div>

    @include('layouts.admin.sidebar')

    <nav class="hidden justify-between items-center p-4 h-16 bg-white border-b md:flex">
        <div>
        </div>
        <div class="flex items-center space-x-3">
        </div>
    </nav>

    <div class="px-4 pt-10 w-full sm:px-6 md:px-8 lg:ps-72">
        @yield('content')
    </div>

</body>

</html>
