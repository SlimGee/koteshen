<div data-controller="cropper" data-cropper-value="{{ $attributes['value'] }}"
    data-cropper-storage="{{ $storage ?? config('platform.attachment.disk', 'public') }}"
    data-cropper-width="{{ $width }}" data-cropper-height="{{ $height }}"
    data-cropper-min-width="{{ $minWidth }}" data-cropper-min-height="{{ $minHeight }}"
    data-cropper-max-width="{{ $maxWidth }}" data-cropper-max-height="{{ $maxHeight }}"
    data-cropper-target="{{ $target }}" data-cropper-url="{{ $url }}"
    data-cropper-accepted-files="{{ $acceptedFiles }}" data-cropper-max-file-size="{{ $maxFileSize }}"
    data-cropper-groups="{{ $attributes['groups'] }}" data-cropper-path="{{ $attributes['path'] ?? '' }}"
    data-cropper-keep-original-type-value="{{ $keepOriginalType }}"
    data-cropper-max-size-message-value="{{ __($maxSizeValidateMessage) }}">
    <div class="p-3 border-dashed text-end cropper-actions">

        <div class="fields-cropper-container">
            <img src="#" class="hidden mb-2 border cropper-preview img-fluid img-full" alt=""
                style="--cropper-width: {{ $width }}; --cropper-height: {{ $height }};">
        </div>



        <div class="flex flex-wrap space-y-2">
            <span class="dark:text-slate-100">{{ __('Upload image from your computer:') }}</span>
            <x-secondary-button>

                <label class="flex items-center m-0 btn btn-default" for="upload">
                    <span class="material-symbols-outlined text-slate-700 dark:text-slate-100">
                        upload
                    </span>


                    {{ __('Browse') }}
                    <input type="file" id="upload" accept="image/*" data-cropper-target="upload"
                        data-action="change->cropper#upload click->cropper#openModal" class="hidden d-none">
                </label>
            </x-secondary-button>


            <x-button type="button" class="hidden btn btn-outline-danger cropper-remove" data-action="cropper#clear">
                {{ __('Remove') }}
            </x-button>
        </div>

        <input type="file" accept="{{ $acceptedFiles }}" class="hidden d-none">
    </div>

    <input class="hidden cropper-path d-none" type="text" data-cropper-target="source" {{ $attributes }}>


    <dialog data-cropper-target="modal">
        <div
            class="bg-transparent dark:bg-slate-900 dark:bg-opacity-75 verflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 flex flex-row justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">

            <div class="relative p-4 w-full max-w-2xl max-h-full">

                <form method="dialog"></form>
                <!-- Modal content -->
                <div class="relative bg-white rounded rounded-lg shadow dark:bg-slate-700">

                    <!-- Modal body -->
                    <div class="overflow-hidden relative rounded">
                        <img class="upload-panel">
                    </div>

                    <!-- Modal footer -->
                    <div class="flex items-center p-4 rounded-b border-t border-gray-200 md:p-5 dark:border-gray-600">
                        <x-secondary-button type="button" class="mr-2 btn btn-link" data-bs-dismiss="modal">
                            {{ __('Close') }}
                        </x-secondary-button>

                        <x-button type="button" class="btn btn-default" data-action="cropper#crop">
                            {{ __('Crop') }}
                        </x-button>

                    </div>
                </div>
            </div>
        </div>
    </dialog>

</div>
