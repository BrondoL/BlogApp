@extends('dashboard.layouts.main')

@section('content')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class="mb-3">{{ $post->title }}</h1>
                <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all
                    Posts</a>
                <a href="/blog" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" onclick="return confirm('Are you sure ?')"><span
                            data-feather="x-circle"></span> Delete</button>
                </form>
                <img src="https://source.unsplash.com/1200x400/?{{ $post->category->slug }}"
                    alt="{{ $post->category->name }}" class="img-fluid mt-3">
                <article class="my-3 fs-6">
                    {!! $post->body !!}
                </article>
            </div>
        </div>
    </div>
@endsection

@section('myscript')
@endsection
