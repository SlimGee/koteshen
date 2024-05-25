<div class="px-4 w-full md:w-1/2 lg:w-1/3">
    <div class="mb-10 wow fadeInUp group" data-wow-delay=".1s">
        <div class="overflow-hidden mb-8 rounded-[5px]">
            <a href="{{ route('posts.show', $post) }}" class="block">
                <img src="{{ Storage::url($post->cover) }}" alt="image"
                    class="w-full transition group-hover:scale-125 group-hover:rotate-6" />
            </a>
        </div>
        <div>
            <span
                class="inline-block py-0.5 px-4 mb-6 text-xs font-medium leading-loose text-center text-neutral-700 rounded-[5px] bg-primary">
                {{ $post->created_at->format('M d, Y') }}
            </span>
            <h3>
                <a href="{{ route('posts.show', $post) }}"
                    class="inline-block mb-4 text-xl font-semibold sm:text-2xl lg:text-xl xl:text-2xl dark:text-white text-dark dark:hover:text-primary hover:text-primary">
                    {{ $post->title }}
                </a>
            </h3>
            <p class="text-base text-gray-800 max-w-[370px] dark:text-dark-6">
                {{ $post->excerpt }}
            </p>
        </div>
    </div>
</div>
