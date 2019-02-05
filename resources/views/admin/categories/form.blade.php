<div class="form-group mt-3">
    <label for="name">Name <span>*</span></label>
    <input type="text" name="name" class="form-control" required value="@if(isset($category)){{$category->name}}@else{{old('name')}}@endif">
    <small class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</small>
</div>

<div class="form-group col-sm-12 submit">
    {{ Form::submit($btn, ['class' => 'btn-sm ' . $classes ]) }}
</div>