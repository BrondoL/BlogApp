<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $data = [
            'title' => "Blog",
            'head' => "All Posts",
            'posts' => Post::latest()->get(),
        ];
        return view('posts', $data);
    }

    public function show(Post $post)
    {
        $data = [
            'title' => "Blog",
            'head' => "Post",
            'post' => $post,
        ];
        return view('post', $data);
    }
}
