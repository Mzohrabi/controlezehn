<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">نام سخنران
        <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {{Form::text('name', $info->name ?? old('name'), ['id' => 'name', 'required', 'class'=> "form-control col-md-7 col-xs-12"])}}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">توضیحات</label>
    <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="">
            <label>
                {{Form::textarea('description', $info->description ?? old('description'), ['id' => 'description','rows' => 5, 'class'=> "form-control col-md-7 col-xs-12"])}}
            </label>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">تصویر</label>
    <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="">
            <label>
                {{Form::file('image', ['class'=> "form-control-file col-md-7 col-xs-12"])}}
            </label>
        </div>
    </div>
</div>
@if($info ?? '' != null)
@if(count($info->getMedia('lecturer_image')) > 0)
<div class="form-group">
    <label class="control-label text-success col-md-3 col-sm-3 col-xs-12"><a href="{{route('admin.lecturers.image', $info->id)}}?version={{rand(0,900000)}}">مشاهده تصویر</a></label>
</div>
@endif
@endif

{{--<div class="form-group">--}}
{{--    <label for="mobile" class="control-label col-md-3 col-sm-3 col-xs-12">محصول رایگان--}}
{{--        <span class="required">*</span>        </label>--}}
{{--    <div class="col-md-6 col-sm-6 col-xs-12">--}}
{{--        {{Form::checkbox('is_free', old('is_free'), ['id' => 'first-name', 'required', 'class'=> "form-control col-md-7 col-xs-12"])}}--}}
{{--    </div>--}}
{{--</div>--}}

