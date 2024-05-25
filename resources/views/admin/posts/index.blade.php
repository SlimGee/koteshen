@extends('admin')

@section('content')
    <div class="py-10 px-4 mx-auto sm:px-6 lg:py-14 lg:px-8 max-w-[85rem]">
        <div class="flex flex-col">
            <div class="overflow-x-auto -m-1.5">
                <div class="inline-block p-1.5 min-w-full align-middle">
                    <div
                        class="overflow-hidden bg-white rounded border border-gray-200 shadow-sm dark:bg-neutral-900 dark:border-neutral-700">
                        <div
                            class="grid gap-3 py-4 px-6 border-b border-gray-200 md:flex md:justify-between md:items-center dark:border-neutral-700">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                                    Posts
                                </h2>
                                <p class="text-sm text-gray-600 dark:text-neutral-400">
                                    Manage your posts and their details
                                </p>
                            </div>

                            <div>
                                <div class="inline-flex gap-x-2">
                                    <a href="{{ route('admin.posts.create') }}">
                                        <x-button>
                                            <i class="mr-2 bi bi-plus-lg"></i>
                                            Create new post
                                        </x-button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- End Header -->

                        @if ($posts->isEmpty())
                            <div class="flex flex-col justify-center py-4 px-6 mx-auto w-full max-w-sm min-h-[400px]">
                                <h2 class="mt-5 font-semibold text-gray-800 dark:text-white">
                                    No posts found
                                </h2>
                                <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                                    Create a new post to get started
                                </p>


                                <div class="grid gap-2 mt-5 sm:flex">
                                    <a href="{{ route('admin.posts.create') }}">
                                        <x-button>
                                            <i class="mr-2 bi bi-plus-lg"></i>
                                            Create new post
                                        </x-button>
                                    </a>
                                </div>
                            </div>
                        @else
                            <!-- Table -->
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                <thead class="bg-gray-50 dark:bg-neutral-900">
                                    <tr>


                                        <th scope="col" class="py-3 px-6 text-start">
                                            <div class="flex gap-x-2 items-center">
                                                <span
                                                    class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                                                    Title
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
                                                    Created
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="py-3 px-6 text-end"></th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                    @foreach ($posts as $post)
                                        <tr>

                                            <td class="whitespace-nowrap size-px">
                                                <div class="py-3 px-6">
                                                    <span
                                                        class="text-sm text-gray-600 dark:text-neutral-400">{{ $post->title }}</span>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap size-px">
                                                <div class="py-3 px-6">
                                                    <span class="text-sm text-gray-600 dark:text-neutral-400">
                                                        {{ $post->status->value }}
                                                    </span>
                                                </div>
                                            </td>

                                            <td class="whitespace-nowrap size-px">
                                                <div class="py-3 px-6">
                                                    <span
                                                        class="text-sm text-gray-600 dark:text-neutral-400">{{ $post->created_at->format('d M Y') }}</span>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap size-px justify">
                                                <div class="py-1.5 px-6 ml-auto text-end">
                                                    <a href="{{ route('admin.posts.edit', $post) }}">
                                                        <x-secondary-button>
                                                            View
                                                        </x-secondary-button>
                                                    </a>

                                                    <a href="{{ route('admin.posts.destroy', $post) }}"
                                                        data-turbo-method="delete"
                                                        data-turbo-confirm="Are you sure you want to delete this post?">
                                                        <x-button class="bg-red-600">
                                                            Delete
                                                        </x-button>
                                                    </a>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        @endif

                        @if ($posts->hasPages())
                            <div class="py-6 px-4 border-t">
                                {{ $posts->links('pagination::tailwind') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Table Section -->
@endsection
