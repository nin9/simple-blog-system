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
    <hr>
    <div class="row mt-3 justify-content-md-left">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h5>Comments</h5>
                    <ul id="comments" class="list-unstyled mt-3">
                        @foreach ($post->comments as $comment)
                            <li class="media">
                                <img src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="align-self-start mr-3 img-thumbnail avatar" alt="avatr">
                                <div class="media-body">
                                    <h5 class="mt-0">{{$comment->author_name}}</h5>
                                    <span class="small">{{ $comment->created_at->format('d M Y h:i') }}</span>
                                    <p>{{$comment->body}}</p>            
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
                
            <div class="row">
                <h5>Leave a comment</h5>
            </div>
            
            <div class="row">
                {{ Form::open(['route' => ['AddComment', $post->id], 'class' => 'form']) }}
                {{-- <form method="post" action="{{ route('AddComment', $post->id) }}" accept-charset="UTF-8"> --}}
                    @include('posts.comment_form', ['btn' => 'Post Comment', 'classes' => 'btn btn-primary'])
                {{-- </form> --}}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop