@extends('layouts.master')


@section('Settings')
  class="active"
@stop
@section('settings-bar')
  active
@stop
@section('settings')
  class="active"
@stop



@section('heading')
  <h1>Settings</h1>
@stop
@section('content')



  <div class="row">
    <table class="table table-responsive table-hover table_wrapper" id="relations-table">
      <thead>
      <tr>
        <th></th>
        @foreach($permission as $perm)

          <th>{{$perm->name}}</th>

        @endforeach
        <th></th>
      </tr>


      </thead>


      @foreach($roles as $role)
        <tr>
          <div class="col-lg-4">
            {!! Form::model($permission, [
            'method' => 'PATCH',
            'url'    => 'settings/permissionsUpdate',
            ]) !!}

            <th>{{$role->name}}</th>


            <input type="hidden" name="role_id" value="{{ $role->id }}"/>
            @foreach($permission as $perm)
              <?php $isEnabled = !current(
                array_filter(
                  $role->permissions->toArray(),
                  function ($element) use ($perm) {
                    return $element['id'] === $perm->id;
                  }
                )
              );  ?>

              <td><input type="checkbox" <?php if (!$isEnabled)
                  echo 'checked' ?> name="permissions[ {{ $perm->id }} ]" value="1">
                <span class="perm-name"></span><br/></td>


          @endforeach

        </tr>
  </div>
  <td>{!! Form::submit('Save Settings for Role', ['class' => 'btn btn-primary']) !!}</td>
  {!! Form::close() !!}
  @endforeach


  </tbody>
  </table>
  </div>




  <div class="row">
    <div class="col-lg-12">
      <div class="sidebarheader movedown"><p>Overall settings</p></div>


      {!! Form::model($settings, [
         'method' => 'PATCH',
         'url' => 'settings/overall'
         ]) !!}

        <!-- *********************************************************************
     *                     Ticket complete
     *********************************************************************-->
      <div class="panel panel-default movedown">
        <div class="panel-heading">Ticket completion</div>
        <div class="panel-body">

          If <b>Allowed</b> only user who are assigned the ticket &amp; the admin can complete the ticket. <br/>
          If <b>Not allowed</b> anyone, can complete all tickets.
        </div>
      </div>
      {!! Form::select('ticket_complete_allowed', [1 => 'Allowed', 2 => 'Not Allowed'], $settings->ticket_complete_allowed, ['class' => 'form-control']) !!}
        <!-- *********************************************************************
     *                     Ticket assign
     *********************************************************************-->
      <div class="panel panel-default movedown">
        <div class="panel-heading">Ticket Assigned user</div>
        <div class="panel-body">

          If <b>Allowed</b> only user who are assigned the ticket &amp; the admin can assign another user. <br/>
          If <b>Not allowed</b> anyone, can assign another user.
        </div>
      </div>
      {!! Form::select('ticket_assign_allowed', [1 => 'Allowed', 2 => 'Not Allowed'], $settings->ticket_assign_allowed, ['class' => 'form-control']) !!}
        <!-- *********************************************************************
     *                     Lead complete       
     *********************************************************************-->

      <div class="panel panel-default movedown">
        <div class="panel-heading">Lead completion</div>
        <div class="panel-body">

          If <b>Allowed</b> only user who are assigned the ticket &amp; the admin can complete the Lead. <br/>
          If <b>Not allowed</b> anyone, can complete all Leads.
        </div>
      </div>
      {!! Form::select('lead_complete_allowed', [1 => 'Allowed', 2 => 'Not Allowed'], $settings->lead_complete_allowed, ['class' => 'form-control']) !!}
        <!-- *********************************************************************
     *                     Lead assign       
     *********************************************************************-->
      <div class="panel panel-default movedown">
        <div class="panel-heading">Lead Assigned user</div>
        <div class="panel-body">

          If <b>Allowed</b> only user who are assigned the lead &amp; the admin can assign another user. <br/>
          If <b>Not allowed</b> anyone, can assign another user.
        </div>
      </div>
      {!! Form::select('lead_assign_allowed', [1 => 'Allowed', 2 => 'Not Allowed'], $settings->lead_assign_allowed, ['class' => 'form-control']) !!}
      <br/>
      {!! Form::submit('Save Overall Settings', ['class' => 'btn btn-primary']) !!}
      {!! Form::close() !!}
    </div>
  </div>
  </div>

@stop

