<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2.5 bg-blue-600 border border-transparent rounded-sm font-semibold text-sm text-white text-center tracking-wide hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:blue-900 focus:shadow-blue-800 hover:bg-blue-900 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
