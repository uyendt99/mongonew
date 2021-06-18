<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>App Name - @yield('title')</title>
 
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/css/fontawesome-free/css/all.min.css')}}" media="all">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/css/adminlte.min.css')}}">
  <!-- <link rel="stylesheet" href="{{asset('assets/css/datatables/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/datatables/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/datatables/responsive.bootstrap4.min.css')}}"> -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  @include('partials.header')
  <!-- /.navbar -->
 
  <!-- Main Sidebar Container -->
  @include('partials.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    @include('partials.breadcrumb')
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  @include('partials.footer')
  <!-- /.content-wrapper -->
  
</div>
<!-- ./wrapper -->
 
<!-- jQuery -->
<script src="{{asset('assets/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/js/demo.js') }}"></script>
<!-- <script src="{{asset('assets/js/datatables/dataTables.bootstrap4.min.js') }}"></script> -->
<!-- <script src="{{asset('assets/js/datatables/dataTables.buttons.min.js') }}"></script> -->
<!-- <script src="{{asset('assets/js/datatables/dataTables.responsive.min.js') }}"></script> -->
<script src="{{asset('assets/js/datatables/jquery.dataTables.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="{{asset('assets/js/modal.js') }}"></script>
</body>
</html>