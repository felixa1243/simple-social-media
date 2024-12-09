<?php

namespace App\Services;

use App\Models\Post;
use App\Models\User;
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
        $post = $this->getPost($post_id);
        Auth::user()->unlikePost($post);
    }
    public function myPosts()
    {
        $userId = Auth::id();
        return $this->getUserPosts($userId);
    }
    public function getUserPosts($userId)
    {
        return User::findOrFail($userId)
            ->posts()
            ->withCount('post_likes')
            ->with(['user', 'post_likes' => function ($query) use ($userId) {
                $query->where('user_id', $userId);
            }]);
    }

    public function getPost($post_id)
    {
        return Post::with('user') 
            ->withCount('post_likes')
            ->findOrFail($post_id);
    }
}
