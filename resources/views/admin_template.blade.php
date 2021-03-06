<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->


<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Demo</title>

  <!-- Font Awesome Icons -->
  <!--<link rel="stylesheet" href="../bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css">-->
  <!--<link rel="stylesheet" href="../bower_components/admin-lte/dist/css/adminlte.min.css">-->

  <link rel="stylesheet" href="{{ asset('public/admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/admin-lte/dist/css/adminlte.min.css') }}">
  <!-- Theme style -->
  
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('public/css/css-test/vue-css.css') }}">
  <link rel="stylesheet" href="{{ asset('public/css/css-test/foundation.min.css') }}">
   <link rel="stylesheet" href="{{ asset('public/css/bootstrap-multiselect.css') }}">
  @yield('css')
</head>
<!--<body class="hold-transition sidebar-mini">-->
<body class="hold-transition sidebar-collapse">
<div class="wrapper">

  <!-- Navbar -->
    @if (!Auth::check())
        @php
            header("Location: " . URL::to('/login'), true, 302);
            exit();
        @endphp
    @endif
  @include('layouts.header')
  <!-- /.navbar -->
 @include('layouts.sidebar') 
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     <!--<div class="content-wrapper">-->


    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        @yield('content')
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  <!--</div>-->
  </div>
   
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
   @include('layouts.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../bower_components/admin-lte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../bower_components/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->   
<script src="../bower_components/admin-lte/dist/js/adminlte.min.js"></script>
<script src="{{ asset('public/js/bootstrap-multiselect.js') }}" ></script>
<script src="{{ asset('public/js/vue.js') }}" ></script>
<script src="{{ asset('public/js/js-css.js') }}" ></script>
@yield('js')
</body>
</html>
