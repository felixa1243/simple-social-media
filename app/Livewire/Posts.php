<?php

namespace App\Livewire;

use App\Models\Post;
use App\Services\PostService;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Url;

class Posts extends Component
{
    private PostService $postService;
    private $posts;
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
        return $this->posts->paginate($this->perPage);
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
