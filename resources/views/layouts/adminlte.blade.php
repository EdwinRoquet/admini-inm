<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>


     <!-- Font Awesome -->
     <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
     <!-- Ionicons -->
     <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

     <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css')}}">
     <!-- overlayScrollbars -->
     <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
     <!-- Google Font: Source Sans Pro -->
     <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

     <!-- DataTables -->
     <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
     <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">



     <!-- Fonts -->
     <link rel="dns-prefetch" href="//fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">

     <script src="{{ asset('js/app.js') }}" defer></script>

     @yield('styles')
     <!-- Styles -->


</head>

<body class="hold-transition sidebar-mini ">
    <!-- appp -->
<div id="app">
     <!-- Site wrapper -->
<div class="wrapper">
    @if(session('mensaje'))
    <div id="toastsContainerTopRight m-2" class="toasts-top-right fixed">
        <div class="toast bg-success fade show m-2" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="mr-auto">Mensaje</strong>
              <button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
      <div class="toast-body">
          {{session('mensaje')}}
      </div>
     </div>
     </div>
  @endif
    <!-- Navbar -->
   @include('includes.navtop')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
   @include('includes.navaside')

    <!-- Content Wrapper. Contains page content -->
    <main>
        @yield('content')
    </main>
    <!-- /.content-wrapper -->

   @include('includes.footer')

  </div>
  <!-- ./wrapper -->
</div>
<!-- ./app -->




<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}" defer></script>
{{-- <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}" defer></script> --}}
<!-- Bootstrap 4 -->
{{-- <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script> --}}
<script src="{{asset('plugins/toastr/toastr.min.js')}}" defer></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}" defer></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}" defer></script>

@yield('scripts')
   <!-- DataTables -->
   <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}" defer></script>
   <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}" defer></script>
   <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}" defer></script>
   <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}" defer></script>
   <script src="{{asset('js/tables.js')}}" defer></script>


   <!-- Toastr -->


   <!-- Scripts -->


</body>

</html>
