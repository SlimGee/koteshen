@extends('layouts.app')

@section('content')
    <div id="home" class="overflow-hidden relative bg-slate-900 pt-[120px] md:pt-[130px] lg:pt-[160px]">
        <div class="container mx-auto">
            <div class="flex flex-wrap items-center md:-mx-4">
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
                                    Start 15 day trial, no credit required
                                </a>
                            </li>
                            <li>
                                <a href="/demo" target="_blank"
                                    class="flex gap-4 items-center px-6 text-base font-medium text-white rounded-md transition duration-300 ease-in-out hover:bg-white bg-white/[0.12] py-[14px] hover:text-slate-900 hover:text-dark">
                                    <i class="bi bi-play-circle-fill"></i>
                                    Watch demo
                                </a>
                            </li>
                            <p class="font-medium text-green-600">
                                We're offering 50% off on all plans to the first 100 customers — {{ 100 - $count }}
                                remaining
                            </p>
                        </ul>
                    </div>
                </div>

                <div class="px-4 w-full">
                    <div class="relative z-10 mx-auto wow fadeInUp max-w-[845px]" data-wow-delay=".25s">
                        <div class="mt-16">
                            <img src="{{ asset('assets/images/hero/hero-image.png') }}" alt="hero"
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
        class="overflow-hidden overflow-x-hidden relative pt-20 pb-28 sm:py-32 bg-blue-accent-700">
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
                class="grid grid-cols-1 gap-y-2 items-center pt-10 mt-16 w-full sm:gap-y-6 md:mt-20 lg:grid-cols-12 lg:pt-0">
                <div class="flex pb-4 -mx-4 sm:pb-0 sm:mx-0 lg:col-span-5">
                    <div
                        class="flex overflow-x-scroll relative z-10 gap-x-4 py-5 px-4 whitespace-nowrap sm:px-0 sm:mx-auto lg:block lg:gap-x-0 lg:gap-y-1 lg:mx-0 lg:whitespace-normal">

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


    <section id="secondary-features" class="pt-20 pb-14 w-full sm:pt-32 sm:pb-20 lg:pb-32">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl md:text-center">
                <h2 class="text-3xl tracking-tight sm:text-4xl font-display text-slate-900">
                    Better business starts with better tools
                </h2>
                <p class="mt-4 text-lg tracking-tight text-slate-700">
                    The secret is simplicity. We've designed our software to be as easy to use as possible, so you can focus
                    on your business instead of administrative tasks.
                </p>
            </div>
            <div class="flex flex-col gap-y-10 px-4 -mx-4 mt-20 sm:px-6 sm:-mx-6 lg:hidden">
                <div>
                    <div class="mx-auto max-w-2xl">
                        <div class="">
                            <div class="inline-block p-3 bg-blue-600 rounded-lg">
                                <i class="text-white bi bi-arrow-repeat"></i>
                            </div>
                        </div>
                        <h3 class="mt-6 text-sm font-medium text-slate-600">
                            <button class="ui-not-focus-visible:outline-none" data-tabs-target="tab"
                                data-action="click->tabs#change">
                                <span class="absolute inset-0"></span>
                                Recurring invoices
                            </button>
                        </h3>
                        <p class="mt-2 text-xl font-display text-slate-900">
                            Save time by automatically billing long-term clients with recurring invoices
                        </p>
                        <p class="mt-4 text-sm text-slate-600">
                            You could do this manually, but why would you? It’s so much easier to just have it done for you.
                        </p>
                    </div>

                </div>
                <div>
                    <div class="">
                        <div class="inline-block p-3 bg-blue-600 rounded-lg">
                            <i class="text-white bi bi-arrow-up-right-circle-fill"></i>
                        </div>
                    </div>
                    <h3 class="mt-6 text-sm font-medium text-slate-600">
                        <button class="ui-not-focus-visible:outline-none" data-tabs-target="tab"
                            data-action="click->tabs#change">
                            <span class="absolute inset-0"></span>
                            Automated workflows
                        </button>
                    </h3>
                    <p class="mt-2 text-xl font-display text-slate-900">
                        Automatically convert accepted estimates into payable invoices
                    </p>
                    <p class="mt-4 text-sm text-slate-600">
                        Like we said, it's about keeping the boring mundane tasks on autopilot, and you don't even need
                        a GPT to do it
                    </p>
                </div>

                <div>
                    <div class="mx-auto max-w-2xl">
                        <div class="">
                            <div class="inline-block p-3 bg-blue-600 rounded-lg">
                                <i class="text-white bi bi-bell-fill"></i>
                            </div>
                        </div>
                        <h3 class="mt-6 text-sm font-medium">
                            <button class="ui-not-focus-visible:outline-none" data-tabs-target="tab"
                                data-action="click->tabs#change">
                                <span class="absolute inset-0"></span>
                                Alerts and notifications
                            </button>
                        </h3>
                        <p class="mt-2 text-xl font-display text-slate-900">
                            Get notified when your clients, opens, views, pays or ignores your invoice
                        </p>
                        <p class="mt-4 text-sm text-slate-600">
                            Certainty is key when you’re running a business, so we’ll make sure you know exactly what’s
                            going on
                        </p>
                    </div>

                </div>
            </div>

        </div>

        <div class="container hidden mx-auto lg:flex lg:px-12 lg:mt-20" data-controller="tabs"
            data-tabs-active-tab-class="-mb-px rounded-t border-t border-r border-l">
            <div class="grid grid-cols-3 gap-x-8" role="tablist" aria-orientation="horizontal">
                <div class="relative opacity-75 hover:opacity-100">
                    <div class="">
                        <div class="inline-block p-3 bg-blue-600 rounded-lg">
                            <i class="text-white bi bi-arrow-repeat"></i>
                        </div>
                    </div>
                    <h3 class="mt-6 text-sm font-medium text-slate-600">
                        <button class="ui-not-focus-visible:outline-none" data-tabs-target="tab"
                            data-action="click->tabs#change">
                            <span class="absolute inset-0"></span>
                            Recurring invoices
                        </button>
                    </h3>
                    <p class="mt-2 text-xl font-display text-slate-900">
                        Save time by automatically billing long-term clients with recurring invoices
                    </p>
                    <p class="mt-4 text-sm text-slate-600">
                        You could do this manually, but why would you? It’s so much easier to just have it done for you.
                    </p>
                </div>
                <div class="relative opacity-75 hover:opacity-100">
                    <div class="">
                        <div class="inline-block p-3 bg-blue-600 rounded-lg">
                            <i class="text-white bi bi-arrow-up-right-circle-fill"></i>
                        </div>
                    </div>
                    <h3 class="mt-6 text-sm font-medium text-slate-600">
                        <button class="ui-not-focus-visible:outline-none" data-tabs-target="tab"
                            data-action="click->tabs#change">
                            <span class="absolute inset-0"></span>
                            Automated workflows
                        </button>
                    </h3>
                    <p class="mt-2 text-xl font-display text-slate-900">
                        Automatically convert accepted estimates into payable invoices
                    </p>
                    <p class="mt-4 text-sm text-slate-600">
                        Like we said, it's about keeping the boring mundane tasks on autopilot, and you don't even need
                        a GPT to do it
                    </p>
                </div>
                <div class="relative">
                    <div class="">
                        <div class="inline-block p-3 bg-blue-600 rounded-lg">
                            <i class="text-white bi bi-bell-fill"></i>
                        </div>
                    </div>
                    <h3 class="mt-6 text-sm font-medium">
                        <button class="ui-not-focus-visible:outline-none" data-tabs-target="tab"
                            data-action="click->tabs#change">
                            <span class="absolute inset-0"></span>
                            Alerts and notifications
                        </button>
                    </h3>
                    <p class="mt-2 text-xl font-display text-slate-900">
                        Get notified when your clients, opens, views, pays or ignores your invoice
                    </p>
                    <p class="mt-4 text-sm text-slate-600">
                        Certainty is key when you’re running a business, so we’ll make sure you know exactly what’s
                        going on
                    </p>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section id="pricing" aria-label="Pricing" class="py-20 sm:py-32 bg-slate-900">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="md:text-center">
                <h2 class="text-3xl tracking-tight text-white sm:text-4xl font-display">
                    <span class="relative whitespace-nowrap">
                        <svg aria-hidden="true" viewBox="0 0 281 40" preserveAspectRatio="none"
                            class="absolute left-0 top-1/2 w-full h-[1em] fill-blue-400">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M240.172 22.994c-8.007 1.246-15.477 2.23-31.26 4.114-18.506 2.21-26.323 2.977-34.487 3.386-2.971.149-3.727.324-6.566 1.523-15.124 6.388-43.775 9.404-69.425 7.31-26.207-2.14-50.986-7.103-78-15.624C10.912 20.7.988 16.143.734 14.657c-.066-.381.043-.344 1.324.456 10.423 6.506 49.649 16.322 77.8 19.468 23.708 2.65 38.249 2.95 55.821 1.156 9.407-.962 24.451-3.773 25.101-4.692.074-.104.053-.155-.058-.135-1.062.195-13.863-.271-18.848-.687-16.681-1.389-28.722-4.345-38.142-9.364-15.294-8.15-7.298-19.232 14.802-20.514 16.095-.934 32.793 1.517 47.423 6.96 13.524 5.033 17.942 12.326 11.463 18.922l-.859.874.697-.006c2.681-.026 15.304-1.302 29.208-2.953 25.845-3.07 35.659-4.519 54.027-7.978 9.863-1.858 11.021-2.048 13.055-2.145a61.901 61.901 0 0 0 4.506-.417c1.891-.259 2.151-.267 1.543-.047-.402.145-2.33.913-4.285 1.707-4.635 1.882-5.202 2.07-8.736 2.903-3.414.805-19.773 3.797-26.404 4.829Zm40.321-9.93c.1-.066.231-.085.29-.041.059.043-.024.096-.183.119-.177.024-.219-.007-.107-.079ZM172.299 26.22c9.364-6.058 5.161-12.039-12.304-17.51-11.656-3.653-23.145-5.47-35.243-5.576-22.552-.198-33.577 7.462-21.321 14.814 12.012 7.205 32.994 10.557 61.531 9.831 4.563-.116 5.372-.288 7.337-1.559Z">
                            </path>
                        </svg>
                        <span class="relative">Simple pricing,</span></span> <!-- -->for everyone.
                </h2>
                <p class="mt-4 text-lg text-slate-400">
                    Look, we know you’re tired of complicated pricing plans that make you feel <br> like you need a degree
                    in finance or chatGPT to understand them.
                </p>
            </div>
            <div
                class="grid grid-cols-1 gap-y-10 mt-16 max-w-2xl sm:mx-auto md:-mx-4 lg:grid-cols-3 lg:-mx-8 lg:max-w-none xl:gap-x-8 xl:mx-0">
                @foreach ($plans as $plan)
                    <section
                        class="flex flex-col px-6 rounded-3xl sm:px-8 py-6 lg:py-8 @if ($loop->index == 1) bg-blue-600 @endif">
                        <h3 class="mt-5 text-lg text-white font-display">{{ $plan->name }}</h3>
                        <p class="mt-2 text-base @if ($loop->index == 1) text-white @else text-slate-400 @endif">
                            {{ $plan->description }}
                        </p>
                        <p class="mt-4 text-base font-semibold text-white">
                            Try for {{ $plan->trial_period }} {{ $plan->trial_interval }}. No credit card required
                        </p>

                        <p class="order-first text-5xl font-light tracking-tight text-white font-display">
                            <span class="mr-1 text-lg font-semibold">$</span>{{ $plan->price }} <span
                                class="mr-1 -ml-3 text-xl font-semibold"> /
                                {{ $plan->invoice_interval }}</span>
                        </p>
                        <ul role="list" class="flex flex-col order-last gap-y-3 mt-10 text-sm text-slate-200">
                            @foreach ($plan->features as $feature)
                                <li class="flex">
                                    <i class="text-xl bi bi-check2"></i>
                                    <span class="ml-4">
                                        {{ $feature->name }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                        @if ($loop->index == 1)
                            <a class="inline-flex justify-center items-center py-2 px-4 mt-8 text-sm font-semibold bg-white rounded-full hover:bg-blue-50 focus:outline-none focus-visible:outline-white active:bg-blue-200 group text-slate-900 focus-visible:outline-2 focus-visible:outline-offset-2 active:text-slate-600"
                                variant="outline" color="white" aria-label="Get started with the Starter plan for $9"
                                href="{{ route('register', ['plan' => $plan->id]) }}">
                                Start free trial
                            </a>
                        @else
                            <a class="inline-flex justify-center items-center py-2 px-4 mt-8 text-sm text-white rounded-full ring-1 focus:outline-none focus-visible:outline-white group ring-slate-700 hover:ring-slate-500 active:ring-slate-700 active:text-slate-400"
                                variant="outline" color="white" aria-label="Get started with the Starter plan for $9"
                                href="{{ route('register', ['plan' => $plan->id]) }}">
                                Start free trial
                            </a>
                        @endif
                    </section>
                @endforeach
            </div>
        </div>
    </section>

    <section id="contact" class="relative py-20 md:py-[120px]">
        <div class="absolute top-0 left-0 w-full h-full -z-[1] dark:bg-dark"></div>
        <div class="absolute left-0 top-0 -z-[1] h-1/2 w-full bg-[#E9F9FF] dark:bg-dark-700 lg:h-[45%] xl:h-1/2"></div>
        <div class="container px-4 mx-auto">
            <div class="flex flex-wrap items-center -mx-4">
                <div class="px-4 w-full lg:w-7/12 xl:w-8/12">
                    <div class="ud-contact-content-wrapper">
                        <div class="mb-12 ud-contact-title lg:mb-[150px]">
                            <span class="block mb-6 text-base font-medium dark:text-white text-dark">
                                CONTACT ME
                            </span>
                            <h2 class="font-semibold dark:text-white max-w-[260px] text-[35px] leading-[1.14] text-dark">
                                Hi, I'm <span class="text-blue-600">Steve</span>, <br> Let's Talk
                            </h2>
                        </div>
                        <div class="flex flex-wrap justify-end mb-12 lg:mb-0">
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
                                        given@koteshen.com
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-4 w-full lg:w-5/12 xl:w-4/12">
                    <div class="py-10 px-8 bg-white rounded-lg shadow sm:py-12 sm:px-10 lg:p-10 lg:py-12 lg:px-10 dark:shadow-none wow fadeInUp md:p-[60px] 2xl:p-[60px] dark:bg-dark-2"
                        data-wow-delay=".2s">
                        <h3 class="mb-8 text-2xl font-semibold dark:text-white text-dark md:text-[28px] md:leading-[1.42]">
                            Send us a Message
                        </h3>
                        <x-turbo::frame id="contact-form">
                            @include('includes.flash')
                            <form method="post" action="{{ route('contact.store') }}">
                                @csrf
                                <div class="mb-[22px]">
                                    <label for="fullName" class="block mb-4 text-sm text-gray-600 dark:text-dark-6">Full
                                        Name*</label>
                                    <x-form.input type="text" name="name" placeholder="Adam Gelius"
                                        class="w-full" />
                                </div>
                                <div class="mb-[22px]">
                                    <label for="email"
                                        class="block mb-4 text-sm text-gray-600 dark:text-dark-6">Email*</label>
                                    <x-form.input type="email" name="email" placeholder="example@yourmail.com"
                                        class="w-full" />
                                </div>
                                <div class="mb-[22px]">
                                    <label for="phone"
                                        class="block mb-4 text-sm text-gray-600 dark:text-dark-6">Phone*</label>
                                    <x-form.input type="text" name="phone" placeholder="+263 78 5211 552"
                                        class="w-full" />
                                </div>
                                <div class="mb-[30px]">
                                    <label for="message"
                                        class="block mb-4 text-sm text-gray-600 dark:text-dark-6">Message*</label>
                                    <x-form.textarea class="w-full" name="message" placeholder="type your message here"
                                        data-controller="textarea-autogrow">{{ old('message') }}</x-form.textarea>
                                </div>
                                <div class="mb-0">
                                    <button type="submit"
                                        class="inline-flex justify-center items-center py-3 px-10 text-base font-medium text-white bg-blue-600 rounded-md transition duration-300 ease-in-out hover:bg-blue-dark">
                                        Send
                                    </button>
                                </div>
                            </form>
                        </x-turbo::frame>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
