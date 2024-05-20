<x-turbo::frame :id="[$commentable, isset($comment) ? 'edit_comment' : 'create_comment']">
    @if (isset($comment))
        <form class="mb-6" method="post"
            action="{{ route('app.invoices.comments.update', [$comment->commentable, $comment]) }}"
            {{ stimulus_controller('reset-form') }} {{ stimulus_action('reset-form', 'reset', 'turbo:submit-end') }}>
            @method('PATCH')
        @else
            <form class="mb-6" method="post" action="{{ route('app.invoices.comments.store', $commentable) }}"
                {{ stimulus_controller('reset-form') }}
                {{ stimulus_action('reset-form', 'reset', 'turbo:submit-end') }}>
    @endif


    <div class="py-2 px-4 mb-4 bg-white rounded border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <label for="comment" class="sr-only">Your comment</label>

        <x-form.textarea id="comment" data-controller="textarea-autogrow" name="body"
            class="px-0 w-full text-sm text-gray-900 border-0 dark:placeholder-gray-400 dark:text-white dark:bg-gray-800 focus:ring-0 focus:outline-none"
            placeholder="Write a comment..."
            required>{{ old('body', isset($comment) ? $comment->body : '') }}</x-form.textarea>
    </div>

    <x-button type="submit">
        @isset($comment)
            Update comment
        @else
            Post Comment
        @endisset
    </x-button>
    </form>
</x-turbo::frame>
