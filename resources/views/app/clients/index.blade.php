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
                <div class="overflow-hidden bg-white border shadow-sm md:rounded border-slate-200 dark:border-slate-700">

                    @if ($clients->isEmpty())
                        <div class="flex flex-col justify-center py-4 px-6 mx-auto w-full max-w-sm min-h-[400px]">
                            <div
                                class="flex justify-center items-center bg-gray-100 rounded-lg size-[46px] dark:bg-neutral-800">
                                <svg class="flex-shrink-0 text-gray-600 size-6 dark:text-neutral-400"
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                                    <path
                                        d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                </svg>
                            </div>

                            <h2 class="mt-5 font-semibold text-gray-800 dark:text-white">
                                No clients found
                            </h2>
                            <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                                Add a new client to get started.
                            </p>

                            <div class="mt-5">
                                <a href="{{ route('app.clients.create') }}">
                                    <x-button type="button">
                                        Create a new client
                                    </x-button>
                                </a>
                            </div>
                        </div>
                    @else
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
                                                <a href="{{ route('app.clients.destroy', $client) }}"
                                                    data-turbo-method="delete"
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
                    @endif

                    <div class="py-10 px-5">
                        {{ $clients->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
