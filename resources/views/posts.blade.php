@extends('layouts.main')

@section('content')
    <h1 class="mb-3">{{ $head }}</h1>

    @if ($posts->count())
        <div class="card mb-3">
            <img src="https://source.unsplash.com/1200x400/?{{ $posts[0]->category->name }}" class="card-img-top"
                alt="{{ $posts[0]->title }}">
            <div class="card-body text-center">
                <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}"
                        class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
                <p>
                    <small class="text-muted">
                        by: <a href="/authors/{{ $posts[0]->user->username }}"
                            class="text-decoration-none">{{ $posts[0]->user->name }}</a> in
                        <a href="/categories/{{ $posts[0]->category->slug }}"
                            class="text-decoration-none">{{ $posts[0]->category->name }}</a>
                        {{ $posts[0]->created_at->diffForHumans() }}
                    </small>
                </p>
                <p class="card-text">{!! Str::limit($posts[0]->body, 190) !!}</p>
                <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read More...</a>
            </div>
        </div>
    @else
        <p class="text-center fs-4">No post found.</p>
    @endif

    <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $p)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.7)">
                            <a href="/categories/{{ $p->category->slug }}" class="text-decoration-none text-white">
                                {{ $p->category->name }}
                            </a>
                        </div>
                        <img src="https://source.unsplash.com/500x400/?{{ $p->category->slug }}" class="card-img-top"
                            alt="{{ $p->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $p->title }}</h5>
                            <p>
                                <small class="text-muted">
                                    by: <a href="/authors/{{ $p->user->username }}"
                                        class="text-decoration-none">{{ $p->user->name }}</a>
                                    {{ $p->created_at->diffForHumans() }}
                                </small>
                            </p>
                            <p class="card-text">{!! Str::limit($p->body, 120) !!}</p>
                            <a href="/posts/{{ $p->slug }}" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
