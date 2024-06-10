@extends('app')

@section('title', 'Billing')

@section('content')
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" class="bg-white rounded border shadow-sm">
        <div class="overflow-hidden">
            <!-- Header -->
            <!-- End Header -->

            <!-- Hero -->
            <div class="relative">
                <!-- Gradients -->
                <div aria-hidden="true" class="flex absolute -top-48 -z-[1] start-0">
                    <div class="bg-purple-200 opacity-30 dark:bg-purple-900 dark:opacity-20 blur-3xl w-[1036px] h-[600px]">
                    </div>
                    <div
                        class="bg-gray-200 opacity-90 transform translate-y-32 blur-3xl w-[577px] h-[300px] dark:bg-neutral-800/60">
                    </div>
                </div>
                <!-- End Gradients -->

                <div class="px-4 pt-10 mx-auto sm:px-6 lg:px-8 lg:pt-14 max-w-[85rem]">
                    <!-- Title -->
                    <div class="mx-auto mb-10 max-w-2xl text-center">
                        <h2
                            class="text-3xl font-bold leading-tight md:text-4xl md:leading-tight lg:text-5xl lg:leading-tight">
                            @if (auth()->user()->subscriptions()->count() === 0)
                                Select a plan to start trial
                            @else
                                Upgrade Your Account
                            @endif
                        </h2>
                    </div>

                    <div
                        class="grid gap-3 my-6 mx-auto max-w-5xl sm:grid-cols-2 md:gap-6 md:mt-12 lg:grid-cols-3 lg:gap-3 lg:items-stretch xl:gap-6">

                        @foreach ($plans as $plan)
                            @if (auth()->user()->subscriptions()->count() > 0 && auth()->user()->subscription()->plan_id == $plan->id)
                                @continue
                            @endif
                            <div class="flex flex-col p-8 text-center rounded border border-slate-200">
                                <h4 class="text-lg font-medium text-slate-800">{{ $plan->name }}</h4>
                                <p class="mt-2 text-sm text-slate-600">{{ $plan->description }}</p>
                                <span class="mt-5 text-5xl font-bold text-slate-800">
                                    <span class="text-lg font-semibold -me-2">{{ $plan->currency }}</span>
                                    {{ $plan->price }}
                                    <span class="-ml-3 text-xl font-semibold">/{{ $plan->invoice_interval }}</span>
                                </span>

                                <ul class="mx-auto mt-7 space-y-2.5 text-sm">
                                    @foreach ($plan->features as $feature)
                                        <li class="flex mx-auto space-x-2">
                                            <i class="text-blue-600 bi bi-check2"></i>
                                            <span class="text-slate-800">


                                                {{ $feature->name }}
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>

                                <form method="post" class="pt-6 mt-auto"
                                    action="{{ route('app.subscriptions.store', $plan) }}" data-turbo="false">
                                    @csrf
                                    <x-button type="submit" class="justify-center w-full">
                                        @if (auth()->user()->subscriptions()->count() === 0 && $plan->hasTrial())
                                            Try free for 15 days
                                        @else
                                            @if (auth()->user()->subscription()->plan->tier < $plan->tier)
                                                Upgrade
                                            @else
                                                Downgrade
                                            @endif
                                        @endif
                                    </x-button>
                                </form>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- ========== END FOOTER ========== -->


@endsection
