<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    @if (! Auth::guest())
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image"/>
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
        </div>
      </div>
      @endif


        <!-- Sidebar Menu -->
      <ul class="sidebar-menu">


        <li class="header">DashBoard</li>
        <li><a href="{{route('dashboard', \Auth::id())}}" class=" list-group-item" data-parent="#MainMenu"><i
              class="glyphicon glyphicon-dashboard"></i> Dashboard </a></li>

        <li class="header">Users</li>
        <li><a href="{{route('users.show', \Auth::id())}}"><i
              class="glyphicon glyphicon-user"></i> Profile </a></li>
        <li><a href="{{ route('users.index')}}">All Users</a></li>
        @ifUserCan('user.create')
        <li><a href="{{ route('users.create')}}">New User</a></li>
        @endif


        <li class="header">Relations</li>
        <li><a href="{{ route('clients.index')}}">All Relations</a></li>
        @ifUserCan('client.create')
        <li><a href="{{ route('clients.create')}}">New Relation</a></li>
        @endif


        <li class="header">Leads</li>
        <li><a href="{{ route('leads.index')}}">All Leads</a></li>
        @ifUserCan('lead.create')
        <li><a href="{{ route('leads.create')}}">New Lead</a></li>
        @endif

        <li class="header">Tickets</li>
        <li><a href="{{ route('tasks.index')}}">All Tasks</a></li>
        @ifUserCan('task.create')
        <li><a href="{{ route('tasks.create')}}">New Task</a></li>
        @endif

        <li class="header">Settings</li>
        @ifUserIs('administrator')
        <li><a href="{{ route('settings.index')}}">Overall Settings</a></li>
        <li><a href="{{ route('roles.index')}}">Role Management</a></li>
        <li><a href="{{ route('integrations.index')}}">Integrations</a></li>
        <li><a href="{{ route('departments.index')}}">All Departments</a></li>
        <li><a href="{{ route('departments.create')}}">New Department</a></li>
        @endif

      </ul><!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
