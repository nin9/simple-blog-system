<div class="form-group">
    <label for="title">Title <span>*</span></label>
    <input type="text" name="title" class="form-control" required value="@if(isset($post)){{$post->title}}@else{{old('title')}}@endif">
</div>

<div class="form-group">
    <label for="body">Body <span>*</span></label>
    <textarea name="body" class="form-control" required>@if(isset($post)){{$post->body}}@else{{old('body')}}@endif
    </textarea>
</div>


<div class="form-group">
    <label for="category_id">Category <span>*</span></label>
    {{ Form::select('category_id', $admin_categories->pluck('name', 'id'), (isset($post->category_id)) ? $post->category_id : old('category_id'), ['placeholder' => 'Category', 'required' => 'required', 'class' => 'form-control ' . ($errors->has('category_id') ? 'redborder' : '') ]) }}
    <small class="text-danger">{{ $errors->has('category_id') ? $errors->first('category_id') : '' }}</small>
</div>


<div class="form-group col-sm-12 submit">
    {{ Form::submit($btn, ['class' => 'btn-sm ' . $classes ]) }}
</div>