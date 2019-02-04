@extends('layouts.master')


@section('content')
    <div class="row mt-3 mb-5">
        <div class="col">
            <a class="btn btn-primary float-sm-right" href="{{route('Admin.AddCategory')}}">Add Category</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <table id="posts" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Number Of Posts</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td>{{count($category->posts)}}</td>
                            <td>
                                <a href="{{route('CategoryPostIndex', $category->id)}}"><i class="icon view fa fa-eye bigger-150"></i></a>
                                <a href="{{route('Admin.EditCategory', $category->id)}}"><i class="icon edit fa fa-edit bigger-150" ></i></a>
                                <a href="#" data-toggle="modal" data-target="#deleteModal" data-url="{{route('Admin.DeleteCategory', $category->id)}}"><i class="icon delete fa fa-trash-alt bigger-150" ></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete this category and its posts?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <a href="#" class="btn btn-primary">Yes</a>
        </div>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#posts').DataTable();
        })
        
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var url = button.data('url')
            
            var modal = $(this)
            modal.find('.btn-primary').attr('href', url)
        })
    </script>
@stop