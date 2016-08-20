<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    @yield('contentheader_title', 'Page Header here')
    <small>@yield('contentheader_description')</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> {{ trans('adminlte_lang::message.level') }}</a></li>
    <li class="active">{{ trans('adminlte_lang::message.here') }}</li>
  </ol>
</section>
<section class="flashmessages">
  @if(Session::has('flash_message'))
    <div class="notification-success navbar-fixed-bottom ">
      <div class="notification-icon ion-checkmark-round"></div>
      <div class="notification-text">
        <span>{{ Session::get('flash_message') }} </span></div>
    </div>
  @endif
  @if(Session::has('flash_message_warning'))
    <div class="notification-warning navbar-fixed-bottom ">
      <div class="notification-icon ion-close-circled"></div>
      <div class="notification-text">
        <span>{{ Session::get('flash_message_warning') }} </span></div>
    </div>
  @endif
</section>
<section class="errorswarnings">
  @if($errors->any())
    <div class="alert alert-danger">
      @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
      @endforeach
    </div>
  @endif
</section>
