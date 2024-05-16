@extends('app')

@section('content')
    <div class="p-4 mx-auto max-w-screen-2xl md:p-6 2xl:p-10">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5">
            <!-- Card Item Start -->
            <div class="py-6 px-7 bg-white rounded-sm border shadow-sm">

                <div class="flex justify-between items-end mt-1">
                    <div class="w-full">
                        <h4 class="flex justify-between items-center text-base font-semibold dark:text-white text-slate-700">
                            {{ $client->name }}
                            <a class="text-sm font-bold text-indigo-800"
                                href="{{ route('app.clients.edit', $client) }}">Edit</a>
                        </h4>
                        <span class="mt-2 text-sm font-medium text-slate-700">{{ $client->address }},
                            <br>{{ $client->city }},
                            {{ $client->country }}</span>
                        <span
                            class="block mt-1 text-sm font-medium text-slate-700">{{ ucfirst($client->type->value) }}</span>
                    </div>

                </div>
            </div>
            <!-- Card Item End -->

            <!-- Card Item Start -->
            <div class="py-6 px-7 bg-white rounded-sm border shadow-sm border-stroke">
                <div class="flex justify-between items-end mt-4">
                    <div>
                        <h4 class="font-bold md:text-xl dark:text-white text-slate-800">
                            {{ $client->estimates()->count() }}
                        </h4>
                        <span class="text-sm font-semibold text-slate-700">Estimates</span>
                    </div>
                </div>
            </div>
            <!-- Card Item End -->

            <!-- Card Item Start -->
            <div class="py-6 px-7 bg-white rounded-sm border shadow-sm border-stroke">


                <a href="#" class="flex justify-between items-end mt-4">
                    <div>
                        <h4 class="font-bold md:text-xl dark:text-white text-slate-800">
                            {{ $client->invoices()->count() }}
                        </h4>
                        <span class="text-sm font-semibold text-slate-700">Invoices</span>
                    </div>
                </a>
            </div>

            <div class="py-6 px-7 bg-white rounded-sm border shadow-sm">


                <div class="flex justify-between items-end mt-4">
                    <div>
                        <h4 class="font-bold md:text-xl dark:text-white text-slate-800">
                            {{ $client->currency->symbol }}{{ Number::format($client->invoices()->sum('total'), 2) }}
                        </h4>
                        <span class="text-sm font-semibold text-slate-700">Worth</span>
                    </div>
                </div>
            </div>

        </div>

        <div class="flex flex-col items-start my-8 space-y-5 md:flex-row md:space-y-0 md:space-x-4">
            <div class="p-6 w-full bg-white rounded border shadow-sm md:w-7/12">

                <div>
                    <div class="px-4 sm:px-0">
                        <h3 class="text-base font-semibold leading-7 text-slate-900">Client Information</h3>
                    </div>
                    <div class="mt-6 border-t border-slate-100">
                        <dl class="divide-y divide-slate-100">
                            <div class="py-6 px-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm font-medium leading-6 text-slate-900">Type</dt>
                                <dd class="mt-1 text-sm leading-6 sm:col-span-2 sm:mt-0 text-slate-700">
                                    {{ ucfirst($client->type->value) }}
                                </dd>
                            </div>
                            <div class="py-6 px-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm font-medium leading-6 text-slate-900">Name</dt>
                                <dd class="mt-1 text-sm leading-6 sm:col-span-2 sm:mt-0 text-slate-700">
                                    {{ $client->name }}
                                </dd>
                            </div>
                            <div class="py-6 px-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm font-medium leading-6 text-slate-900">Contact Person</dt>
                                <dd class="mt-1 text-sm leading-6 sm:col-span-2 sm:mt-0 text-slate-700">
                                    {{ $client->first_name }} {{ $client->last_name }}
                                </dd>
                            </div>
                            <div class="py-6 px-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm font-medium leading-6 text-slate-900">Email</dt>
                                <dd class="mt-1 text-sm leading-6 sm:col-span-2 sm:mt-0 text-slate-700">
                                    {{ $client->email }}
                                </dd>
                            </div>
                            <div class="py-6 px-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm font-medium leading-6 text-slate-900">Phone</dt>
                                <dd class="mt-1 text-sm leading-6 sm:col-span-2 sm:mt-0 text-slate-700">
                                    {{ phone($client->phone) }}
                                </dd>
                            </div>
                            <div class="py-6 px-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm font-medium leading-6 text-slate-900">Address</dt>
                                <dd class="mt-2 text-sm sm:col-span-2 sm:mt-0 text-slate-900">
                                    {{ $client->address }}, <br>{{ $client->city }},
                                    {{ $client->country }}</span>

                                </dd>
                            </div>

                            <div class="py-6 px-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm font-medium leading-6 text-slate-900">Website</dt>
                                <dd class="mt-2 text-sm sm:col-span-2 sm:mt-0 text-slate-900">
                                    <a href="{{ $client->website }}" class="font-semibold text-indigo-800">
                                        {{ $client->website }}
                                    </a>
                                </dd>
                            </div>

                        </dl>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
