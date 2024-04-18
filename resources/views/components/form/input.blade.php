<input
    {{ $attributes->merge([
        'class' =>
            $attributes->has('name') &&
            $errors->{$attributes->has('bag') ? $attributes->get('bag') : 'default'}->has(
                convert_array_access($attributes->get('name')),
            )
                ? 'animate__animated animate__shakeX block border dark:text-slate-300 dark:placeholder:text-slate-400 focus:border-red-300 focus:ring-red-400 p-2.5 rounded  border-red-400 dark:border-red-400 dark:bg-slate-800'
                : 'block border border-gray-300 rounded p-2.5  disabled:bg-whitertext-sm',
        'value' => $attributes->has('name') ? old($attributes->get('name'), $attributes->get('value')) : null,
    ]) }}>

@if ($attributes->has('name'))
    @error(convert_array_access($attributes->get('name')), $attributes->has('bag') ? $attributes->get('bag') : null)
        <p class="mt-2 text-sm italic font-semibold text-red-400">
            {{ $message }}
        </p>
    @enderror
@endif
