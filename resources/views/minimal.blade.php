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
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
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

<body class="relative min-h-screen font-sans bg-white">
    <div id="app">

        <div class="flex flex-col md:flex-row">

            @include('includes.flash')

            <div class="w-full md:flex-1">
                <nav class="hidden items-center p-4 h-16 bg-white border-b md:flex">
                    <div class="container mx-auto">
                        <div class="justify-between md:flex">
                            <div class="px-4 w-48 max-w-full">
                                <a href="{{ route('home.index') }}" class="block py-5 w-full navbar-logo">
                                    <img src="{{ asset('images/logo/koteshen_cropped.png') }}" alt="logo"
                                        class="w-full header-logo" />
                                </a>
                            </div>

                            <div class="flex items-center space-x-3">
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
