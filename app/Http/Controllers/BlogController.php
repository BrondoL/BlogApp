<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class BlogController extends Controller
{
    public function index()
    {
        $head = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $head = " in " . $category->name;
        }
        if (request('author')) {
            $user = User::firstWhere('username', request('author'));
            $head = " by " . $user->name;
        }
        $data = [
            'title' => "Blog",
            'head' => "All Posts" . $head,
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
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
