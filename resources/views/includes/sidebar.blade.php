<aside class="sticky top-0 w-full h-screen border-r md:w-64 md:min-h-screen bg-slate-100"
    {{ stimulus_controller('menu') }}>
    <div class="flex justify-between items-center p-4 dark:bg-blue-900">
        <a href="{{ route('app.home.index') }}" class="flex items-center">
            <img src="{{ asset('images/logo/koteshen_cropped.png') }}" alt="Koteshen logo" class="w-32">
        </a>
        <div class="flex md:hidden">
            <button type="button" {{ stimulus_action('menu', 'toggle') }}
                class="text-white hover:text-blue-500 focus:text-blue-500 focus:outline-none">
                <svg class="w-8 fill-current" fill="none" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>
    <div class="hidden py-6 px-2 md:block" {{ stimulus_target('menu', 'nav') }}>
        <ul class="">
            <li @class([
                'py-3 px-2 mt-2 rounded hover:bg-blue-900 group dark:text-blue-500 hover:text-white',
                'bg-blue-900 text-white' => Route::is('app.home.*'),
            ])>
                <a href="{{ route('app.home.index') }}" class="flex items-center">
                    <i class="w-6 bi bi-buildings"></i>
                    <span class="mx-2">Dashboard</span>
                </a>
            </li>

            <li @class([
                'py-3 px-2 mt-2 rounded hover:bg-blue-900 group dark:text-blue-500 hover:text-white',
                'bg-blue-900 text-white' => Route::is('app.clients.*'),
            ])>
                <a href="{{ route('app.clients.index') }}" class="flex items-center">
                    <i class="w-6 bi bi-people"></i>
                    <span class="mx-2">Clients</span>
                </a>
            </li>

            <li @class([
                'py-3 px-2 mt-2 rounded hover:bg-blue-900 group dark:text-blue-500 hover:text-white',
                'bg-blue-900 text-white' => Route::is('app.invoices.*'),
            ])>
                <a href="{{ route('app.invoices.index') }}" class="flex items-center">
                    <i class="w-6 bi bi-file-earmark-check"></i>
                    <span class="mx-2">Invoices</span>
                </a>
            </li>

            <li @class([
                'py-3 px-2 mt-2 rounded hover:bg-blue-900 group dark:text-blue-500 hover:text-white',
                'bg-blue-900 text-white' => Route::is('app.estimates.*'),
            ])>
                <a href="{{ route('app.estimates.index') }}" class="flex items-center">
                    <i class="w-6 bi bi-quote"></i>
                    <span class="mx-2">Estimates</span>
                </a>
            </li>



        </ul>

        <div class="-mx-2 mt-2 border-t border-blue-700 md:hidden"></div>
        <ul class="mt-6 md:hidden">
            <li class="py-3 px-2 mt-2 rounded hover:bg-blue-900">
                <a href="#" class="mx-2 text-white">Account Settings</a>
            </li>
            <li class="py-3 px-2 mt-2 rounded hover:bg-blue-900">
                <button class="mx-2 text-white" @click="logout">Logout</button>
            </li>
        </ul>
    </div>
</aside>
