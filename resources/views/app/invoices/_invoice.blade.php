<div class="grid grid-cols-5 py-4 px-3 bg-white sm:grid-cols-12 dark:bg-slate-800 dark:divide-slate-700">
    <div class="col-span-full sm:col-span-6">
        <div class="flex items-center space-x-1">
            <div class="p-1 text-xs font-semibold uppercase text-slate-700">
                {{ $invoice->created_at->format('d M Y') }}
            </div>
            <div class="text-base font-bold uppercase group">
                <a class="group-hover:text-blue-700 text-slate-900" href="{{ route('app.invoices.show', $invoice) }}">
                    {{ $invoice->number }}
                </a>
            </div>
        </div>
        <div class="mt-3 text-sm text-slate-900">
            <span class="font-semibold">To:</span> <span
                class="font-medium sm:font-normal">{{ $invoice->client->name }}</span>
        </div>
    </div>
    <div class="flex col-span-1 items-center sm:col-span-2 sm:justify-end">
        <span
            class="sm:py-1.5 sm:px-3 px-1.5 text-xs sm:text-sm font-semibold {{ $invoice->status->classes() }} rounded-sm">{{ $invoice->status }}</span>
    </div>
    <div class="flex col-span-2 justify-start items-center px-2 sm:col-span-2">
        <div class="text-sm font-semibold">Due: {{ $invoice->due_at?->format('d M Y') }}</div>
    </div>

    <div class="flex col-span-2 justify-end items-center sm:col-span-2 text-end">
        <div>
            <div class="font-semibold text-slate-900">
                {{ $invoice->currency->symbol }}
                {{ Number::format($invoice->total, $invoice->currency->decimal_digits) }}
            </div>
            <div class="text-sm font-medium text-slate-600">Paid
                {{ $invoice->payments->last()->created_at->format('d, M Y') }}
            </div>
        </div>
    </div>

</div>
