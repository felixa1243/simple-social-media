<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Services\PostService;

class PostCard extends Component
{
    public $postId;
    private PostService $postService;
    public function boot(PostService $postService)
    {
        $this->postService = $postService;
    }
    #[Computed()]
    public function post()
    {
        return $this->postService->getPost($this->postId);
    }
    public function like($postId)
    {
        $this->postService->likePost($postId);
    }
    public function unlike($postId)
    {
        $this->postService->unlikePost($postId);
    }
    public function render()
    {
        return view('livewire.components.post-card');
    }
}
