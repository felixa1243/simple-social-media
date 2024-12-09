<?php

namespace App\Livewire;
use App\Services\PostService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;

    public $content = '';
    public $image;
    public $maxLength = 280;
    private PostService $postService;
    public function boot()
    {
        $this->postService = new PostService();
    }
    protected $rules = [
        'content' => 'required|max:280',
        'image' => 'nullable|image|max:1024',
    ];

    public function updatedContent()
    {
        $this->validateOnly('content');
    }

    public function submit()
    {
        $this->validate();

        $username = Auth::user()->email;
        $path = null;
        $filename = null;
        if ($this->image) {
            $filename =  base64_encode($this->image->getClientOriginalName());
            $path = $this->image->store(path: "$username/posts/$filename/");
        }
        $this->postService->createPost($this->content, $path);
        session()->flash('message', 'Post created successfully!');   
        $this->redirect("/dashboard");
    }
}
