@extends('layouts.master')

@section('content')
    <div class="row m-3 justify-content-md-center">
        <h3 class="text-center">{{$category->name}}</h3>
    </div>
    <div class="row">
        @foreach ($category->posts as $post)
            <div class="col-md-3 m-3 d-flex align-items-stretch">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset($post->image_url ? $post->image_url : 'images/no_image.png') }}" class="card-img-top img-fluid" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5> <span class="badge badge-secondary">{{$post->category->name}}</span>
                        <p class="card-text text-truncate">{{$post->body}}</p>
                        <a href="{{route('PostView', $post->id)}}" class="btn btn-primary">Read more</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop