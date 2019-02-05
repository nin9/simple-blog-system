@extends('layouts.master')


@section('content')
    <div class="row mt-3 mb-5">
        <div class="col">
            <a class="btn btn-primary float-sm-right" href="{{route('Admin.AddPost')}}">Add Post</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <table id="posts" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->category->name}}</td>
                            <td>
                                <a href="{{route('PostView', $post->id)}}"><i class="icon view fa fa-eye bigger-150"></i></a>
                                <a href="{{route('Admin.EditPost', $post->id)}}"><i class="icon edit fa fa-edit bigger-150" ></i></a>
                                <a href="#" data-toggle="modal" data-target="#deleteModal" data-url="{{route('Admin.DeletePost', $post->id)}}"><i class="icon delete fa fa-trash-alt bigger-150" ></i></a>
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
            <h5 class="modal-title" id="deleteModalLabel">Delete Post</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete this post?</p>
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