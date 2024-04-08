@extends('auth')

@section('content')
    <div class="w-full h-[90vh]">
        <div class="flex justify-center items-center h-full">
            <div class="flex py-10 px-4 mx-auto w-full md:px-10 md:w-1/2">
                <div class='mx-auto w-full bg-white md:w-1/2 dark:bg-slate-800'>


                    <p tabindex="0" class="text-2xl font-extrabold leading-6 focus:outline-none text-slate-800">
                        Create an account
                    </p>

                    <p tabindex="0"
                        class="mt-5 text-sm font-medium leading-none focus:outline-none text-slate-500 dark:text-slate-400">
                        Have an account?
                        <a href="{{ route('login') }}"
                            class="ml-1 text-sm font-bold leading-none cursor-pointer focus:underline focus:outline-none text-slate-800 dark:text-slate-100 hover:text-blue-accent-400 focus:text-blue-accent-400">
                            Login here
                        </a>
                    </p>
                    <a href='{{ route('socialite.redirect', 'google') }}'>
                        <x-secondary-button aria-label="Continue with google" class="justify-center mt-5 w-full">
                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/sign_in-svg2.svg" alt="google">
                            <p class="ml-4 text-base font-medium text-slate-700 dark:text-slate-300">Continue with Google
                            </p>
                        </x-secondary-button>
                    </a>

                    <div class="flex justify-between items-center py-5 mb-5 w-full">
                        <div class="w-full h-0.5 bg-slate-400 dark:bg-slate-700"></div>
                        <p class="px-2.5 text-base font-medium leading-4 text-slate-400 dark:text-slate-200">OR</p>
                        <div class="w-full h-0.5 bg-slate-400 dark:bg-slate-700"></div>
                    </div>

                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="-mt-4">
                            <x-form.label for="name">
                                Name
                            </x-form.label>

                            <x-form.input name="name" type="text" class="mt-1 w-full" placeholder="Your name"
                                :value="old('name')" error='name' />
                        </div>
                        <div class="mt-3">
                            <x-form.label for='email'>
                                Email
                            </x-form.label>

                            <x-form.input name="email" type="email" class="mt-1 w-full" placeholder="email@example.com"
                                :value="old('email')" error='email' />
                        </div>
                        <div class="mt-3 w-full">
                            <x-form.label for="password">
                                Password
                            </x-form.label>

                            <x-form.input type="password" name="password" id="password" error='password'
                                class="mt-1 w-full" />
                        </div>

                        <div class="mt-3 w-full">
                            <x-form.label for="password_confirmation">
                                Confirm Password
                            </x-form.label>

                            <x-form.input id="password_confirmation" type="password" name="password_confirmation"
                                error='password_confirmation' class="mt-1 w-full" />
                        </div>

                        <div class="mt-4">
                            <x-button type="submit" class="justify-center w-full">
                                Create Account
                            </x-button>
                        </div>

                        <div class='mt-3 text-sm text-slate-700 dark:text-slate-400'>
                            By creating an account you agree to our <a href='/terms'
                                class='font-bold text-purple-accent-400'>Terms
                                of Service</a> and
                            <a class='font-bold text-purple-accent-400' href='/privacy'>Privacy Policy</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
