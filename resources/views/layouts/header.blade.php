    <div class="flex absolute top-0 left-0 z-40 items-center w-full bg-transparent border-b sm:border-none border-slate-700 ud-header"
        data-controller="menu" data-menu-toggle-class="hidden">
        <div class="container mx-auto">
            <div class="flex relative justify-between items-center sm:-mx-4">
                <div class="px-4 w-60 max-w-full">
                    <a href="index.html" class="block py-5 w-full navbar-logo">
                        <img src="{{ asset('images/logo/koteshen_cropped.png') }}" alt="logo"
                            class="w-full header-logo" />
                    </a>
                </div>
                <div class="flex justify-between items-center px-4 w-full">
                    <div>
                        <button data-action="menu#toggle"
                            class="block absolute right-4 top-1/2 px-3 rounded-lg -translate-y-1/2 lg:hidden py-[6px]">
                            <span class="block relative bg-white my-[6px] h-[2px] w-[30px]"></span>
                            <span class="block relative bg-white my-[6px] h-[2px] w-[30px]"></span>
                            <span class="block relative bg-white my-[6px] h-[2px] w-[30px]"></span>
                        </button>
                        <nav id="navbarCollapse" data-menu-target="menu"
                            class="hidden absolute right-4 top-full py-5 w-full bg-white rounded-lg shadow-lg lg:block lg:static lg:py-0 lg:px-4 lg:w-full lg:max-w-full lg:bg-transparent lg:shadow-none xl:px-6 max-w-[250px] dark:bg-dark-2 dark:lg:bg-transparent">
                            <ul class="block lg:flex 2xl:ml-20">
                                <li class="relative group">
                                    <a href="/#home"
                                        class="flex py-2 mx-8 text-base font-medium lg:inline-flex lg:py-6 lg:px-0 lg:mr-0 lg:text-white dark:text-white group-hover:text-blue-600 ud-menu-scroll text-dark lg:group-hover:text-white lg:group-hover:opacity-70">
                                        Home
                                    </a>
                                </li>
                                <li class="relative group">
                                    <a href="/#pricing"
                                        class="flex py-2 mx-8 text-base font-medium lg:inline-flex lg:py-6 lg:px-0 lg:mr-0 lg:ml-7 lg:text-white xl:ml-10 dark:text-white group-hover:text-blue-600 ud-menu-scroll text-dark lg:group-hover:text-white lg:group-hover:opacity-70">
                                        Pricing
                                    </a>
                                </li>
                                <li class="relative group">
                                    <a href="/#contact"
                                        class="flex py-2 mx-8 text-base font-medium lg:inline-flex lg:py-6 lg:px-0 lg:mr-0 lg:ml-7 lg:text-white xl:ml-10 dark:text-white group-hover:text-blue-600 ud-menu-scroll text-dark lg:group-hover:text-white lg:group-hover:opacity-70">
                                        Contact
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="flex justify-end items-center pr-16 lg:pr-0">
                        <div class="hidden sm:flex">
                            <a href="{{ route('login') }}"
                                class="py-2 text-base font-medium text-white hover:opacity-70 loginBtn px-[22px]">
                                Sign In
                            </a>
                            <a href="{{ route('register') }}"
                                class="py-2 px-6 text-base font-medium text-white bg-white bg-opacity-20 rounded-md duration-300 ease-in-out hover:bg-opacity-100 signUpBtn hover:text-dark">
                                Sign Up
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
