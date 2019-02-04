@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col">
            {{ Form::open(['route' => 'Admin.CreateCategory', 'class' => 'form', 'files' => true]) }}
                @include('admin.categories.form', ['btn' => 'Save', 'classes' => 'btn btn-primary'])
            {{ Form::close() }}
        </div>
    </div>
@stop