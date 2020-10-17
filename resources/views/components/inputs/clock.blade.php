<div class="form-group @if($errors->has($name)) has-danger @endif">
    <div class="col-md-12">
        <label class="form-control-label" for="{{$name}}">{{$title}}</label>
        <div class="input-group clockpicker">
            <input value="{{ old($name) ?? $value ?? '09:30'}}" name="{{$name}}" id="{{$name}}" type="text" class="form-control"> <span class="input-group-addon"> <span class="fa fa-clock-o"></span> </span>
        </div>
        @if($errors->has($name)) <div class="form-control-feedback">{{$errors->first($name)}}</div>@endif
        @if(!$errors->has($name) && (($has_help ?? '') == true)) <div class="form-control-feedback">{{$help_msg}}</div> @endif
    </div>
</div>
