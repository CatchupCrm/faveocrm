<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

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
@yield('HeadInclude')
<body class="skin-dk sidebar-mini">
<div class="wrapper">

  @include('layouts.partials.mainheader')

  @include('layouts.partials.sidebar')

    <!-- Right side column. Contains the navbar and content of the page -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <section class="content-header">
      @yield('PageHeader')
      @yield('breadcrumbs')
      @include('layouts.partials.contentheader')
    </section>


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

<script type="text/javascript" src="{{ URL::asset('js/custom.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/sorttable.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jasny-bootstrap.min.js') }}"></script>

@stack('scripts')

<script>
  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $("input[type='checkbox']", ".mailbox-messages").iCheck("uncheck");
      } else {
        //Check all checkboxes
        $("input[type='checkbox']", ".mailbox-messages").iCheck("check");
      }
      $(this).data("clicks", !clicks);
    });

    //Handle starring for glyphicon and font awesome
    $(".mailbox-star").click(function (e) {
      e.preventDefault();
      //detect type
      var $this = $(this).find("a > i");
      var glyph = $this.hasClass("glyphicon");
      var fa = $this.hasClass("fa");

      //Switch states
      if (glyph) {
        $this.toggleClass("glyphicon-star");
        $this.toggleClass("glyphicon-star-empty");
      }

      if (fa) {
        $this.toggleClass("fa-star");
        $this.toggleClass("fa-star-o");
      }
    });
  });
</script>
<script src="{{URL::asset('js/tabby.js')}}"></script>
</body>
</html>
