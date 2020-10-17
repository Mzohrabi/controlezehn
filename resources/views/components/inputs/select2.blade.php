<div class="form-group @if($errors->has($name)) has-danger @endif">
    <div class="col-md-12">
        <label class="form-control-label m-b-10" for="{{$name}}">{{$title}}</label>
        <select name="@if($multiple) {{$name."[]"}}@else{{$name}}@endif" id="{{$name}}" class="select2 @if($multiple) select2-multiple @endif" style="width: 100%" @if(($multiple ?? 'false') == true) multiple="multiple" @endif data-placeholder="{{ trans('components.select2.choose') }}">
            <option></option>
            @foreach($options as $option)
                <option {{ $option['selected'] }} value="{{$option['value']}}">{{$option['title']}}</option>
            @endforeach
        </select>
        @if($errors->has($name)) <div class="form-control-feedback">{{$errors->first($name)}}</div>@endif
        @if(!$errors->has($name) && (($has_help ?? '') == true)) <div class="form-control-feedback">{{$help_msg}}</div> @endif
    </div>
</div>
