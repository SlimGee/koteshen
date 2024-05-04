@extends('app')

@section('content')
    <section>
        <div class="flex justify-between items-center md:items-baseline">
            <div class="flex items-center space-x-6">
                <a href="{{ route('app.invoices.index') }}">
                    <x-secondary-button class="!py-2 !px-3 !text-xs">
                        <i class="bi bi-caret-left-fill"></i>
                        Invoices
                    </x-secondary-button>
                </a>
                <h1 class="ml-4 text-xl font-semibold md:text-2xl text-slate-700">Invoice #{{ $invoice->number }}</h1>
            </div>
        </div>
    </section>


    <section class="py-8 antialiased bg-white md:flex lg:py-16 dark:bg-gray-900">
        <div class="px-4 max-w-2xl">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-lg font-bold text-gray-900 lg:text-2xl dark:text-white">Discussion (20)</h2>
            </div>
            <x-turbo::frame :id="[$invoice, 'create_comment']" src="{{ route('app.invoices.comments.create', $invoice) }}">
            </x-turbo::frame>
            <div id="@domid($invoice, 'comments')">
                @each('app.invoices.comments._comment', $comments, 'comment')
            </div>
        </div>
    </section>
@endsection
