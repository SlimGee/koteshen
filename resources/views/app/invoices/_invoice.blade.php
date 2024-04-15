<div class="grid grid-cols-12 py-4 px-3 bg-white dark:bg-slate-800 dark:divide-slate-700">
    <div class="col-span-6">
        <div class="flex items-center space-x-1">
            <div class="p-1 text-xs font-semibold uppercase bg-slate-200 text-slate-700">
                {{ $invoice->created_at->format('d M Y') }}
            </div>
            <div class="text-base font-bold uppercase group">
                <a class="group-hover:text-blue-700 text-slate-900" href="{{ route('app.invoices.show', $invoice) }}">
                    {{ $invoice->number }}
                </a>
            </div>
        </div>
        <div class="mt-3 text-sm">
            <span>To:</span> {{ $invoice->client->name }}
        </div>
    </div>
    <div class="flex col-span-2 justify-end items-center">
        <span
            class="py-1.5 px-3 text-sm font-semibold {{ $invoice->status->classes() }} rounded-sm">{{ $invoice->status }}</span>
    </div>
    <div class="flex col-span-2 justify-start items-center px-2">
        <div>Due: {{ $invoice->due_at->format('d M Y') }}</div>
    </div>

    <div class="flex col-span-2 justify-end items-center text-end">
        <div>
            <div class="font-semibold text-slate-900">
                {{ $invoice->currency->symbol }}
                {{ Number::format($invoice->total, $invoice->currency->decimal_digits) }}
            </div>
            <div class="text-sm font-medium text-slate-600">Paid April 15 2024</div>
        </div>
    </div>

</div>
