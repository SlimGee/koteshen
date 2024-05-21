@extends('app')

@section('title', 'Billing')


@section('content')
    <section class="flex space-x-3">

        @include('app.settings._sidebar')

        <div class="flex-auto w-full">


            <section class="container p-5 max-w-2xl bg-white rounded border shadow-sm">

                <div class="flex justify-between">
                    <div>
                        <div class="flex gap-x-3 items-center">
                            <h2 class="text-lg font-medium text-slate-800">{{ $user->subscription('main')->plan->name }}</h2>
                        </div>
                        <p class="mt-1 text-sm text-slate-500">
                            {{ $user->subscription('main')->plan->description }}
                        </p>
                    </div>
                    <div>
                        <div class="items-end tex-end">
                            <h2 class="text-lg font-bold text-slate-800 text-end">
                                {{ $user->subscription('main')->plan->price }} /
                                {{ $user->subscription('main')->plan->invoice_interval }}</h2>
                        </div>
                        <div>
                            <p class="mt-1 text-sm text-slate-500">
                                @if ($user->subscription('main')->hasTrial())
                                    Your trial ends on {{ $user->subscription('main')->trial_ends_at->format('d, M Y') }}
                                @else
                                    Your subscription ends in
                                    {{ $user->subscription('main')->getSubscriptionPeriodRemainingUsageIn('day') }} days
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{ route('app.billing.change-plan.create') }}">
                        <x-button>Change Plan</x-button>
                    </a>
                </div>
            </section>
        </div>
    </section>

@endsection
