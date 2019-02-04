@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col">
            {{ Form::open(['route' => 'Admin.CreatePost', 'class' => 'form', 'files' => true]) }}
                @include('admin.posts.form', ['btn' => 'Save', 'classes' => 'btn btn-primary'])
            {{ Form::close() }}
        </div>
    </div>
@stop