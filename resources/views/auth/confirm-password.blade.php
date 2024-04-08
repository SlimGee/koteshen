@extends('auth')

@section('content')
    <div class="w-full h-[90vh]">
        <div class="flex items-center h-full">
            <div class="flex py-10 px-4 w-full md:px-10 md:w-1/2">
                <div class='mx-auto w-full bg-white md:w-1/2'>

                    <p tabindex="0" class="text-2xl font-extrabold leading-6 text-gray-800 focus:outline-none">
                        Confirm your password
                    </p>

                    <p tabindex="0" class="mt-3 text-sm leading-none text-gray-400 focus:outline-none">
                        This is a secure area of the application. Please confirm your password before continuing.
                    </p>

                    <form action="{{ route('password.confirm') }}" method="POST">
                        @csrf
                        <div class='mt-6'>
                            <x-form.label for="password">
                                Password
                            </x-form.label>

                            <x-form.input name="password" type="password" class="mt-1 w-full"
                                autocomplete="confirm-password" error='password' />
                        </div>

                        <div class="mt-8">
                            <x-button type="submit" class="justify-center w-full">
                                Confirm Password
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
