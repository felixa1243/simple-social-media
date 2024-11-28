<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreatePost extends Component
{
    public $content = '';
    public function save()
    {
        Post::create(
            [
                "post_content" => $this->content,
                "user_id" => Auth::user()->id
            ]
        );
        session()->flash('status', 'Post Successfully created');
        return $this->redirect("/posts/create");
    }
    public function render()
    {
        return view('livewire.create-post');
    }
}
