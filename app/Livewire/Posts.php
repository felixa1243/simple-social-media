<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Posts extends Component
{
    #[Computed()]
    public function posts()
    {
        $posts = Post::select(["post_content", "created_at"])
            ->where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return $posts;
    }
    public function render()
    {
        return view('livewire.posts');
    }
}
