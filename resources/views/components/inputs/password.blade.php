<div class="form-group @if($errors->has($name)) has-danger @endif">
    <div class="col-md-12">
        <label class="form-control-label" for="{{$name}}">{{$title}}</label>
        <input type="password" value="{{old($name) ?? $value ?? ''}}" class="form-control @if($errors->has($name)) form-control-danger @endif" name="{{$name}}" id="{{$name}}">
        @if($errors->has($name)) <div class="form-control-feedback">{{$errors->first($name)}}</div>@endif
        @if(!$errors->has($name) && (($has_help ?? '') == true)) <div class="form-control-feedback">{{$help_msg}}</div> @endif
    </div>
</div>