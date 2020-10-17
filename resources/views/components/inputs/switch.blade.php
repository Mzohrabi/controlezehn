<div class="form-group @if($errors->has($name)) has-danger @endif">
    <div class="col-md-12">
        <p style="color:#54667a" class="font-13">{{$title}}</p>
        <input data-secondary-color="#f62d51" data-color="#55ce63" type="checkbox" {{(old($name) ?? $switch_value ?? '') == $value ? 'checked':''}} value="{{ $value }}" class="form-control js-switch @if($errors->has($name)) form-control-danger @endif" name="{{$name}}" id="{{$name}}">
        @if($errors->has($name)) <div class="form-control-feedback">{{$errors->first($name)}}</div>@endif
        @if(!$errors->has($name) && (($has_help ?? '') == true)) <div class="form-control-feedback">{{$help_msg}}</div> @endif
    </div>
</div>