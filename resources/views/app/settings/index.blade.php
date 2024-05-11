@extends('app')

@section('content')
    <section class="flex space-x-3">

        <div id="application-sidebar"
            class="hidden inset-y-0 bg-white transition-all duration-300 transform -translate-x-full lg:block lg:bottom-0 lg:translate-x-0 hs-overlay [--auto-close:lg] hs-overlay-open:translate-x-0 w-[260px] start-0 z-[60] lg:end-auto dark:bg-neutral-800 dark:border-neutral-700">

            <nav class="flex flex-col flex-wrap p-6 w-full hs-accordion-group" data-hs-accordion-always-open>
                <ul class="space-y-1.5">
                    <li>
                        <a class="flex gap-x-3.5 items-center py-2 px-2.5 text-sm bg-gray-100 rounded-lg dark:text-white hover:bg-gray-100 text-neutral-700 dark:bg-neutral-700"
                            href="#">
                            Company Details
                        </a>
                    </li>

                    <li><a class="flex gap-x-3.5 items-center py-2 px-2.5 w-full text-sm rounded-lg hover:bg-gray-100 text-neutral-700 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300"
                            href="#">

                            Payment Settings
                        </a></li>
                    <li>
                        <a class="flex gap-x-3.5 items-center py-2 px-2.5 w-full text-sm rounded-lg hover:bg-gray-100 text-neutral-700 dark:hover:bg-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-300"
                            href="#">
                            Tax
                        </a>
                    </li>

                    <li>
                        <a class="flex gap-x-3.5 items-center py-2 px-2.5 w-full text-sm rounded-lg hover:bg-gray-100 text-neutral-700 dark:hover:bg-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-300"
                            href="#">
                            Email Settings
                        </a>
                    </li>

                    <li>
                        <a class="flex gap-x-3.5 items-center py-2 px-2.5 w-full text-sm rounded-lg hover:bg-gray-100 text-neutral-700 dark:hover:bg-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-300"
                            href="#">
                            Templates & Reminders
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="flex-auto w-full">
            <div class="p-4 rounded border md:p-8">
                @php
                    $business = auth()->user()->business;
                @endphp
                <div class='w-full bg-white md:w-1/2'>

                    <form action="{{ route('app.onboarding.business.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <x-form.label for="name">
                                Logo
                            </x-form.label>
                            <div class="mt-1 w-full md:w-2/3" data-controller="dropify">
                                <input type="file" data-dropify-target="input" :data-default-file="$business - > logo"
                                    data-height="100" />
                            </div>
                        </div>


                        <div class="mb-3">
                            <x-form.label for="name">
                                Business Name
                            </x-form.label>

                            <x-form.input name="name" class="mt-1 w-full" :value="auth()->user()->business->name" />
                        </div>

                        <div class="mb-3">
                            <x-form.label for="name">
                                Industry
                            </x-form.label>

                            <x-form.select name="industry" class="mt-1 w-full" data-controller="choices">
                                @foreach ($categories as $category)
                                    <option @selected(old('industry', $business->industry) == $category)>{{ $category }}</option>
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
                                            <option @selected(old('phone_country', $business->phone_country) == $country->code)) value="{{ $country->code }}">
                                                {{ $country->dial_code }}
                                            </option>
                                        @endforeach
                                    </x-form.select>
                                </div>
                                <div class="w-full">
                                    <x-form.input name="phone" class="mt-1 w-full" :value="$business->phone" />
                                </div>
                            </div>
                        </div>



                        <div class="mb-3">
                            <x-form.label for="address">
                                Address
                            </x-form.label>

                            <x-form.input name="address" class="mt-1 w-full" :value="$business->address" />
                        </div>

                        <div class="flex flex-col mb-3 space-y-3 md:flex-row md:space-y-0 md:space-x-3">
                            <div class="w-full md:w-1/2">
                                <x-form.label for="city">
                                    City
                                </x-form.label>

                                <x-form.input name="city" class="mt-1 w-full" :value="$business->city" />
                            </div>

                            <div class="w-full md:w-1/2">
                                <x-form.label for="country">
                                    Country
                                </x-form.label>

                                <x-form.select name="country" class="mt-1 w-full" data-controller="choices">
                                    @foreach ($countries as $country)
                                        <option @selected(old('country', $business->country) == $country->name)>{{ $country->name }}</option>
                                    @endforeach

                                </x-form.select>
                            </div>

                        </div>

                        <div class="mt-4">
                            <x-button type="submit">
                                Save Changes
                            </x-button>
                        </div>
                    </form>
                </div>

            </div>

        </div>


    </section>
@endsection
