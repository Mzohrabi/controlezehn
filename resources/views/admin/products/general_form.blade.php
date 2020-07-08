<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">عنوان محصول
        <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {{Form::text('title', $info->product->title ?? old('title'), ['id' => 'title', 'required', 'class'=> "form-control col-md-7 col-xs-12"])}}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">قیمت(تومان)<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {{Form::text('price', $info->product->price ?? old('price'), ['id' => 'price', 'required', 'class'=> "form-control col-md-7 col-xs-12"])}}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">محصول رایگان</label>
    <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="">
            <label>
                {{Form::checkbox('is_free', 1,$info->product->is_free ?? false, ['id' => 'is_free', 'class'=> "js-switch"])}}
            </label>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">توضیحات</label>
    <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="">
            <label>
                {{Form::textarea('description', $info->product->description ?? old('description'), ['id' => 'description','rows' => 5, 'class'=> "form-control col-md-7 col-xs-12"])}}
            </label>
        </div>
    </div>
</div>
{{--<div class="form-group">--}}
{{--    <label for="mobile" class="control-label col-md-3 col-sm-3 col-xs-12">محصول رایگان--}}
{{--        <span class="required">*</span>        </label>--}}
{{--    <div class="col-md-6 col-sm-6 col-xs-12">--}}
{{--        {{Form::checkbox('is_free', old('is_free'), ['id' => 'first-name', 'required', 'class'=> "form-control col-md-7 col-xs-12"])}}--}}
{{--    </div>--}}
{{--</div>--}}

