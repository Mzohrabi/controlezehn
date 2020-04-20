<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{trans('login.title')}}</title>

    <!-- Bootstrap -->
    <link href="{{asset("gentella/vendors/bootstrap/dist/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset("gentella/vendors/bootstrap-rtl/dist/css/bootstrap-rtl.min.css")}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset("gentella/vendors/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset("gentella/vendors/nprogress/nprogress.css")}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{asset("gentella/vendors/animate.css/animate.min.css")}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset("gentella/build/css/custom.css")}}" rel="stylesheet">
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signin"></a>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                @include('admin.auth.login')
            </section>
        </div>
    </div>
</div>
</body>
</html>
