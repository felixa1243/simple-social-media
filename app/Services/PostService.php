<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostService
{
    public function createPost($content, $image_path)
    {
        Auth::user()->posts()->create([
            'post_content' => $content,
            'media_url' => $image_path
        ]);
    }
    public function getLikecount($post_id)
    {
        $this->getPost($post_id)->likeCount;
    }
    public function likePost($post_id)
    {
        $post = $this->getPost($post_id);
        Auth::user()->likePost($post);
    }
    public function unlikePost($post_id)
    {
        $post = Post::findOrFail($post_id)->first();
    }
    public function myPosts()
    {
        return Auth::user()->posts()->withCount('post_likes')->with('user');
    }
    private function getPost($post_id)
    {
        return Post::findOrFail($post_id);
    }
}
