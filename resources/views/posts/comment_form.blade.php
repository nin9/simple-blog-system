<div class="col">
    <div class="form-group comment">
        <textarea class="form-control" name="body" placeholder="Enter your comment here...." id="text_area" rows="3" required>{{old('body')}}</textarea>
        <small class="text-danger">{{ $errors->has('body') ? $errors->first('body') : '' }}</small>
    </div>
    
    <div class="form-group comment">
        <input type="text" name="author_name" placeholder="Name (require)" class="form-control" required value="{{old('author_name')}}">
        <small class="text-danger">{{ $errors->has('author_name') ? $errors->first('author_name') : '' }}</small>
    </div>
    
    <div class="form-group comment">
        <input type="email" name="author_email" placeholder="Email (require)" class="form-control" required value="{{old('author_email')}}">
        <small class="text-danger">{{ $errors->has('author_email') ? $errors->first('author_email') : '' }}</small>
    </div>

    <div class="form-group col-sm-12 submit">
        {{ Form::submit($btn, ['class' => 'btn-sm ' . $classes ]) }}
    </div>
</div>