@extends('layouts.app')

@section('content')
    <div class="overflow-hidden relative z-10 pt-[120px] pb-[60px] bg-slate-900 md:pt-[130px] lg:pt-[160px]">
        <div
            class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-stroke/0 via-stroke to-stroke/0 dark:via-dark-3">
        </div>
        <div class="container mx-auto">
            <div class="flex flex-wrap items-center -mx-4">
                <div class="px-4 w-full">
                    <div class="text-center">
                        <h1 class="mb-4 text-3xl font-bold text-white sm:text-4xl text-dark md:text-[40px] md:leading-[1.2]">
                            Blog Grid</h1>
                        <p class="mb-5 text-base text-white dark:text-dark-6">
                            There are many variations of passages of Lorem Ipsum available.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ====== Banner Section End -->

    <!-- ====== Blog Section Start -->
    <section class="pt-20 pb-10 lg:pb-20 lg:pt-[120px] dark:bg-dark">
        <div class="container mx-auto">
            <div class="flex flex-wrap md:-mx-4">
                @each('posts._post', $posts, 'post')
            </div>
            @if ($posts->hasPages())
                <div class="mt-8 text-center wow fadeInUp" data-wow-delay=".2s">
                    {{ $posts->links('paginatin::tailwind') }}
                </div>
            @endif
        </div>
    </section>
@endsection
