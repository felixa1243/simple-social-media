<div class="flex flex-col gap-5 justify-center w-full border-2 border-red-500 items-center">
    @livewire('search')
    <div class="flex flex-col gap-5 w-1/2">
        <h2 class="text-4xl font-bold">
            User
        </h2>
        @foreach ($this->findData()['users'] as $user)
            @livewire('components.friend-card', ['userId' => $user->id])
        @endforeach
        @if ($this->findData()['users']->count() < 1)
            <p class="font-bold">No user found!</p>
        @endif
        <h2 class="text-4xl font-bold">
            Post
        </h2>
        @foreach ($this->findData()['posts'] as $post)
            <div class="w-full">
                @livewire('components.post-card', ['postId' => $post->id])
            </div>
        @endforeach
    </div>
</div>
