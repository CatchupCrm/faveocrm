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
  <h1>All Departments</h1>
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
        @ifUserIs('administrator')
        <th>Action</th>
        @endif
      </tr>
      </thead>
      <tbody>

      @foreach($department as $dep)

        <tr>
          <td>{{$dep->name}}</td>
          <td>{{Str_limit($dep->description, 50)}}</td>
          @ifUserIs('administrator')
          <td>   {!! Form::open([
            'method' => 'DELETE',
            'route' => ['departments.destroy', $dep->id]
        ]); !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Are you sure?")']); !!}

            {!! Form::close(); !!}</td>
          </td>
          @endif
        </tr>
      @endforeach

      </tbody>
    </table>

  </div>

@stop