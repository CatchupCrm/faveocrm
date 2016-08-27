<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, nofollow">
  <title>FlarePoint</title>

  <!-- Fonts -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet'
        type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

  <!-- Styles -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

  <style>
    body {
      font-family: 'Lato';
    }

    .fa-btn {
      margin-right: 6px;
    }
  </style>

@yield('HeadInclude')


</head>


<body id="app-layout">
Layout is APP (frontend, not logged in)
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <section class="content-header">
      @yield('PageHeader')
      @include('layouts.partials.contentheader')
    </section>


    <!-- Main content -->
    <section class="content">
      <!-- Your Page Content Here -->
      @yield('content')
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
  @include('layouts.partials.footer')
</div><!-- ./wrapper -->

  <!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
