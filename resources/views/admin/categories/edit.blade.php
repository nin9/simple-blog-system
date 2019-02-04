@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col">
            {{ Form::model($category, ['route' => ['Admin.UpdateCategory' , $category->id], 'class' => 'form', 'files' => true, 'method' => 'PUT']) }}
                @include('admin.categories.form', ['btn' => 'Save', 'classes' => 'btn btn-primary'])
            {{ Form::close() }}
        </div>
    </div>
@stop