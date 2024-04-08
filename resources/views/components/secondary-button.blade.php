<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2.5 border border-gray-300 bg-white rounded font-medium text-sm text-gray-700 shadow-sm text-center tracking-wide hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-blue-900 focus:shadow-outline-blue transition ease-in-out duration-150 dark:bg-slate-800 dark:text-slate-300 dark:border-slate-700 dark:hover:bg-slate-700']) }}>
    {{ $slot }}
</button>
