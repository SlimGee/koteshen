@extends('auth')

@section('content')
    <div class="w-full h-[90vh]">
        <div class="flex justify-center items-center h-full">
            <div class="flex py-10 px-4 mx-auto w-full md:px-10 md:w-1/2">
                <div class='mx-auto w-full bg-white md:w-1/2 dark:bg-slate-800'>

                    <p tabindex="0" class="text-2xl font-extrabold leading-6 text-gray-800 focus:outline-none">
                        Reset password
                    </p>

                    <p tabindex="0" class="mt-5 text-sm font-medium leading-none text-gray-500 focus:outline-none">
                        Create a new password for your account
                    </p>

                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class='mt-6'>
                            <x-form.label for="email">
                                Email
                            </x-form.label>

                            <x-form.input name="email" type="email" class="mt-1 w-full" placeholder="email@example.com"
                                :value="old('email', $request->email)" error='email' />
                        </div>
                        <div class="mt-3 w-full">
                            <x-form.label for="password">
                                New Password
                            </x-form.label>

                            <x-form.input name="password" class="mt-1 w-full" type="password" error='password' />
                        </div>

                        <div class="mt-3 w-full">
                            <x-form.label for="password">
                                Confirm Password
                            </x-form.label>

                            <x-form.input name="password_confirmation" class="mt-1 w-full" type="password"
                                error='password_confirmation' />
                        </div>
                        <div class="mt-4">
                            <x-button type="submit" class="justify-center w-full">
                                Reset Password
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
