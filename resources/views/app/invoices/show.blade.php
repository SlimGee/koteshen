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
            <div class="flex space-x-2">
                <div>
                    <a href="{{ route('app.invoices.edit', $invoice) }}">
                        <x-secondary-button class="!py-2 !px-3 !text-xs">
                            <i class="mr-1 bi bi-pencil-square"></i>
                            Edit
                        </x-secondary-button>
                    </a>
                </div>
                <div>
                    <div data-controller="dropdown" class="relative w-full md:w-1/2 float-end">
                        <x-secondary-button class="!items-baseline float-end !py-2 !px-3 !text-xs" type="button"
                            data-action="dropdown#toggle click@window->dropdown#hide">
                            Actions
                            <i class="ml-1 bi bi-caret-down-fill"></i>
                        </x-secondary-button>

                        <div data-dropdown-target="menu"
                            class="hidden absolute right-0 top-10 w-48 bg-white rounded-b border shadow-sm transition transform origin-top-right"
                            data-transition-enter-from="opacity-0 scale-95" data-transition-enter-to="opacity-100 scale-100"
                            data-transition-leave-from="opacity-100 scale-100"
                            data-transition-leave-to="opacity-0 scale-95">
                            <div class="">
                                <ul class="list-unstyled">
                                    <li class="py-3 px-2.5 hover:bg-slate-100">
                                        <a href="#"
                                            class="flex items-center space-x-2 w-full text-sm font-semibold text-slate-700">
                                            <i class="mr-1 bi bi-check2-square"></i>
                                            Mark as Paid
                                        </a>
                                    </li>

                                    <li class="flex items-center py-3 px-2 hover:bg-slate-100">
                                        <a href="#" class="w-full text-sm font-semibold text-slate-700">
                                            <i class="mr-1 bi bi-clock-history"></i>
                                            Send Reminder
                                        </a>
                                    </li>

                                    <li class="flex items-center py-3 px-2 hover:bg-slate-100">
                                        <a href="#" class="w-full text-sm font-semibold text-slate-700">
                                            <i class="mr-1 bi bi-send"></i>
                                            Send Invoice
                                        </a>
                                    </li>

                                    <li class="flex items-center py-3 px-2 hover:bg-slate-100">
                                        <a href="#" class="w-full text-sm font-semibold text-slate-700">
                                            <i class="mr-1 bi bi-file-pdf"></i>
                                            Download as PDF
                                        </a>
                                    </li>

                                    <li class="flex items-center py-3 px-2 hover:bg-slate-100">
                                        <a href="#" class="w-full text-sm font-semibold text-slate-700">
                                            <i class="mr-1 bi bi-activity"></i>
                                            Invoice Activity
                                        </a>
                                    </li>

                                    <li class="flex items-center py-3 px-2 hover:bg-slate-100">
                                        <a href="#" class="w-full text-sm font-semibold text-slate-700">
                                            <i class="mr-1 bi bi-chat-left"></i>
                                            Post Comments
                                        </a>
                                    </li>

                                    <li class="flex items-center py-3 px-2 hover:bg-slate-100">
                                        <a href="#" class="w-full text-sm font-semibold text-slate-700">
                                            <i class="mr-1 bi bi-wallet"></i>
                                            Manage Payments
                                        </a>
                                    </li>

                                    <li class="flex items-center py-3 px-2 hover:bg-slate-100">
                                        <a href="#" class="w-full text-sm font-semibold text-slate-700">
                                            <i class="mr-1 bi bi-copy"></i>
                                            Duplicate Invoice
                                        </a>
                                    </li>

                                    <li class="flex items-center py-3 px-2 hover:bg-slate-100">
                                        <a href="#" class="w-full text-sm font-semibold text-slate-700">
                                            <i class="mr-1 bi bi-copy"></i>
                                            Duplicate as Recurring
                                        </a>
                                    </li>

                                    <li class="flex items-center py-3 px-2 hover:bg-slate-100">
                                        <a href="#" class="w-full text-sm font-semibold text-slate-700">
                                            <i class="mr-1 bi bi-x-square"></i>
                                            Cancel
                                        </a>
                                    </li>

                                    <li class="flex items-center py-3 px-2 hover:bg-slate-100">
                                        <a href="#" class="w-full text-sm font-semibold text-slate-700">
                                            <i class="mr-1 bi bi-archive"></i>
                                            Archive
                                        </a>
                                    </li>


                                    <li class="flex items-center py-3 px-2 hover:bg-slate-100">
                                        <a href="{{ route('app.invoices.destroy', $invoice) }}" data-turbo-method="delete"
                                            data-turbo-confirm="This action cannot be undone. Are you sure?"
                                            class="w-full text-sm font-semibold text-slate-700">
                                            <i class="mr-1 bi bi-trash"></i>

                                            Delete
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
