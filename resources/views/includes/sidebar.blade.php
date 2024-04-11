<aside class="w-full border-r md:w-64 md:min-h-screen bg-slate-100" {{ stimulus_controller('menu') }}>
    <div class="flex justify-between items-center p-4 h-10 dark:bg-slate-900">
        <a href="#" class="flex items-center">
            <span class="mx-2 text-xl font-semibold text-slate-900 dark:text-slate-300">Koteshen</span>
        </a>
        <div class="flex md:hidden">
            <button type="button" {{ stimulus_action('menu', 'toggle') }}
                class="focus:outline-none text-slate-300 hover:text-slate-500 focus:text-slate-500">
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
                'py-3 px-2 mt-2 rounded hover:bg-slate-900',
                'bg-slate-900' => Route::is('app.home.*'),
            ])>
                <a href="{{ route('app.home.index') }}" class="flex items-center">
                    <i class="w-6 bi bi-house text-slate-500"></i>
                    <span class="mx-2 text-slate-300">Dashboard</span>
                </a>
            </li>

            <li @class([
                'py-3 px-2 mt-2 rounded hover:bg-slate-900 group dark:text-slate-500 group-hover:text-slate-300s',
                'bg-slate-900 text-slate-300' => Route::is('app.clients.*'),
            ])>
                <a href="{{ route('app.clients.index') }}" class="flex items-center">
                    <i class="w-6 bi bi-buildings"></i>
                    <span class="mx-2">Clients</span>
                </a>
            </li>

            <li @class([
                'py-3 px-2 mt-2 rounded hover:bg-slate-900 group dark:text-slate-500 hover:text-slate-300',
                'bg-slate-900 text-slate-300' => Route::is('app.invoices.*'),
            ])>
                <a href="{{ route('app.invoices.index') }}" class="flex items-center">
                    <i class="w-6 bi bi-file-earmark-check"></i>
                    <span class="mx-2">Invoices</span>
                </a>
            </li>


        </ul>

        <div class="-mx-2 mt-2 border-t md:hidden border-slate-700"></div>
        <ul class="mt-6 md:hidden">
            <li class="py-3 px-2 mt-2 rounded hover:bg-slate-900">
                <a href="#" class="mx-2 text-slate-300">Account Settings</a>
            </li>
            <li class="py-3 px-2 mt-2 rounded hover:bg-slate-900">
                <button class="mx-2 text-slate-300" @click="logout">Logout</button>
            </li>
        </ul>
    </div>
</aside>
