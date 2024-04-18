<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2.5 border hover:text-blue-600 hover:border-blue-600   border-gray-300 bg-white rounded font-semibold text-sm text-gray-700 shadow-sm text-center tracking-wide hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:shadow-outline-blue transition ease-in-out duration-150 dark:bg-slate-800 dark:text-slate-300 dark:border-slate-700 dark:hover:bg-slate-700']) }}>
    {{ $slot }}
</button>
