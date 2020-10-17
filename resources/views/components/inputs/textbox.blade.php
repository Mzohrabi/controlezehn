{{--@php--}}
{{--    die(json_encode(old($name)))--}}
{{--@endphp--}}
<div class="form-group @if($errors->has($name)) has-danger @endif">
    <div class="col-md-12">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="{{$name}}">{{$title}}</label>
        <input type="text" value="{{old($name) ?? $value ?? ''}}" class="form-control @if($errors->has($name)) form-control-danger @endif" name="{{$name}}" id="{{$name}}">
        @if($errors->has($name)) <div class="form-control-feedback">{{$errors->first($name)}}</div>@endif
        @if(!$errors->has($name) && (($has_help ?? '') == true)) <div class="form-control-feedback">{{$help_msg}}</div> @endif
    </div>
</div>
