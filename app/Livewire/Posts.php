<?php

namespace App\Livewire;

use App\Models\Post;
use App\Services\PostService;
use Illuminate\Support\Facades\Auth;
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
        $posts = $this->postService->myPosts()->orderBy('created_at', 'desc')->paginate(10);
        return $posts;
    }
    public function render()
    {
        return view('livewire.posts');
    }
    public function likePost($post_id)
    {
        $this->postService->likePost($post_id);
    }
}
