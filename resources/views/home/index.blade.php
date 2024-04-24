@extends('layouts.app')

@section('content')
    <!-- Hero -->
    <div class="overflow-hidden">
        <div class="py-20 px-4 mx-auto sm:px-6 lg:px-8 max-w-[85rem]">
            <div class="grid relative mx-auto space-y-5 max-w-4xl sm:space-y-10">
                <!-- Title -->
                <div class="text-center">
                    <h1
                        class="text-3xl font-bold sm:text-5xl lg:text-6xl lg:leading-tight text-slate-800 dark:text-neutral-200">
                        Invoicing Tool That Gets You Paid Faster <span class="text-blue-500">(and Reduces Stress)</span>
                    </h1>

                    <p class="mt-4 text-lg font-semibold md:text-2xl md:font-medium text-slate-500 dark:text-neutral-200">
                        Ditch scattered spreadsheets and manual processes. Koteshen centralizes your billing for clarity,
                        control, and healthier cash flow.
                    </p>
                </div>
                <!-- End Title -->

                <!-- Avatar Group -->
                <!-- Form -->
                <form>
                    <div class="flex justify-center">
                        <div class="grid pt-2 sm:block sm:pt-0 sm:flex-[0_0_auto]">
                            <a href="#pricing">
                                <x-button class="justify-center w-full md:w-auto">
                                    Get 50% off early access
                                </x-button>
                            </a>
                        </div>
                    </div>
                </form>
                <!-- End Form -->

                <!-- SVG Element -->
                <div class="hidden absolute top-2/4 transform -translate-x-40 -translate-y-2/4 md:block lg:-translate-x-80 start-0"
                    aria-hidden="true">
                    <svg class="w-52 h-auto" width="717" height="653" viewBox="0 0 717 653" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M170.176 228.357C177.176 230.924 184.932 227.329 187.498 220.329C190.064 213.329 186.47 205.574 179.47 203.007L170.176 228.357ZM98.6819 71.4156L85.9724 66.8638L85.8472 67.2136L85.7413 67.5698L98.6819 71.4156ZM336.169 77.9736L328.106 88.801L328.288 88.9365L328.475 89.0659L336.169 77.9736ZM616.192 128.685C620.658 122.715 619.439 114.254 613.469 109.788L516.183 37.0035C510.213 32.5371 501.753 33.756 497.286 39.726C492.82 45.696 494.039 54.1563 500.009 58.6227L586.485 123.32L521.788 209.797C517.322 215.767 518.541 224.227 524.511 228.694C530.481 233.16 538.941 231.941 543.407 225.971L616.192 128.685ZM174.823 215.682C179.47 203.007 179.475 203.009 179.48 203.011C179.482 203.012 179.486 203.013 179.489 203.014C179.493 203.016 179.496 203.017 179.498 203.018C179.501 203.019 179.498 203.018 179.488 203.014C179.469 203.007 179.425 202.99 179.357 202.964C179.222 202.912 178.991 202.822 178.673 202.694C178.035 202.437 177.047 202.026 175.768 201.456C173.206 200.314 169.498 198.543 165.106 196.099C156.27 191.182 144.942 183.693 134.609 173.352C114.397 153.124 97.7311 122.004 111.623 75.2614L85.7413 67.5698C68.4512 125.748 89.856 166.762 115.51 192.436C128.11 205.047 141.663 213.953 151.976 219.692C157.158 222.575 161.591 224.698 164.777 226.118C166.371 226.828 167.659 227.365 168.578 227.736C169.038 227.921 169.406 228.065 169.675 228.168C169.809 228.22 169.919 228.261 170.002 228.293C170.044 228.309 170.08 228.322 170.109 228.333C170.123 228.338 170.136 228.343 170.147 228.347C170.153 228.349 170.16 228.352 170.163 228.353C170.17 228.355 170.176 228.357 174.823 215.682ZM111.391 75.9674C118.596 55.8511 137.372 33.9214 170.517 28.6833C204.135 23.3705 255.531 34.7533 328.106 88.801L344.233 67.1462C268.876 11.0269 210.14 -4.91361 166.303 2.01428C121.993 9.01681 95.9904 38.8917 85.9724 66.8638L111.391 75.9674ZM328.475 89.0659C398.364 137.549 474.018 153.163 607.307 133.96L603.457 107.236C474.34 125.837 406.316 110.204 343.864 66.8813L328.475 89.0659Z"
                            fill="currentColor" class="fill-slate-800 dark:fill-white" />
                        <path
                            d="M17.863 238.22C10.4785 237.191 3.6581 242.344 2.62917 249.728C1.60024 257.113 6.75246 263.933 14.137 264.962L17.863 238.22ZM117.548 265.74L119.421 252.371L119.411 252.37L117.548 265.74ZM120.011 466.653L132.605 471.516L132.747 471.147L132.868 470.771L120.011 466.653ZM285.991 553.767C291.813 549.109 292.756 540.613 288.098 534.792L212.193 439.92C207.536 434.098 199.04 433.154 193.218 437.812C187.396 442.47 186.453 450.965 191.111 456.787L258.582 541.118L174.251 608.589C168.429 613.247 167.486 621.742 172.143 627.564C176.801 633.386 185.297 634.329 191.119 629.672L285.991 553.767ZM14.137 264.962L115.685 279.111L119.411 252.37L17.863 238.22L14.137 264.962ZM115.675 279.11C124.838 280.393 137.255 284.582 145.467 291.97C149.386 295.495 152.093 299.505 153.39 304.121C154.673 308.691 154.864 314.873 152.117 323.271L177.779 331.665C181.924 318.993 182.328 307.301 179.383 296.818C176.451 286.381 170.485 278.159 163.524 271.897C149.977 259.71 131.801 254.105 119.421 252.371L115.675 279.11ZM152.117 323.271C138.318 365.454 116.39 433.697 107.154 462.535L132.868 470.771C142.103 441.936 164.009 373.762 177.779 331.665L152.117 323.271ZM107.417 461.79C103.048 473.105 100.107 491.199 107.229 508.197C114.878 526.454 132.585 539.935 162.404 543.488L165.599 516.678C143.043 513.99 135.175 505.027 132.132 497.764C128.562 489.244 129.814 478.743 132.605 471.516L107.417 461.79ZM162.404 543.488C214.816 549.734 260.003 554.859 276.067 556.643L279.047 529.808C263.054 528.032 217.939 522.915 165.599 516.678L162.404 543.488Z"
                            fill="currentColor" class="fill-orange-500" />
                        <path
                            d="M229.298 165.61C225.217 159.371 216.85 157.621 210.61 161.702C204.371 165.783 202.621 174.15 206.702 180.39L229.298 165.61ZM703.921 410.871C711.364 410.433 717.042 404.045 716.605 396.602L709.47 275.311C709.032 267.868 702.643 262.189 695.2 262.627C687.757 263.065 682.079 269.454 682.516 276.897L688.858 384.71L581.045 391.052C573.602 391.49 567.923 397.879 568.361 405.322C568.799 412.765 575.187 418.444 582.63 418.006L703.921 410.871ZM206.702 180.39C239.898 231.14 343.567 329.577 496.595 322.758L495.394 295.785C354.802 302.049 259.09 211.158 229.298 165.61L206.702 180.39ZM496.595 322.758C567.523 319.598 610.272 335.61 637.959 353.957C651.944 363.225 662.493 373.355 671.17 382.695C675.584 387.447 679.351 391.81 683.115 396.047C686.719 400.103 690.432 404.172 694.159 407.484L712.097 387.304C709.691 385.166 706.92 382.189 703.298 378.113C699.837 374.217 695.636 369.362 690.951 364.319C681.43 354.07 669.255 342.306 652.874 331.451C619.829 309.553 571.276 292.404 495.394 295.785L496.595 322.758Z"
                            fill="currentColor" class="fill-cyan-500" />
                    </svg>
                </div>
                <!-- End SVG Element -->

                <!-- SVG Element -->
                <div class="hidden absolute top-2/4 transform translate-x-40 -translate-y-2/4 md:block lg:translate-x-80 end-0"
                    aria-hidden="true">
                    <svg class="w-72 h-auto" width="1115" height="636" viewBox="0 0 1115 636" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0.990203 279.321C-1.11035 287.334 3.68307 295.534 11.6966 297.634L142.285 331.865C150.298 333.965 158.497 329.172 160.598 321.158C162.699 313.145 157.905 304.946 149.892 302.845L33.8132 272.418L64.2403 156.339C66.3409 148.326 61.5475 140.127 53.5339 138.026C45.5204 135.926 37.3213 140.719 35.2207 148.733L0.990203 279.321ZM424.31 252.289C431.581 256.26 440.694 253.585 444.664 246.314C448.635 239.044 445.961 229.931 438.69 225.96L424.31 252.289ZM23.0706 296.074C72.7581 267.025 123.056 230.059 187.043 212.864C249.583 196.057 325.63 198.393 424.31 252.289L438.69 225.96C333.77 168.656 249.817 164.929 179.257 183.892C110.144 202.465 54.2419 243.099 7.92943 270.175L23.0706 296.074Z"
                            fill="currentColor" class="fill-orange-500" />
                        <path
                            d="M451.609 382.417C446.219 388.708 446.95 398.178 453.241 403.567L555.763 491.398C562.054 496.788 571.524 496.057 576.913 489.766C582.303 483.474 581.572 474.005 575.281 468.615L484.15 390.544L562.222 299.413C567.612 293.122 566.881 283.652 560.59 278.263C554.299 272.873 544.829 273.604 539.44 279.895L451.609 382.417ZM837.202 559.655C841.706 566.608 850.994 568.593 857.947 564.09C864.9 559.586 866.885 550.298 862.381 543.345L837.202 559.655ZM464.154 407.131C508.387 403.718 570.802 395.25 638.136 410.928C704.591 426.401 776.318 465.66 837.202 559.655L862.381 543.345C797.144 442.631 718.724 398.89 644.939 381.709C572.033 364.734 504.114 373.958 461.846 377.22L464.154 407.131Z"
                            fill="currentColor" class="fill-cyan-500" />
                        <path
                            d="M447.448 0.194357C439.203 -0.605554 431.87 5.43034 431.07 13.6759L418.035 148.045C417.235 156.291 423.271 163.623 431.516 164.423C439.762 165.223 447.095 159.187 447.895 150.942L459.482 31.5025L578.921 43.0895C587.166 43.8894 594.499 37.8535 595.299 29.6079C596.099 21.3624 590.063 14.0296 581.818 13.2297L447.448 0.194357ZM1086.03 431.727C1089.68 439.166 1098.66 442.239 1106.1 438.593C1113.54 434.946 1116.62 425.96 1112.97 418.521L1086.03 431.727ZM434.419 24.6572C449.463 42.934 474.586 81.0463 521.375 116.908C568.556 153.07 637.546 187.063 742.018 200.993L745.982 171.256C646.454 157.985 582.444 125.917 539.625 93.0974C496.414 59.978 474.537 26.1903 457.581 5.59138L434.419 24.6572ZM742.018 200.993C939.862 227.372 1054.15 366.703 1086.03 431.727L1112.97 418.521C1077.85 346.879 956.138 199.277 745.982 171.256L742.018 200.993Z"
                            fill="currentColor" class="fill-slate-800 dark:fill-white" />
                    </svg>
                </div>
                <!-- End SVG Element -->
            </div>
        </div>
    </div>

    <!-- Features -->
    <div class="py-16 px-4 mx-auto sm:px-6 lg:py-14 lg:px-8 max-w-[85rem]">
        <!-- Grid -->
        <div class="md:grid md:grid-cols-2 md:gap-12 md:items-center xl:gap-32">
            <div>
                <img class="rounded-xl shadow" src="{{ asset('images/screenshots/invoice_2.png') }}"
                    alt="Image Description">
            </div>
            <!-- End Col -->

            <div class="mt-5 sm:mt-10 lg:mt-0">
                <div class="space-y-6 sm:space-y-8">
                    <!-- Title -->
                    <div class="space-y-2 md:space-y-4">
                        <h2 class="text-3xl font-bold lg:text-4xl text-slate-800">
                            Sick of feeling like your billing process is out of control?
                        </h2>
                        <p class="text-slate-500">
                            Every minute spent wrestling with invoices is a minute you're not doing what you love, or
                            getting paid for the work you've already done.
                        </p>
                    </div>
                    <!-- End Title -->

                    <!-- List -->
                    <ul class="space-y-2 sm:space-y-4">
                        <li class="flex space-x-3">
                            <span
                                class="flex justify-center items-center mt-0.5 text-blue-600 bg-blue-50 rounded-full size-5">
                                <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                            </span>

                            <span class="text-sm sm:text-base text-slate-500">
                                Effortless Payments = Happy Customers. Offer a convenient, streamlined payment experience
                                that builds trust
                            </span>
                        </li>

                        <li class="flex space-x-3">
                            <span
                                class="flex justify-center items-center mt-0.5 text-blue-600 bg-blue-50 rounded-full size-5">
                                <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                            </span>

                            <span class="text-sm sm:text-base text-slate-500">
                                Get Paid Sooner, Not Later. Reduce delays and friction by making it incredibly easy for
                                clients to pay
                            </span>
                        </li>

                        <li class="flex space-x-3">
                            <span
                                class="flex justify-center items-center mt-0.5 text-blue-600 bg-blue-50 rounded-full size-5">
                                <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                            </span>

                            <span class="text-sm sm:text-base text-slate-500">
                                Stop Guessing, Start Growing. Turn raw data into actionable insights that drive smarter
                                business decisions. </span>
                        </li>
                    </ul>
                    <!-- End List -->
                </div>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Grid -->
    </div>


    <div class="py-16 px-4 mx-auto sm:px-6 lg:py-14 lg:px-8 max-w-[85rem]">
        <!-- Grid -->
        <div class="md:grid md:grid-cols-2 md:gap-12 md:items-center xl:gap-32">
            <!-- End Col -->

            <div class="mt-5 sm:mt-10 lg:mt-0">
                <div class="space-y-6 sm:space-y-8">
                    <div class="space-y-2 md:space-y-4">
                        <h2 class="text-3xl font-bold lg:text-4xl text-slate-800">
                            Invoicing shouldn't leave you feeling exhausted and deflated
                        </h2>
                    </div>
                    <!-- End Title -->

                    <!-- List -->
                    <ul class="space-y-2 sm:space-y-4">
                        <li class="flex space-x-3">
                            <!-- Solid Check -->
                            <span
                                class="flex justify-center items-center mt-0.5 text-blue-600 bg-blue-50 rounded-full size-5">
                                <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                            </span>
                            <!-- End Solid Check -->

                            <span class="text-sm sm:text-base text-slate-500">
                                Make informed business decisions, not guesses, with real-time data </span>
                        </li>

                        <li class="flex space-x-3">
                            <!-- Solid Check -->
                            <span
                                class="flex justify-center items-center mt-0.5 text-blue-600 bg-blue-50 rounded-full size-5">
                                <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                            </span>
                            <!-- End Solid Check -->

                            <span class="text-sm sm:text-base text-slate-500">
                                Spend minutes on invoices that impress clients and elevate your brand
                            </span>
                        </li>

                        <li class="flex space-x-3">
                            <!-- Solid Check -->
                            <span
                                class="flex justify-center items-center mt-0.5 text-blue-600 bg-blue-50 rounded-full size-5">
                                <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                            </span>
                            <!-- End Solid Check -->

                            <span class="text-sm sm:text-base text-slate-500">
                                Automated reminders ensure you get paid on time, so you can focus on what you love. </span>
                        </li>
                    </ul>
                    <!-- End List -->
                    <!-- End List -->
                </div>
            </div>

            <div>
                <img class="rounded-xl shadow" src="{{ asset('images/screenshots/invoice_actions.png') }}"
                    alt="Image Description">
            </div>

            <!-- End Col -->
        </div>
        <!-- End Grid -->
    </div>



    <!-- Pricing -->
    <div class="py-16 px-4 mx-auto sm:px-6 lg:py-14 lg:px-8 max-w-[85rem]" id="pricing">
        <!-- Title -->
        <div class="mx-auto mb-10 max-w-2xl text-center lg:mb-14">
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight">Pricing</h2>
            <p class="mt-1 text-slate-600">
                Finally, a price tag that you can afford
            </p>
        </div>
        <!-- End Title -->

        <!-- Switch -->
        <div class="flex justify-center items-center">
            <label class="text-sm text-slate-500 min-w-14 me-3">Monthly</label>

            <input type="checkbox" id="hs-basic-with-description"
                class="relative p-px h-7 text-transparent rounded-full border-transparent transition-colors duration-200 ease-in-out cursor-pointer checked:text-blue-600 checked:bg-none checked:border-blue-600 focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none bg-slate-100 w-[3.25rem] before:inline-block before:size-6 before:bg-white before:translate-x-0 before:rounded-full before:shadow before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 checked:before:bg-white checked:before:translate-x-full focus:checked:border-blue-600"
                disabled>

            <label class="relative text-sm text-slate-500 min-w-14 ms-3">
                Annual
            </label>
        </div>
        <!-- End Switch -->

        <!-- Grid -->
        <div class="grid gap-6 justify-center mx-auto mt-12 max-w-4xl sm:grid-cols-2 lg:grid-cols-3 lg:items-center">
            <!-- Card -->
            <div class="flex flex-col p-8 text-center rounded-xl border border-slate-200">
                <h4 class="text-lg font-medium text-slate-800">Starter</h4>
                <span class="mt-5 text-5xl font-bold text-slate-800">
                    <span class="text-2xl font-bold -me-2">$</span>
                    9.99
                    <span class="-ml-3 text-2xl font-bold">/mo</span>
                </span>
                <p class="mt-2 text-sm text-slate-500">50% off first 3 months</p>

                <ul class="mt-7 space-y-2.5 text-sm">
                    <li class="flex space-x-2">
                        <svg class="flex-shrink-0 mt-0.5 text-blue-600 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        <span class="text-slate-800">
                            Up to 10 clients
                        </span>
                    </li>

                    <li class="flex space-x-2">
                        <svg class="flex-shrink-0 mt-0.5 text-blue-600 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        <span class="text-slate-800">
                            Up to 15 invoices per month
                        </span>
                    </li>

                    <li class="flex space-x-2">
                        <svg class="flex-shrink-0 mt-0.5 text-blue-600 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        <span class="text-slate-800">
                            Reporting during tax season
                        </span>
                    </li>

                    <li class="flex space-x-2">
                        <svg class="flex-shrink-0 mt-0.5 text-blue-600 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        <span class="text-slate-800">
                            Send unlimited estimates
                        </span>
                    </li>

                    <li class="flex space-x-2">
                        <svg class="flex-shrink-0 mt-0.5 text-blue-600 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        <span class="text-left text-slate-800">
                            Get paid with credit cards, Ecocash, Zipit and bank transfer
                        </span>
                    </li>

                </ul>

                <a class="mt-3" href="{{ route('register', ['plan' => 'starter']) }}">
                    <x-secondary-button>
                        Get 50% off first 3 months
                    </x-secondary-button>
                </a>
            </div>

            <!-- End Card -->

            <!-- Card -->
            <div class="flex flex-col p-8 text-center rounded-xl border-2 border-blue-600 shadow-xl">
                <p class="mb-3">
                    <span
                        class="inline-flex gap-1.5 items-center py-1.5 px-3 text-xs font-semibold text-blue-800 uppercase bg-blue-100 rounded-lg">
                        Recommended
                    </span>
                </p>
                <h4 class="text-lg font-medium text-slate-800">Pro</h4>
                <span class="mt-5 text-5xl font-bold text-slate-800">
                    <span class="text-2xl font-bold -me-2">$</span>
                    24.99
                    <span class="-ml-3 text-2xl font-bold">/mo</span>

                </span>
                <p class="mt-2 text-sm text-slate-500">50% off first 3 months</p>

                <ul class="mt-7 space-y-2.5 text-sm">
                    <li class="flex space-x-2">
                        <svg class="flex-shrink-0 mt-0.5 text-blue-600 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        <span class="text-slate-800">
                            Up to 60 clients
                        </span>
                    </li>

                    <li class="flex space-x-2">
                        <svg class="flex-shrink-0 mt-0.5 text-blue-600 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        <span class="text-slate-800">
                            Unlimited invoices per month
                        </span>
                    </li>

                    <li class="flex space-x-2">
                        <svg class="flex-shrink-0 mt-0.5 text-blue-600 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        <span class="text-slate-800">
                            Unlimited recurring invoices
                        </span>
                    </li>


                    <li class="flex space-x-2">
                        <svg class="flex-shrink-0 mt-0.5 text-blue-600 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        <span class="text-slate-800">
                            Reporting during tax season
                        </span>
                    </li>

                    <li class="flex space-x-2">
                        <svg class="flex-shrink-0 mt-0.5 text-blue-600 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        <span class="text-slate-800">
                            Send unlimited estimates
                        </span>
                    </li>

                    <li class="flex space-x-2">
                        <svg class="flex-shrink-0 mt-0.5 text-blue-600 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        <span class="text-left text-slate-800">
                            Get paid with credit cards, Ecocash, Zipit and bank transfer
                        </span>
                    </li>


                    <li class="flex space-x-2">
                        <svg class="flex-shrink-0 mt-0.5 text-blue-600 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        <span class="text-slate-800">
                            Automated reminders
                        </span>
                    </li>

                    <li class="flex space-x-2">
                        <svg class="flex-shrink-0 mt-0.5 text-blue-600 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        <span class="text-slate-800">
                            Send unlimited estimates
                        </span>
                    </li>

                    <li class="flex space-x-2">
                        <svg class="flex-shrink-0 mt-0.5 text-blue-600 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        <span class="text-slate-800">
                            Client Portals
                        </span>
                    </li>

                </ul>

                <a class="mt-3" href="{{ route('register', ['plan' => 'pro']) }}">
                    <x-button>
                        Get 50% off first 3 months
                    </x-button>
                </a>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <!-- End Card -->

            <!-- Card -->
            <div class="flex flex-col p-8 text-center rounded-xl border border-slate-200">
                <h4 class="text-lg font-medium text-slate-800">Premium</h4>
                <span class="mt-5 text-5xl font-bold text-slate-800">
                    <span class="text-2xl font-bold -me-2">$</span>
                    60
                    <span class="-ml-3 text-2xl font-bold">/mo</span>

                </span>
                <p class="mt-2 text-sm text-slate-500">
                    50% off first 3 months
                </p>

                <ul class="mt-7 space-y-2.5 text-sm">

                    <li class="flex space-x-2">
                        <svg class="flex-shrink-0 mt-0.5 text-blue-600 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        <span class="text-slate-800">
                            Up to 60 clients
                        </span>
                    </li>

                    <li class="flex space-x-2">
                        <svg class="flex-shrink-0 mt-0.5 text-blue-600 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        <span class="text-slate-800">
                            Unlimited invoices per month
                        </span>
                    </li>

                    <li class="flex space-x-2">
                        <svg class="flex-shrink-0 mt-0.5 text-blue-600 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        <span class="text-slate-800">
                            Advanced Invoice Automation Unlimited recurring invoices
                        </span>
                    </li>


                    <li class="flex space-x-2">
                        <svg class="flex-shrink-0 mt-0.5 text-blue-600 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        <span class="text-slate-800">
                            Reporting during tax season
                        </span>
                    </li>

                    <li class="flex space-x-2">
                        <svg class="flex-shrink-0 mt-0.5 text-blue-600 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        <span class="text-slate-800">
                            Send unlimited estimates
                        </span>
                    </li>

                    <li class="flex space-x-2">
                        <svg class="flex-shrink-0 mt-0.5 text-blue-600 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        <span class="text-left text-slate-800">
                            Get paid with credit cards, Ecocash, Zipit and bank transfer
                        </span>
                    </li>


                    <li class="flex space-x-2">
                        <svg class="flex-shrink-0 mt-0.5 text-blue-600 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        <span class="text-slate-800">
                            Automated reminders
                        </span>
                    </li>

                    <li class="flex space-x-2">
                        <svg class="flex-shrink-0 mt-0.5 text-blue-600 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        <span class="text-slate-800">
                            Send unlimited estimates
                        </span>
                    </li>

                    <li class="flex space-x-2">
                        <svg class="flex-shrink-0 mt-0.5 text-blue-600 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        <span class="text-slate-800">
                            Client Portals
                        </span>
                    </li>

                    <li class="flex space-x-2">
                        <svg class="flex-shrink-0 mt-0.5 text-blue-600 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        <span class="text-slate-800">
                            Batch Invoices
                        </span>
                    </li>

                    <li class="flex space-x-2">
                        <svg class="flex-shrink-0 mt-0.5 text-blue-600 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        <span class="text-slate-800">
                            Client Portal White-Labeling
                        </span>
                    </li>

                    <li class="flex space-x-2">
                        <svg class="flex-shrink-0 mt-0.5 text-blue-600 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        <span class="text-slate-800">
                            Advanced Invoice Automation
                        </span>
                    </li>

                </ul>

                <a class="mt-3" href="{{ route('register', ['plan' => 'premium']) }}">
                    <x-secondary-button>
                        Get 50% off first 3 months
                    </x-secondary-button>
                </a>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Grid -->
        <!-- End Comparison table -->
    </div>
    <!-- End Pricing -->

    <!-- End Features -->

    <section class="w-full bg-white dark:bg-slate-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-md text-center">
                <h2 class="mb-4 text-4xl font-extrabold tracking-tight dark:text-white text-slate-900">
                    Be among the first 100 people to sign up and get 50% off your first 3 months
                </h2>

                <p class="mb-8 font-light sm:text-xl text-slate-500 dark:text-slate-400">
                    We are looking for 100 early adopters to help us shape the future of Koteshen.
                    We are so confident that you will love Koteshen that we are offering you 50% off your first 3 months.
                    Sign up now and start creating invoices in minutes.
                </p>
                <div class="flex flex-col justify-center space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4">
                    <a href="/#pricing">
                        <x-button>
                            Get 50% off first 3 months
                        </x-button>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
