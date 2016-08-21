<section class="content-header">


<!-- Content Header (Page header) -->
<div class="tab-content" style="background-color: white;padding: 0 20px 0 20px">
  <div class="collapse navbar-collapse" id="navbar-collapse">
    <div class="tabs-content">
      <div class="tabs-pane active" id="tabA">
        <ul class="nav navbar-nav">

        </ul>
      </div>

      <div class="tabs-pane @yield('users-bar')" id="tabG">
        <ul class="nav navbar-nav">
          <li id="bar" @yield('agents')><a href="{{ url('agents') }}" >Agents</a></li></a></li>
          <li id="bar" @yield('departments')><a href="{{ url('departments') }}" >Departments</a></li></a></li>
          <li id="bar" @yield('teams')><a href="{{ url('teams') }}" >Teams</a></li></a></li>
          <li id="bar" @yield('groups')><a href="{{ url('groups') }}" >Groups</a></li></a></li>
        </ul>
      </div>
      <div class="tabs-pane @yield('bookkeeping-bar')" id="tabB">
        <ul class="nav navbar-nav">
          <li id="bar" @yield('Bookkeeping')><a href="{{ url('bookkeeping') }}" >Bookkeeping</a></li></a></li>
          <li id="bar" @yield('departments')><a href="{{ url('departments') }}" >Departments</a></li></a></li>
          <li id="bar" @yield('teams')><a href="{{ url('teams') }}" >Teams</a></li></a></li>
          <li id="bar" @yield('groups')><a href="{{ url('groups') }}" >Groups</a></li></a></li>
        </ul>
      </div>
      <div class="tabs-pane @yield('trade-bar')" id="tabC">
        <ul class="nav navbar-nav">
          <li id="bar" @yield('emails')><a href="{{ url('emails') }}" >Emails</a></li></a></li>
          <li id="bar" @yield('ban')><a href="{{ url('banlist') }}" >Ban List</a></li>
          <li id="bar" @yield('template')><a href="{{ url('template') }}" >Template</a></li>
          <li id="bar" @yield('diagno')><a href="{{ url('getdiagno') }}" >Diagnostic</a></li>
          <li id="bar" @yield('smtp')><a href="{{ url('getsmtp') }}" >Smtp</a></li>
        </ul>
      </div>
      <div class="tabs-pane @yield('relations-bar')" id="tabD">
        <ul class="nav navbar-nav">
          <li id="bar" @yield('relations')><a href="{{url('relations')}}">Relations</a></li>
          <li id="bar" @yield('leads')><a href="{{url('leads')}}">Leads</a></li>
          {{-- <li id="bar" @yield('forms')><a href="#">Forms</a></li> --}}
        </ul>
      </div>
      <div class="tabs-pane @yield('projects-bar')" id="tabE">
        <ul class="nav navbar-nav">
          <li id="bar" @yield('company')><a href="{{url('getcompany')}}">Company</a></li>
          <li id="bar" @yield('system')><a href="{{url('getsystem')}}">System</a></li>
          <li id="bar" @yield('email')><a href="{{url('getemail')}}">Email</a></li>
          <li id="bar" @yield('tickets')><a href="{{url('getticket')}}">Tickets</a></li>
          <li id="bar" @yield('access')><a href="{{url('getaccess')}}">Access</a></li>
          <li id="bar" @yield('auto-response')><a href="{{url('getresponder')}}">Auto-Responce</a></li>
          <li id="bar" @yield('alert')><a href="{{url('getalert')}}">Alert & Notice</a></li>
        </ul>
      </div>
      <div class="tabs-pane @yield('documents-bar')" id="tabF">
        <ul class="nav navbar-nav">
          <li id="bar" @yield('footer')><a href="{{ url('create-footer') }}" >Footer</a></li></a></li>
          <li id="bar" @yield('footer2')><a href="{{ url('create-footer2') }}" >Footer2</a></li></a></li>
          <li id="bar" @yield('footer3')><a href="{{ url('create-footer3') }}" >Footer3</a></li></a></li>
          <li id="bar" @yield('footer4')><a href="{{ url('create-footer4') }}" >Footer4</a></li></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>




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


  <h1>
    @yield('contentheader_title', 'Page Header here')
    <small>@yield('contentheader_description')</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> {{ trans('adminlte_lang::message.level') }}</a></li>
    <li class="active">{{ trans('adminlte_lang::message.here') }}</li>
  </ol>
</section>