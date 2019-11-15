<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title', 'AlumSpot')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/css/Coach/bootstrap.css">
  <!-- Font Awesome -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <!-- Ionicons -->
  <link rel="stylesheet" href="/css/ionicons.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="/css/Coach/jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/css/Coach/theme.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/css/Coach/skin.css">

   <!--Calendar CSS-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
  
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-black-light fixed sidebar-mini">
<div class="wrapper">

    @include('Alumni.layouts.nav')

    @include('Alumni.layouts.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @yield('content')

    </div>
    <!-- /.content-wrapper -->

    @include('Alumni.layouts.footer')  
    
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="/js/Coach/JQuery.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/js/Coach/Bootstrap.js"></script>
<!-- FastClick -->
<script src="/js/Coachfastclick.js"></script>
<!-- AdminLTE App -->
<script src="/js/Coach/adminlte.js"></script>
<!-- Sparkline -->
<script src="/js/Coach/sparkline.js"></script>
<!-- jvectormap  
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>-->
<!-- SlimScroll -->
<script src="/js/Coach/slimscroll.js"></script>
<!-- ChartJS -->
<script src="/js/Coach/chart.js"></script>
<!-- VUE CDN link -->
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
<!--Calendar JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
@yield('script')
</body>
</html>
