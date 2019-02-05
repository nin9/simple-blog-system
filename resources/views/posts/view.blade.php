@extends('layouts.master')

@section('content')
    <div class="row mt-3 justify-content-md-center">
        <div class="col">
            @if(!empty($post->image_url))
                <img src={{$post->image_url}} class="img-fluid" />
            @endif
        
            <h3>{{$post->title}}</h3>  
            <span class="mb-5 badge badge-secondary">{{$post->category->name}}</span>
            <span class="float-right">{{ $post->created_at->format('d M Y') }}</span>
            <p class="text-justify text-wrap">{{$post->body}}</p>
        </div>
    </div>
@stop