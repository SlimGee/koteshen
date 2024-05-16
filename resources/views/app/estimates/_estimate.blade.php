<div class="grid grid-cols-6 py-4 px-3 bg-white sm:grid-cols-12 dark:bg-slate-800 dark:divide-slate-700">
    <div class="col-span-full mb-2 sm:col-span-6 sm:mb-0">
        <div class="flex items-center space-x-1">
            <div class="p-1 text-xs font-semibold uppercase text-slate-700">
                {{ $estimate->created_at->format('d M Y') }}
            </div>
            <div class="text-base font-bold uppercase group">
                <a class="group-hover:text-blue-700 text-slate-900" href="{{ route('app.estimates.show', $estimate) }}">
                    {{ $estimate->number }}
                </a>
            </div>
        </div>
        <div class="mt-3 text-sm">
            <span class="font-semibold">To:</span> {{ $estimate->client->name }}
        </div>
    </div>
    <div class="flex col-span-1 items-center sm:col-span-2 sm:justify-end">
        <span
            class="sm:py-1.5 sm:px-3 px-1.5 text-xs sm:text-sm font-semibold {{ $estimate->status->classes() }} rounded-sm">{{ $estimate->status }}</span>
    </div>
    <div class="flex col-span-3 justify-start items-center px-2 sm:col-span-2">
        <div>Expires: {{ $estimate->expires_at?->format('d M Y') }}</div>
    </div>

    <div class="flex col-span-2 justify-end items-center sm:col-span-2 text-end">
        <div>
            <div class="font-semibold text-slate-900">
                {{ $estimate->currency->symbol }}
                {{ Number::format($estimate->total, $estimate->currency->decimal_digits) }}
            </div>
            @if ($estimate->status->value == 'invoiced')
                <div class="text-xs font-semibold sm:text-sm sm:font-medium text-slate-600">
                    Inoviced on {{ $estimate->invoiced_at?->format('d M Y') ?? now()->format('d M Y') }}
                </div>
            @endif
        </div>
    </div>

</div>
