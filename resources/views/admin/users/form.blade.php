<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">نام
        <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {{Form::text('fname', old('fname'), ['id' => 'first-name', 'required', 'class'=> "form-control col-md-7 col-xs-12"])}}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">نام
        خانوادگی <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {{Form::text('lname', old('lname'), ['id' => 'last-name', 'required', 'class'=> "form-control col-md-7 col-xs-12"])}}
    </div>
</div>
<div class="form-group">
    <label for="mobile" class="control-label col-md-3 col-sm-3 col-xs-12">شماره همراه
        <span class="required">*</span>        </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {{Form::text('mobile', old('mobile'), ['id' => 'first-name', 'required', 'class'=> "form-control col-md-7 col-xs-12"])}}
    </div>
</div>

