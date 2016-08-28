@extends('layouts.master')


@section('Settings')
  class="active"
@stop
@section('settings-bar')
  active
@stop
@section('departments')
  class="active"
@stop

@section('heading')
  <h1>DepartmentsL Create</h1>
@stop





@section('content')
  {!! Form::open([
          'route' => 'departments.store',
          ]) !!}
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    {!! Form::label('name', 'Department name:', ['class' => 'control-label']) !!}
    {!! Form::text('name', null,['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('description', 'Department description:', ['class' => 'control-label']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
  </div>
  {!! Form::submit('Create New Department', ['class' => 'btn btn-primary']) !!}

  {!! Form::close() !!}

@endsection