@extends('admin.layout')

@section('content')
    @csrf
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>سخنرانان
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
                            <h2>لیست سخنرانان</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <a href="{{route('admin.lecturers.create')}}" class="btn btn-info">سخنران جدید</a>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            {{$dataTable->table(['class' => 'table table-striped table-bordered dataTable no-footer'])}}
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

    {{$dataTable->scripts()}}
    <script type="text/javascript">
        $(document).ready(function () {
            controlezehn.deleterecord();
        });
    </script>

@endpush
