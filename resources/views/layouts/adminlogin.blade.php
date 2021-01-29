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
     <!-- overlayScrollbars -->
     <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">

     <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
     <!-- Google Font: Source Sans Pro -->
     <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>
     <!-- Fonts -->
     <link rel="dns-prefetch" href="//fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
     <!-- Styles -->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body class="hold-transition login-page">
    <!-- appp -->
<div id="app">
    @yield('content')
</div>
<!-- ./app -->



    <!-- jQuery -->
   <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
   <!-- Bootstrap 4 -->
   {{-- <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script> --}}
   <!-- AdminLTE App -->
   <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
   <!-- AdminLTE for demo purposes -->
   <script src="{{asset('dist/js/demo.js')}}"></script>
</body>

</html>
