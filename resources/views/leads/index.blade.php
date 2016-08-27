@extends('layouts.master')
@section('Relations')
  class="active"
@stop
@section('relations-bar')
  active
@stop
@section('leads')
  class="active"
@stop

@section('heading')
  <h1>All Leads</h1>
@stop

@section('content')
  <table class="table table-bordered table-striped" id="leads-table">
    <thead>
    <tr>
      <th>Name</th>
      <th>Created by</th>
      <th>Deadline</th>
      <th>Assigned</th>
    </tr>
    </thead>
  </table>
@stop

@push('scripts')
<script>
  $(function () {
    $('#leads-table').DataTable({
      processing: true,
      serverSide: true,
      lengthMenu: [[15, 25, 50, -1], [15, 25, 50, "All"]],
      iDisplayLength: 50,
      ajax: '{!! route('leads.data') !!}',
      columns: [
        {data: 'titlelink', name: 'title'},
        {data: 'fk_user_id_created', name: 'fk_user_id_created'},
        {data: 'contact_date', name: 'contact_date',},
        {data: 'fk_user_id_assign', name: 'fk_user_id_assign'},
      ]
    });
  });
</script>
@endpush