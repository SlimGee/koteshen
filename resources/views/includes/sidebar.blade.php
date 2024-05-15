 <div {{ stimulus_controller('menu') }} id="application-sidebar"
     class="hidden fixed inset-y-0 bg-white border-gray-200 transition-all duration-300 transform -translate-x-full lg:block lg:bottom-0 lg:translate-x-0 hs-overlay [--auto-close:lg] hs-overlay-open:translate-x-0 w-[260px] start-0 z-[60] border-e lg:end-auto dark:bg-neutral-800 dark:border-neutral-700">
     <div class="px-8 pt-4">
         <!-- Logo -->
         <a href="{{ route('app.home.index') }}"
             class="inline-block flex-none text-xl font-semibold rounded-xl focus:opacity-80 focus:outline-none">
             <img src="{{ asset('images/logo/koteshen_cropped.png') }}" alt="Koteshen logo" class="w-32">
         </a>
         <!-- End Logo -->
     </div>

     <nav class="flex flex-col flex-wrap p-6 w-full hs-accordion-group" data-hs-accordion-always-open>
         <ul class="space-y-1.5">
             <li>
                 <a href="{{ route('app.home.index') }}" @class([
                     'flex gap-x-3.5 items-center py-2 px-2.5 w-full text-sm rounded hover:bg-blue-500 hover:text-white text-neutral-700 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300',
                     'bg-blue-accent-400 text-white' => Route::is('app.home.*'),
                 ])>
                     <i class="bi bi-house"></i>
                     </svg>
                     Dashboard
                 </a>
             </li>
             <li>
                 <a href="{{ route('app.clients.index') }}" @class([
                     'flex gap-x-3.5 items-center py-2 px-2.5 w-full text-sm rounded hover:bg-blue-500 hover:text-white text-neutral-700 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300',
                     'bg-blue-accent-400 text-white' => Route::is('app.clients.*'),
                 ])>
                     <i class="bi bi-buildings"></i>
                     </svg>
                     Clients
                 </a>
             </li>
             <li>
                 <a href="{{ route('app.invoices.index') }}" @class([
                     'flex gap-x-3.5 items-center py-2 px-2.5 w-full text-sm rounded hover:bg-blue-500 hover:text-white text-neutral-700 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300',
                     'bg-blue-accent-400 text-white' => Route::is('app.invoices.*'),
                 ])>
                     <i class="bi bi-file-earmark-check"></i>
                     </svg>
                     Invoices
                 </a>
             </li>

             <li>
                 <a href="{{ route('app.estimates.index') }}" @class([
                     'flex gap-x-3.5 items-center py-2 px-2.5 w-full text-sm rounded hover:bg-blue-500 hover:text-white text-neutral-700 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300',
                     'bg-blue-accent-400 text-white' => Route::is('app.estimates.*'),
                 ])>
                     <i class="bi bi-quote"></i>
                     </svg>
                     Estimates
                 </a>
             </li>
             <li>
                 <a href="{{ route('app.settings.index') }}" @class([
                     'flex gap-x-3.5 items-center py-2 px-2.5 w-full text-sm rounded hover:bg-blue-500 hover:text-white text-neutral-700 dark:hover:bg-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-300',
                     'bg-blue-accent-400 text-white' => Route::is('app.settings.*'),
                 ])>
                     <i class="bi bi-gear"></i>
                     Settings
                 </a>
             </li>

         </ul>
     </nav>
 </div>
