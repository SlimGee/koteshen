@extends('auth')

@section('content')
    <div class="w-full h-[90vh]">
        <div class="flex items-center h-full">
            <div class="flex py-10 px-4 mx-auto w-full md:px-10 md:w-1/2">
                <div class='mx-auto w-full bg-white md:w-1/2'>

                    <p tabindex="0" class="text-2xl font-extrabold leading-6 text-gray-800 focus:outline-none">
                        Verify Your Email Address
                    </p>

                    <p tabindex="0" class="mt-6 font-medium leading-none text-gray-600 focus:outline-none">
                        {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                    </p>

                    <form action="{{ route('verification.send') }}" method="POST">
                        @csrf
                        <div class='mt-6'>
                            @if (session('status') === 'verification-link-sent')
                                <div class="mb-4 text-sm font-medium text-green-600">
                                    {{ __('A new verification link has been sent to the email address you provided during signup.') }}
                                </div>
                            @endif
                        </div>

                        <div class="mt-8">
                            <x-button type="submit" class="justify-center w-full">
                                Resend Verification Email
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
