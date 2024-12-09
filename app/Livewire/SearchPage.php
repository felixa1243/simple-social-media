<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;

class SearchPage extends Component
{
    #[Url()]
    public $q = '';
    #[Computed()]
    public function findData()
    {
        $keyword = '%' . $this->q . '%';
        $users = User::query()
            ->where('name', 'LIKE', $keyword)
            ->orWhere('email', 'LIKE', $keyword)
            ->paginate(10);

        $posts = Post::query()
            ->where('post_content', 'LIKE', $keyword)
            // ->orWhere('body', 'LIKE', $keyword)
            ->paginate(10);


        return [
            'users' => $users,
            'posts' => $posts,
        ];
    }
    public function render()
    {
        return view('livewire.search-page', ["query" => $this->q]);
    }
}
