{{--@php--}}
{{--    die(json_encode(old($name)))--}}
{{--@endphp--}}
<div class="form-group @if($errors->has($name)) has-danger has-error has-feedback @endif">
    <input type="text" value="{{old($name) ?? ''}}" class="form-control @if($errors->has($name)) form-control-danger @endif" name="{{$name}}" id="{{$name}}"><span class="bar"></span>
    <label for="{{$name}}">{{$title}}</label>
    @if($errors->has($name)) <div class="form-control-feedback">{{$errors->first($name)}}</div>@endif
    @if(!$errors->has($name) && (($has_help ?? '') == true)) <div class="form-control-feedback">{{$help_msg}}</div> @endif
</div>