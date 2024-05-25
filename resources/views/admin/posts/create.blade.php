@extends('admin')

@section('content')
    <form method="post" action="{{ route('admin.posts.store') }}">
        @csrf

        <section class="flex justify-between sm:px-6 lg:px-8 lg:pb-3">
            <div></div>
            <div>
                <div class="flex gap-x-2 justify-end">
                    <a href="{{ route('admin.posts.index') }}">
                        <x-secondary-button type="button" variant="secondary">Cancel</x-secondary-button>
                    </a>
                    <x-button type="submit">Save changes</x-button>
                </div>

            </div>
        </section>
        <section class="flex w-full">
            <div class="py-10 px-4 w-7/12 sm:px-6 lg:py-6 lg:px-8">
                <!-- Card -->
                <div class="p-4 bg-white rounded border shadow-sm sm:p-7 dark:bg-neutral-900">


                    <div class="mb-4">
                        <x-form.label>Title</x-form.label>
                        <x-form.input name="title" class="mt-1 w-full" />
                    </div>

                    <div class="mb-4">
                        <x-form.label>Content</x-form.label>

                        <div class="flex py-3 w-full h-full">
                            <div class="w-full max-w-full">
                                <textarea name="content" {{ stimulus_controller('milkdown') }}></textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="py-10 px-4 w-5/12 sm:px-6 lg:py-6 lg:px-8">
                <!-- Card -->
                <div class="p-4 bg-white rounded border shadow-sm sm:p-7 dark:bg-neutral-900">

                    <div class="mb-3">
                        <x-form.label for="name" class="mb-2">
                            Cover
                        </x-form.label>


                        <div class="w-full"
                            {{ stimulus_controller('filepond', [
                                'process' => route('images.store'),
                                'restore' => route('images.show'),
                                'revert' => route('images.destroy'),
                                'field' => 'logo',
                                'label' => 'Select cover image',
                                'config' => [
                                    'imagePreviewHeight' => 300,
                                ],
                            ]) }}>
                            <input type="file" data-filepond-target="input">

                            <template data-filepond-target="template">
                                <input data-filepond-target="upload" type="hidden" name="NAME" value="VALUE">
                            </template>

                            @error('cover')
                                <p class="mt-1 text-sm text-red-400">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>
                    </div>

                    <div class="mb-4">
                        <x-form.label>Status</x-form.label>
                        <x-form.select name="status" class="w-full" data-controller="choices">
                            @foreach (App\Enum\PostStatus::cases() as $status)
                                <option value="{{ $status->value }}" @selected(old('status') == $status->value)>{{ $status->value }}
                                </option>
                            @endforeach
                        </x-form.select>
                    </div>

                    <div class="mb-4">
                        <x-form.label>Excerpt</x-form.label>
                        <x-form.textarea data-controller="textarea-autogrow" name="keywords"
                            class="mt-1 w-full">{{ old('description') }}</x-form.textarea>
                    </div>

                    <div class="mb-4">
                        <x-form.label>Keywords</x-form.label>
                        <x-form.textarea data-controller="textarea-autogrow" name="keywords"
                            class="mt-1 w-full">{{ old('keywords') }}</x-form.textarea>
                    </div>



                    <div class="mb-4">
                        <x-form.label>Description</x-form.label>
                        <x-form.textarea data-controller="textarea-autogrow" name="description"
                            class="mt-1 w-full">{{ old('description') }}</x-form.textarea>
                    </div>
                </div>
            </div>
        </section>
    </form>
@endsection
