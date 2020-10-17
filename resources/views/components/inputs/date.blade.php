<div class="form-group @if($errors->has($name)) has-danger @endif">
    <div class="col-md-12">
        <label class="form-control-label" for="{{$name}}">{{$title}}</label>
        <input type="text" class="form-control datepicker" {{($value ?? old($name) ?? '') != null ? '':'data-initialValue=false'}} value="{{ old($name) ?? $value ?? ''}}" name="{{$name}}" id="{{$name}}"/>
        @if($errors->has($name)) <div class="form-control-feedback">{{$errors->first($name)}}</div>@endif
        @if(!$errors->has($name) && (($has_help ?? '') == true)) <div class="form-control-feedback">{{$help_msg}}</div> @endif
    </div>
</div>
