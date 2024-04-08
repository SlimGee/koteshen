<button {{ $attributes->merge(['class' => "inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-sm bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900" ]) }}>
    {{ $slot }}
</button>
