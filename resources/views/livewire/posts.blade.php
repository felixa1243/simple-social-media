<div class="flex items-center justify-center gap-5 flex-col w-full">
    <h2 class="text-xl dark:text-white">My Recent Posts</h2>
    @foreach ($this->postsPaginated as $post)
        <div class="rounded-lg bg-white p-6 shadow-md w-1/2">
            <div class="mb-4 flex items-center">
                <div>
                    <h3 class="font-semibold">
                        {{ $post->user->name }}
                    </h3>
                    <p class="text-sm text-gray-500">{{ \App\Utils\TimeHelper::timeAgo($post->created_at) }}</p>
                </div>
            </div>
            <p class="mb-4">{{ $post->post_content }}</p>
            @if ($post->media_url)
                <img src="{{ route('private-file', ['filename' => $post->media_url]) }}" alt="Post image"
                    class="mb-4 rounded-lg">
            @endif
            @php $isLiked = $post->post_likes->isNotEmpty(); @endphp
            <div class="flex space-x-4">
                <button wire:click="toggleLike('{{ $post->id }}')"
                    class="flex items-center {{ $isLiked ? 'text-blue-600' : 'text-gray-600 hover:text-blue-600' }}">
                    <svg class="mr-2 h-5 w-5" fill="{{ $isLiked ? 'currentColor' : 'none' }}" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                        </path>
                    </svg>
                    {{ $post->post_likes_count }}
                </button>

                <button class="flex items-center text-gray-600 hover:text-blue-600">
                    <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                        </path>
                    </svg>
                    {{ 100 }}
                </button>
            </div>
        </div>
    @endforeach
    {{$this->postsPaginated->links()}}
</div>
