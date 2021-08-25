@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h1 class="mb-3">{{ $post->title }}</h1>
                <h5 class="mb-3">by: <a href="/authors/{{ $post->user->username }}"
                        class="text-decoration-none">{{ $post->user->name }}</a>
                    in
                    <a href="/blog?category={{ $post->category->slug }}"
                        class="text-decoration-none">{{ $post->category->name }}</a>
                </h5>
                <img src="https://source.unsplash.com/1200x400/?{{ $post->category->slug }}"
                    alt="{{ $post->category->name }}" class="img-fluid">
                <article class="my-3 fs-6">
                    {!! $post->body !!}
                </article>
                <a href="/blog">Back to Posts</a>
            </div>
        </div>
    </div>
@endsection
