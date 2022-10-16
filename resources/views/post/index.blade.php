@extends('layouts.main')
@section('content')
    <div>
        <a class="btn-primary btn mb-3" href="{{ route('posts.create') }}">Create post</a>
    </div>
    <div>
        @foreach($posts as $post)
            <div>
                <a href="{{ route('post.show', $post->id) }}">{{ $post->id }} . {{ $post->title }}</a>
            </div>
        @endforeach
    </div>
@endsection
