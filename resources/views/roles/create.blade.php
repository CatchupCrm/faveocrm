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
  <h1>Roles : Create Role</h1>
@stop



@section('content')
  {!! Form::open([
          'route' => 'roles.store',
          ]) !!}
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    {!! Form::label('name', 'Role name:', ['class' => 'control-label']) !!}
    {!! Form::text('name', null,['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('description', 'Department description:', ['class' => 'control-label']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
  </div>
  {!! Form::submit('Create New Role', ['class' => 'btn btn-primary']) !!}

  {!! Form::close() !!}

@endsection