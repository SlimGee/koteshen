@extends('auth')

@section('content')
    <div class="w-full h-[90vh]">
        <div class="flex items-center h-full">
            <div class="flex py-10 px-4 mx-auto w-full  md:px-10 md:w-1/2">
                <div class='mx-auto w-full bg-white md:w-1/2'>

                    <p tabindex="0" class="text-2xl font-extrabold leading-6 text-gray-800 focus:outline-none">
                        Request a password reset
                    </p>

                    <form action="{{ route('password.request') }}" method="POST">
                        @csrf

                        @if (session('status'))
                            <div class="mt-6 text-sm font-medium text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class='mt-4'>
                            <x-form.label for="email">
                                Email
                            </x-form.label>

                            <x-form.input name="email" type="email" class="mt-1 w-full" placeholder="email@example.com"
                                error='email' />
                        </div>

                        <div class="mt-4">
                            <x-button type="submit" class="justify-center w-full">
                                Email Password Reset Link
                            </x-button>
                        </div>
                        <div>
                            <p tabindex="0"
                                class="mt-5 text-sm font-medium leading-none text-gray-500 focus:outline-none">
                                Remember your password?
                                <a href="{{ route('login') }}"
                                    class="ml-1 text-sm font-medium leading-none text-gray-800 cursor-pointer focus:underline focus:outline-none hover:text-blue-accent-400 focus:text-blue-accent-400">
                                    Login here
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
