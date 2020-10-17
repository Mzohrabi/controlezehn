<div class="form-group @if($errors->has($name)) has-danger @endif">
    <div class="col-md-12">
        <label class="form-control-label">{{ $title }}</label>
        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
            <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">{{ trans('components.upload.inline.select') }}</span> <span class="fileinput-exists">{{ trans('components.upload.inline.edit') }}</span>
            <input name="{{$name}}" id="{{$name}}" type="file" name="..."> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">{{ trans('components.upload.inline.remove') }}</a>
        </div>
        @if($errors->has($name)) <div class="form-control-feedback">{{$errors->first($name)}}</div>@endif
        @if(!$errors->has($name) && (($has_help ?? '') == true)) <div class="form-control-feedback">{{$help_msg}}</div> @endif
    </div>
</div>
