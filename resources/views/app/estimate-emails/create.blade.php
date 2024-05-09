@extends('app')

@section('content')
    <section class="mb-10">
        <div class="flex justify-between items-center md:items-baseline">
            <div class="flex items-center space-x-6">
                <a href="{{ route('app.estimates.show', $estimate) }}">
                    <x-secondary-button class="!py-2 !px-3 !text-xs">
                        <i class="bi bi-caret-left-fill"></i>
                        Estimate
                    </x-secondary-button>
                </a>
                <h1 class="ml-4 text-xl font-semibold md:text-2xl text-slate-700">Estimate #{{ $estimate->number }}</h1>
            </div>
        </div>
    </section>

    <div class="md:w-1/2">
        <form action="{{ route('app.estimates.send', $estimate) }}" method="POST">
            @csrf

            <div class="rounded border shadow-sm">
                <div class="p-4 bg-slate-50">
                    <h4 class="text-sm font-semibold text-slate-700">Send Estimate</h4>
                </div>


                <div class="p-3 mt-3">

                    <div class="mb-3">
                        <x-form.label for="to">To</x-form.label>
                        <x-form.input name="to" class="mt-1 w-full" :value="$estimate->client->email" />
                    </div>

                    <div class="mb-3">
                        <x-form.label for="to">Copy</x-form.label>
                        <x-form.input name="copy" class="mt-1 w-full" :value="$estimate->business->user->email" />
                    </div>

                    <div class="mb-3">
                        <x-form.label for="to">Subject</x-form.label>
                        <x-form.input name="subject" class="mt-1 w-full" :value="'Estimate ' . $estimate->number . ' from ' . $estimate->business->name" />
                    </div>

                    <div class="mb-3">
                        <x-form.label for="to">Subject</x-form.label>
                        <x-form.textarea name="message" data-controller="textarea-autogrow"
                            class="mt-1 w-full">{{ old('message', $template) }}</x-form.textarea>
                    </div>

                    <div class='mt-3'>
                        <input type="checkbox" name="attach" id="attach"
                            class="mr-2 rounded dark:bg-slate-800 dark:border-slate-700" />
                        <label for='attach' class="text-sm font-semibold leading-none text-slate-800 dark:text-slate-100">
                            Attach PDF copy to email
                        </label>
                    </div>

                    <div class="mt-4">
                        <x-button type="submit">
                            Send Estimate
                        </x-button>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
