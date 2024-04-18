@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center items-center mx-auto h-[70vh] max-w-[50rem] size-full">
        <!-- ========== HEADER ========== -->

        <!-- ========== END HEADER ========== -->

        <!-- ========== MAIN CONTENT ========== -->
        <main id="content">
            <div class="py-10 px-4 text-center sm:px-6 lg:px-8">
                <h1 class="block text-2xl font-bold sm:text-4xl text-slate-800">
                    Congratulations! You're now on the waitlist. 🎉
                </h1>
                <p class="mt-3 text-lg text-slate-700">
                    So what's next? We'll send you an email once we're ready to launch. In the meantime, feel free to share
                    this with your friends and family.
                </p>
            </div>
        </main>
    </div>
@endsection
