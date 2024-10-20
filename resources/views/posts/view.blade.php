@extends('template')
@section('title', $post->title)
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="post-title">{{ $post->title }}</h1>
                <p class="post-meta">
                    <img src="{{ $post->user->profile_photo_url }}" alt="User Avatar" class="rounded">
                    {{ $post->user->name }}
                    <strong>Created At:</strong> {{ $post->created_at }} |
                    <strong>Updated At:</strong> {{ $post->updated_at }}
                </p>
                <p class="post-content">{{ $post->content }}</p>
                <p><strong>Slug:</strong> {{ $post->slug }}</p>
            </div>
        </div>
    </div>
@endsection
