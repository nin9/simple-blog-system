@extends('layouts.master')

@section('content')
    <div class="row mt-3 justify-content-md-center">
        <div class="col">
            @if(!empty($post->image_url))
                <img src={{$post->image_url}} />
            @endif
        
            <h3>{{$post->title}}</h3>  <span class="badge badge-secondary">{{$post->category->name}}</span>
        
            <p>{{$post->body}}</p>
        </div>
    </div>
@stop