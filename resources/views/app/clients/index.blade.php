@extends('app')

@section('content')
    <section>
        <div class="flex justify-between items-center md:items-baseline">
            <div>
                <h1 class="text-xl font-semibold md:text-2xl text-slate-700">Clients</h1>
            </div>
            <div>
                <a href="{{ route('app.clients.create') }}">
                    <x-button>Add new client</x-button>
                </a>
            </div>
        </div>
    </section>


    <section class="pt-10 pb-2">


        <form class="flex items-center w-full md:max-w-lg">
            <label for="voice-search" class="sr-only">Search</label>
            <div class="relative w-full">

                <x-form.input name="name" class="w-full" placeholder="Start typing..." />
            </div>
        </form>
    </section>

    <div class="flex flex-col mt-6">
        <div class="overflow-x-auto -my-2 -mx-4 sm:-mx-6 lg:-mx-8">
            <div class="inline-block py-2 min-w-full align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border shadow-sm md:rounded border-slate-200 dark:border-slate-700">
                    <table class="min-w-full divide-y divide-slate-200 dark:divide-slate-700">
                        <thead class="bg-slate-50 dark:bg-slate-800">

                            <tr>
                                <th scope="col"
                                    class="py-3.5 px-4 text-sm font-normal text-left text-slate-500 rtl:text-right dark:text-slate-400">
                                    <div class="flex gap-x-3 items-center">
                                        <span>Contact Person</span>
                                    </div>
                                </th>

                                <th scope="col"
                                    class="py-3.5 px-4 text-sm font-normal text-left text-slate-500 rtl:text-right dark:text-slate-400">
                                    <button class="flex gap-x-2 items-center">
                                        <span>Name</span>
                                    </button>
                                </th>

                                <th scope="col"
                                    class="py-3.5 px-4 text-sm font-normal text-left text-slate-500 rtl:text-right dark:text-slate-400">
                                    <button class="flex gap-x-2 items-center">
                                        <span>Phone</span>
                                    </button>
                                </th>

                                <th scope="col"
                                    class="py-3.5 px-4 text-sm font-normal text-left text-slate-500 rtl:text-right dark:text-slate-400">
                                    <button class="flex gap-x-2 items-center">
                                        <span>Client Type</span>
                                    </button>
                                </th>

                                <th scope="col"
                                    class="py-3.5 px-4 text-sm font-normal text-left text-slate-500 rtl:text-right dark:text-slate-400">
                                    Email
                                </th>

                                <th scope="col"
                                    class="py-3.5 px-4 text-sm font-normal text-left text-slate-500 rtl:text-right dark:text-slate-400">
                                    Created
                                </th>

                                <th scope="col" class="relative py-3.5 px-4">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-200 dark:bg-slate-800 dark:divide-slate-700">

                            @foreach ($clients as $client)
                                <tr>
                                    <td class="py-4 px-4 text-sm font-medium whitespace-nowrap text-slate-700">
                                        <div class="inline-flex gap-x-3 items-center">
                                            <div class="flex gap-x-2 items-center">
                                                <div>
                                                    <h2 class="font-medium dark:text-white text-slate-800">
                                                        {{ $client->first_name }} {{ $client->last_name }}
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4 text-sm font-medium whitespace-nowrap text-slate-700">
                                        {{ $client->name }}
                                    </td>
                                    <td class="py-4 px-4 text-sm whitespace-nowrap text-slate-500 dark:text-slate-300">
                                        {{ phone($client->phone, $client->phone_country) }}
                                    </td>
                                    <td class="py-4 px-4 text-sm whitespace-nowrap text-slate-500 dark:text-slate-300">
                                        {{ $client->type }}
                                    </td>
                                    <td class="py-4 px-4 text-sm whitespace-nowrap text-slate-500 dark:text-slate-300">
                                        {{ $client->email }}
                                    </td>
                                    <td class="py-4 px-4 text-sm whitespace-nowrap">
                                        <div class="flex gap-x-2 items-start">
                                            <p class="py-1 text-sm rounded-full text-slate-500">
                                                {{ $client->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4 text-sm whitespace-nowrap">
                                        <div class="flex gap-x-6 items-center">
                                            <a href="{{ route('app.clients.destroy', $client) }}" data-turbo-method="delete"
                                                data-turbo-confirm="This will also remove data linked with the account. Are you sure?">
                                                <button
                                                    class="transition-colors duration-200 hover:text-red-500 focus:outline-none text-slate-500 dark:text-slate-300 dark:hover:text-red-500">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                    </svg>
                                                </button>
                                            </a>
                                            <a href="{{ route('app.clients.edit', $client) }}">
                                                <button
                                                    class="transition-colors duration-200 hover:text-yellow-500 focus:outline-none text-slate-500 dark:text-slate-300 dark:hover:text-yellow-500">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                    </svg>
                                                </button>
                                            </a>

                                            <a href="{{ route('app.clients.show', $client) }}">
                                                <x-secondary-button>
                                                    View
                                                </x-secondary-button>
                                            </a>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach



                        </tbody>
                    </table>

                    <div class="py-10 px-5">
                        {{ $clients->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
