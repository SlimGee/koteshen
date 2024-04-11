@extends('app')

@section('content')
    <section>
        <div class="flex justify-between items-center md:items-baseline">
            <div class="flex items-center space-x-1">
                <a href="{{ route('app.clients.index') }}">
                    <x-secondary-button class="py-1.5 !px-2 text-xs">
                        <i class="bi bi-caret-left-fill"></i>
                        Clients
                    </x-secondary-button>
                </a>
                <h1 class="text-xl font-semibold md:text-2xl text-slate-700">Add new client</h1>
            </div>
        </div>
    </section>

    <section class="py-16">

        <div class="md:w-1/2"
            {{ stimulus_controller('client-type', [
                'hideif' => 'individual',
                'showif' => 'organization',
            ]) }}>
            <form action="{{ route('app.clients.store') }}" method="POST">
                @csrf

                <div class="rounded border shadow-sm">
                    <div class="p-4 bg-slate-50">
                        <h4 class="text-sm font-semibold text-slate-700">Basic information</h4>
                    </div>


                    <div class="p-3 mt-3">

                        <div class="mb-3">
                            <x-form.label for="type">
                                Client Type
                            </x-form.label>

                            <x-form.select name="type" class="mt-1 w-full" data-controller="choices"
                                data-client-type-target="select" data-action="client-type#handle">
                                @foreach (App\Enum\ClientType::cases() as $key => $value)
                                    <option value="{{ $value }}" @selected(old('type') == $value)>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </x-form.select>
                        </div>

                        <div class="mb-3" data-client-type-target="hideable">
                            <x-form.label for="name">
                                Organization Name
                            </x-form.label>

                            <x-form.input name="name" class="mt-1 w-full" />
                        </div>


                        <div class="flex flex-col mb-3 space-y-3 md:flex-row md:space-y-0 md:space-x-3">
                            <div class="w-full md:w-1/2">
                                <x-form.label for="first_name">
                                    First Name
                                </x-form.label>

                                <x-form.input name="first_name" class="mt-1 w-full" placeholder="Contact First Name" />
                            </div>

                            <div class="w-full md:w-1/2">
                                <x-form.label for="last_name">
                                    Last Name
                                </x-form.label>

                                <x-form.input name="last_name" class="mt-1 w-full" placeholder="Contact First Name" />
                            </div>


                        </div>


                        <div class="flex flex-col mb-3 space-y-3 md:flex-row md:space-y-0 md:space-x-3">
                            <div class="w-full md:w-1/2">
                                <x-form.label for="name">
                                    Phone
                                </x-form.label>
                                <div class="flex items-start space-x-2">
                                    <div class="w-3/12">
                                        <x-form.select name="phone_country" class="mt-1 w-full" data-controller="choices">
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->code }}" @selected(old('phone_country') == $country->code)>
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

                            <div class="w-full md:w-1/2">
                                <x-form.label for="last_name">
                                    Email address
                                </x-form.label>

                                <x-form.input name="email" type="email" class="mt-1 w-full" />
                            </div>

                        </div>

                        <div class="mb-3">
                            <x-form.label for="last_name">
                                Currency
                            </x-form.label>

                            <x-form.select name="currency_id" class="mt-1 w-full" data-controller="choices">
                                @foreach ($currencies as $currency)
                                    <option value="{{ $currency->id }}" @selected(old('currency_id') == $currency->id)>{{ $currency->name }}
                                        ({{ $currency->code }})
                                    </option>
                                @endforeach
                            </x-form.select>
                        </div>

                    </div>
                </div>



                <div class="mt-8 rounded border shadow-sm">
                    <div class="p-4 bg-slate-50">
                        <h4 class="text-sm font-semibold text-slate-700">Address</h4>
                    </div>


                    <div class="p-3 mt-3">

                        <div class="mb-3">
                            <x-form.label for="address">
                                Street Address
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
                                        <option value="{{ $country->name }}" @selected(old('country') == $country->name)>
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </x-form.select>
                            </div>

                        </div>

                    </div>
                </div>


                <div class="mt-8 rounded border shadow-sm">
                    <div class="p-4 bg-slate-50">
                        <h4 class="text-sm font-semibold text-slate-700">Additional Information</h4>
                    </div>


                    <div class="p-3 mt-3">

                        <div class="mb-3">
                            <x-form.label for="address">
                                Website
                            </x-form.label>

                            <x-form.input name="website" class="mt-1 w-full" />
                        </div>


                        <div class="flex flex-col mb-3 space-y-3 md:flex-row md:space-y-0 md:space-x-3">
                            <div class="w-full">
                                <x-form.label for="city">
                                    Notes
                                </x-form.label>

                                <x-form.textarea name="notes" class="mt-1 w-full">{{ old('notes') }}</x-form.textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="mt-3">
                    <x-button type="submit">Create client</x-button>
                </div>
            </form>
        </div>

    </section>
@endsection
