@extends('admin.layout')

@push('styles')
    <link href="{{asset('gentella/vendors/switchery/dist/switchery.min.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>اضافه کردن کتاب صوتی جدید</h3>
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
                        {{--                        <form id="demo-form2" method="post" action="{{route('admin.users.store')}}" data-parsley-validate class="form-horizontal form-label-left">--}}
                        {{Form::model($info,['route' => ['admin.products.audiobooks.update', $info->id], 'files'=>'true', 'method' => 'post', 'class'=>"form-horizontal form-label-left", 'data-parsley-validate'=>''])}}
                        @csrf
                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab"
                                                                          role="tab" data-toggle="tab"
                                                                          aria-expanded="true">اطلاعات کلی</a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab"
                                                                    data-toggle="tab" aria-expanded="false">جزئیات کتاب صوتی</a>
                                </li>
                                {{--                                <li role="presentation" class=""><a href="#tab_content3" role="tab"--}}
                                {{--                                                                    id="profile-tab2" data-toggle="tab"--}}
                                {{--                                                                    aria-expanded="false">پروفایل</a>--}}
                                {{--                                </li>--}}
                            </ul>

                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1"
                                     aria-labelledby="home-tab">
                                @include('admin.products.general_form')
                                <!-- start recent activity -->

                                    <!-- end recent activity -->
                                    <button type="submit" class="btn btn-success" >ثبت اطلاعات</button>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content2"
                                     aria-labelledby="profile-tab">

                                    <!-- start user projects -->
                                @include('admin.products.audiobooks.form')
                                <!-- end user projects -->
                                    <button type="submit" class="btn btn-success" >ثبت اطلاعات</button>
                                </div>
                                {{--                                <div role="tabpanel" class="tab-pane fade" id="tab_content3"--}}
                                {{--                                     aria-labelledby="profile-tab">--}}
                                {{--                                    <input type="hidden" value="yes" name="test" />--}}
                                {{--                                    <p>در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>--}}
                                {{--                                    <button type="submit" class="btn btn-success" >ثبت اطلاعات</button>--}}
                                {{--                                </div>--}}
                            </div>
                        </div>
                        {{ Form::Close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('custom-scripts')
    <script src="{{asset('gentella/vendors/switchery/dist/switchery.min.js')}}"></script>
@endpush
