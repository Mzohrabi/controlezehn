@extends('admin.layout')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>ساخت سخنران جدید</h3>
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
                            <h2>اطلاعات سخنران
                                <small></small>
                            </h2>
                            <ul class="nav navbar-right panel_toolbox">
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br/>
                            <form id="demo-form2" method="post" enctype="multipart/form-data" action="{{route('admin.lecturers.store')}}" data-parsley-validate class="form-horizontal form-label-left">
                                @csrf
                                @include('admin.lecturers.form')
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <a href="{{route('admin.lecturers.all')}}" class="btn btn-primary">بازگشت</a>
                                        <button type="submit" class="btn btn-success">ثبت</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
