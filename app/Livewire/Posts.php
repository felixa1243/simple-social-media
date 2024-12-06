<?php

namespace App\Livewire;

use App\Services\PostService;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Posts extends Component
{
    private PostService $postService;

    public function boot()
    {
        $this->postService = new PostService();
    }

    #[Computed()]
    public function posts()
    {
        return $this->postService->myPosts()
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.posts');
    }

    public function toggleLike($postId)
    {
        $post = $this->postService->getPost($postId);

        if ($post->post_likes->isNotEmpty()) {
            $this->postService->unlikePost($postId);
        } else {
            $this->postService->likePost($postId);
        }
    }
}
