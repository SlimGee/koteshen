@extends('app')

@section('content')
    <section class="flex space-x-3">

        @include('app.settings._sidebar')

        <div class="flex-auto w-full">
            <div class="p-4 bg-white rounded border shadow-sm md:p-8">
                @php
                    $business = auth()->user()->business;
                @endphp
                <div class='w-full bg-white md:w-1/2'>

                    <form action="{{ route('app.businesses.update', $business) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <x-form.label for="name">
                                Logo
                            </x-form.label>


                            <div class="w-32"
                                {{ stimulus_controller('filepond', [
                                    'process' => route('images.store'),
                                    'restore' => route('images.show'),
                                    'revert' => route('images.destroy'),
                                    'current' => collect([$business->logo])->filter()->toArray(),
                                    'field' => 'logo',
                                    'label' => 'Upload Logo',
                                ]) }}>
                                <input type="file" data-filepond-target="input">

                                @if (old('logo') || $business->logo)
                                    <input data-filepond-target="upload" type="hidden" name="logo"
                                        value="{{ old('logo', $business->logo) }}">
                                @endif

                                <template data-filepond-target="template">
                                    <input data-filepond-target="upload" type="hidden" name="NAME" value="VALUE">
                                </template>

                                @error('title')
                                    <p class="mt-1 text-sm text-red-400">
                                        {{ $message }}
                                    </p>
                                @enderror

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
                                            <option @selected($business->phone_country == $country->code) value="{{ $country->code }}">
                                                {{ $country->dial_code }}
                                            </option>
                                        @endforeach
                                    </x-form.select>
                                </div>
                                <div class="w-full">
                                    <x-form.input name="phone" class="mt-1 w-full" :value="phone($business->phone, format: 'national')" />
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
