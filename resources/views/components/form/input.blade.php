<input
    {{ $attributes->merge([
        'class' =>
            $attributes->has('name') &&
            $errors->{$attributes->has('bag') ? $attributes->get('bag') : 'default'}->has($attributes->get('name'))
                ? 'animate__animated animate__shakeX block border dark:text-slate-300 dark:placeholder:text-slate-400 focus:border-red-300 focus:ring-red-400 p-2.5 rounded text-sm border-red-400 dark:border-red-400 dark:bg-slate-800'
                : 'block border border-[1.5px] border-stroke rounded dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary focus:border-primary active:border-primary disabled:bg-whitertext-sm',
    ]) }}>

@if ($attributes->has('name'))
    @error($attributes->get('name'), $attributes->has('bag') ? $attributes->get('bag') : null)
        <p class="mt-2 text-sm italic font-semibold text-red-400">
            {{ $message }}
        </p>
    @enderror
@endif
