@extends('layouts.main')

@section('content')
    <h1 class="mb-3 text-center">{{ $head }}</h1>

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/blog" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search..." name="search"
                        value="{{ request('search') }}">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    @if (request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif
                    <button class="btn btn-dark" type="submit" id="button-addon2">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if ($posts->count())
        <div class="card mb-3">
            <img src="https://source.unsplash.com/1200x400/?{{ $posts[0]->category->name }}" class="card-img-top"
                alt="{{ $posts[0]->title }}">
            <div class="card-body text-center">
                <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}"
                        class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
                <p>
                    <small class="text-muted">
                        by: <a href="/blog?author={{ $posts[0]->user->username }}"
                            class="text-decoration-none">{{ $posts[0]->user->name }}</a> in
                        <a href="/blog?category={{ $posts[0]->category->slug }}"
                            class="text-decoration-none">{{ $posts[0]->category->name }}</a>
                        {{ $posts[0]->created_at->diffForHumans() }}
                    </small>
                </p>
                <p class="card-text">{!! Str::limit($posts[0]->body, 190) !!}</p>
                <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read More...</a>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $p)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="position-absolute px-3 py-2 text-white"
                                style="background-color: rgba(0, 0, 0, 0.7)">
                                <a href="/blog?category={{ $p->category->slug }}"
                                    class="text-decoration-none text-white">
                                    {{ $p->category->name }}
                                </a>
                            </div>
                            <img src="https://source.unsplash.com/500x400/?{{ $p->category->slug }}" class="card-img-top"
                                alt="{{ $p->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $p->title }}</h5>
                                <p>
                                    <small class="text-muted">
                                        by: <a href="/blog?author={{ $p->user->username }}"
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
    @else
        <p class="text-center fs-4">No post found.</p>
    @endif
    <div class="d-flex justify-content-end">
        {{ $posts->links() }}
    </div>
@endsection
