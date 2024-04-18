<select
    {{ $attributes->merge([
        'class' =>
            $attributes->has('name') &&
            $errors->{$attributes->has('bag') ? $attributes->get('bag') : 'default'}->has($attributes->get('name'))
                ? 'block border dark:text-slate-300 dark:placeholder:text-slate-400  border-gray-focus:border-blue-300 rounded p-2 border-red-400  dark:bg-slate-800'
                : 'block border border-gray-300 rounded p-2.5  disabled:bg-whitertext-sm',
    ]) }}>
    {{ $slot }}
</select>

@if ($attributes->has('name'))
    @error($attributes->get('name'), $attributes->has('bag') ? $attributes->get('bag') : null)
        <p class="mt-2 text-sm text-red-400">
            {{ $message }}
        </p>
    @enderror
@endif
