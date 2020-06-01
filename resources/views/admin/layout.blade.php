<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="fontiran.com:license" content="Y68A9">
    <link rel="icon" href="{{asset('gentella/')}}../build/images/favicon.ico" type="image/ico"/>
    <title>Gentelella Alela! | قالب مدیریت رایگان </title>

    <!-- Bootstrap -->
    <link href="{{asset('gentella/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('gentella/vendors/bootstrap-rtl/dist/css/bootstrap-rtl.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('gentella/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('gentella/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{asset('gentella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('gentella/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('gentella/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('gentella/build/css/custom.min.css')}}" rel="stylesheet">
    @stack('styles')
</head>
<!-- /header content -->
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col hidden-print">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.html" class="site_title"><i class="fa fa-book"></i> <span>کنترل ذهن</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="../build/images/img.jpg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>خوش آمدید,</span>
                        <h2>{{ $user->full_name }}</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li class="{{ Utilities::setActiveMenu('admin/dashboard') }}"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> داشبورد </a></li>
                            <li class="{{ Utilities::setActiveMenu('admin/users*') }}"><a><i class="fa fa-user-circle"></i> کاربران <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li class="{{Utilities::setActiveSubMenu('admin/users/all')}}"><a href="{{route('admin.users.all')}}">همه کاربران</a></li>
                                    <li class="{{ Utilities::setActiveSubMenu('admin/users/create')}}"><a href="{{route('admin.users.create')}}">ساخت کاربر جدید</a></li>
                                </ul>
                            </li>
                            <li class="{{ Utilities::setActiveMenu('admin/products*') }}"><a><i class="fa fa-tags"></i> محصولات <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li class="{{Utilities::setActiveSubMenu('admin/products/audiobooks*')}}"><a href="{{route('admin.products.audiobooks')}}">کتاب صوتی</a></li>
                                    <li class="{{ Utilities::setActiveSubMenu('admin/products/courses*')}}"><a href="{{route('admin.products.courses')}}">دوره ها</a></li>
                                    <li class="{{ Utilities::setActiveSubMenu('admin/products/lectures*')}}"><a href="{{route('admin.products.lectures')}}">سخنرانی ها</a></li>
                                </ul>
                            </li>
                            <li class="{{ Utilities::setActiveMenu('admin/exercises*') }}"><a><i class="fa fa-book"></i> تمرین ها <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li class="{{Utilities::setActiveSubMenu('admin/exercises/magicbox*')}}"><a href="{{route('admin.exercises.magicbox')}}">جعبه جادویی</a></li>
                                </ul>
                            </li>
                            <li class="{{ Utilities::setActiveMenu('admin/freetutorials*') }}"><a><i class="fa fa-book"></i>آموزش های رایگان <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li class="{{Utilities::setActiveSubMenu('admin/freetutorials/trainingposts*')}}"><a href="{{route('admin.freetutorials.trainingposts')}}">پست های آموزشی</a></li>
                                    <li class="{{Utilities::setActiveSubMenu('admin/freetutorials/audiofiles*')}}"><a href="{{route('admin.freetutorials.audiofiles')}}">فایل های صوتی</a></li>
                                    <li class="{{Utilities::setActiveSubMenu('admin/freetutorials/photowritens*')}}"><a href="{{route('admin.freetutorials.photowritens')}}">عکس نوشته</a></li>
                                    <li class="{{Utilities::setActiveSubMenu('admin/freetutorials/clips*')}}"><a href="{{route('admin.freetutorials.clips')}}">کلیپ انگیزشی</a></li>
                                </ul>
                            </li>
                            <li class="{{ Utilities::setActiveMenu('admin/dailypray*') }}"><a href="{{route('admin.dailypray')}}"><i class="fa fa-hand-paper-o"></i> مناجات روزانه </a></li>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="تنظیمات">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="تمام صفحه" onclick="toggleFullScreen();">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="قفل" class="lock_btn">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="خروج" href="login.html">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav hidden-print">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="../build/images/img.jpg" alt="">{{ $user->full_name }}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;"> نمایه</a></li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>تنظیمات</span>
                                    </a>
                                </li>
                                <li><a href="javascript:;">کمک</a></li>
                                <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> خروج</a></li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                               aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">6</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                <li>
                                    <a>
                                        <span class="image"><img src="../build/images/img.jpg"
                                                                 alt="Profile Image"/></span>
                                        <span>
                          <span>مرتضی کریمی</span>
                          <span class="time">3 دقیقه پیش</span>
                        </span>
                                        <span class="message">
                          فیلمای فستیوال فیلمایی که اجرا شده یا راجع به لحظات مرده ایه که فیلمسازا میسازن. آنها جایی بودند که....
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img src="../build/images/img.jpg"
                                                                 alt="Profile Image"/></span>
                                        <span>
                          <span>مرتضی کریمی</span>
                          <span class="time">3 دقیقه پیش</span>
                        </span>
                                        <span class="message">
                          فیلمای فستیوال فیلمایی که اجرا شده یا راجع به لحظات مرده ایه که فیلمسازا میسازن. آنها جایی بودند که....
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img src="../build/images/img.jpg"
                                                                 alt="Profile Image"/></span>
                                        <span>
                          <span>مرتضی کریمی</span>
                          <span class="time">3 دقیقه پیش</span>
                        </span>
                                        <span class="message">
                          فیلمای فستیوال فیلمایی که اجرا شده یا راجع به لحظات مرده ایه که فیلمسازا میسازن. آنها جایی بودند که....
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img src="../build/images/img.jpg"
                                                                 alt="Profile Image"/></span>
                                        <span>
                          <span>مرتضی کریمی</span>
                          <span class="time">3 دقیقه پیش</span>
                        </span>
                                        <span class="message">
                          فیلمای فستیوال فیلمایی که اجرا شده یا راجع به لحظات مرده ایه که فیلمسازا میسازن. آنها جایی بودند که....
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="text-center">
                                        <a>
                                            <strong>مشاهده تمام اعلان ها</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->
        <!-- /header content -->

        <!-- page content -->
        @yield('content')
        <!-- /page content -->


        <!-- footer content -->
        <footer class="hidden-print">
            <div class="pull-left">
                Gentelella - قالب پنل مدیریت بوت استرپ <a href="https://colorlib.com">Colorlib</a> | پارسی شده توسط <a
                    href="https://morteza-karimi.ir">{{ $user->full_name }}</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>
<div id="lock_screen">
    <table>
        <tr>
            <td>
                <div class="clock"></div>
                <span class="unlock">
                    <span class="fa-stack fa-5x">
                      <i class="fa fa-square-o fa-stack-2x fa-inverse"></i>
                      <i id="icon_lock" class="fa fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                </span>
            </td>
        </tr>
    </table>
</div>
<!-- jQuery -->
<script src="{{asset('gentella/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('gentella/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('gentella/vendors/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{asset('gentella/vendors/nprogress/nprogress.js')}}"></script>
<!-- bootstrap-progressbar -->
<script src="{{asset('gentella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('gentella/vendors/iCheck/icheck.min.js')}}"></script>

<!-- bootstrap-daterangepicker -->
<script src="{{asset('gentella/vendors/moment/min/moment.min.js')}}"></script>

<script src="{{asset('gentella/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

<!-- Chart.js -->
<script src="{{asset('gentella/vendors/Chart.js/dist/Chart.min.js')}}"></script>
<!-- jQuery Sparklines -->
<script src="{{asset('gentella/vendors/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- gauge.js -->
<script src="{{asset('gentella/vendors/gauge.js/dist/gauge.min.js')}}"></script>
<!-- Skycons -->
<script src="{{asset('gentella/vendors/skycons/skycons.js')}}"></script>
<!-- Flot -->
<script src="{{asset('gentella/vendors/Flot/jquery.flot.js')}}"></script>
<script src="{{asset('gentella/vendors/Flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('gentella/vendors/Flot/jquery.flot.time.js')}}"></script>
<script src="{{asset('gentella/vendors/Flot/jquery.flot.stack.js')}}"></script>
<script src="{{asset('gentella/vendors/Flot/jquery.flot.resize.js')}}"></script>
<!-- Flot plugins -->
<script src="{{asset('gentella/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
<script src="{{asset('gentella/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
<script src="{{asset('gentella/vendors/flot.curvedlines/curvedLines.js')}}"></script>
<!-- DateJS -->
<script src="{{asset('gentella/vendors/DateJS/build/production/date.min.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('gentella/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
<script src="{{asset('gentella/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
<script src="{{asset('gentella/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>

@stack('custom-scripts')
<!-- Custom Theme Scripts -->
<script src="{{asset('gentella/build/js/custom.min.js')}}"></script>
<script src="{{asset('gentella/build/js/controlezehn.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<!-- /bootstrap-daterangepicker -->

</body>
</html>
