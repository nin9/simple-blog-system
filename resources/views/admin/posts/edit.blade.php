@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col">
            {{ Form::model($post, ['route' => ['Admin.UpdatePost' , $post->id], 'class' => 'form', 'files' => true, 'method' => 'PUT']) }}
                @include('admin.posts.form', ['btn' => 'Save', 'classes' => 'btn btn-primary'])
            {{ Form::close() }}
        </div>
    </div>
@stop