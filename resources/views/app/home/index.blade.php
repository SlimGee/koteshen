@extends('app')

@section('content')
    <div class="p-4 space-y-4 sm:p-6 sm:space-y-6">
        <!-- Grid -->
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 lg:grid-cols-4">
            <!-- Card -->
            <div class="flex flex-col bg-white rounded-xl border shadow-sm dark:bg-neutral-800 dark:border-neutral-700">
                <div class="p-4 md:p-5">
                    <div class="flex gap-x-2 items-center">
                        <p class="text-xs tracking-wide text-gray-500 uppercase dark:text-neutral-500">
                            Total Revenue
                        </p>
                        <div class="hs-tooltip">
                            <div class="hs-tooltip-toggle">
                                <svg class="flex-shrink-0 text-gray-500 size-4 dark:text-neutral-500"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                                    <path d="M12 17h.01" />
                                </svg>
                                <span
                                    class="inline-block absolute invisible z-10 py-1 px-2 text-xs font-medium text-white bg-gray-900 rounded shadow-sm opacity-0 transition-opacity hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible dark:bg-neutral-700"
                                    role="tooltip">
                                    The number of daily users
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="flex gap-x-2 items-center mt-1">
                        <h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
                            72,540
                        </h3>
                        <span class="flex gap-x-1 items-center text-green-600">
                            <svg class="inline-block self-center size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="22 7 13.5 15.5 8.5 10.5 2 17" />
                                <polyline points="16 7 22 7 22 13" />
                            </svg>
                            <span class="inline-block text-sm">
                                1.7%
                            </span>
                        </span>
                    </div>
                </div>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="flex flex-col bg-white rounded-xl border shadow-sm dark:bg-neutral-800 dark:border-neutral-700">
                <div class="p-4 md:p-5">
                    <div class="flex gap-x-2 items-center">
                        <p class="text-xs tracking-wide text-gray-500 uppercase dark:text-neutral-500">
                            Outstanding
                        </p>
                    </div>

                    <div class="flex gap-x-2 items-center mt-1">
                        <h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
                            $238.49
                        </h3>
                    </div>
                </div>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="flex flex-col bg-white rounded-xl border shadow-sm dark:bg-neutral-800 dark:border-neutral-700">
                <div class="p-4 md:p-5">
                    <div class="flex gap-x-2 items-center">
                        <p class="text-xs tracking-wide text-gray-500 uppercase dark:text-neutral-500">
                            Overdue
                        </p>
                    </div>

                    <div class="flex gap-x-2 items-center mt-1">
                        <h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
                            $709
                        </h3>
                        <span class="flex gap-x-1 items-center text-red-600">
                            <svg class="inline-block self-center size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="22 17 13.5 8.5 8.5 13.5 2 7" />
                                <polyline points="16 17 22 17 22 11" />
                            </svg>
                            <span class="inline-block text-sm">
                                1.7%
                            </span>
                        </span>
                    </div>
                </div>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="flex flex-col bg-white rounded-xl border shadow-sm dark:bg-neutral-800 dark:border-neutral-700">
                <div class="p-4 md:p-5">
                    <div class="flex gap-x-2 items-center">
                        <p class="text-xs tracking-wide text-gray-500 uppercase dark:text-neutral-500">
                            Clients
                        </p>
                    </div>

                    <div class="flex gap-x-2 items-center mt-1">
                        <h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
                            92
                        </h3>
                    </div>
                </div>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Grid -->

        <div class="grid gap-4 sm:gap-6 lg:grid-cols-2">
            <!-- Card -->
            <div
                class="flex flex-col p-4 bg-white rounded-xl border shadow-sm md:p-5 min-h-[410px] dark:bg-neutral-800 dark:border-neutral-700">
                <!-- Header -->
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-sm text-gray-500 dark:text-neutral-500">
                            Income
                        </h2>
                        <p class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
                            $126,238.49
                        </p>
                    </div>

                    <div>
                        <span
                            class="inline-flex gap-x-1 items-center px-1.5 text-xs font-medium text-teal-800 bg-teal-100 rounded-md dark:text-teal-500 py-[5px] dark:bg-teal-500/10">
                            <svg class="inline-block size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 5v14" />
                                <path d="m19 12-7 7-7-7" />
                            </svg>
                            25%
                        </span>
                    </div>
                </div>
                <!-- End Header -->

                <div id="hs-multiple-bar-charts"></div>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div
                class="flex flex-col p-4 bg-white rounded-xl border shadow-sm md:p-5 min-h-[410px] dark:bg-neutral-800 dark:border-neutral-700">
                <!-- Header -->
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-sm text-gray-500 dark:text-neutral-500">
                            Visitors
                        </h2>
                        <p class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
                            80.3k
                        </p>
                    </div>

                    <div>
                        <span
                            class="inline-flex gap-x-1 items-center px-1.5 text-xs font-medium text-red-800 bg-red-100 rounded-md dark:text-red-500 py-[5px] dark:bg-red-500/10">
                            <svg class="inline-block size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 5v14" />
                                <path d="m19 12-7 7-7-7" />
                            </svg>
                            2%
                        </span>
                    </div>
                </div>
                <!-- End Header -->

                <div id="hs-single-area-chart"></div>
            </div>
            <!-- End Card -->
        </div>

        <!-- Card -->
        <div class="flex flex-col">
            <div class="overflow-x-auto -m-1.5">
                <div class="inline-block p-1.5 min-w-full align-middle">
                    <div
                        class="overflow-hidden bg-white rounded-xl border border-gray-200 shadow-sm dark:bg-neutral-800 dark:border-neutral-700">
                        <!-- Header -->
                        <div
                            class="grid gap-3 py-4 px-6 border-b border-gray-200 md:flex md:justify-between md:items-center dark:border-neutral-700">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                                    Users
                                </h2>
                                <p class="text-sm text-gray-600 dark:text-neutral-400">
                                    Add users, edit and more.
                                </p>
                            </div>

                            <div>
                                <div class="inline-flex gap-x-2">
                                    <a class="inline-flex gap-x-2 items-center py-2 px-3 text-sm font-medium text-gray-800 bg-white rounded-lg border border-gray-200 shadow-sm dark:text-white hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:hover:bg-neutral-800"
                                        href="#">
                                        View all
                                    </a>

                                    <a class="inline-flex gap-x-2 items-center py-2 px-3 text-sm font-semibold text-white bg-blue-600 rounded-lg border border-transparent hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                        href="#">
                                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M5 12h14" />
                                            <path d="M12 5v14" />
                                        </svg>
                                        Add user
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- End Header -->

                        <!-- Table -->
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead class="bg-gray-50 dark:bg-neutral-800">
                                <tr>
                                    <th scope="col" class="py-3 ps-6 text-start">
                                        <label for="hs-at-with-checkboxes-main" class="flex">
                                            <input type="checkbox"
                                                class="text-blue-600 rounded border-gray-300 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none shrink-0 dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                id="hs-at-with-checkboxes-main">
                                            <span class="sr-only">Checkbox</span>
                                        </label>
                                    </th>

                                    <th scope="col" class="py-3 ps-6 pe-6 text-start lg:ps-3 xl:ps-0">
                                        <div class="flex gap-x-2 items-center">
                                            <span
                                                class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                Name
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="py-3 px-6 text-start">
                                        <div class="flex gap-x-2 items-center">
                                            <span
                                                class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                Position
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="py-3 px-6 text-start">
                                        <div class="flex gap-x-2 items-center">
                                            <span
                                                class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                Status
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="py-3 px-6 text-start">
                                        <div class="flex gap-x-2 items-center">
                                            <span
                                                class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                Portfolio
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="py-3 px-6 text-start">
                                        <div class="flex gap-x-2 items-center">
                                            <span
                                                class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                Created
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="py-3 px-6 text-end"></th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                <tr>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 ps-6">
                                            <label for="hs-at-with-checkboxes-1" class="flex">
                                                <input type="checkbox"
                                                    class="text-blue-600 rounded border-gray-300 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none shrink-0 dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                    id="hs-at-with-checkboxes-1">
                                                <span class="sr-only">Checkbox</span>
                                            </label>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 ps-6 pe-6 lg:ps-3 xl:ps-0">
                                            <div class="flex gap-x-3 items-center">
                                                <img class="inline-block rounded-full size-[38px]"
                                                    src="https://images.unsplash.com/photo-1531927557220-a9e23c1e4794?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80"
                                                    alt="Image Description">
                                                <div class="grow">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Christina
                                                        Bersh</span>
                                                    <span
                                                        class="block text-sm text-gray-500 dark:text-neutral-500">christina@site.com</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="w-72 h-px whitespace-nowrap">
                                        <div class="py-3 px-6">
                                            <span
                                                class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Director</span>
                                            <span class="block text-sm text-gray-500 dark:text-neutral-500">Human
                                                resources</span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <span
                                                class="inline-flex gap-x-1 items-center py-1 px-1.5 text-xs font-medium text-teal-800 bg-teal-100 rounded-full dark:text-teal-500 dark:bg-teal-500/10">
                                                <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                </svg>
                                                Active
                                            </span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <div class="flex gap-x-3 items-center">
                                                <span class="text-xs text-gray-500 dark:text-neutral-500">1/5</span>
                                                <div
                                                    class="flex overflow-hidden w-full h-1.5 bg-gray-200 rounded-full dark:bg-neutral-700">
                                                    <div class="flex overflow-hidden flex-col justify-center bg-gray-800 dark:bg-neutral-200"
                                                        role="progressbar" style="width: 25%" aria-valuenow="25"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <span class="text-sm text-gray-500 dark:text-neutral-500">28 Dec,
                                                12:12</span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-1.5 px-6">
                                            <a class="inline-flex gap-x-1 items-center text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline decoration-2"
                                                href="#">
                                                Edit
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 ps-6">
                                            <label for="hs-at-with-checkboxes-2" class="flex">
                                                <input type="checkbox"
                                                    class="text-blue-600 rounded border-gray-300 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none shrink-0 dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                    id="hs-at-with-checkboxes-2">
                                                <span class="sr-only">Checkbox</span>
                                            </label>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 ps-6 pe-6 lg:ps-3 xl:ps-0">
                                            <div class="flex gap-x-3 items-center">
                                                <img class="inline-block rounded-full size-[38px]"
                                                    src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80"
                                                    alt="Image Description">
                                                <div class="grow">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">David
                                                        Harrison</span>
                                                    <span
                                                        class="block text-sm text-gray-500 dark:text-neutral-500">david@site.com</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="w-72 h-px whitespace-nowrap">
                                        <div class="py-3 px-6">
                                            <span
                                                class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Seller</span>
                                            <span class="block text-sm text-gray-500 dark:text-neutral-500">Branding
                                                products</span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <span
                                                class="inline-flex gap-x-1 items-center py-1 px-1.5 text-xs font-medium text-yellow-800 bg-yellow-100 rounded-full dark:text-yellow-500 dark:bg-yellow-500/10">
                                                <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                </svg>
                                                Warning
                                            </span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <div class="flex gap-x-3 items-center">
                                                <span class="text-xs text-gray-500 dark:text-neutral-500">3/5</span>
                                                <div
                                                    class="flex overflow-hidden w-full h-1.5 bg-gray-200 rounded-full dark:bg-neutral-700">
                                                    <div class="flex overflow-hidden flex-col justify-center bg-gray-800 dark:bg-neutral-200"
                                                        role="progressbar" style="width: 78%" aria-valuenow="78"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <span class="text-sm text-gray-500 dark:text-neutral-500">20 Dec,
                                                09:27</span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-1.5 px-6">
                                            <a class="inline-flex gap-x-1 items-center text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline decoration-2"
                                                href="#">
                                                Edit
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 ps-6">
                                            <label for="hs-at-with-checkboxes-3" class="flex">
                                                <input type="checkbox"
                                                    class="text-blue-600 rounded border-gray-300 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none shrink-0 dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                    id="hs-at-with-checkboxes-3">
                                                <span class="sr-only">Checkbox</span>
                                            </label>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 ps-6 pe-6 lg:ps-3 xl:ps-0">
                                            <div class="flex gap-x-3 items-center">
                                                <span
                                                    class="inline-flex justify-center items-center bg-white rounded-full border border-gray-300 size-[38px] dark:bg-neutral-800 dark:border-neutral-700">
                                                    <span
                                                        class="text-sm font-medium leading-none text-gray-800 dark:text-neutral-200">A</span>
                                                </span>
                                                <div class="grow">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Anne
                                                        Richard</span>
                                                    <span
                                                        class="block text-sm text-gray-500 dark:text-neutral-500">anne@site.com</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="w-72 h-px whitespace-nowrap">
                                        <div class="py-3 px-6">
                                            <span
                                                class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Designer</span>
                                            <span class="block text-sm text-gray-500 dark:text-neutral-500">IT
                                                department</span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <span
                                                class="inline-flex gap-x-1 items-center py-1 px-1.5 text-xs font-medium text-teal-800 bg-teal-100 rounded-full dark:text-teal-500 dark:bg-teal-500/10">
                                                <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                </svg>
                                                Active
                                            </span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <div class="flex gap-x-3 items-center">
                                                <span class="text-xs text-gray-500 dark:text-neutral-500">5/5</span>
                                                <div
                                                    class="flex overflow-hidden w-full h-1.5 bg-gray-200 rounded-full dark:bg-neutral-700">
                                                    <div class="flex overflow-hidden flex-col justify-center bg-gray-800 dark:bg-neutral-200"
                                                        role="progressbar" style="width: 100%" aria-valuenow="100"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <span class="text-sm text-gray-500 dark:text-neutral-500">18 Dec,
                                                15:20</span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-1.5 px-6">
                                            <a class="inline-flex gap-x-1 items-center text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline decoration-2"
                                                href="#">
                                                Edit
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 ps-6">
                                            <label for="hs-at-with-checkboxes-4" class="flex">
                                                <input type="checkbox"
                                                    class="text-blue-600 rounded border-gray-300 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none shrink-0 dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                    id="hs-at-with-checkboxes-4">
                                                <span class="sr-only">Checkbox</span>
                                            </label>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 ps-6 pe-6 lg:ps-3 xl:ps-0">
                                            <div class="flex gap-x-3 items-center">
                                                <img class="inline-block rounded-full size-[38px]"
                                                    src="https://images.unsplash.com/photo-1541101767792-f9b2b1c4f127?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&&auto=format&fit=facearea&facepad=3&w=300&h=300&q=80"
                                                    alt="Image Description">
                                                <div class="grow">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Samia
                                                        Kartoon</span>
                                                    <span
                                                        class="block text-sm text-gray-500 dark:text-neutral-500">samia@site.com</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="w-72 h-px whitespace-nowrap">
                                        <div class="py-3 px-6">
                                            <span
                                                class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Executive
                                                director</span>
                                            <span
                                                class="block text-sm text-gray-500 dark:text-neutral-500">Marketing</span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <span
                                                class="inline-flex gap-x-1 items-center py-1 px-1.5 text-xs font-medium text-teal-800 bg-teal-100 rounded-full dark:text-teal-500 dark:bg-teal-500/10">
                                                <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                </svg>
                                                Active
                                            </span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <div class="flex gap-x-3 items-center">
                                                <span class="text-xs text-gray-500 dark:text-neutral-500">0/5</span>
                                                <div
                                                    class="flex overflow-hidden w-full h-1.5 bg-gray-200 rounded-full dark:bg-neutral-700">
                                                    <div class="flex overflow-hidden flex-col justify-center bg-gray-800 dark:bg-neutral-200"
                                                        role="progressbar" style="width: 1%" aria-valuenow="1"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <span class="text-sm text-gray-500 dark:text-neutral-500">18 Dec,
                                                15:20</span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-1.5 px-6">
                                            <a class="inline-flex gap-x-1 items-center text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline decoration-2"
                                                href="#">
                                                Edit
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 ps-6">
                                            <label for="hs-at-with-checkboxes-5" class="flex">
                                                <input type="checkbox"
                                                    class="text-blue-600 rounded border-gray-300 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none shrink-0 dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                    id="hs-at-with-checkboxes-5">
                                                <span class="sr-only">Checkbox</span>
                                            </label>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 ps-6 pe-6 lg:ps-3 xl:ps-0">
                                            <div class="flex gap-x-3 items-center">
                                                <span
                                                    class="inline-flex justify-center items-center bg-white rounded-full border border-gray-300 size-[38px] dark:bg-neutral-800 dark:border-neutral-700">
                                                    <span
                                                        class="text-sm font-medium leading-none text-gray-800 dark:text-neutral-200">D</span>
                                                </span>
                                                <div class="grow">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">David
                                                        Harrison</span>
                                                    <span
                                                        class="block text-sm text-gray-500 dark:text-neutral-500">david@site.com</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="w-72 h-px whitespace-nowrap">
                                        <div class="py-3 px-6">
                                            <span
                                                class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Developer</span>
                                            <span class="block text-sm text-gray-500 dark:text-neutral-500">Mobile
                                                app</span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <span
                                                class="inline-flex gap-x-1 items-center py-1 px-1.5 text-xs font-medium text-red-800 bg-red-100 rounded-full dark:text-red-500 dark:bg-red-500/10">
                                                <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                </svg>
                                                Danger
                                            </span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <div class="flex gap-x-3 items-center">
                                                <span class="text-xs text-gray-500 dark:text-neutral-500">3/5</span>
                                                <div
                                                    class="flex overflow-hidden w-full h-1.5 bg-gray-200 rounded-full dark:bg-neutral-700">
                                                    <div class="flex overflow-hidden flex-col justify-center bg-gray-800 dark:bg-neutral-200"
                                                        role="progressbar" style="width: 78%" aria-valuenow="78"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <span class="text-sm text-gray-500 dark:text-neutral-500">15 Dec,
                                                14:41</span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-1.5 px-6">
                                            <a class="inline-flex gap-x-1 items-center text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline decoration-2"
                                                href="#">
                                                Edit
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 ps-6">
                                            <label for="hs-at-with-checkboxes-6" class="flex">
                                                <input type="checkbox"
                                                    class="text-blue-600 rounded border-gray-300 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none shrink-0 dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                    id="hs-at-with-checkboxes-6">
                                                <span class="sr-only">Checkbox</span>
                                            </label>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 ps-6 pe-6 lg:ps-3 xl:ps-0">
                                            <div class="flex gap-x-3 items-center">
                                                <img class="inline-block rounded-full size-[38px]"
                                                    src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80"
                                                    alt="Image Description">
                                                <div class="grow">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Brian
                                                        Halligan</span>
                                                    <span
                                                        class="block text-sm text-gray-500 dark:text-neutral-500">brian@site.com</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="w-72 h-px whitespace-nowrap">
                                        <div class="py-3 px-6">
                                            <span
                                                class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Accountant</span>
                                            <span class="block text-sm text-gray-500 dark:text-neutral-500">Finance</span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <span
                                                class="inline-flex gap-x-1 items-center py-1 px-1.5 text-xs font-medium text-teal-800 bg-teal-100 rounded-full dark:text-teal-500 dark:bg-teal-500/10">
                                                <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                </svg>
                                                Active
                                            </span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <div class="flex gap-x-3 items-center">
                                                <span class="text-xs text-gray-500 dark:text-neutral-500">2/5</span>
                                                <div
                                                    class="flex overflow-hidden w-full h-1.5 bg-gray-200 rounded-full dark:bg-neutral-700">
                                                    <div class="flex overflow-hidden flex-col justify-center bg-gray-800 dark:bg-neutral-200"
                                                        role="progressbar" style="width: 40%" aria-valuenow="40"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <span class="text-sm text-gray-500 dark:text-neutral-500">11 Dec,
                                                18:51</span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-1.5 px-6">
                                            <a class="inline-flex gap-x-1 items-center text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline decoration-2"
                                                href="#">
                                                Edit
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 ps-6">
                                            <label for="hs-at-with-checkboxes-7" class="flex">
                                                <input type="checkbox"
                                                    class="text-blue-600 rounded border-gray-300 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none shrink-0 dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                    id="hs-at-with-checkboxes-7">
                                                <span class="sr-only">Checkbox</span>
                                            </label>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 ps-6 pe-6 lg:ps-3 xl:ps-0">
                                            <div class="flex gap-x-3 items-center">
                                                <img class="inline-block rounded-full size-[38px]"
                                                    src="https://images.unsplash.com/photo-1659482634023-2c4fda99ac0c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80"
                                                    alt="Image Description">
                                                <div class="grow">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Andy
                                                        Clerk</span>
                                                    <span
                                                        class="block text-sm text-gray-500 dark:text-neutral-500">andy@site.com</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="w-72 h-px whitespace-nowrap">
                                        <div class="py-3 px-6">
                                            <span
                                                class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Director</span>
                                            <span class="block text-sm text-gray-500 dark:text-neutral-500">Human
                                                resources</span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <span
                                                class="inline-flex gap-x-1 items-center py-1 px-1.5 text-xs font-medium text-teal-800 bg-teal-100 rounded-full dark:text-teal-500 dark:bg-teal-500/10">
                                                <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                </svg>
                                                Active
                                            </span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <div class="flex gap-x-3 items-center">
                                                <span class="text-xs text-gray-500 dark:text-neutral-500">1/5</span>
                                                <div
                                                    class="flex overflow-hidden w-full h-1.5 bg-gray-200 rounded-full dark:bg-neutral-700">
                                                    <div class="flex overflow-hidden flex-col justify-center bg-gray-800 dark:bg-neutral-200"
                                                        role="progressbar" style="width: 25%" aria-valuenow="25"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <span class="text-sm text-gray-500 dark:text-neutral-500">28 Dec,
                                                12:12</span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-1.5 px-6">
                                            <a class="inline-flex gap-x-1 items-center text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline decoration-2"
                                                href="#">
                                                Edit
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 ps-6">
                                            <label for="hs-at-with-checkboxes-8" class="flex">
                                                <input type="checkbox"
                                                    class="text-blue-600 rounded border-gray-300 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none shrink-0 dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                    id="hs-at-with-checkboxes-8">
                                                <span class="sr-only">Checkbox</span>
                                            </label>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 ps-6 pe-6 lg:ps-3 xl:ps-0">
                                            <div class="flex gap-x-3 items-center">
                                                <img class="inline-block rounded-full size-[38px]"
                                                    src="https://images.unsplash.com/photo-1601935111741-ae98b2b230b0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80"
                                                    alt="Image Description">
                                                <div class="grow">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Bart
                                                        Simpson</span>
                                                    <span
                                                        class="block text-sm text-gray-500 dark:text-neutral-500">Bart@site.com</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="w-72 h-px whitespace-nowrap">
                                        <div class="py-3 px-6">
                                            <span
                                                class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Seller</span>
                                            <span class="block text-sm text-gray-500 dark:text-neutral-500">Branding
                                                products</span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <span
                                                class="inline-flex gap-x-1 items-center py-1 px-1.5 text-xs font-medium text-yellow-800 bg-yellow-100 rounded-full dark:text-yellow-500 dark:bg-yellow-500/10">
                                                <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                </svg>
                                                Warning
                                            </span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <div class="flex gap-x-3 items-center">
                                                <span class="text-xs text-gray-500 dark:text-neutral-500">3/5</span>
                                                <div
                                                    class="flex overflow-hidden w-full h-1.5 bg-gray-200 rounded-full dark:bg-neutral-700">
                                                    <div class="flex overflow-hidden flex-col justify-center bg-gray-800 dark:bg-neutral-200"
                                                        role="progressbar" style="width: 78%" aria-valuenow="78"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <span class="text-sm text-gray-500 dark:text-neutral-500">20 Dec,
                                                09:27</span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-1.5 px-6">
                                            <a class="inline-flex gap-x-1 items-center text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline decoration-2"
                                                href="#">
                                                Edit
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 ps-6">
                                            <label for="hs-at-with-checkboxes-9" class="flex">
                                                <input type="checkbox"
                                                    class="text-blue-600 rounded border-gray-300 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none shrink-0 dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                    id="hs-at-with-checkboxes-9">
                                                <span class="sr-only">Checkbox</span>
                                            </label>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 ps-6 pe-6 lg:ps-3 xl:ps-0">
                                            <div class="flex gap-x-3 items-center">
                                                <span
                                                    class="inline-flex justify-center items-center bg-white rounded-full border border-gray-300 size-[38px] dark:bg-neutral-800 dark:border-neutral-700">
                                                    <span
                                                        class="text-sm font-medium leading-none text-gray-800 dark:text-neutral-200">C</span>
                                                </span>
                                                <div class="grow">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Camila
                                                        Welters</span>
                                                    <span
                                                        class="block text-sm text-gray-500 dark:text-neutral-500">cwelt@site.com</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="w-72 h-px whitespace-nowrap">
                                        <div class="py-3 px-6">
                                            <span
                                                class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Designer</span>
                                            <span class="block text-sm text-gray-500 dark:text-neutral-500">IT
                                                department</span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <span
                                                class="inline-flex gap-x-1 items-center py-1 px-1.5 text-xs font-medium text-teal-800 bg-teal-100 rounded-full dark:text-teal-500 dark:bg-teal-500/10">
                                                <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                </svg>
                                                Active
                                            </span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <div class="flex gap-x-3 items-center">
                                                <span class="text-xs text-gray-500 dark:text-neutral-500">5/5</span>
                                                <div
                                                    class="flex overflow-hidden w-full h-1.5 bg-gray-200 rounded-full dark:bg-neutral-700">
                                                    <div class="flex overflow-hidden flex-col justify-center bg-gray-800 dark:bg-neutral-200"
                                                        role="progressbar" style="width: 100%" aria-valuenow="100"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <span class="text-sm text-gray-500 dark:text-neutral-500">18 Dec,
                                                15:20</span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-1.5 px-6">
                                            <a class="inline-flex gap-x-1 items-center text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline decoration-2"
                                                href="#">
                                                Edit
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 ps-6">
                                            <label for="hs-at-with-checkboxes-10" class="flex">
                                                <input type="checkbox"
                                                    class="text-blue-600 rounded border-gray-300 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none shrink-0 dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                    id="hs-at-with-checkboxes-10">
                                                <span class="sr-only">Checkbox</span>
                                            </label>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 ps-6 pe-6 lg:ps-3 xl:ps-0">
                                            <div class="flex gap-x-3 items-center">
                                                <img class="inline-block rounded-full size-[38px]"
                                                    src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80"
                                                    alt="Image Description">
                                                <div class="grow">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Oliver
                                                        Schevich</span>
                                                    <span
                                                        class="block text-sm text-gray-500 dark:text-neutral-500">oliver@site.com</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="w-72 h-px whitespace-nowrap">
                                        <div class="py-3 px-6">
                                            <span
                                                class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Seller</span>
                                            <span class="block text-sm text-gray-500 dark:text-neutral-500">Branding
                                                products</span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <span
                                                class="inline-flex gap-x-1 items-center py-1 px-1.5 text-xs font-medium text-yellow-800 bg-yellow-100 rounded-full dark:text-yellow-500 dark:bg-yellow-500/10">
                                                <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                </svg>
                                                Warning
                                            </span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <div class="flex gap-x-3 items-center">
                                                <span class="text-xs text-gray-500 dark:text-neutral-500">3/5</span>
                                                <div
                                                    class="flex overflow-hidden w-full h-1.5 bg-gray-200 rounded-full dark:bg-neutral-700">
                                                    <div class="flex overflow-hidden flex-col justify-center bg-gray-800 dark:bg-neutral-200"
                                                        role="progressbar" style="width: 78%" aria-valuenow="78"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <span class="text-sm text-gray-500 dark:text-neutral-500">20 Dec,
                                                09:27</span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-1.5 px-6">
                                            <a class="inline-flex gap-x-1 items-center text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline decoration-2"
                                                href="#">
                                                Edit
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 ps-6">
                                            <label for="hs-at-with-checkboxes-11" class="flex">
                                                <input type="checkbox"
                                                    class="text-blue-600 rounded border-gray-300 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none shrink-0 dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                    id="hs-at-with-checkboxes-11">
                                                <span class="sr-only">Checkbox</span>
                                            </label>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 ps-6 pe-6 lg:ps-3 xl:ps-0">
                                            <div class="flex gap-x-3 items-center">
                                                <span
                                                    class="inline-flex justify-center items-center bg-white rounded-full border border-gray-300 size-[38px] dark:bg-neutral-800 dark:border-neutral-700">
                                                    <span
                                                        class="text-sm font-medium leading-none text-gray-800 dark:text-neutral-200">I</span>
                                                </span>
                                                <div class="grow">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Inna
                                                        Ivy</span>
                                                    <span
                                                        class="block text-sm text-gray-500 dark:text-neutral-500">invy@site.com</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="w-72 h-px whitespace-nowrap">
                                        <div class="py-3 px-6">
                                            <span
                                                class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Designer</span>
                                            <span class="block text-sm text-gray-500 dark:text-neutral-500">IT
                                                department</span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <span
                                                class="inline-flex gap-x-1 items-center py-1 px-1.5 text-xs font-medium text-teal-800 bg-teal-100 rounded-full dark:text-teal-500 dark:bg-teal-500/10">
                                                <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                </svg>
                                                Active
                                            </span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <div class="flex gap-x-3 items-center">
                                                <span class="text-xs text-gray-500 dark:text-neutral-500">5/5</span>
                                                <div
                                                    class="flex overflow-hidden w-full h-1.5 bg-gray-200 rounded-full dark:bg-neutral-700">
                                                    <div class="flex overflow-hidden flex-col justify-center bg-gray-800 dark:bg-neutral-200"
                                                        role="progressbar" style="width: 100%" aria-valuenow="100"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <span class="text-sm text-gray-500 dark:text-neutral-500">18 Dec,
                                                15:20</span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-1.5 px-6">
                                            <a class="inline-flex gap-x-1 items-center text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline decoration-2"
                                                href="#">
                                                Edit
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 ps-6">
                                            <label for="hs-at-with-checkboxes-12" class="flex">
                                                <input type="checkbox"
                                                    class="text-blue-600 rounded border-gray-300 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none shrink-0 dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                    id="hs-at-with-checkboxes-12">
                                                <span class="sr-only">Checkbox</span>
                                            </label>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 ps-6 pe-6 lg:ps-3 xl:ps-0">
                                            <div class="flex gap-x-3 items-center">
                                                <img class="inline-block rounded-full size-[38px]"
                                                    src="https://images.unsplash.com/photo-1670272505340-d906d8d77d03?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80"
                                                    alt="Image Description">
                                                <div class="grow">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Jessica
                                                        Williams</span>
                                                    <span
                                                        class="block text-sm text-gray-500 dark:text-neutral-500">myhairisred@site.com</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="w-72 h-px whitespace-nowrap">
                                        <div class="py-3 px-6">
                                            <span
                                                class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Executive
                                                director</span>
                                            <span
                                                class="block text-sm text-gray-500 dark:text-neutral-500">Marketing</span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <span
                                                class="inline-flex gap-x-1 items-center py-1 px-1.5 text-xs font-medium text-teal-800 bg-teal-100 rounded-full dark:text-teal-500 dark:bg-teal-500/10">
                                                <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                </svg>
                                                Active
                                            </span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <div class="flex gap-x-3 items-center">
                                                <span class="text-xs text-gray-500 dark:text-neutral-500">0/5</span>
                                                <div
                                                    class="flex overflow-hidden w-full h-1.5 bg-gray-200 rounded-full dark:bg-neutral-700">
                                                    <div class="flex overflow-hidden flex-col justify-center bg-gray-800 dark:bg-neutral-200"
                                                        role="progressbar" style="width: 1%" aria-valuenow="1"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-3 px-6">
                                            <span class="text-sm text-gray-500 dark:text-neutral-500">18 Dec,
                                                15:20</span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap size-px">
                                        <div class="py-1.5 px-6">
                                            <a class="inline-flex gap-x-1 items-center text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline decoration-2"
                                                href="#">
                                                Edit
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- End Table -->

                        <!-- Footer -->
                        <div
                            class="grid gap-3 py-4 px-6 border-t border-gray-200 md:flex md:justify-between md:items-center dark:border-neutral-700">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-neutral-400">
                                    <span class="font-semibold text-gray-800 dark:text-neutral-200">12</span> results
                                </p>
                            </div>

                            <div>
                                <div class="inline-flex gap-x-2">
                                    <button type="button"
                                        class="inline-flex gap-x-2 items-center py-1.5 px-2 text-sm font-medium text-gray-800 bg-white rounded-lg border border-gray-200 shadow-sm dark:text-white hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:hover:bg-neutral-800">
                                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="m15 18-6-6 6-6" />
                                        </svg>
                                        Prev
                                    </button>

                                    <button type="button"
                                        class="inline-flex gap-x-2 items-center py-1.5 px-2 text-sm font-medium text-gray-800 bg-white rounded-lg border border-gray-200 shadow-sm dark:text-white hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:hover:bg-neutral-800">
                                        Next
                                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="m9 18 6-6-6-6" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- End Footer -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>

    <!-- End Content -->
    <!-- ========== END MAIN CONTENT ========== -->
@endsection
