<!-- ========== FOOTER ========== -->
<footer class="py-16 px-4 mx-auto mt-auto w-screen border-t sm:px-6 lg:px-8">
    <div class="container mx-auto max-w-[85rem]">
        <!-- Grid -->
        <div class="grid grid-cols-2 gap-6 mb-10 md:grid-cols-4 lg:grid-cols-5">
            <div class="hidden col-span-full lg:block lg:col-span-1">
                <a class="flex-none text-xl font-semibold" href="{{ route('home.index') }}" aria-label="Brand">
                    <img src="{{ asset('images/logo/1.png') }}" alt="Koteshen logo" class="w-28">
                </a>
                <p class="mt-1 text-xs sm:text-sm text-slate-600">&copy; {{ date('Y') }} Koteshen.</p>
            </div>
            <!-- End Col -->

            <div>
                <h4 class="text-xs font-semibold uppercase text-slate-900">Product</h4>

                <div class="grid mt-3 space-y-3 text-sm">
                    <p><a class="inline-flex gap-x-2 text-slate-600 hover:text-slate-800" href="#">Pricing</a>
                    </p>

                </div>
            </div>
            <!-- End Col -->

            <div>
                <h4 class="text-xs font-semibold uppercase text-slate-900">Company</h4>

                <div class="grid mt-3 space-y-3 text-sm">
                    <p><a class="inline-flex gap-x-2 text-slate-600 hover:text-slate-800" href="#">About us</a>
                    </p>
                    <p><a class="inline-flex gap-x-2 text-slate-600 hover:text-slate-800" href="#">Blog</a></p>

                </div>
            </div>
            <!-- End Col -->

            <div>
                <h4 class="text-xs font-semibold uppercase text-slate-900">Resources</h4>

                <div class="grid mt-3 space-y-3 text-sm">
                    <p><a class="inline-flex gap-x-2 text-slate-600 hover:text-slate-800" href="#">Community</a>
                    </p>
                    <p><a class="inline-flex gap-x-2 text-slate-600 hover:text-slate-800" href="#">Help &
                            Support</a>
                    </p>

                </div>
            </div>
            <!-- End Col -->

            <div>
                <h4 class="text-xs font-semibold uppercase text-slate-900">You</h4>

                <div class="grid mt-3 space-y-3 text-sm">
                    <p><a class="inline-flex gap-x-2 text-slate-600 hover:text-slate-800" href="/#pricing">Register</a>
                    </p>
                    <p><a class="inline-flex gap-x-2 text-slate-600 hover:text-slate-800"
                            href="{{ route('login') }}">Login</a></p>
                    <p><a class="inline-flex gap-x-2 text-slate-600 hover:text-slate-800"
                            href="{{ route('app.invoices.create') }}">Create invoice</a></p>
                </div>


            </div>
            <!-- End Col -->
        </div>
        <!-- End Grid -->

        <div class="pt-5 mt-5 border-t border-slate-200">
            <div class="sm:flex sm:justify-between sm:items-center">
                <div class="flex gap-x-3 items-center">
                    <!-- Language Dropdown -->

                    <div class="space-x-4 text-sm ms-4">
                        <a class="inline-flex gap-x-2 text-slate-600 hover:text-slate-800" href="#">Terms</a>
                        <a class="inline-flex gap-x-2 text-slate-600 hover:text-slate-800" href="#">Privacy</a>
                    </div>
                </div>

                <div class="flex justify-between items-center">
                    <div class="mt-3 sm:hidden">
                        <a class="flex-none text-xl font-semibold" href="{{ route('home.index') }}" aria-label="Brand">
                            <img src="{{ asset('images/logo/1.png') }}" alt="Koteshen logo" class="w-32">
                        </a>
                        <p class="mt-1 text-xs sm:text-sm text-slate-600">&copy; {{ date('Y') }} Koteshen.</p>
                    </div>

                    <!-- Social Brands -->
                    <div class="space-x-4">
                        <a class="inline-block text-slate-500 hover:text-slate-800"
                            href="https://linkedin.com/company/koteshen" target="_blank">
                            <i class="bi bi-linkedin"></i>
                        </a>
                    </div>
                    <!-- End Social Brands -->
                </div>
                <!-- End Col -->
            </div>
        </div>
    </div>
</footer>
