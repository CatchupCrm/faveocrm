@extends('layouts.master')

@section('Tickets')
  class="active"
@stop
@section('tickets-bar')
  active
@stop
@section('tickets')
  class="active"
@stop

@section('heading')
  <h1>All tickets</h1>
@stop

@section('content')
  <table class="table table-bordered table-striped" id="tickets-table">
    <thead>
    <tr>

      <th>Name</th>
      <th>Created at</th>
      <th>Deadline</th>
      <th>Assigned</th>

    </tr>
    </thead>
  </table>
@stop

@push('scripts')
<script>
  $(function () {
    $('#tickets-table').DataTable({
      processing: true,
      serverSide: true,
      lengthMenu: [[15, 25, 50, -1], [15, 25, 50, "All"]],
      iDisplayLength: 50,
      ajax: '{!! route('tickets.data') !!}',
      columns: [

        {data: 'titlelink', name: 'title'},
        {data: 'created_at', name: 'created_at'},
        {data: 'deadline', name: 'deadline'},
        {data: 'fk_user_id_assign', name: 'fk_user_id_assign',},
      ]
    });
  });
</script>
@endpush