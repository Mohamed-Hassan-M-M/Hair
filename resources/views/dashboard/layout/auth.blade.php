<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Dashboard')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{asset("dashboard/plugins/ionicons/font/fonts.css")}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset("dashboard/plugins/fontawesome-free/css/all.min.css")}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset("dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("dashboard/dist/css/adminlte.min.css")}}">
</head>
<body class="hold-transition login-page register-page">
@yield('content')
<!-- /.login-register-box -->

<!-- jQuery -->
<script src="{{asset("dashboard/plugins/jquery/jquery.min.js")}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset("dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{asset("dashboard/dist/js/adminlte.js")}}"></script>
@yield('script')
</body>
</html>
