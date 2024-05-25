@extends('layouts.app')

@section('content')
    <div class="overflow-hidden relative z-10 pb-[60px] pt-[120px] bg-slate-900 md:pt-[130px] lg:pt-[160px]">
        <div
            class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r via-gray-700 dark:via-gray-300 from-gray-700/0 to-gray-700/0">
        </div>
        <div class="container mx-auto">
            <div class="flex flex-wrap items-center -mx-4">
                <div class="px-4 w-full">
                    <div class="text-center">
                        <h1 class="mb-4 text-3xl font-bold text-white sm:text-4xl text-dark md:text-[40px] md:leading-[1.2]">
                            {{ $post->title }}
                        </h1>
                        <p class="mb-5 text-base text-gray-300 dark:text-dark-6">
                            {{ $post->excerpt }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ====== Banner Section End -->

    <!-- ====== Blog Details Section Start -->
    <section class="pt-10 pb-10 lg:pb-20 dark:bg-dark">
        <div class="container mx-auto">
            <div class="flex flex-wrap justify-center md:-mx-4">
                <div class="px-4 w-full">
                    <div class="overflow-hidden relative z-20 wow fadeInUp mb-[50px] h-[300px] rounded-[5px] md:h-[400px] lg:h-[600px]"
                        data-wow-delay=".1s
              ">
                        <img src="{{ Storage::url($post->cover) }}" alt="image"
                            class="object-cover object-center w-full h-full" />
                        <div
                            class="flex absolute top-0 left-0 z-10 items-end w-full h-full bg-gradient-to-t to-transparent from-slate-700">
                            <div class="flex flex-wrap items-center p-4 pb-4 sm:px-8">
                                <div class="flex items-center mr-5 mb-4 md:mr-10">

                                    <p class="text-base font-medium text-white">
                                        By
                                        <a href="javascript:void(0)" class="text-white hover:opacity-70">
                                            {{ $post->user->name }}
                                        </a>
                                    </p>
                                </div>
                                <div class="flex items-center mb-4">
                                    <p class="flex items-center mr-5 text-sm font-medium text-white md:mr-6">
                                        <span class="mr-3">
                                            <i class="bi bi-calendar"></i>
                                        </span>
                                        {{ $post->created_at->format('d M Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="justify-center mx-auto">
                        <div class="px-4 mx-auto w-full lg:w-8/12">
                            <div class="prose md:prose-lg xl:prose-xl">
                                {!! Str::markdown($post->content) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
