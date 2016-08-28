@extends('layouts.master')




@section('Settings')
  class="active"
@stop
@section('settings-bar')
  active
@stop
@section('roles')
  class="active"
@stop



@section('heading')
  <h1>Roles</h1>
@stop


@section('content')
  <div class="col-lg-12 currentticket">

    <table class="table table-bordered table-striped">
      <h3>All Departments</h3>
      <thead>
      <thead>
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>

      @foreach($roles as $role)



        <tr>
          <td>{{$role->name}}</td>
          <td>{{Str_limit($role->description, 50)}}</td>

          <td>   {!! Form::open([
            'method' => 'DELETE',
            'route' => ['roles.destroy', $role->id]
        ]); !!}
            @if($role->id !== 1)
              {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Are you sure?")']); !!}
            @endif
            {!! Form::close(); !!}</td>
          </td>
        </tr>
      @endforeach

      </tbody>
    </table>

    <a href="{{ route('roles.create')}}">
      <button class="btn btn-success">Add new role</button>
    </a>

  </div>

@stop