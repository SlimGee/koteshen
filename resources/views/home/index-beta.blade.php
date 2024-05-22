@extends('layouts.app')

@section('content')
    <div id="home" class="overflow-hidden relative bg-slate-900 pt-[120px] md:pt-[130px] lg:pt-[160px]">
        <div class="container mx-auto">
            <div class="flex flex-wrap items-center -mx-4">
                <div class="px-4 w-full">
                    <div class="mx-auto text-center hero-content wow fadeInUp max-w-[780px]" data-wow-delay=".2s">
                        <h1
                            class="mb-6 text-3xl font-bold leading-snug text-white sm:text-4xl sm:leading-snug lg:text-5xl lg:leading-[1.2]">
                            Wallet opening invoices — without using AI
                        </h1>
                        <p class="mx-auto mb-9 text-base font-medium text-white sm:text-lg max-w-[600px] sm:leading-[1.44]">
                            Send beautiful invoices, estimate consulting work and automate your finances in just a few
                            clicks
                        </p>
                        <ul class="flex flex-wrap gap-5 justify-center items-center mb-10">
                            <li>
                                <a href="{{ route('register') }}"
                                    class="inline-flex justify-center items-center px-7 text-base font-medium text-center bg-white rounded-md transition duration-300 ease-in-out hover:text-gray-600 py-[14px] text-dark shadow-1 hover:bg-gray-2">
                                    Sign up for just $9.99
                                </a>
                            </li>
                            <li>
                                <a href="/demo" target="_blank"
                                    class="flex gap-4 items-center px-6 text-base font-medium text-white rounded-md transition duration-300 ease-in-out hover:bg-white bg-white/[0.12] py-[14px] hover:text-slate-900 hover:text-dark">
                                    <i class="bi bi-play-circle-fill"></i>
                                    Watch demo
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="px-4 w-full">
                    <div class="relative z-10 mx-auto wow fadeInUp max-w-[845px]" data-wow-delay=".25s">
                        <div class="mt-16">
                            <img src="assets/images/hero/hero-image.png" alt="hero"
                                class="mx-auto max-w-full rounded-t-xl rounded-tr-xl" />
                        </div>
                        <div class="absolute bottom-0 -left-9 z-[-1]">
                            <svg width="134" height="106" viewBox="0 0 134 106" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="1.66667" cy="104" r="1.66667" transform="rotate(-90 1.66667 104)"
                                    fill="white" />
                                <circle cx="16.3333" cy="104" r="1.66667" transform="rotate(-90 16.3333 104)"
                                    fill="white" />
                                <circle cx="31" cy="104" r="1.66667" transform="rotate(-90 31 104)"
                                    fill="white" />
                                <circle cx="45.6667" cy="104" r="1.66667" transform="rotate(-90 45.6667 104)"
                                    fill="white" />
                                <circle cx="60.3333" cy="104" r="1.66667" transform="rotate(-90 60.3333 104)"
                                    fill="white" />
                                <circle cx="88.6667" cy="104" r="1.66667" transform="rotate(-90 88.6667 104)"
                                    fill="white" />
                                <circle cx="117.667" cy="104" r="1.66667" transform="rotate(-90 117.667 104)"
                                    fill="white" />
                                <circle cx="74.6667" cy="104" r="1.66667" transform="rotate(-90 74.6667 104)"
                                    fill="white" />
                                <circle cx="103" cy="104" r="1.66667" transform="rotate(-90 103 104)"
                                    fill="white" />
                                <circle cx="132" cy="104" r="1.66667" transform="rotate(-90 132 104)"
                                    fill="white" />
                                <circle cx="1.66667" cy="89.3333" r="1.66667" transform="rotate(-90 1.66667 89.3333)"
                                    fill="white" />
                                <circle cx="16.3333" cy="89.3333" r="1.66667" transform="rotate(-90 16.3333 89.3333)"
                                    fill="white" />
                                <circle cx="31" cy="89.3333" r="1.66667" transform="rotate(-90 31 89.3333)"
                                    fill="white" />
                                <circle cx="45.6667" cy="89.3333" r="1.66667" transform="rotate(-90 45.6667 89.3333)"
                                    fill="white" />
                                <circle cx="60.3333" cy="89.3338" r="1.66667" transform="rotate(-90 60.3333 89.3338)"
                                    fill="white" />
                                <circle cx="88.6667" cy="89.3338" r="1.66667" transform="rotate(-90 88.6667 89.3338)"
                                    fill="white" />
                                <circle cx="117.667" cy="89.3338" r="1.66667" transform="rotate(-90 117.667 89.3338)"
                                    fill="white" />
                                <circle cx="74.6667" cy="89.3338" r="1.66667" transform="rotate(-90 74.6667 89.3338)"
                                    fill="white" />
                                <circle cx="103" cy="89.3338" r="1.66667" transform="rotate(-90 103 89.3338)"
                                    fill="white" />
                                <circle cx="132" cy="89.3338" r="1.66667" transform="rotate(-90 132 89.3338)"
                                    fill="white" />
                                <circle cx="1.66667" cy="74.6673" r="1.66667" transform="rotate(-90 1.66667 74.6673)"
                                    fill="white" />
                                <circle cx="1.66667" cy="31.0003" r="1.66667" transform="rotate(-90 1.66667 31.0003)"
                                    fill="white" />
                                <circle cx="16.3333" cy="74.6668" r="1.66667" transform="rotate(-90 16.3333 74.6668)"
                                    fill="white" />
                                <circle cx="16.3333" cy="31.0003" r="1.66667" transform="rotate(-90 16.3333 31.0003)"
                                    fill="white" />
                                <circle cx="31" cy="74.6668" r="1.66667" transform="rotate(-90 31 74.6668)"
                                    fill="white" />
                                <circle cx="31" cy="31.0003" r="1.66667" transform="rotate(-90 31 31.0003)"
                                    fill="white" />
                                <circle cx="45.6667" cy="74.6668" r="1.66667" transform="rotate(-90 45.6667 74.6668)"
                                    fill="white" />
                                <circle cx="45.6667" cy="31.0003" r="1.66667" transform="rotate(-90 45.6667 31.0003)"
                                    fill="white" />
                                <circle cx="60.3333" cy="74.6668" r="1.66667" transform="rotate(-90 60.3333 74.6668)"
                                    fill="white" />
                                <circle cx="60.3333" cy="31.0001" r="1.66667" transform="rotate(-90 60.3333 31.0001)"
                                    fill="white" />
                                <circle cx="88.6667" cy="74.6668" r="1.66667" transform="rotate(-90 88.6667 74.6668)"
                                    fill="white" />
                                <circle cx="88.6667" cy="31.0001" r="1.66667" transform="rotate(-90 88.6667 31.0001)"
                                    fill="white" />
                                <circle cx="117.667" cy="74.6668" r="1.66667" transform="rotate(-90 117.667 74.6668)"
                                    fill="white" />
                                <circle cx="117.667" cy="31.0001" r="1.66667" transform="rotate(-90 117.667 31.0001)"
                                    fill="white" />
                                <circle cx="74.6667" cy="74.6668" r="1.66667" transform="rotate(-90 74.6667 74.6668)"
                                    fill="white" />
                                <circle cx="74.6667" cy="31.0001" r="1.66667" transform="rotate(-90 74.6667 31.0001)"
                                    fill="white" />
                                <circle cx="103" cy="74.6668" r="1.66667" transform="rotate(-90 103 74.6668)"
                                    fill="white" />
                                <circle cx="103" cy="31.0001" r="1.66667" transform="rotate(-90 103 31.0001)"
                                    fill="white" />
                                <circle cx="132" cy="74.6668" r="1.66667" transform="rotate(-90 132 74.6668)"
                                    fill="white" />
                                <circle cx="132" cy="31.0001" r="1.66667" transform="rotate(-90 132 31.0001)"
                                    fill="white" />
                                <circle cx="1.66667" cy="60.0003" r="1.66667" transform="rotate(-90 1.66667 60.0003)"
                                    fill="white" />
                                <circle cx="1.66667" cy="16.3336" r="1.66667" transform="rotate(-90 1.66667 16.3336)"
                                    fill="white" />
                                <circle cx="16.3333" cy="60.0003" r="1.66667" transform="rotate(-90 16.3333 60.0003)"
                                    fill="white" />
                                <circle cx="16.3333" cy="16.3336" r="1.66667" transform="rotate(-90 16.3333 16.3336)"
                                    fill="white" />
                                <circle cx="31" cy="60.0003" r="1.66667" transform="rotate(-90 31 60.0003)"
                                    fill="white" />
                                <circle cx="31" cy="16.3336" r="1.66667" transform="rotate(-90 31 16.3336)"
                                    fill="white" />
                                <circle cx="45.6667" cy="60.0003" r="1.66667" transform="rotate(-90 45.6667 60.0003)"
                                    fill="white" />
                                <circle cx="45.6667" cy="16.3336" r="1.66667" transform="rotate(-90 45.6667 16.3336)"
                                    fill="white" />
                                <circle cx="60.3333" cy="60.0003" r="1.66667" transform="rotate(-90 60.3333 60.0003)"
                                    fill="white" />
                                <circle cx="60.3333" cy="16.3336" r="1.66667" transform="rotate(-90 60.3333 16.3336)"
                                    fill="white" />
                                <circle cx="88.6667" cy="60.0003" r="1.66667" transform="rotate(-90 88.6667 60.0003)"
                                    fill="white" />
                                <circle cx="88.6667" cy="16.3336" r="1.66667" transform="rotate(-90 88.6667 16.3336)"
                                    fill="white" />
                                <circle cx="117.667" cy="60.0003" r="1.66667" transform="rotate(-90 117.667 60.0003)"
                                    fill="white" />
                                <circle cx="117.667" cy="16.3336" r="1.66667" transform="rotate(-90 117.667 16.3336)"
                                    fill="white" />
                                <circle cx="74.6667" cy="60.0003" r="1.66667" transform="rotate(-90 74.6667 60.0003)"
                                    fill="white" />
                                <circle cx="74.6667" cy="16.3336" r="1.66667" transform="rotate(-90 74.6667 16.3336)"
                                    fill="white" />
                                <circle cx="103" cy="60.0003" r="1.66667" transform="rotate(-90 103 60.0003)"
                                    fill="white" />
                                <circle cx="103" cy="16.3336" r="1.66667" transform="rotate(-90 103 16.3336)"
                                    fill="white" />
                                <circle cx="132" cy="60.0003" r="1.66667" transform="rotate(-90 132 60.0003)"
                                    fill="white" />
                                <circle cx="132" cy="16.3336" r="1.66667" transform="rotate(-90 132 16.3336)"
                                    fill="white" />
                                <circle cx="1.66667" cy="45.3336" r="1.66667" transform="rotate(-90 1.66667 45.3336)"
                                    fill="white" />
                                <circle cx="1.66667" cy="1.66683" r="1.66667" transform="rotate(-90 1.66667 1.66683)"
                                    fill="white" />
                                <circle cx="16.3333" cy="45.3336" r="1.66667" transform="rotate(-90 16.3333 45.3336)"
                                    fill="white" />
                                <circle cx="16.3333" cy="1.66683" r="1.66667" transform="rotate(-90 16.3333 1.66683)"
                                    fill="white" />
                                <circle cx="31" cy="45.3336" r="1.66667" transform="rotate(-90 31 45.3336)"
                                    fill="white" />
                                <circle cx="31" cy="1.66683" r="1.66667" transform="rotate(-90 31 1.66683)"
                                    fill="white" />
                                <circle cx="45.6667" cy="45.3336" r="1.66667" transform="rotate(-90 45.6667 45.3336)"
                                    fill="white" />
                                <circle cx="45.6667" cy="1.66683" r="1.66667" transform="rotate(-90 45.6667 1.66683)"
                                    fill="white" />
                                <circle cx="60.3333" cy="45.3338" r="1.66667" transform="rotate(-90 60.3333 45.3338)"
                                    fill="white" />
                                <circle cx="60.3333" cy="1.66707" r="1.66667" transform="rotate(-90 60.3333 1.66707)"
                                    fill="white" />
                                <circle cx="88.6667" cy="45.3338" r="1.66667" transform="rotate(-90 88.6667 45.3338)"
                                    fill="white" />
                                <circle cx="88.6667" cy="1.66707" r="1.66667" transform="rotate(-90 88.6667 1.66707)"
                                    fill="white" />
                                <circle cx="117.667" cy="45.3338" r="1.66667" transform="rotate(-90 117.667 45.3338)"
                                    fill="white" />
                                <circle cx="117.667" cy="1.66707" r="1.66667" transform="rotate(-90 117.667 1.66707)"
                                    fill="white" />
                                <circle cx="74.6667" cy="45.3338" r="1.66667" transform="rotate(-90 74.6667 45.3338)"
                                    fill="white" />
                                <circle cx="74.6667" cy="1.66707" r="1.66667" transform="rotate(-90 74.6667 1.66707)"
                                    fill="white" />
                                <circle cx="103" cy="45.3338" r="1.66667" transform="rotate(-90 103 45.3338)"
                                    fill="white" />
                                <circle cx="103" cy="1.66707" r="1.66667" transform="rotate(-90 103 1.66707)"
                                    fill="white" />
                                <circle cx="132" cy="45.3338" r="1.66667" transform="rotate(-90 132 45.3338)"
                                    fill="white" />
                                <circle cx="132" cy="1.66707" r="1.66667" transform="rotate(-90 132 1.66707)"
                                    fill="white" />
                            </svg>
                        </div>
                        <div class="absolute -top-6 -right-6 z-[-1]">
                            <svg width="134" height="106" viewBox="0 0 134 106" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="1.66667" cy="104" r="1.66667" transform="rotate(-90 1.66667 104)"
                                    fill="white" />
                                <circle cx="16.3333" cy="104" r="1.66667" transform="rotate(-90 16.3333 104)"
                                    fill="white" />
                                <circle cx="31" cy="104" r="1.66667" transform="rotate(-90 31 104)"
                                    fill="white" />
                                <circle cx="45.6667" cy="104" r="1.66667" transform="rotate(-90 45.6667 104)"
                                    fill="white" />
                                <circle cx="60.3333" cy="104" r="1.66667" transform="rotate(-90 60.3333 104)"
                                    fill="white" />
                                <circle cx="88.6667" cy="104" r="1.66667" transform="rotate(-90 88.6667 104)"
                                    fill="white" />
                                <circle cx="117.667" cy="104" r="1.66667" transform="rotate(-90 117.667 104)"
                                    fill="white" />
                                <circle cx="74.6667" cy="104" r="1.66667" transform="rotate(-90 74.6667 104)"
                                    fill="white" />
                                <circle cx="103" cy="104" r="1.66667" transform="rotate(-90 103 104)"
                                    fill="white" />
                                <circle cx="132" cy="104" r="1.66667" transform="rotate(-90 132 104)"
                                    fill="white" />
                                <circle cx="1.66667" cy="89.3333" r="1.66667" transform="rotate(-90 1.66667 89.3333)"
                                    fill="white" />
                                <circle cx="16.3333" cy="89.3333" r="1.66667" transform="rotate(-90 16.3333 89.3333)"
                                    fill="white" />
                                <circle cx="31" cy="89.3333" r="1.66667" transform="rotate(-90 31 89.3333)"
                                    fill="white" />
                                <circle cx="45.6667" cy="89.3333" r="1.66667" transform="rotate(-90 45.6667 89.3333)"
                                    fill="white" />
                                <circle cx="60.3333" cy="89.3338" r="1.66667" transform="rotate(-90 60.3333 89.3338)"
                                    fill="white" />
                                <circle cx="88.6667" cy="89.3338" r="1.66667" transform="rotate(-90 88.6667 89.3338)"
                                    fill="white" />
                                <circle cx="117.667" cy="89.3338" r="1.66667" transform="rotate(-90 117.667 89.3338)"
                                    fill="white" />
                                <circle cx="74.6667" cy="89.3338" r="1.66667" transform="rotate(-90 74.6667 89.3338)"
                                    fill="white" />
                                <circle cx="103" cy="89.3338" r="1.66667" transform="rotate(-90 103 89.3338)"
                                    fill="white" />
                                <circle cx="132" cy="89.3338" r="1.66667" transform="rotate(-90 132 89.3338)"
                                    fill="white" />
                                <circle cx="1.66667" cy="74.6673" r="1.66667" transform="rotate(-90 1.66667 74.6673)"
                                    fill="white" />
                                <circle cx="1.66667" cy="31.0003" r="1.66667" transform="rotate(-90 1.66667 31.0003)"
                                    fill="white" />
                                <circle cx="16.3333" cy="74.6668" r="1.66667" transform="rotate(-90 16.3333 74.6668)"
                                    fill="white" />
                                <circle cx="16.3333" cy="31.0003" r="1.66667" transform="rotate(-90 16.3333 31.0003)"
                                    fill="white" />
                                <circle cx="31" cy="74.6668" r="1.66667" transform="rotate(-90 31 74.6668)"
                                    fill="white" />
                                <circle cx="31" cy="31.0003" r="1.66667" transform="rotate(-90 31 31.0003)"
                                    fill="white" />
                                <circle cx="45.6667" cy="74.6668" r="1.66667" transform="rotate(-90 45.6667 74.6668)"
                                    fill="white" />
                                <circle cx="45.6667" cy="31.0003" r="1.66667" transform="rotate(-90 45.6667 31.0003)"
                                    fill="white" />
                                <circle cx="60.3333" cy="74.6668" r="1.66667" transform="rotate(-90 60.3333 74.6668)"
                                    fill="white" />
                                <circle cx="60.3333" cy="31.0001" r="1.66667" transform="rotate(-90 60.3333 31.0001)"
                                    fill="white" />
                                <circle cx="88.6667" cy="74.6668" r="1.66667" transform="rotate(-90 88.6667 74.6668)"
                                    fill="white" />
                                <circle cx="88.6667" cy="31.0001" r="1.66667" transform="rotate(-90 88.6667 31.0001)"
                                    fill="white" />
                                <circle cx="117.667" cy="74.6668" r="1.66667" transform="rotate(-90 117.667 74.6668)"
                                    fill="white" />
                                <circle cx="117.667" cy="31.0001" r="1.66667" transform="rotate(-90 117.667 31.0001)"
                                    fill="white" />
                                <circle cx="74.6667" cy="74.6668" r="1.66667" transform="rotate(-90 74.6667 74.6668)"
                                    fill="white" />
                                <circle cx="74.6667" cy="31.0001" r="1.66667" transform="rotate(-90 74.6667 31.0001)"
                                    fill="white" />
                                <circle cx="103" cy="74.6668" r="1.66667" transform="rotate(-90 103 74.6668)"
                                    fill="white" />
                                <circle cx="103" cy="31.0001" r="1.66667" transform="rotate(-90 103 31.0001)"
                                    fill="white" />
                                <circle cx="132" cy="74.6668" r="1.66667" transform="rotate(-90 132 74.6668)"
                                    fill="white" />
                                <circle cx="132" cy="31.0001" r="1.66667" transform="rotate(-90 132 31.0001)"
                                    fill="white" />
                                <circle cx="1.66667" cy="60.0003" r="1.66667" transform="rotate(-90 1.66667 60.0003)"
                                    fill="white" />
                                <circle cx="1.66667" cy="16.3336" r="1.66667" transform="rotate(-90 1.66667 16.3336)"
                                    fill="white" />
                                <circle cx="16.3333" cy="60.0003" r="1.66667" transform="rotate(-90 16.3333 60.0003)"
                                    fill="white" />
                                <circle cx="16.3333" cy="16.3336" r="1.66667" transform="rotate(-90 16.3333 16.3336)"
                                    fill="white" />
                                <circle cx="31" cy="60.0003" r="1.66667" transform="rotate(-90 31 60.0003)"
                                    fill="white" />
                                <circle cx="31" cy="16.3336" r="1.66667" transform="rotate(-90 31 16.3336)"
                                    fill="white" />
                                <circle cx="45.6667" cy="60.0003" r="1.66667" transform="rotate(-90 45.6667 60.0003)"
                                    fill="white" />
                                <circle cx="45.6667" cy="16.3336" r="1.66667" transform="rotate(-90 45.6667 16.3336)"
                                    fill="white" />
                                <circle cx="60.3333" cy="60.0003" r="1.66667" transform="rotate(-90 60.3333 60.0003)"
                                    fill="white" />
                                <circle cx="60.3333" cy="16.3336" r="1.66667" transform="rotate(-90 60.3333 16.3336)"
                                    fill="white" />
                                <circle cx="88.6667" cy="60.0003" r="1.66667" transform="rotate(-90 88.6667 60.0003)"
                                    fill="white" />
                                <circle cx="88.6667" cy="16.3336" r="1.66667" transform="rotate(-90 88.6667 16.3336)"
                                    fill="white" />
                                <circle cx="117.667" cy="60.0003" r="1.66667" transform="rotate(-90 117.667 60.0003)"
                                    fill="white" />
                                <circle cx="117.667" cy="16.3336" r="1.66667" transform="rotate(-90 117.667 16.3336)"
                                    fill="white" />
                                <circle cx="74.6667" cy="60.0003" r="1.66667" transform="rotate(-90 74.6667 60.0003)"
                                    fill="white" />
                                <circle cx="74.6667" cy="16.3336" r="1.66667" transform="rotate(-90 74.6667 16.3336)"
                                    fill="white" />
                                <circle cx="103" cy="60.0003" r="1.66667" transform="rotate(-90 103 60.0003)"
                                    fill="white" />
                                <circle cx="103" cy="16.3336" r="1.66667" transform="rotate(-90 103 16.3336)"
                                    fill="white" />
                                <circle cx="132" cy="60.0003" r="1.66667" transform="rotate(-90 132 60.0003)"
                                    fill="white" />
                                <circle cx="132" cy="16.3336" r="1.66667" transform="rotate(-90 132 16.3336)"
                                    fill="white" />
                                <circle cx="1.66667" cy="45.3336" r="1.66667" transform="rotate(-90 1.66667 45.3336)"
                                    fill="white" />
                                <circle cx="1.66667" cy="1.66683" r="1.66667" transform="rotate(-90 1.66667 1.66683)"
                                    fill="white" />
                                <circle cx="16.3333" cy="45.3336" r="1.66667" transform="rotate(-90 16.3333 45.3336)"
                                    fill="white" />
                                <circle cx="16.3333" cy="1.66683" r="1.66667" transform="rotate(-90 16.3333 1.66683)"
                                    fill="white" />
                                <circle cx="31" cy="45.3336" r="1.66667" transform="rotate(-90 31 45.3336)"
                                    fill="white" />
                                <circle cx="31" cy="1.66683" r="1.66667" transform="rotate(-90 31 1.66683)"
                                    fill="white" />
                                <circle cx="45.6667" cy="45.3336" r="1.66667" transform="rotate(-90 45.6667 45.3336)"
                                    fill="white" />
                                <circle cx="45.6667" cy="1.66683" r="1.66667" transform="rotate(-90 45.6667 1.66683)"
                                    fill="white" />
                                <circle cx="60.3333" cy="45.3338" r="1.66667" transform="rotate(-90 60.3333 45.3338)"
                                    fill="white" />
                                <circle cx="60.3333" cy="1.66707" r="1.66667" transform="rotate(-90 60.3333 1.66707)"
                                    fill="white" />
                                <circle cx="88.6667" cy="45.3338" r="1.66667" transform="rotate(-90 88.6667 45.3338)"
                                    fill="white" />
                                <circle cx="88.6667" cy="1.66707" r="1.66667" transform="rotate(-90 88.6667 1.66707)"
                                    fill="white" />
                                <circle cx="117.667" cy="45.3338" r="1.66667" transform="rotate(-90 117.667 45.3338)"
                                    fill="white" />
                                <circle cx="117.667" cy="1.66707" r="1.66667" transform="rotate(-90 117.667 1.66707)"
                                    fill="white" />
                                <circle cx="74.6667" cy="45.3338" r="1.66667" transform="rotate(-90 74.6667 45.3338)"
                                    fill="white" />
                                <circle cx="74.6667" cy="1.66707" r="1.66667" transform="rotate(-90 74.6667 1.66707)"
                                    fill="white" />
                                <circle cx="103" cy="45.3338" r="1.66667" transform="rotate(-90 103 45.3338)"
                                    fill="white" />
                                <circle cx="103" cy="1.66707" r="1.66667" transform="rotate(-90 103 1.66707)"
                                    fill="white" />
                                <circle cx="132" cy="45.3338" r="1.66667" transform="rotate(-90 132 45.3338)"
                                    fill="white" />
                                <circle cx="132" cy="1.66707" r="1.66667" transform="rotate(-90 132 1.66707)"
                                    fill="white" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="features" aria-label="Features for running your books"
        class="overflow-hidden relative pt-20 pb-28 sm:py-32 bg-blue-accent-700">
        <img alt="" loading="lazy" width="2245" height="1636" decoding="async" data-nimg="1"
            class="absolute left-1/2 top-1/2 max-w-none translate-x-[-44%] translate-y-[-42%]" style="color:transparent"
            src="/_next/static/media/background-features.5f7a9ac9.jpg">
        <div class="relative px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="max-w-2xl md:mx-auto md:text-center xl:max-w-none">
                <h2 class="text-3xl tracking-tight text-white sm:text-4xl md:text-5xl font-display">
                    Everything you need to get paid by your clients
                </h2>
                <p class="mt-6 text-lg tracking-tight text-blue-100">
                    From estimates, invoices, payments and reminders
                </p>
            </div>
            <div data-controller="tabs" data-tabs-active-tab-class="bg-white lg:ring-1 lg:ring-inset lg:bg-white/10"
                class="grid grid-cols-1 gap-y-2 items-center pt-10 mt-16 sm:gap-y-6 md:mt-20 lg:grid-cols-12 lg:pt-0">
                <div class="flex overflow-x-auto pb-4 -mx-4 sm:overflow-visible sm:pb-0 sm:mx-0 lg:col-span-5">
                    <div
                        class="flex relative z-10 gap-x-4 px-4 whitespace-nowrap sm:px-0 sm:mx-auto lg:block lg:gap-x-0 lg:gap-y-1 lg:mx-0 lg:whitespace-normal">

                        <div data-tabs-target="tab" data-action="click->tabs#change"
                            class="relative py-1 px-4 rounded-full lg:p-6 lg:rounded-r-none lg:rounded-l-xl group lg:ring-white/10 lg:hover:bg-white/5 hover:bg-white/10">
                            <h3>
                                <button
                                    class="text-lg text-blue-600 lg:text-white font-display ui-not-focus-visible:outline-none"><span
                                        class="absolute inset-0 rounded-full lg:rounded-r-none lg:rounded-l-xl"></span>
                                    Estimates
                                </button>
                            </h3>
                            <p class="hidden mt-2 text-sm text-white lg:block">
                                Create clients and send estimates in seconds
                            </p>
                        </div>
                        <div data-tabs-target="tab" data-action="click->tabs#change"
                            class="relative py-1 px-4 rounded-full lg:p-6 lg:rounded-r-none lg:rounded-l-xl group lg:hover:bg-white/5 hover:bg-white/10">
                            <h3>
                                <button
                                    class="text-lg text-blue-100 lg:text-white hover:text-white font-display ui-not-focus-visible:outline-none">
                                    <span class="absolute inset-0 rounded-full lg:rounded-r-none lg:rounded-l-xl"></span>
                                    Invoices
                                </button>
                            </h3>
                            <p class="hidden mt-2 text-sm text-blue-100 lg:block group-hover:text-white">
                                With automated reminders to ensure you get paid on time, so you can focus on what you love.
                            </p>
                        </div>
                        <div data-tabs-target="tab" data-action="click->tabs#change"
                            class="relative py-1 px-4 rounded-full lg:p-6 lg:rounded-r-none lg:rounded-l-xl group lg:hover:bg-white/5 hover:bg-white/10">
                            <h3>
                                <button
                                    class="text-lg text-blue-100 lg:text-white hover:text-white font-display ui-not-focus-visible:outline-none">
                                    <span class="absolute inset-0 rounded-full lg:rounded-r-none lg:rounded-l-xl"></span>
                                    Payments, of course
                                </button>
                            </h3>
                            <p class="hidden mt-2 text-sm text-blue-100 lg:block group-hover:text-white">
                                Get Paid Sooner, Not Later. Reduce delays and friction by making it incredibly easy for
                                clients to pay
                            </p>
                        </div>
                        <div data-tabs-target="tab" data-action="click->tabs#change"
                            class="relative py-1 px-4 rounded-full lg:p-6 lg:rounded-r-none lg:rounded-l-xl group lg:hover:bg-white/5 hover:bg-white/10">
                            <h3>
                                <button
                                    class="text-lg text-blue-100 lg:text-white hover:text-white font-display ui-not-focus-visible:outline-none">
                                    <span class="absolute inset-0 rounded-full lg:rounded-r-none lg:rounded-l-xl"></span>
                                    Reporting
                                </button>
                            </h3>
                            <p class="hidden mt-2 text-sm text-blue-100 lg:block group-hover:text-white">
                                Easily export your
                                data into an Excel spreadsheet where you can do whatever the hell you want with it.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-7">
                    <div data-tabs-target="panel">
                        <div class="relative sm:px-6 lg:hidden">
                            <div
                                class="absolute -inset-x-4 ring-1 ring-inset sm:inset-x-0 sm:rounded-t-xl bottom-[-4.25rem] top-[-6.5rem] bg-white/10 ring-white/10">
                            </div>
                            <p class="relative mx-auto max-w-2xl text-base text-white sm:text-center">Keep track of
                                everyone's salaries and whether or not they've been paid. Direct deposit not supported.</p>
                        </div>
                        <div
                            class="overflow-hidden mt-10 rounded-xl shadow-xl sm:w-auto lg:mt-0 w-[45rem] bg-slate-50 shadow-blue-900/20 lg:w-[67.8125rem]">
                            <img alt="" fetchpriority="high" width="2174" height="1464" decoding="async"
                                data-nimg="1" class="w-full" style="color:transparent"
                                src="{{ asset('images/screenshots/app/estimate.png') }}">
                        </div>
                    </div>
                    <div class="hidden" data-tabs-target="panel">
                        <div class="relative sm:px-6 lg:hidden">
                            <div
                                class="absolute -inset-x-4 ring-1 ring-inset sm:inset-x-0 sm:rounded-t-xl bottom-[-4.25rem] top-[-6.5rem] bg-white/10 ring-white/10">
                            </div>
                            <p class="relative mx-auto max-w-2xl text-base text-white sm:text-center">All of your receipts
                                organized into one place, as long as you don't mind typing in the data by hand.</p>
                        </div>
                        <div
                            class="overflow-hidden mt-10 rounded-xl shadow-xl sm:w-auto lg:mt-0 w-[45rem] bg-slate-50 shadow-blue-900/20 lg:w-[67.8125rem]">
                            <img alt="" fetchpriority="high" width="2174" height="1464" decoding="async"
                                data-nimg="1" class="w-full" style="color:transparent"
                                sizes="(min-width: 1024px) 67.8125rem, (min-width: 640px) 100vw, 45rem"
                                src="{{ asset('images/screenshots/app/invoice.png') }}">
                        </div>
                    </div>
                    <div class="hidden" data-tabs-target="panel">
                        <div class="relative sm:px-6 lg:hidden">
                            <div
                                class="absolute -inset-x-4 ring-1 ring-inset sm:inset-x-0 sm:rounded-t-xl bottom-[-4.25rem] top-[-6.5rem] bg-white/10 ring-white/10">
                            </div>
                            <p class="relative mx-auto max-w-2xl text-base text-white sm:text-center">We only sell our
                                software to companies who don't deal with VAT at all, so technically we do all the VAT stuff
                                they need.</p>
                        </div>
                        <div
                            class="overflow-hidden mt-10 rounded-xl shadow-xl sm:w-auto lg:mt-0 w-[45rem] bg-slate-50 shadow-blue-900/20 lg:w-[67.8125rem]">
                            <img alt="" fetchpriority="high" width="2174" height="1464" decoding="async"
                                data-nimg="1" class="w-full" style="color:transparent"
                                sizes="(min-width: 1024px) 67.8125rem, (min-width: 640px) 100vw, 45rem"
                                src="{{ asset('images/screenshots/app/payments.png') }}">
                        </div>
                    </div>
                    <div class="hidden" data-tabs-target="panel">
                        <div class="relative sm:px-6 lg:hidden">
                            <div
                                class="absolute -inset-x-4 ring-1 ring-inset sm:inset-x-0 sm:rounded-t-xl bottom-[-4.25rem] top-[-6.5rem] bg-white/10 ring-white/10">
                            </div>
                            <p class="relative mx-auto max-w-2xl text-base text-white sm:text-center">Easily export your
                                data into an Excel spreadsheet where you can do whatever the hell you want with it.</p>
                        </div>
                        <div
                            class="overflow-hidden mt-10 rounded-xl shadow-xl sm:w-auto lg:mt-0 w-[45rem] bg-slate-50 shadow-blue-900/20 lg:w-[67.8125rem]">
                            <img alt="" fetchpriority="high" width="2174" height="1464" decoding="async"
                                data-nimg="1" class="w-full" style="color:transparent"
                                sizes="(min-width: 1024px) 67.8125rem, (min-width: 640px) 100vw, 45rem"
                                src="{{ asset('images/screenshots/app/reports.png') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="secondary-features" aria-label="Features for simplifying everyday business tasks"
        class="pt-20 pb-14 sm:pt-32 sm:pb-20 lg:pb-32">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl md:text-center">
                <h2 class="text-3xl tracking-tight sm:text-4xl font-display text-slate-900">Simplify everyday business
                    tasks.</h2>
                <p class="mt-4 text-lg tracking-tight text-slate-700">Because you’d probably be a little confused if we
                    suggested you complicate your everyday business tasks instead.</p>
            </div>
            <div class="flex overflow-hidden flex-col gap-y-10 px-4 -mx-4 mt-20 sm:px-6 sm:-mx-6 lg:hidden">
                <div>
                    <div class="mx-auto max-w-2xl">
                        <div class="w-9 bg-blue-600 rounded-lg"><svg aria-hidden="true" class="w-9 h-9" fill="none">
                                <defs>
                                    <linearGradient id=":R2menla:" x1="11.5" y1="18" x2="36"
                                        y2="15.5" gradientUnits="userSpaceOnUse">
                                        <stop offset=".194" stop-color="#fff"></stop>
                                        <stop offset="1" stop-color="#6692F1"></stop>
                                    </linearGradient>
                                </defs>
                                <path d=" m30 15-4 5-4-11-4 18-4-11-4 7-4-5" stroke="url(#:R2menla:)" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                        <h3 class="mt-6 text-sm font-medium text-blue-600">Reporting</h3>
                        <p class="mt-2 text-xl font-display text-slate-900">Stay on top of things with always up-to-date
                            reporting features.</p>
                        <p class="mt-4 text-sm text-slate-600">We talked about reporting in the section above but we needed
                            three items here, so mentioning it one more time for posterity.</p>
                    </div>
                    <div class="relative pb-10 mt-10">
                        <div class="absolute bottom-0 -inset-x-4 top-8 sm:-inset-x-6 bg-slate-200"></div>
                        <div
                            class="overflow-hidden relative mx-auto bg-white rounded-xl ring-1 shadow-lg w-[52.75rem] shadow-slate-900/5 ring-slate-500/10">
                            <img alt="" loading="lazy" width="1688" height="856" decoding="async"
                                data-nimg="1" class="w-full" style="color:transparent" sizes="52.75rem"
                                srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=16&amp;q=75 16w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=32&amp;q=75 32w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=48&amp;q=75 48w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=64&amp;q=75 64w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=96&amp;q=75 96w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=128&amp;q=75 128w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=256&amp;q=75 256w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=384&amp;q=75 384w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=640&amp;q=75 640w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=750&amp;q=75 750w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=828&amp;q=75 828w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=1080&amp;q=75 1080w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=1200&amp;q=75 1200w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=1920&amp;q=75 1920w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=2048&amp;q=75 2048w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=3840&amp;q=75 3840w"
                                src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=3840&amp;q=75">
                        </div>
                    </div>
                </div>
                <div>
                    <div class="mx-auto max-w-2xl">
                        <div class="w-9 bg-blue-600 rounded-lg"><svg aria-hidden="true" class="w-9 h-9" fill="none">
                                <path opacity=".5"
                                    d="M8 17a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1v-2Z"
                                    fill="#fff"></path>
                                <path opacity=".3"
                                    d="M8 24a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1v-2Z"
                                    fill="#fff"></path>
                                <path d="M8 10a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1v-2Z"
                                    fill="#fff"></path>
                            </svg></div>
                        <h3 class="mt-6 text-sm font-medium text-blue-600">Inventory</h3>
                        <p class="mt-2 text-xl font-display text-slate-900">Never lose track of what’s in stock with
                            accurate inventory tracking.</p>
                        <p class="mt-4 text-sm text-slate-600">We don’t offer this as part of our software but that
                            statement is inarguably true. Accurate inventory tracking would help you for sure.</p>
                    </div>
                    <div class="relative pb-10 mt-10">
                        <div class="absolute bottom-0 -inset-x-4 top-8 sm:-inset-x-6 bg-slate-200"></div>
                        <div
                            class="overflow-hidden relative mx-auto bg-white rounded-xl ring-1 shadow-lg w-[52.75rem] shadow-slate-900/5 ring-slate-500/10">
                            <img alt="" loading="lazy" width="1688" height="856" decoding="async"
                                data-nimg="1" class="w-full" style="color:transparent" sizes="52.75rem"
                                srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=16&amp;q=75 16w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=32&amp;q=75 32w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=48&amp;q=75 48w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=64&amp;q=75 64w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=96&amp;q=75 96w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=128&amp;q=75 128w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=256&amp;q=75 256w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=384&amp;q=75 384w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=640&amp;q=75 640w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=750&amp;q=75 750w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=828&amp;q=75 828w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=1080&amp;q=75 1080w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=1200&amp;q=75 1200w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=1920&amp;q=75 1920w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=2048&amp;q=75 2048w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=3840&amp;q=75 3840w"
                                src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=3840&amp;q=75">
                        </div>
                    </div>
                </div>
                <div>
                    <div class="mx-auto max-w-2xl">
                        <div class="w-9 bg-blue-600 rounded-lg"><svg aria-hidden="true" class="w-9 h-9" fill="none">
                                <path opacity=".5"
                                    d="M25.778 25.778c.39.39 1.027.393 1.384-.028A11.952 11.952 0 0 0 30 18c0-6.627-5.373-12-12-12S6 11.373 6 18c0 2.954 1.067 5.659 2.838 7.75.357.421.993.419 1.384.028.39-.39.386-1.02.036-1.448A9.959 9.959 0 0 1 8 18c0-5.523 4.477-10 10-10s10 4.477 10 10a9.959 9.959 0 0 1-2.258 6.33c-.35.427-.354 1.058.036 1.448Z"
                                    fill="#fff"></path>
                                <path
                                    d="M12 28.395V28a6 6 0 0 1 12 0v.395A11.945 11.945 0 0 1 18 30c-2.186 0-4.235-.584-6-1.605ZM21 16.5c0-1.933-.5-3.5-3-3.5s-3 1.567-3 3.5 1.343 3.5 3 3.5 3-1.567 3-3.5Z"
                                    fill="#fff"></path>
                            </svg></div>
                        <h3 class="mt-6 text-sm font-medium text-blue-600">Contacts</h3>
                        <p class="mt-2 text-xl font-display text-slate-900">Organize all of your contacts, service
                            providers, and invoices in one place.</p>
                        <p class="mt-4 text-sm text-slate-600">This also isn’t actually a feature, it’s just some friendly
                            advice. We definitely recommend that you do this, you’ll feel really organized and professional.
                        </p>
                    </div>
                    <div class="relative pb-10 mt-10">
                        <div class="absolute bottom-0 -inset-x-4 top-8 sm:-inset-x-6 bg-slate-200"></div>
                        <div
                            class="overflow-hidden relative mx-auto bg-white rounded-xl ring-1 shadow-lg w-[52.75rem] shadow-slate-900/5 ring-slate-500/10">
                            <img alt="" loading="lazy" width="1688" height="856" decoding="async"
                                data-nimg="1" class="w-full" style="color:transparent" sizes="52.75rem"
                                srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=16&amp;q=75 16w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=32&amp;q=75 32w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=48&amp;q=75 48w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=64&amp;q=75 64w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=96&amp;q=75 96w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=128&amp;q=75 128w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=256&amp;q=75 256w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=384&amp;q=75 384w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=640&amp;q=75 640w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=750&amp;q=75 750w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=828&amp;q=75 828w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=1080&amp;q=75 1080w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=1200&amp;q=75 1200w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=1920&amp;q=75 1920w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=2048&amp;q=75 2048w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=3840&amp;q=75 3840w"
                                src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=3840&amp;q=75">
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden lg:block lg:mt-20">
                <div class="grid grid-cols-3 gap-x-8" role="tablist" aria-orientation="horizontal">
                    <div class="relative opacity-75 hover:opacity-100">
                        <div class="w-9 rounded-lg bg-slate-500"><svg aria-hidden="true" class="w-9 h-9" fill="none">
                                <defs>
                                    <linearGradient id=":Rarenla:" x1="11.5" y1="18" x2="36"
                                        y2="15.5" gradientUnits="userSpaceOnUse">
                                        <stop offset=".194" stop-color="#fff"></stop>
                                        <stop offset="1" stop-color="#6692F1"></stop>
                                    </linearGradient>
                                </defs>
                                <path d="m30 15-4 5-4-11-4 18-4-11-4 7-4-5" stroke="url(#:Rarenla:)" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg></div>
                        <h3 class="mt-6 text-sm font-medium text-slate-600"><button
                                class="ui-not-focus-visible:outline-none" id="headlessui-tabs-tab-:Rirenla:"
                                role="tab" type="button" aria-selected="false" tabindex="-1"
                                data-headlessui-state="" aria-controls="headlessui-tabs-panel-:Rbbenla:"><span
                                    class="absolute inset-0"></span>Reporting</button></h3>
                        <p class="mt-2 text-xl font-display text-slate-900">Stay on top of things with always up-to-date
                            reporting features.</p>
                        <p class="mt-4 text-sm text-slate-600">We talked about reporting in the section above but we needed
                            three items here, so mentioning it one more time for posterity.</p>
                    </div>
                    <div class="relative opacity-75 hover:opacity-100">
                        <div class="w-9 rounded-lg bg-slate-500"><svg aria-hidden="true" class="w-9 h-9" fill="none">
                                <path opacity=".5"
                                    d="M8 17a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1v-2Z"
                                    fill="#fff"></path>
                                <path opacity=".3"
                                    d="M8 24a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1v-2Z"
                                    fill="#fff"></path>
                                <path d="M8 10a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1v-2Z"
                                    fill="#fff"></path>
                            </svg></div>
                        <h3 class="mt-6 text-sm font-medium text-slate-600"><button
                                class="ui-not-focus-visible:outline-none" id="headlessui-tabs-tab-:Rkrenla:"
                                role="tab" type="button" aria-selected="false" tabindex="-1"
                                data-headlessui-state="" aria-controls="headlessui-tabs-panel-:Rjbenla:"><span
                                    class="absolute inset-0"></span>Inventory</button></h3>
                        <p class="mt-2 text-xl font-display text-slate-900">Never lose track of what’s in stock with
                            accurate inventory tracking.</p>
                        <p class="mt-4 text-sm text-slate-600">We don’t offer this as part of our software but that
                            statement is inarguably true. Accurate inventory tracking would help you for sure.</p>
                    </div>
                    <div class="relative">
                        <div class="w-9 bg-blue-600 rounded-lg"><svg aria-hidden="true" class="w-9 h-9" fill="none">
                                <path opacity=".5"
                                    d="M25.778 25.778c.39.39 1.027.393 1.384-.028A11.952 11.952 0 0 0 30 18c0-6.627-5.373-12-12-12S6 11.373 6 18c0 2.954 1.067 5.659 2.838 7.75.357.421.993.419 1.384.028.39-.39.386-1.02.036-1.448A9.959 9.959 0 0 1 8 18c0-5.523 4.477-10 10-10s10 4.477 10 10a9.959 9.959 0 0 1-2.258 6.33c-.35.427-.354 1.058.036 1.448Z"
                                    fill="#fff"></path>
                                <path
                                    d="M12 28.395V28a6 6 0 0 1 12 0v.395A11.945 11.945 0 0 1 18 30c-2.186 0-4.235-.584-6-1.605ZM21 16.5c0-1.933-.5-3.5-3-3.5s-3 1.567-3 3.5 1.343 3.5 3 3.5 3-1.567 3-3.5Z"
                                    fill="#fff"></path>
                            </svg></div>
                        <h3 class="mt-6 text-sm font-medium text-blue-600"><button
                                class="ui-not-focus-visible:outline-none" id="headlessui-tabs-tab-:Rmrenla:"
                                role="tab" type="button" aria-selected="true" tabindex="0"
                                data-headlessui-state="selected" aria-controls="headlessui-tabs-panel-:Rrbenla:"
                                data-selected=""><span class="absolute inset-0"></span>Contacts</button></h3>
                        <p class="mt-2 text-xl font-display text-slate-900">Organize all of your contacts, service
                            providers, and invoices in one place.</p>
                        <p class="mt-4 text-sm text-slate-600">This also isn’t actually a feature, it’s just some friendly
                            advice. We definitely recommend that you do this, you’ll feel really organized and professional.
                        </p>
                    </div>
                </div>
                <div class="overflow-hidden relative py-16 px-14 mt-20 xl:px-16 rounded-4xl bg-slate-200">
                    <div class="flex -mx-5">
                        <div class="px-5 opacity-60 transition duration-500 ease-in-out ui-not-focus-visible:outline-none"
                            style="transform: translateX(-200%);" aria-hidden="true" id="headlessui-tabs-panel-:Rbbenla:"
                            role="tabpanel" tabindex="-1" data-headlessui-state=""
                            aria-labelledby="headlessui-tabs-tab-:Rirenla:">
                            <div
                                class="overflow-hidden bg-white rounded-xl ring-1 shadow-lg w-[52.75rem] shadow-slate-900/5 ring-slate-500/10">
                                <img alt="" loading="lazy" width="1688" height="856" decoding="async"
                                    data-nimg="1" class="w-full" style="color:transparent" sizes="52.75rem"
                                    srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=16&amp;q=75 16w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=32&amp;q=75 32w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=48&amp;q=75 48w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=64&amp;q=75 64w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=96&amp;q=75 96w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=128&amp;q=75 128w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=256&amp;q=75 256w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=384&amp;q=75 384w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=640&amp;q=75 640w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=750&amp;q=75 750w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=828&amp;q=75 828w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=1080&amp;q=75 1080w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=1200&amp;q=75 1200w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=1920&amp;q=75 1920w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=2048&amp;q=75 2048w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=3840&amp;q=75 3840w"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprofit-loss.2a2f85d5.png&amp;w=3840&amp;q=75">
                            </div>
                        </div>
                        <div class="px-5 opacity-60 transition duration-500 ease-in-out ui-not-focus-visible:outline-none"
                            style="transform: translateX(-200%);" aria-hidden="true" id="headlessui-tabs-panel-:Rjbenla:"
                            role="tabpanel" tabindex="-1" data-headlessui-state=""
                            aria-labelledby="headlessui-tabs-tab-:Rkrenla:">
                            <div
                                class="overflow-hidden bg-white rounded-xl ring-1 shadow-lg w-[52.75rem] shadow-slate-900/5 ring-slate-500/10">
                                <img alt="" loading="lazy" width="1688" height="856" decoding="async"
                                    data-nimg="1" class="w-full" style="color:transparent" sizes="52.75rem"
                                    srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=16&amp;q=75 16w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=32&amp;q=75 32w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=48&amp;q=75 48w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=64&amp;q=75 64w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=96&amp;q=75 96w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=128&amp;q=75 128w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=256&amp;q=75 256w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=384&amp;q=75 384w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=640&amp;q=75 640w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=750&amp;q=75 750w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=828&amp;q=75 828w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=1080&amp;q=75 1080w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=1200&amp;q=75 1200w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=1920&amp;q=75 1920w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=2048&amp;q=75 2048w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=3840&amp;q=75 3840w"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=3840&amp;q=75">
                            </div>
                        </div>
                        <div class="px-5 transition duration-500 ease-in-out ui-not-focus-visible:outline-none"
                            style="transform: translateX(-200%);" aria-hidden="false"
                            id="headlessui-tabs-panel-:Rrbenla:" role="tabpanel" tabindex="0"
                            data-headlessui-state="selected" aria-labelledby="headlessui-tabs-tab-:Rmrenla:"
                            data-selected="">
                            <div
                                class="overflow-hidden bg-white rounded-xl ring-1 shadow-lg w-[52.75rem] shadow-slate-900/5 ring-slate-500/10">
                                <img alt="" loading="lazy" width="1688" height="856" decoding="async"
                                    data-nimg="1" class="w-full" style="color:transparent" sizes="52.75rem"
                                    srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=16&amp;q=75 16w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=32&amp;q=75 32w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=48&amp;q=75 48w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=64&amp;q=75 64w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=96&amp;q=75 96w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=128&amp;q=75 128w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=256&amp;q=75 256w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=384&amp;q=75 384w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=640&amp;q=75 640w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=750&amp;q=75 750w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=828&amp;q=75 828w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=1080&amp;q=75 1080w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=1200&amp;q=75 1200w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=1920&amp;q=75 1920w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=2048&amp;q=75 2048w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=3840&amp;q=75 3840w"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=3840&amp;q=75">
                            </div>
                        </div>
                    </div>
                    <div class="absolute inset-0 ring-1 ring-inset pointer-events-none rounded-4xl ring-slate-900/10">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="pricing" aria-label="Pricing" class="py-20 sm:py-32 bg-slate-900">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="md:text-center">
                <h2 class="text-3xl tracking-tight text-white sm:text-4xl font-display"><span
                        class="relative whitespace-nowrap"><svg aria-hidden="true" viewBox="0 0 281 40"
                            preserveAspectRatio="none" class="absolute left-0 top-1/2 w-full h-[1em] fill-blue-400">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M240.172 22.994c-8.007 1.246-15.477 2.23-31.26 4.114-18.506 2.21-26.323 2.977-34.487 3.386-2.971.149-3.727.324-6.566 1.523-15.124 6.388-43.775 9.404-69.425 7.31-26.207-2.14-50.986-7.103-78-15.624C10.912 20.7.988 16.143.734 14.657c-.066-.381.043-.344 1.324.456 10.423 6.506 49.649 16.322 77.8 19.468 23.708 2.65 38.249 2.95 55.821 1.156 9.407-.962 24.451-3.773 25.101-4.692.074-.104.053-.155-.058-.135-1.062.195-13.863-.271-18.848-.687-16.681-1.389-28.722-4.345-38.142-9.364-15.294-8.15-7.298-19.232 14.802-20.514 16.095-.934 32.793 1.517 47.423 6.96 13.524 5.033 17.942 12.326 11.463 18.922l-.859.874.697-.006c2.681-.026 15.304-1.302 29.208-2.953 25.845-3.07 35.659-4.519 54.027-7.978 9.863-1.858 11.021-2.048 13.055-2.145a61.901 61.901 0 0 0 4.506-.417c1.891-.259 2.151-.267 1.543-.047-.402.145-2.33.913-4.285 1.707-4.635 1.882-5.202 2.07-8.736 2.903-3.414.805-19.773 3.797-26.404 4.829Zm40.321-9.93c.1-.066.231-.085.29-.041.059.043-.024.096-.183.119-.177.024-.219-.007-.107-.079ZM172.299 26.22c9.364-6.058 5.161-12.039-12.304-17.51-11.656-3.653-23.145-5.47-35.243-5.576-22.552-.198-33.577 7.462-21.321 14.814 12.012 7.205 32.994 10.557 61.531 9.831 4.563-.116 5.372-.288 7.337-1.559Z">
                            </path>
                        </svg><span class="relative">Simple pricing,</span></span> <!-- -->for everyone.</h2>
                <p class="mt-4 text-lg text-slate-400">It doesn’t matter what size your business is, our software won’t
                    work well for you.</p>
            </div>
            <div
                class="grid grid-cols-1 gap-y-10 -mx-4 mt-16 max-w-2xl sm:mx-auto lg:grid-cols-3 lg:-mx-8 lg:max-w-none xl:gap-x-8 xl:mx-0">
                <section class="flex flex-col px-6 rounded-3xl sm:px-8 lg:py-8">
                    <h3 class="mt-5 text-lg text-white font-display">Starter</h3>
                    <p class="mt-2 text-base text-slate-400">Good for anyone who is self-employed and just getting
                        started.</p>
                    <p class="order-first text-5xl font-light tracking-tight text-white font-display">$9</p>
                    <ul role="list" class="flex flex-col order-last gap-y-3 mt-10 text-sm text-slate-200">
                        <li class="flex"><svg aria-hidden="true"
                                class="flex-none w-6 h-6 fill-current stroke-current text-slate-400">
                                <path
                                    d="M9.307 12.248a.75.75 0 1 0-1.114 1.004l1.114-1.004ZM11 15.25l-.557.502a.75.75 0 0 0 1.15-.043L11 15.25Zm4.844-5.041a.75.75 0 0 0-1.188-.918l1.188.918Zm-7.651 3.043 2.25 2.5 1.114-1.004-2.25-2.5-1.114 1.004Zm3.4 2.457 4.25-5.5-1.187-.918-4.25 5.5 1.188.918Z"
                                    stroke-width="0"></path>
                                <circle cx="12" cy="12" r="8.25" fill="none" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></circle>
                            </svg><span class="ml-4">Send 10 quotes and invoices</span></li>
                        <li class="flex"><svg aria-hidden="true"
                                class="flex-none w-6 h-6 fill-current stroke-current text-slate-400">
                                <path
                                    d="M9.307 12.248a.75.75 0 1 0-1.114 1.004l1.114-1.004ZM11 15.25l-.557.502a.75.75 0 0 0 1.15-.043L11 15.25Zm4.844-5.041a.75.75 0 0 0-1.188-.918l1.188.918Zm-7.651 3.043 2.25 2.5 1.114-1.004-2.25-2.5-1.114 1.004Zm3.4 2.457 4.25-5.5-1.187-.918-4.25 5.5 1.188.918Z"
                                    stroke-width="0"></path>
                                <circle cx="12" cy="12" r="8.25" fill="none" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></circle>
                            </svg><span class="ml-4">Connect up to 2 bank accounts</span></li>
                        <li class="flex"><svg aria-hidden="true"
                                class="flex-none w-6 h-6 fill-current stroke-current text-slate-400">
                                <path
                                    d="M9.307 12.248a.75.75 0 1 0-1.114 1.004l1.114-1.004ZM11 15.25l-.557.502a.75.75 0 0 0 1.15-.043L11 15.25Zm4.844-5.041a.75.75 0 0 0-1.188-.918l1.188.918Zm-7.651 3.043 2.25 2.5 1.114-1.004-2.25-2.5-1.114 1.004Zm3.4 2.457 4.25-5.5-1.187-.918-4.25 5.5 1.188.918Z"
                                    stroke-width="0"></path>
                                <circle cx="12" cy="12" r="8.25" fill="none" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></circle>
                            </svg><span class="ml-4">Track up to 15 expenses per month</span></li>
                        <li class="flex"><svg aria-hidden="true"
                                class="flex-none w-6 h-6 fill-current stroke-current text-slate-400">
                                <path
                                    d="M9.307 12.248a.75.75 0 1 0-1.114 1.004l1.114-1.004ZM11 15.25l-.557.502a.75.75 0 0 0 1.15-.043L11 15.25Zm4.844-5.041a.75.75 0 0 0-1.188-.918l1.188.918Zm-7.651 3.043 2.25 2.5 1.114-1.004-2.25-2.5-1.114 1.004Zm3.4 2.457 4.25-5.5-1.187-.918-4.25 5.5 1.188.918Z"
                                    stroke-width="0"></path>
                                <circle cx="12" cy="12" r="8.25" fill="none" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></circle>
                            </svg><span class="ml-4">Manual payroll support</span></li>
                        <li class="flex"><svg aria-hidden="true"
                                class="flex-none w-6 h-6 fill-current stroke-current text-slate-400">
                                <path
                                    d="M9.307 12.248a.75.75 0 1 0-1.114 1.004l1.114-1.004ZM11 15.25l-.557.502a.75.75 0 0 0 1.15-.043L11 15.25Zm4.844-5.041a.75.75 0 0 0-1.188-.918l1.188.918Zm-7.651 3.043 2.25 2.5 1.114-1.004-2.25-2.5-1.114 1.004Zm3.4 2.457 4.25-5.5-1.187-.918-4.25 5.5 1.188.918Z"
                                    stroke-width="0"></path>
                                <circle cx="12" cy="12" r="8.25" fill="none" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></circle>
                            </svg><span class="ml-4">Export up to 3 reports</span></li>
                    </ul><a
                        class="inline-flex justify-center items-center py-2 px-4 mt-8 text-sm text-white rounded-full ring-1 focus:outline-none focus-visible:outline-white group ring-slate-700 hover:ring-slate-500 active:ring-slate-700 active:text-slate-400"
                        variant="outline" color="white" aria-label="Get started with the Starter plan for $9"
                        href="/register">Get started</a>
                </section>
                <section class="flex flex-col order-first py-8 px-6 bg-blue-600 rounded-3xl sm:px-8 lg:order-none">
                    <h3 class="mt-5 text-lg text-white font-display">Small business</h3>
                    <p class="mt-2 text-base text-white">Perfect for small / medium sized businesses.</p>
                    <p class="order-first text-5xl font-light tracking-tight text-white font-display">$15</p>
                    <ul role="list" class="flex flex-col order-last gap-y-3 mt-10 text-sm text-white">
                        <li class="flex"><svg aria-hidden="true"
                                class="flex-none w-6 h-6 text-white fill-current stroke-current">
                                <path
                                    d="M9.307 12.248a.75.75 0 1 0-1.114 1.004l1.114-1.004ZM11 15.25l-.557.502a.75.75 0 0 0 1.15-.043L11 15.25Zm4.844-5.041a.75.75 0 0 0-1.188-.918l1.188.918Zm-7.651 3.043 2.25 2.5 1.114-1.004-2.25-2.5-1.114 1.004Zm3.4 2.457 4.25-5.5-1.187-.918-4.25 5.5 1.188.918Z"
                                    stroke-width="0"></path>
                                <circle cx="12" cy="12" r="8.25" fill="none" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></circle>
                            </svg><span class="ml-4">Send 25 quotes and invoices</span></li>
                        <li class="flex"><svg aria-hidden="true"
                                class="flex-none w-6 h-6 text-white fill-current stroke-current">
                                <path
                                    d="M9.307 12.248a.75.75 0 1 0-1.114 1.004l1.114-1.004ZM11 15.25l-.557.502a.75.75 0 0 0 1.15-.043L11 15.25Zm4.844-5.041a.75.75 0 0 0-1.188-.918l1.188.918Zm-7.651 3.043 2.25 2.5 1.114-1.004-2.25-2.5-1.114 1.004Zm3.4 2.457 4.25-5.5-1.187-.918-4.25 5.5 1.188.918Z"
                                    stroke-width="0"></path>
                                <circle cx="12" cy="12" r="8.25" fill="none" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></circle>
                            </svg><span class="ml-4">Connect up to 5 bank accounts</span></li>
                        <li class="flex"><svg aria-hidden="true"
                                class="flex-none w-6 h-6 text-white fill-current stroke-current">
                                <path
                                    d="M9.307 12.248a.75.75 0 1 0-1.114 1.004l1.114-1.004ZM11 15.25l-.557.502a.75.75 0 0 0 1.15-.043L11 15.25Zm4.844-5.041a.75.75 0 0 0-1.188-.918l1.188.918Zm-7.651 3.043 2.25 2.5 1.114-1.004-2.25-2.5-1.114 1.004Zm3.4 2.457 4.25-5.5-1.187-.918-4.25 5.5 1.188.918Z"
                                    stroke-width="0"></path>
                                <circle cx="12" cy="12" r="8.25" fill="none" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></circle>
                            </svg><span class="ml-4">Track up to 50 expenses per month</span></li>
                        <li class="flex"><svg aria-hidden="true"
                                class="flex-none w-6 h-6 text-white fill-current stroke-current">
                                <path
                                    d="M9.307 12.248a.75.75 0 1 0-1.114 1.004l1.114-1.004ZM11 15.25l-.557.502a.75.75 0 0 0 1.15-.043L11 15.25Zm4.844-5.041a.75.75 0 0 0-1.188-.918l1.188.918Zm-7.651 3.043 2.25 2.5 1.114-1.004-2.25-2.5-1.114 1.004Zm3.4 2.457 4.25-5.5-1.187-.918-4.25 5.5 1.188.918Z"
                                    stroke-width="0"></path>
                                <circle cx="12" cy="12" r="8.25" fill="none" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></circle>
                            </svg><span class="ml-4">Automated payroll support</span></li>
                        <li class="flex"><svg aria-hidden="true"
                                class="flex-none w-6 h-6 text-white fill-current stroke-current">
                                <path
                                    d="M9.307 12.248a.75.75 0 1 0-1.114 1.004l1.114-1.004ZM11 15.25l-.557.502a.75.75 0 0 0 1.15-.043L11 15.25Zm4.844-5.041a.75.75 0 0 0-1.188-.918l1.188.918Zm-7.651 3.043 2.25 2.5 1.114-1.004-2.25-2.5-1.114 1.004Zm3.4 2.457 4.25-5.5-1.187-.918-4.25 5.5 1.188.918Z"
                                    stroke-width="0"></path>
                                <circle cx="12" cy="12" r="8.25" fill="none" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></circle>
                            </svg><span class="ml-4">Export up to 12 reports</span></li>
                        <li class="flex"><svg aria-hidden="true"
                                class="flex-none w-6 h-6 text-white fill-current stroke-current">
                                <path
                                    d="M9.307 12.248a.75.75 0 1 0-1.114 1.004l1.114-1.004ZM11 15.25l-.557.502a.75.75 0 0 0 1.15-.043L11 15.25Zm4.844-5.041a.75.75 0 0 0-1.188-.918l1.188.918Zm-7.651 3.043 2.25 2.5 1.114-1.004-2.25-2.5-1.114 1.004Zm3.4 2.457 4.25-5.5-1.187-.918-4.25 5.5 1.188.918Z"
                                    stroke-width="0"></path>
                                <circle cx="12" cy="12" r="8.25" fill="none" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></circle>
                            </svg><span class="ml-4">Bulk reconcile transactions</span></li>
                        <li class="flex"><svg aria-hidden="true"
                                class="flex-none w-6 h-6 text-white fill-current stroke-current">
                                <path
                                    d="M9.307 12.248a.75.75 0 1 0-1.114 1.004l1.114-1.004ZM11 15.25l-.557.502a.75.75 0 0 0 1.15-.043L11 15.25Zm4.844-5.041a.75.75 0 0 0-1.188-.918l1.188.918Zm-7.651 3.043 2.25 2.5 1.114-1.004-2.25-2.5-1.114 1.004Zm3.4 2.457 4.25-5.5-1.187-.918-4.25 5.5 1.188.918Z"
                                    stroke-width="0"></path>
                                <circle cx="12" cy="12" r="8.25" fill="none" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></circle>
                            </svg><span class="ml-4">Track in multiple currencies</span></li>
                    </ul><a
                        class="inline-flex justify-center items-center py-2 px-4 mt-8 text-sm font-semibold bg-white rounded-full hover:bg-blue-50 focus:outline-none focus-visible:outline-white active:bg-blue-200 group text-slate-900 focus-visible:outline-2 focus-visible:outline-offset-2 active:text-slate-600"
                        variant="solid" color="white" aria-label="Get started with the Small business plan for $15"
                        href="/register">Get started</a>
                </section>
                <section class="flex flex-col px-6 rounded-3xl sm:px-8 lg:py-8">
                    <h3 class="mt-5 text-lg text-white font-display">Enterprise</h3>
                    <p class="mt-2 text-base text-slate-400">For even the biggest enterprise companies.</p>
                    <p class="order-first text-5xl font-light tracking-tight text-white font-display">$39</p>
                    <ul role="list" class="flex flex-col order-last gap-y-3 mt-10 text-sm text-slate-200">
                        <li class="flex"><svg aria-hidden="true"
                                class="flex-none w-6 h-6 fill-current stroke-current text-slate-400">
                                <path
                                    d="M9.307 12.248a.75.75 0 1 0-1.114 1.004l1.114-1.004ZM11 15.25l-.557.502a.75.75 0 0 0 1.15-.043L11 15.25Zm4.844-5.041a.75.75 0 0 0-1.188-.918l1.188.918Zm-7.651 3.043 2.25 2.5 1.114-1.004-2.25-2.5-1.114 1.004Zm3.4 2.457 4.25-5.5-1.187-.918-4.25 5.5 1.188.918Z"
                                    stroke-width="0"></path>
                                <circle cx="12" cy="12" r="8.25" fill="none" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></circle>
                            </svg><span class="ml-4">Send unlimited quotes and invoices</span></li>
                        <li class="flex"><svg aria-hidden="true"
                                class="flex-none w-6 h-6 fill-current stroke-current text-slate-400">
                                <path
                                    d="M9.307 12.248a.75.75 0 1 0-1.114 1.004l1.114-1.004ZM11 15.25l-.557.502a.75.75 0 0 0 1.15-.043L11 15.25Zm4.844-5.041a.75.75 0 0 0-1.188-.918l1.188.918Zm-7.651 3.043 2.25 2.5 1.114-1.004-2.25-2.5-1.114 1.004Zm3.4 2.457 4.25-5.5-1.187-.918-4.25 5.5 1.188.918Z"
                                    stroke-width="0"></path>
                                <circle cx="12" cy="12" r="8.25" fill="none" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></circle>
                            </svg><span class="ml-4">Connect up to 15 bank accounts</span></li>
                        <li class="flex"><svg aria-hidden="true"
                                class="flex-none w-6 h-6 fill-current stroke-current text-slate-400">
                                <path
                                    d="M9.307 12.248a.75.75 0 1 0-1.114 1.004l1.114-1.004ZM11 15.25l-.557.502a.75.75 0 0 0 1.15-.043L11 15.25Zm4.844-5.041a.75.75 0 0 0-1.188-.918l1.188.918Zm-7.651 3.043 2.25 2.5 1.114-1.004-2.25-2.5-1.114 1.004Zm3.4 2.457 4.25-5.5-1.187-.918-4.25 5.5 1.188.918Z"
                                    stroke-width="0"></path>
                                <circle cx="12" cy="12" r="8.25" fill="none" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></circle>
                            </svg><span class="ml-4">Track up to 200 expenses per month</span></li>
                        <li class="flex"><svg aria-hidden="true"
                                class="flex-none w-6 h-6 fill-current stroke-current text-slate-400">
                                <path
                                    d="M9.307 12.248a.75.75 0 1 0-1.114 1.004l1.114-1.004ZM11 15.25l-.557.502a.75.75 0 0 0 1.15-.043L11 15.25Zm4.844-5.041a.75.75 0 0 0-1.188-.918l1.188.918Zm-7.651 3.043 2.25 2.5 1.114-1.004-2.25-2.5-1.114 1.004Zm3.4 2.457 4.25-5.5-1.187-.918-4.25 5.5 1.188.918Z"
                                    stroke-width="0"></path>
                                <circle cx="12" cy="12" r="8.25" fill="none" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></circle>
                            </svg><span class="ml-4">Automated payroll support</span></li>
                        <li class="flex"><svg aria-hidden="true"
                                class="flex-none w-6 h-6 fill-current stroke-current text-slate-400">
                                <path
                                    d="M9.307 12.248a.75.75 0 1 0-1.114 1.004l1.114-1.004ZM11 15.25l-.557.502a.75.75 0 0 0 1.15-.043L11 15.25Zm4.844-5.041a.75.75 0 0 0-1.188-.918l1.188.918Zm-7.651 3.043 2.25 2.5 1.114-1.004-2.25-2.5-1.114 1.004Zm3.4 2.457 4.25-5.5-1.187-.918-4.25 5.5 1.188.918Z"
                                    stroke-width="0"></path>
                                <circle cx="12" cy="12" r="8.25" fill="none" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></circle>
                            </svg><span class="ml-4">Export up to 25 reports, including TPS</span></li>
                    </ul><a
                        class="inline-flex justify-center items-center py-2 px-4 mt-8 text-sm text-white rounded-full ring-1 focus:outline-none focus-visible:outline-white group ring-slate-700 hover:ring-slate-500 active:ring-slate-700 active:text-slate-400"
                        variant="outline" color="white" aria-label="Get started with the Enterprise plan for $39"
                        href="/register">Get started</a>
                </section>
            </div>
        </div>
    </section>
    <!-- FAQ -->
    <div class="py-10 px-4 mx-auto sm:px-6 lg:py-14 lg:px-8 max-w-[85rem]">
        <!-- Title -->
        <div class="mx-auto mb-10 max-w-2xl lg:mb-14">
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">You might be wondering...</h2>
        </div>
        <!-- End Title -->

        <div class="mx-auto max-w-2xl divide-y divide-gray-200 dark:divide-neutral-700">
            <div class="py-8 first:pt-0 last:pb-0">
                <div class="flex gap-x-5">
                    <svg class="flex-shrink-0 mt-1 text-gray-500 size-6 dark:text-neutral-500"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                        <path d="M12 17h.01" />
                    </svg>

                    <div>
                        <h3 class="font-semibold text-gray-800 md:text-lg dark:text-neutral-200">
                            Can I cancel at anytime?
                        </h3>
                        <p class="mt-1 text-gray-500 dark:text-neutral-500">
                            Yes, you can cancel anytime no questions are asked while you cancel but we would highly
                            appreciate if you will give us some feedback.
                        </p>
                    </div>
                </div>
            </div>

            <div class="py-8 first:pt-0 last:pb-0">
                <div class="flex gap-x-5">
                    <svg class="flex-shrink-0 mt-1 text-gray-500 size-6 dark:text-neutral-500"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                        <path d="M12 17h.01" />
                    </svg>

                    <div>
                        <h3 class="font-semibold text-gray-800 md:text-lg dark:text-neutral-200">
                            My team has credits. How do we use them?
                        </h3>
                        <p class="mt-1 text-gray-500 dark:text-neutral-500">
                            Once your team signs up for a subscription plan. This is where we sit down, grab a cup of coffee
                            and dial in the details.
                        </p>
                    </div>
                </div>
            </div>

            <div class="py-8 first:pt-0 last:pb-0">
                <div class="flex gap-x-5">
                    <svg class="flex-shrink-0 mt-1 text-gray-500 size-6 dark:text-neutral-500"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                        <path d="M12 17h.01" />
                    </svg>

                    <div>
                        <h3 class="font-semibold text-gray-800 md:text-lg dark:text-neutral-200">
                            How does Preline's pricing work?
                        </h3>
                        <p class="mt-1 text-gray-500 dark:text-neutral-500">
                            Our subscriptions are tiered. Understanding the task at hand and ironing out the wrinkles is
                            key.
                        </p>
                    </div>
                </div>
            </div>

            <div class="py-8 first:pt-0 last:pb-0">
                <div class="flex gap-x-5">
                    <svg class="flex-shrink-0 mt-1 text-gray-500 size-6 dark:text-neutral-500"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                        <path d="M12 17h.01" />
                    </svg>

                    <div>
                        <h3 class="font-semibold text-gray-800 md:text-lg dark:text-neutral-200">
                            How secure is Preline?
                        </h3>
                        <p class="mt-1 text-gray-500 dark:text-neutral-500">
                            Protecting the data you trust to Preline is our first priority. This part is really crucial in
                            keeping the project in line to completion.
                        </p>
                    </div>
                </div>
            </div>

            <div class="py-8 first:pt-0 last:pb-0">
                <div class="flex gap-x-5">
                    <svg class="flex-shrink-0 mt-1 text-gray-500 size-6 dark:text-neutral-500"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                        <path d="M12 17h.01" />
                    </svg>

                    <div>
                        <h3 class="font-semibold text-gray-800 md:text-lg dark:text-neutral-200">
                            How do I get access to a theme I purchased?
                        </h3>
                        <p class="mt-1 text-gray-500 dark:text-neutral-500">
                            If you lose the link for a theme you purchased, don't panic! We've got you covered. You can
                            login to your account, tap your avatar in the upper right corner, and tap Purchases. If you
                            didn't create a login or can't remember the information, you can use our handy Redownload page,
                            just remember to use the same email you originally made your purchases with.
                        </p>
                    </div>
                </div>
            </div>

            <div class="py-8 first:pt-0 last:pb-0">
                <div class="flex gap-x-5">
                    <svg class="flex-shrink-0 mt-1 text-gray-500 size-6 dark:text-neutral-500"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                        <path d="M12 17h.01" />
                    </svg>

                    <div>
                        <h3 class="font-semibold text-gray-800 md:text-lg dark:text-neutral-200">
                            Upgrade License Type
                        </h3>
                        <p class="mt-1 text-gray-500 dark:text-neutral-500">
                            There may be times when you need to upgrade your license from the original type you purchased
                            and we have a solution that ensures you can apply your original purchase cost to the new license
                            purchase.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ====== Contact Start ====== -->
    <section id="contact" class="relative py-20 md:py-[120px]">
        <div class="absolute top-0 left-0 w-full h-full -z-[1] dark:bg-dark"></div>
        <div class="absolute left-0 top-0 -z-[1] h-1/2 w-full bg-[#E9F9FF] dark:bg-dark-700 lg:h-[45%] xl:h-1/2"></div>
        <div class="container px-4 mx-auto">
            <div class="flex flex-wrap items-center -mx-4">
                <div class="px-4 w-full lg:w-7/12 xl:w-8/12">
                    <div class="ud-contact-content-wrapper">
                        <div class="mb-12 ud-contact-title lg:mb-[150px]">
                            <span class="block mb-6 text-base font-medium dark:text-white text-dark">
                                CONTACT US
                            </span>
                            <h2 class="font-semibold dark:text-white max-w-[260px] text-[35px] leading-[1.14] text-dark">
                                Let's talk about your problem.
                            </h2>
                        </div>
                        <div class="flex flex-wrap justify-between mb-12 lg:mb-0">
                            <div class="flex mb-8 max-w-full w-[330px]">
                                <div class="mr-6 text-blue-600 text-[32px]">
                                    <svg width="29" height="35" viewBox="0 0 29 35" class="fill-current">
                                        <path
                                            d="M14.5 0.710938C6.89844 0.710938 0.664062 6.72656 0.664062 14.0547C0.664062 19.9062 9.03125 29.5859 12.6406 33.5234C13.1328 34.0703 13.7891 34.3437 14.5 34.3437C15.2109 34.3437 15.8672 34.0703 16.3594 33.5234C19.9688 29.6406 28.3359 19.9062 28.3359 14.0547C28.3359 6.67188 22.1016 0.710938 14.5 0.710938ZM14.9375 32.2109C14.6641 32.4844 14.2812 32.4844 14.0625 32.2109C11.3828 29.3125 2.57812 19.3594 2.57812 14.0547C2.57812 7.71094 7.9375 2.625 14.5 2.625C21.0625 2.625 26.4219 7.76562 26.4219 14.0547C26.4219 19.3594 17.6172 29.2578 14.9375 32.2109Z" />
                                        <path
                                            d="M14.5 8.58594C11.2734 8.58594 8.59375 11.2109 8.59375 14.4922C8.59375 17.7188 11.2187 20.3984 14.5 20.3984C17.7812 20.3984 20.4062 17.7734 20.4062 14.4922C20.4062 11.2109 17.7266 8.58594 14.5 8.58594ZM14.5 18.4297C12.3125 18.4297 10.5078 16.625 10.5078 14.4375C10.5078 12.25 12.3125 10.4453 14.5 10.4453C16.6875 10.4453 18.4922 12.25 18.4922 14.4375C18.4922 16.625 16.6875 18.4297 14.5 18.4297Z" />
                                    </svg>
                                </div>
                                <div>
                                    <h5 class="text-lg font-semibold dark:text-white mb-[18px] text-dark">
                                        Our Location
                                    </h5>
                                    <p class="text-base text-gray-600 dark:text-dark-6">
                                        401 Broadway, 24th Floor, Orchard Cloud View, London
                                    </p>
                                </div>
                            </div>
                            <div class="flex mb-8 max-w-full w-[330px]">
                                <div class="mr-6 text-blue-600 text-[32px]">
                                    <svg width="34" height="25" viewBox="0 0 34 25" class="fill-current">
                                        <path
                                            d="M30.5156 0.960938H3.17188C1.42188 0.960938 0 2.38281 0 4.13281V20.9219C0 22.6719 1.42188 24.0938 3.17188 24.0938H30.5156C32.2656 24.0938 33.6875 22.6719 33.6875 20.9219V4.13281C33.6875 2.38281 32.2656 0.960938 30.5156 0.960938ZM30.5156 2.875C30.7891 2.875 31.0078 2.92969 31.2266 3.09375L17.6094 11.3516C17.1172 11.625 16.5703 11.625 16.0781 11.3516L2.46094 3.09375C2.67969 2.98438 2.89844 2.875 3.17188 2.875H30.5156ZM30.5156 22.125H3.17188C2.51562 22.125 1.91406 21.5781 1.91406 20.8672V5.00781L15.0391 12.9922C15.5859 13.3203 16.1875 13.4844 16.7891 13.4844C17.3906 13.4844 17.9922 13.3203 18.5391 12.9922L31.6641 5.00781V20.8672C31.7734 21.5781 31.1719 22.125 30.5156 22.125Z" />
                                    </svg>
                                </div>
                                <div>
                                    <h5 class="text-lg font-semibold dark:text-white mb-[18px] text-dark">
                                        How Can We Help?
                                    </h5>
                                    <p class="text-base text-gray-600 dark:text-dark-6">
                                        info@yourdomain.com
                                    </p>
                                    <p class="mt-1 text-base text-gray-600 dark:text-dark-6">
                                        contact@yourdomain.com
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-4 w-full lg:w-5/12 xl:w-4/12">
                    <div class="py-10 px-8 bg-white rounded-lg shadow sm:py-12 sm:px-10 lg:p-10 lg:py-12 lg:px-10 dark:shadow-none wow fadeInUp md:p-[60px] 2xl:p-[60px] dark:bg-dark-2"
                        data-wow-delay=".2s
              ">
                        <h3
                            class="mb-8 text-2xl font-semibold dark:text-white text-dark md:text-[28px] md:leading-[1.42]">
                            Send us a Message
                        </h3>
                        <form>
                            <div class="mb-[22px]">
                                <label for="fullName" class="block mb-4 text-sm text-gray-600 dark:text-dark-6">Full
                                    Name*</label>
                                <input type="text" name="fullName" placeholder="Adam Gelius"
                                    class="w-full border-0 border-b border-[#f1f1f1] bg-transparent pb-3 text-gray-600 placeholder:text-gray-600/60 focus:border-blue-600 focus:outline-none dark:border-dark-3 dark:text-dark-6" />
                            </div>
                            <div class="mb-[22px]">
                                <label for="email"
                                    class="block mb-4 text-sm text-gray-600 dark:text-dark-6">Email*</label>
                                <input type="email" name="email" placeholder="example@yourmail.com"
                                    class="w-full border-0 border-b border-[#f1f1f1] bg-transparent pb-3 text-gray-600 placeholder:text-gray-600/60 focus:border-blue-600 focus:outline-none dark:border-dark-3 dark:text-dark-6" />
                            </div>
                            <div class="mb-[22px]">
                                <label for="phone"
                                    class="block mb-4 text-sm text-gray-600 dark:text-dark-6">Phone*</label>
                                <input type="text" name="phone" placeholder="+885 1254 5211 552"
                                    class="w-full border-0 border-b border-[#f1f1f1] bg-transparent pb-3 text-gray-600 placeholder:text-gray-600/60 focus:border-blue-600 focus:outline-none dark:border-dark-3 dark:text-dark-6" />
                            </div>
                            <div class="mb-[30px]">
                                <label for="message"
                                    class="block mb-4 text-sm text-gray-600 dark:text-dark-6">Message*</label>
                                <textarea name="message" rows="1" placeholder="type your message here"
                                    class="w-full resize-none border-0 border-b border-[#f1f1f1] bg-transparent pb-3 text-gray-600 placeholder:text-gray-600/60 focus:border-blue-600 focus:outline-none dark:border-dark-3 dark:text-dark-6"></textarea>
                            </div>
                            <div class="mb-0">
                                <button type="submit"
                                    class="inline-flex justify-center items-center py-3 px-10 text-base font-medium text-white bg-blue-600 rounded-md transition duration-300 ease-in-out hover:bg-blue-dark">
                                    Send
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Contact End ====== -->
@endsection
