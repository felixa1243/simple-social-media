<div class="flex items-center justify-center gap-5 flex-col">
    <h2 class="text-xl dark:text-white">My Recent Posts</h2>
    @foreach ($this->posts as $post)
        <div class="dark:bg-white w-1/2 p-3 rounded-sm">
            <p class="text-gray-500">
                {{ \App\Utils\TimeHelper::timeAgo($post->created_at) }}
            </p>
            <p>
                {{ $post->post_content }}
            </p>
        </div>
    @endforeach

    {{ $this->posts->links() }}
</div>
