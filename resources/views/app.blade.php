<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Website Presensi</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard-asset/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard-asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard-asset/dist/css/adminlte.min.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/dashboard-asset/plugins/fullcalendar/main.css') }}">
    <!-- Boostraps 5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="icon" type="image/png" href="{{ asset('assets/dashboard-asset/img/img.jpg') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        @include('componen.header')
        @include('componen.sidebar')



        <div class="content-wrapper">
            @yield('content')
        </div>

        @include('componen.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->



        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="{{asset('assets/dashboard-asset/plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap -->
        <script src="{{asset('assets/dashboard-asset/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- overlayScrollbars -->
        <script src="{{asset('assets/dashboard-asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('assets/dashboard-asset/dist/js/adminlte.js')}}"></script>

        <!-- PAGE PLUGINS -->
        <script src="{{ asset('assets/dashboard-asset/plugins/fullcalendar/main.js') }}"></script>
        <!-- jQuery Mapael -->
        <script src="{{asset('assets/dashboard-asset/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
        <script src="{{asset('assets/dashboard-asset/plugins/raphael/raphael.min.js')}}"></script>
        <script src="{{asset('assets/dashboard-asset/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
        <script src="{{asset('assets/dashboard-asset/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
        <!-- ChartJS -->
        <script src="{{asset('assets/dashboard-asset/plugins/chart.js/Chart.min.js')}}"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{asset('assets/dashboard-asset/dist/js/pages/dashboard2.js')}}"></script>

        <!-- JS Boostraps 5.3.3  -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


        <!-- FULLCALENDAR -->
        <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/bootstrap5@6.1.14/index.global.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>
</body>

</html>