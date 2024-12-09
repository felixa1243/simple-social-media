<div class="flex items-center justify-center gap-5 flex-col w-full">
    @foreach ($this->postsPaginated as $post)
        @livewire('components.post-card', ['postId' => $post->id])
    @endforeach
    {{ $this->postsPaginated->links() }}
</div>
