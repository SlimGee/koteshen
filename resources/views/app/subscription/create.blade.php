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
                            class="text-3xl font-bold leading-tight text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-700 md:text-4xl md:leading-tight lg:text-5xl lg:leading-tight">
                            Just one more step to get started
                        </h2>
                        <p class="mt-2 text-gray-800 lg:text-lg dark:text-neutral-200">
                            Select the plan that best fits your needs and budget. You can change or cancel your plan at any
                            time.
                        </p>
                    </div>
                    <!-- End Title -->

                    <!-- Switch -->
                    <div class="flex justify-center items-center">

                        <input type="checkbox" id="pricing-switch"
                            class="relative p-px h-7 text-transparent bg-gray-100 rounded-full border-transparent transition-colors duration-200 ease-in-out cursor-pointer checked:text-purple-600 checked:bg-none checked:border-purple-600 focus:ring-purple-600 disabled:opacity-50 disabled:pointer-events-none w-[3.25rem] before:inline-block before:size-6 before:bg-white before:translate-x-0 before:rounded-full before:shadow before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:bg-neutral-800 dark:border-neutral-800 dark:checked:bg-purple-500 dark:checked:border-purple-500 dark:focus:ring-offset-gray-600 dark:before:bg-neutral-400 dark:checked:before:bg-white checked:before:bg-white checked:before:translate-x-full focus:checked:border-purple-600"
                            checked disabled>

                        <label for="pricing-switch" class="text-sm text-gray-600 min-w-14 ms-3 dark:text-neutral-400">
                            Monthly
                        </label>
                    </div>
                    <!-- End Switch -->

                    <!-- Grid -->
                    <div
                        class="grid gap-3 my-6 mx-auto max-w-5xl sm:grid-cols-2 md:gap-6 md:mt-12 lg:grid-cols-3 lg:gap-3 lg:items-stretch xl:gap-6">

                        @foreach ($plans as $plan)
                            @if (auth()->user()->subscriptions()->count() > 0 && auth()->user()->subscription()->plan_id == $plan->id)
                                @continue
                            @endif
                            <!-- Card -->
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
                                                @if ($feature->value == 1)
                                                    {{ $feature->name }}
                                                @else
                                                    {{ $feature->name }} {{ $feature->value }}
                                                @endif
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>

                                <form method="post" class="mt-6" action="{{ route('app.subscriptions.store', $plan) }}"
                                    data-turbo="false">
                                    @csrf
                                    <x-button type="submit" class="justify-center w-full">
                                        @if (auth()->user()->subscriptions()->count() === 0 && $plan->hasTrial())
                                            Start 15 day free trial
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
