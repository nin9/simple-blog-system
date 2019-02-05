@extends('layouts.master')

@section('content')
    <div class="row mt-5 justify-content-center">
        <div class="col">
            <a href="{{route('Admin.PostIndex')}}" class="btn">    
                <div class="media">
                    <i class="far fa-comment-alt fa-6x edit align-self-center mr-3"></i>
                    <div class="media-body">
                        <h5 class="mt-0">{{$post_count}}</h5>
                        <h5>Posts</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="{{route('Admin.CategoryIndex')}}" class="btn">    
                <div class="media">
                    <i class="fas fa-tags fa-6x edit align-self-center mr-3"></i>
                    <div class="media-body">
                        <h5 class="mt-0">{{$category_count}}</h5>
                        <h5>Categories</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>
@stop