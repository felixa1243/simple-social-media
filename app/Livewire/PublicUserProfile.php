<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Attributes\Url;
use Livewire\Component;

class PublicUserProfile extends Component
{
    #[Url]
    public $username = '';
    public function render()
    {
        $user = User::query()->where('name', '=', $this->username)->first();
        $posts = Post::query()->where('user_id', $user->id)->get();
        return view('livewire.public-user-profile', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
}
