<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private PostService $postService;
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    public function index()
    {
        $posts = $this->postService->myPosts()->orderBy('created_at','desc');
        return view('dashboard', ['posts' => $posts]);
    }
}
