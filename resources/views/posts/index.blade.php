@extends('layouts.master')

@section('content')
    <div class="row mt-3 justify-content-center">
        @foreach ($posts as $post)
            <div class="col-md-3 m-3">            
                <div class="card" style="width: 18rem;">
                    <img src="{{$post->image_url}}" class="card-img-top" alt="...">
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