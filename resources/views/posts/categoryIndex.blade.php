@extends('layouts.master')

@section('content')
    <div class="row mt-3">
        <h3 class="text-center">{{$category->name}}</h3>
    </div>
    <div class="row justify-content-md-center">
        <div class="col">
            @foreach ($category->posts as $post)
                <div class="card" style="width: 18rem;">
                    <img src="{{$post->image_url}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5> <span class="badge badge-secondary">{{$post->category->name}}</span>
                        <p class="card-text text-truncate">{{$post->body}}</p>
                        <a href="{{route('PostView', $post->id)}}" class="btn btn-primary">Read more</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop