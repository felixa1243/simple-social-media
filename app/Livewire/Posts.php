<?php

namespace App\Livewire;
use App\Services\PostService;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Attributes\Url;

class Posts extends Component
{
    private PostService $postService;
    public $userId;
    public $posts;
    #[Url]
    public $perPage = '10';
    public function boot()
    {
        $this->postService = new PostService();
    }

    public function mount($posts = null)
    {
        if ($posts) {
            $this->posts = $posts;
        }
    }
    #[Computed]
    public function postsPaginated()
    {
        $posts = $this->postService->getUserPosts($this->userId);
        return $posts->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.posts');
    }
    public function like($postId)
    {
        $this->postService->likePost($postId);
    }
    public function unlike($postId)
    {
        $this->postService->unlikePost($postId);
    }
}
