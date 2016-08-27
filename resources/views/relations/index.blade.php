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
  <h1>All Relations</h1>
@stop


@section('heading')
  {{-- Breadcrumbs please --}}
@section('htmlheader_title', 'Relations')
@section('contentheader_title', 'View All Relations')
@endsection

@section('content')

  <table class="table table-bordered table-striped" id="relations-table">
    <thead>
    <tr>
      <th>Name</th>
      <th>Company</th>
      <th>Email</th>
      <th>Number</th>
      <th></th>
      <th></th>
    </tr>
    </thead>
  </table>

@stop

@push('scripts')
<script>
  $(function () {
    $('#relations-table').DataTable({
      processing: true,
      serverSide: true,
      lengthMenu: [[15, 25, 50, -1], [15, 25, 50, "All"]],
      iDisplayLength: 50,
      ajax: '{!! route('relations.data') !!}',
      columns: [

        {data: 'namelink', name: 'name'},
        {data: 'company_name', name: 'company_name'},
        {data: 'email', name: 'email'},
        {data: 'primary_number', name: 'primary_number'},
          @ifUserCan('relation.update')
        {
          data: 'edit', name: 'edit', orderable: false, searchable: false
        },
          @endif
          @ifUserCan('relation.delete')
        {
          data: 'delete', name: 'delete', orderable: false, searchable: false
        },
        @endif

      ]
    });
  });
</script>
@endpush
