<input
    {{ $attributes->merge([
        'type' => 'checkbox',
        'class' =>
            $attributes->has('error') &&
            $errors->{$attributes->has('bag') ? $attributes->get('bag') : 'default'}->has($attributes->get('error'))
                ? 'animate__animated animate__shakeX dark:placeholder:text-slate-400 focus:border-red-300 focus:ring-red-400 p-2.5 rounded-sm text-sm border-meta-1 dark:border-red-400 dark:bg-slate-800'
                : 'rounded-sm',
    ]) }} />

@if ($attributes->has('error'))
    @error($attributes->get('error'), $attributes->has('bag') ? $attributes->get('bag') : null)
        <p class="mt-2 text-sm italic font-semibold text-meta-1">
            {{ $message }}
        </p>
    @enderror
@endif
