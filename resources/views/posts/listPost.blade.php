@extends('template')
@section('title', 'Liste des post')
@section('content')
    <h1 class="text-center my-5">Liste des Post !</h1>
    <div class="container my-4">
        <div class="row">
        @foreach($posts as $post)
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Image 1">
                        <div class="card-body">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <p class="card-text">{{$post->content}}</p>
                            <a href="{{ route('post.show', ['post' => $post->id]) }}" class="btn btn-primary">En savoir plus</a>
                        </div>
                    </div>
                </div>
        @endforeach
        </div>
    </div>
@endsection

