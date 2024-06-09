<div id="application-sidebar-brand"
    class="hs-overlay [--auto-close:lg] hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform hidden fixed top-0 start-0 bottom-0 z-[60] w-64 bg-blue-700 pt-7 pb-10 overflow-y-auto lg:block lg:translate-x-0 lg:end-auto lg:bottom-0 [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
    <div class="px-6">
        <a class="flex-none text-xl font-semibold text-white" href="{{ route('app.home.index') }}"
            aria-label="Brand">Koteshen admin</a>
    </div>

    <nav class="flex flex-col flex-wrap p-6 w-full hs-accordion-group" data-hs-accordion-always-open>
        <ul class="space-y-1.5">
            <li>
                <a @class([
                    'flex gap-x-3 items-center py-2 px-2.5 text-sm text-white rounded-lg  hover:text-white hover:bg-blue-600',
                    'bg-blue-600' => Route::is('admin.home.index'),
                ]) href="{{ route('admin.home.index') }}">
                    <i class="bi bi-house"></i>
                    Dashboard
                </a>
            </li>

            <li>
                <a @class([
                    'flex gap-x-3 items-center py-2 px-2.5 text-sm text-white rounded-lg  hover:text-white hover:bg-blue-600',
                    'bg-blue-600' => Route::is('admin.posts.*'),
                ]) href="{{ route('admin.posts.index') }}">
                    <i class="bi bi-tags"></i>
                    Posts
                </a>
            </li>

            <li>
                <a @class([
                    'flex gap-x-3 items-center py-2 px-2.5 text-sm text-white rounded-lg  hover:text-white hover:bg-blue-600',
                    'bg-blue-600' => Route::is('admin.promo-codes.*'),
                ]) href="{{ route('admin.promo-codes.index') }}">
                    <i class="bi bi-bag-check"></i>
                    Promo Codes
                </a>
            </li>
        </ul>
    </nav>
</div>
