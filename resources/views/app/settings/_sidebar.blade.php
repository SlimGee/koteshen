<div id="application-sidebar"
    class="hidden sticky inset-y-0 top-0 bg-white rounded border shadow-sm transition-all duration-300 transform -translate-x-full lg:block lg:bottom-0 lg:translate-x-0 hs-overlay [--auto-close:lg] hs-overlay-open:translate-x-0 w-[260px] start-0 z-[20] lg:end-auto dark:bg-neutral-800 dark:border-neutral-700">
    <nav class="flex top-0 flex-col flex-wrap p-6 w-full hs-accordion-group" data-hs-accordion-always-open>
        <ul class="space-y-1.5">
            <li>
                <a @class([
                    'flex gap-x-3.5 items-center py-2 px-2.5 text-sm font-medium rounded dark:text-white hover:bg-blue-400 hover:text-white dark:bg-neutral-700',
                    'bg-blue-600  text-white ' => Route::is('app.settings.index'),
                ]) href="{{ route('app.settings.index') }}">
                    Business Details
                </a>
            </li>

            <li>
                <a class="flex gap-x-3.5 items-center py-2 px-2.5 w-full text-sm rounded-lg hover:bg-gray-100 text-neutral-700 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300"
                    href="#">

                    Payment Settings
                </a>
            </li>
            <li>
                <a class="flex gap-x-3.5 items-center py-2 px-2.5 w-full text-sm rounded-lg hover:bg-gray-100 text-neutral-700 dark:hover:bg-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-300"
                    href="#">
                    Tax
                </a>
            </li>

            <li>
                <a class="flex gap-x-3.5 items-center py-2 px-2.5 w-full text-sm rounded-lg hover:bg-gray-100 text-neutral-700 dark:hover:bg-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-300"
                    href="#">
                    Email Settings
                </a>
            </li>

            <li>
                <a class="flex gap-x-3.5 items-center py-2 px-2.5 w-full text-sm rounded-lg hover:bg-gray-100 text-neutral-700 dark:hover:bg-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-300"
                    href="#">
                    Templates & Reminders
                </a>
            </li>
            <li>
                <a @class([
                    'flex gap-x-3.5 items-center py-2 px-2.5 text-sm font-medium rounded dark:text-white hover:bg-blue-400 hover:text-white dark:bg-neutral-700',
                    'bg-blue-600  text-white ' => Route::is('app.billing.edit'),
                ]) href="{{ route('app.billing.edit') }}">
                    Billing
                </a>
            </li>


            <li>
                <a @class([
                    'flex gap-x-3.5 items-center py-2 px-2.5 text-sm font-medium rounded dark:text-white hover:bg-blue-400 hover:text-white dark:bg-neutral-700',
                    'bg-blue-600  text-white ' => Route::is('app.profile.edit'),
                ]) href="{{ route('app.profile.edit') }}">
                    My Profile
                </a>
            </li>

        </ul>
    </nav>
</div>
