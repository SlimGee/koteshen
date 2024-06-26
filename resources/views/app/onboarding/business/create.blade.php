@extends('auth')

@section('content')
    <div class="w-full h-[90vh]">
        <div class="flex items-center h-full">
            <div class="flex py-10 px-4 w-full md:px-10 md:w-1/2">
                <div class='mx-auto w-full bg-white md:w-1/2'>
                    <p class="mb-3 text-lg md:text-xl text-slate-500">1/3</p>
                    <p tabindex="0" class="text-2xl font-extrabold leading-6 focus:outline-none text-slate-800">
                        Tell us about your business
                    </p>

                    <p tabindex="0" class="mt-5 mb-10 text-base font-medium leading-none focus:outline-none text-slate-700">
                        To get started, we need to know a few details about your business. This will be your first step
                        before you start sending invoices.
                    </p>



                    <form action="{{ route('app.onboarding.business.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <x-form.label for="name">
                                Business Name
                            </x-form.label>

                            <x-form.input name="name" class="mt-1 w-full" />
                        </div>

                        <div class="mb-3">
                            <x-form.label for="name">
                                Industry
                            </x-form.label>

                            <x-form.select name="industry" class="mt-1 w-full" data-controller="choices">
                                @foreach ($categories as $category)
                                    <option>{{ $category }}</option>
                                @endforeach
                            </x-form.select>
                        </div>
                        <div class="mb-3">
                            <x-form.label for="name">
                                Phone
                            </x-form.label>
                            <div class="flex items-start space-x-2">
                                <div class="w-3/12">
                                    <x-form.select name="phone_country" class="mt-1 w-full" data-controller="choices">
                                        @foreach ($countries as $country)
                                            <option @selected(old('phone_country', $country->code) == 'ZW') value="{{ $country->code }}">
                                                {{ $country->dial_code }}
                                            </option>
                                        @endforeach
                                    </x-form.select>
                                </div>
                                <div class="w-full">
                                    <x-form.input name="phone" class="mt-1 w-full" />
                                </div>
                            </div>
                        </div>



                        <div class="mb-3">
                            <x-form.label for="address">
                                Address
                            </x-form.label>

                            <x-form.input name="address" class="mt-1 w-full" />
                        </div>

                        <div class="flex flex-col mb-3 space-y-3 md:flex-row md:space-y-0 md:space-x-3">
                            <div class="w-full md:w-1/2">
                                <x-form.label for="city">
                                    City
                                </x-form.label>

                                <x-form.input name="city" class="mt-1 w-full" />
                            </div>

                            <div class="w-full md:w-1/2">
                                <x-form.label for="country">
                                    Country
                                </x-form.label>

                                <x-form.select name="country" class="mt-1 w-full" data-controller="choices">
                                    @foreach ($countries as $country)
                                        <option @selected(old('country') == $country->name)>{{ $country->name }}</option>
                                    @endforeach

                                </x-form.select>
                            </div>

                        </div>

                        <div class="mt-4">
                            <x-button type="submit" class="justify-center w-full">
                                Continue
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
            <div class='hidden h-full bg-center bg-no-repeat bg-cover md:block md:w-1/2'
                style='background-image: url({{ asset('images/' . random_int(1, 3) . '.webp') }});'>
            </div>
        </div>
    </div>
@endsection
