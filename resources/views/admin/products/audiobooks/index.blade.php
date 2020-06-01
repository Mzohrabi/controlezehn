@extends('admin.layout')

@section('content')
    @csrf
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>محصولات - کتاب صوتی
                        <small></small>
                    </h3>
                </div>

                <div class="title_right">
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    @include('flash::message')
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>لیست کتب صوتی</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <a href="{{route('admin.products.audiobooks.create')}}" class="btn btn-info">ساخت کتاب صوتی جدید</a>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" id="check-all" class="flat"></th>
                                    <th>عنوان کتاب</th>
                                    <th>قیمت</th>
                                    <th>امتیاز</th>
                                    <th>تعداد خرید</th>
                                    <th>تاریخ ثبت</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
{{--                                @foreach($users as $user)--}}
{{--                                    <tr>--}}
{{--                                        <td><input type="checkbox" value="{{$user->id}}" class="flat" name="table_records"></td>--}}
{{--                                        <td>{{$user->fname}}</td>--}}
{{--                                        <td>{{$user->lname}}</td>--}}
{{--                                        <td>{{$user->mobile}}</td>--}}
{{--                                        <td>{{$user->jalali_date}}</td>--}}
{{--                                        <td>--}}
{{--                                            <a href="{{route('admin.users.edit',$user->id)}}" class="btn btn-success">ویرایش</a>--}}
{{--                                            <a href="#" class="btn btn-danger delete-record" data-delete-url="{{ route('admin.users.delete',$user->id) }}"--}}
{{--                                               data-record-id="{{$user->id}}">حذف</a>--}}
{{--                                            <a href="{{route('admin.users.delete',$user->id)}}" class="btn btn-danger">حذف</a>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('custom-scripts')
    <!-- Datatables -->
    <script src="{{asset("gentella/vendors/datatables.net/js/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("gentella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js")}}"></script>
    <script src="{{asset("gentella/vendors/datatables.net-buttons/js/dataTables.buttons.min.js")}}"></script>
    <script src="{{asset("gentella/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js")}}"></script>
    <script src="{{asset("gentella/vendors/datatables.net-buttons/js/buttons.flash.min.js")}}"></script>
    <script src="{{asset("gentella/vendors/datatables.net-buttons/js/buttons.html5.min.js")}}"></script>
    <script src="{{asset("gentella/vendors/datatables.net-buttons/js/buttons.print.min.js")}}"></script>
    <script src="{{asset("gentella/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js")}}"></script>
    <script src="{{asset("gentella/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js")}}"></script>
    <script src="{{asset("gentella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js")}}"></script>
    <script src="{{asset("gentella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js")}}"></script>
    <script src="{{asset("gentella/vendors/datatables.net-scroller/js/dataTables.scroller.min.js")}}"></script>
    <script src="{{asset("gentella/vendors/jszip/dist/jszip.min.js")}}"></script>
    <script src="{{asset("gentella/vendors/pdfmake/build/pdfmake.min.js")}}"></script>
    <script src="{{asset("gentella/vendors/pdfmake/build/vfs_fonts.js")}}"></script>
    <script src="{{asset('gentella/vendors/iCheck/icheck.min.js')}}"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                console.log("yes");
                controlezehn.deleterecord();
            });
        </script>

@endpush
