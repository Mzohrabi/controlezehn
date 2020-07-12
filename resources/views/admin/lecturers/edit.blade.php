@extends('admin.layout')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>ویرایش سخنران</h3>
                </div>

            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </div>
                    @endif
                    @include('flash::message')
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>اطلاعات کاربر
                                <small></small>
                            </h2>
                            <ul class="nav navbar-right panel_toolbox">
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br/>
                            <?php

                            ?>
                            {{ Form::model($info, ['method'=>'post', 'files'=>'true', 'route'=>['admin.lecturers.update',$info->id], 'id'=>'user_form', 'class'=>"form-horizontal form-label-left", 'data-parsley-validate'=>'']) }}
                                @csrf
                                @include('admin.lecturers.form')
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <a href="{{route('admin.lecturers.all')}}" class="btn btn-primary">بازگشت</a>
                                        <button type="submit" class="btn btn-success">ویرایش</button>
                                    </div>
                                </div>
                            {{ Form::Close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


