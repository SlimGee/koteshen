<header class="flex z-50 flex-wrap w-full text-sm md:flex-nowrap md:justify-start">
    <nav class="relative py-3 px-4 mx-2 mt-6 w-full bg-white border md:flex md:justify-between md:items-center md:py-0 md:px-6 lg:px-8 xl:mx-auto border-slate-200 max-w-[85rem] rounded-[36px]"
        aria-label="Global">
        <div class="flex justify-between items-center">
            <a class="flex-none text-xl font-semibold" href="{{ route('home.index') }}" aria-label="Koteshen">
                <img src="{{ asset('images/logo/1.png') }}" alt="Koteshen logo" class="w-32">
            </a>
            <div class="md:hidden">
                <button type="button"
                    class="flex justify-center items-center text-sm font-semibold rounded-full border disabled:opacity-50 disabled:pointer-events-none text-slate-800 border-slate-200 hs-collapse-toggle size-8 hover:bg-slate-100"
                    data-hs-collapse="#navbar-collapse-with-animation" aria-controls="navbar-collapse-with-animation"
                    aria-label="Toggle navigation">
                    <svg class="flex-shrink-0 hs-collapse-open:hidden size-4" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" x2="21" y1="6" y2="6" />
                        <line x1="3" x2="21" y1="12" y2="12" />
                        <line x1="3" x2="21" y1="18" y2="18" />
                    </svg>
                    <svg class="hidden flex-shrink-0 hs-collapse-open:block size-4" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <div id="navbar-collapse-with-animation"
            class="hidden overflow-hidden transition-all duration-300 md:block hs-collapse basis-full grow">
            <div
                class="flex flex-col gap-x-0 gap-y-4 mt-5 md:flex-row md:gap-y-0 md:gap-x-7 md:justify-end md:items-center md:mt-0 md:ps-7">
                <a class="font-medium text-blue-600 md:py-6" href="#" aria-current="page">Home</a>
                <a class="font-medium md:py-6 text-slate-500 hover:text-slate-400" target="_blank"
                    href="https://x.com/ncubegiven_">Twitter</a>



                <a class="flex gap-x-2 items-center font-medium md:my-6 hover:text-blue-600 text-slate-500 md:border-slate-300 md:border-s md:ps-6"
                    href="{{ route('login') }}">
                    <i class="bi bi-person-circle"></i>
                    Get early access
                </a>
            </div>
        </div>
    </nav>
</header>
