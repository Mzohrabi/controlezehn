<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">نام
        <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {{Form::text('name', old('name'), ['id' => 'name', 'required', 'class'=> "form-control col-md-7 col-xs-12"])}}
    </div>
</div>
<div class="form-group">
    <label for="mobile" class="control-label col-md-3 col-sm-3 col-xs-12">توضیحات
        <span class="required">*</span>        </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {{Form::textarea('description', old('description'), ['id' => 'description','rows'=>6, 'required', 'class'=> "form-control col-md-7 col-xs-12"])}}
    </div>
</div>
<div class="form-group">
    <label for="mobile" class="control-label col-md-3 col-sm-3 col-xs-12">تصویر
        <span class="required">*</span>        </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {{Form::file('image', old('image'), ['id' => 'image', 'class'=> "form-control col-md-7 col-xs-12"])}}
    </div>
</div>

