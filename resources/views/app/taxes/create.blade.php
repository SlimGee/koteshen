@extends('app')

@section('title', 'Dashboard')

@section('content')
    <section class="flex items-start space-x-3">

        @include('app.settings._sidebar')


        <div class="flex flex-col w-full max-w-2xl">
            <div class="overflow-x-auto -m-1.5">
                <div class="inline-block p-1.5 w-full min-w-full align-middle">
                    <div
                        class="overflow-hidden bg-white rounded border border-gray-200 shadow-sm dark:bg-neutral-800 dark:border-neutral-700">
                        <!-- Header -->
                        <div
                            class="grid gap-3 py-4 px-6 border-b border-gray-200 md:flex md:justify-between md:items-center dark:border-neutral-700">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                                    Create Tax
                                </h2>
                            </div>

                        </div>

                        <div class="py-4 px-6">
                            <form action="{{ route('app.taxes.store') }}" method="POST">
                                @csrf

                                <div class="mb-4">
                                    <x-form.label for="name">Name</x-form.label>
                                    <x-form.input name="name" class="mt-1 w-full" />
                                </div>

                                <div class="mb-4">
                                    <x-form.label for="rate">Rate(%)</x-form.label>
                                    <x-form.input name="rate" class="mt-1 w-full" />
                                </div>

                                <div class="mb-4">
                                    <x-button type="submit">
                                        Save changes
                                    </x-button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
