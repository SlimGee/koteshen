 <x-turbo::frame :id="[$comment]">

     <article class="p-4 mb-3 text-base bg-white rounded-lg border dark:bg-gray-900">

         <footer class="flex relative justify-between items-center mb-2" {{ stimulus_controller('dropdown') }}>
             <div class="flex items-center">
                 <p class="inline-flex items-center mr-3 text-sm font-semibold text-gray-900 dark:text-white">
                     <img class="mr-2 w-6 h-6 rounded-full"
                         src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                         alt="{{ $comment->user->name }}">
                     {{ $comment->user->name }}
                 </p>
                 <p class="text-sm text-gray-600 dark:text-gray-400">
                     <time pubdate datetime="{{ $comment->created_at->format('Y-m-d') }}"
                         title="{{ $comment->created_at->format('F jS, Y') }}">
                         {{ $comment->created_at->format('F jS, Y H:i') }}
                     </time>
                 </p>
             </div>

             <button data-action="dropdown#toggle click@window->dropdown#hide"
                 class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg dark:text-gray-400 dark:bg-gray-900 hover:bg-gray-100 focus:ring-4 focus:ring-gray-50 focus:outline-none dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                 type="button">
                 <i class="mr-1.5 bi bi-three-dots"></i>
                 <span class="sr-only">Comment settings</span>
             </button>

             <div data-dropdown-target="menu"
                 class="hidden absolute right-0 top-10 z-10 w-36 bg-white rounded-b border shadow-sm transition transform origin-top-right"
                 data-transition-enter-from="opacity-0 scale-95" data-transition-enter-to="opacity-100 scale-100"
                 data-transition-leave-from="opacity-100 scale-100" data-transition-leave-to="opacity-0 scale-95">

                 <ul class="text-sm text-gray-700 dark:text-gray-200"
                     aria-labelledby="dropdownMenuIconHorizontalButton">
                     <li>
                         <a href="{{ route('app.commentables.comments.edit', [commentable($comment->commentable), $comment]) }}"
                             class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                     </li>
                     <li>
                         <a href="{{ route('app.commentables.comments.destroy', [commentable($comment->commentable), $comment]) }}"
                             class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                     </li>
                 </ul>
             </div>
         </footer>

         <div class="text-gray-500 dark:text-gray-400">
             {!! Str::markdown($comment->body) !!}
         </div>

         <div class="mt-4">
             <x-turbo::frame :id="[$comment, 'create_comment']"> <a
                     href="{{ route('app.commentables.comments.create', commentable($comment)) }}" type="button"
                     class="flex items-center text-sm font-medium text-gray-500 dark:text-gray-400 hover:underline">
                     <i class="mr-1.5 bi bi-reply"></i>
                     Reply
                 </a>
             </x-turbo::frame>
         </div>


         <div class="mt-3 ml-1">
             <div id="@domid($comment, 'comments')">
                 @each('app.comments._comment', $comment->comments, 'comment')
             </div>
         </div>
     </article>
 </x-turbo::frame>
