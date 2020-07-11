<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">تصویر محصول</label>
    <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="">
            <label>
                {{Form::file('sound_pic', ['class'=> "form-control-file col-md-7 col-xs-12"])}}
            </label>
        </div>
    </div>
</div>
@if($info ?? '' != null)
@if(count($info->getMedia('sound_pics')) > 0)
<div class="form-group">
    <label class="control-label text-success col-md-3 col-sm-3 col-xs-12"><a href="{{route('admin.products.audiobooks.image', $info->id)}}?version={{rand(0,900000)}}">مشاهده تصویر</a></label>
</div>
@endif
@endif
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">فایل محصول</label>
    <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="">
            <label>
                {{Form::file('sound_file', ['class'=> "form-control-file col-md-7 col-xs-12"])}}
            </label>
        </div>
    </div>
</div>
@if($info ?? '' != null)
@if(count($info->getMedia('sound_file')) > 0)
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12"><a href="{{route('admin.products.audiobooks.sound', $info->id)}}?version={{rand(0,900000)}}">دریافت فایل</a></label>
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

