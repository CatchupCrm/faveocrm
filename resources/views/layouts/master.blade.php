<!DOCTYPE html>
<html lang="en">
<title>Flarepoint CRM</title>

@section('htmlheader')
@include('layouts.partials.htmlheader')

@show

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="skin-blue sidebar-mini">
<div class="wrapper">

  @include('layouts.partials.mainheader')

  @include('layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    @include('layouts.partials.contentheader')

      <!-- Main content -->
    <section class="content">
      <!-- Your Page Content Here -->
      @yield('content')
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->

  @include('layouts.partials.controlsidebar')

  @include('layouts.partials.footer')

</div><!-- ./wrapper -->

@section('scripts')
  @include('layouts.partials.scripts')
@show


<script type="text/javascript" src="{{ URL::asset('js/dropzone.js') }}"></script>
<script src="{{ URL::asset('js/semantic.min.js') }}"></script>

<script type="text/javascript" src="{{ URL::asset('js/custom.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/sorttable.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jasny-bootstrap.min.js') }}"></script>

@stack('scripts')
</body>
</html>
