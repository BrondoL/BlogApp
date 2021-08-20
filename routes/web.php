<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $data = [
        'title' => "Home"
    ];
    return view('home', $data);
});

Route::get('/about', function () {
    $data = [
        'title' => "About"
    ];
    return view('about', $data);
});


Route::get('/blog', [BlogController::class, 'index']);
Route::get('/posts/{post:slug}', [BlogController::class, 'show']);
Route::get('/categories', function () {
    $data = [
        'title' => "Post Categories",
        'categories' => \App\Models\Category::all(),
    ];
    return view('categories', $data);
});

Route::get('/categories/{category:slug}', function (\App\Models\Category $category) {
    $data = [
        'title' => "Categori | $category->name",
        'head' => "Post by Category: $category->name",
        'posts' => $category->posts->load('category', 'user'),
    ];
    return view('posts', $data);
});

Route::get('/authors/{author:username}', function (\App\Models\User $author) {
    $data = [
        'title' => 'User Posts',
        'head' => "Post by Author : $author->name",
        'posts' => $author->posts->load('category', 'user'),
    ];
    return view('posts', $data);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
