@extends('app')

@section('title', 'Dashboard')


@section('content')
    <section class="flex space-x-3">

        @include('app.settings._sidebar')

        <div class="flex-auto w-full">


            <section class="container p-5 max-w-2xl bg-white rounded border shadow-sm">
                <div class="pb-8 sm:flex sm:justify-between sm:items-center">
                    <div>
                        <div class="flex gap-x-3 items-center">
                            <h2 class="text-lg font-medium dark:text-white text-slate-800">Profile</h2>

                        </div>

                        <p class="mt-1 text-sm text-slate-500 dark:text-slate-300">
                            Update this user's information
                        </p>
                    </div>
                </div>

                <form action="{{ route('user-profile-information.update') }}" method="POST">
                    @csrf

                    @method('PUT')
                    <div class="sm:rounded-sm border-spacing-px dark:border-slate-700">
                        <div class="py-5 bg-white dark:bg-slate-800">


                            <div class="grid grid-cols-6 gap-6 mb-5">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-form.label for="first-name">Name</x-form.label>
                                    <x-form.input class='mt-1 w-full' name="name" id="name" error="name"
                                        :value="old('name', $user->name)" />
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <x-form.label for="email-address">Email
                                        address</x-form.label>
                                    <x-form.input class='mt-1 w-full' name="email" type='email' id="name"
                                        error="email" :value="old('email', $user->email)" />
                                </div>
                            </div>



                            <div class="py-3 text-right">
                                <x-button type='submit'>
                                    Update user
                                </x-button>
                            </div>
                        </div>

                    </div>
                </form>

            </section>


            <section class="container p-5 mt-4 max-w-2xl bg-white rounded border shadow-sm">
                <div class="pb-8 sm:flex sm:justify-between sm:items-center">
                    <div>
                        <div class="flex gap-x-3 items-center">
                            <h2 class="text-lg font-medium dark:text-white text-slate-800">Password</h2>
                        </div>

                        <p class="mt-1 text-sm text-slate-500 dark:text-slate-300">
                            Update your login information
                        </p>
                    </div>
                </div>

                <form action="{{ route('user-password.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="sm:rounded-sm border-spacing-px dark:border-slate-700">
                        <div class="py-5 bg-white dark:bg-slate-800">

                            <div class="mb-3">
                                <x-form.label for="password">Current Password</x-form.label>
                                <x-form.input type="password" class="mt-1 w-full" name="current_password" />
                            </div>

                            <div class="mb-3">
                                <x-form.label for="password">Password</x-form.label>
                                <x-form.input class="mt-1 w-full" type="password" name="password" />
                            </div>

                            <div class="mb-3">
                                <x-form.label for="password">Confirm Password</x-form.label>
                                <x-form.input class="mt-1 w-full" type="password" name="password_confirmation" />
                            </div>


                            <div class="py-3 text-right">
                                <x-button type='submit'>
                                    Update password
                                </x-button>
                            </div>
                        </div>

                    </div>
                </form>

            </section>
        </div>
    </section>



@endsection
