@if(isset($post))
    <div class="row mt-3 align-items-center">
        <div class="form-group col-sm-2">
            <label for="image">Image</label>
            <img id="image" src="{{ asset($post->image_url ? $post->image_url : 'images/no_image.png') }}" class="img-thumbnail" >
        </div>
        <div class="input-group mt-3 col-sm-10">
            <div class="custom-file">
                <input type="file" accept="image/*" name="image_url" class="custom-file-input @if($errors->has('image_url')) redborder @endif" id="image_url" value="{{old('image_url')}}">
                <label class="custom-file-label" for="image_url">Choose image</label>
            </div>
            <small class="text-danger">{{ $errors->has('image_url') ? $errors->first('image_url') : '' }}</small>
        </div>
    </div>
@else
    <div class="input-group mt-3 form-group">
        <div class="custom-file">
            <input type="file" name="image_url" accept="image/*" class="custom-file-input @if($errors->has('image_url')) redborder @endif" id="image_url" value="{{old('image_url')}}">
            <label class="custom-file-label" for="image_url">Choose image</label>
        </div>
        <small class="text-danger">{{ $errors->has('image_url') ? $errors->first('image_url') : '' }}</small>
    </div>
@endif


<div class="form-group">
    <label for="title">Title <span>*</span></label>
    <input type="text" name="title" class="form-control" required value="@if(isset($post)){{$post->title}}@else{{old('title')}}@endif">
    <small class="text-danger">{{ $errors->has('title') ? $errors->first('title') : '' }}</small>
</div>

<div class="form-group">
    <label for="body">Body <span>*</span></label>
    <textarea style="height:18rem" name="body" class="form-control" required>@if(isset($post)){{$post->body}}@else{{old('body')}}@endif</textarea>
    <small class="text-danger">{{ $errors->has('body') ? $errors->first('body') : '' }}</small>
</div>


<div class="form-group">
    <label for="category_id">Category <span>*</span></label>
    {{ Form::select('category_id', $admin_categories->pluck('name', 'id'), (isset($post->category_id)) ? $post->category_id : old('category_id'), ['placeholder' => 'Category', 'required' => 'required', 'class' => 'form-control ' . ($errors->has('category_id') ? 'redborder' : '') ]) }}
    <small class="text-danger">{{ $errors->has('category_id') ? $errors->first('category_id') : '' }}</small>
</div>


<div class="form-group col-sm-12 submit">
    {{ Form::submit($btn, ['class' => 'btn-sm ' . $classes ]) }}
</div>

@section('scripts')
<script>
    $('textarea').autoResize();
    $('.custom-file-input').on('change', function() { 
        let fileName = $(this).val().split('\\').pop(); 
        $(this).next('.custom-file-label').addClass("selected").html(fileName); 
    });
</script>
@stop