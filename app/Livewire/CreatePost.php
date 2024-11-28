<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;

    public $content = '';
    public $image;
    public $maxLength = 280;

    protected $rules = [
        'content' => 'required|max:280',
        'image' => 'nullable|image|max:1024', // max 1MB
    ];

    public function updatedContent()
    {
        $this->validateOnly('content');
    }

    public function submit()
    {
        $this->validate();
        Post::create([
            'user_id' => Auth::user()->id,
            'post_content' => $this->content
        ]);
        $this->reset(['content', 'image']);
        session()->flash('message', 'Post created successfully!');
        $this->redirect("/dashboard");
    }
}
