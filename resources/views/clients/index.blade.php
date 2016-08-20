@extends('layouts.master')

@section('heading')
  {{-- Breadcrumbs please --}}
@section('contentheader_title', 'View All Relations')
@endsection

@section('content')

  <table class="table table-bordered table-striped" id="clients-table">
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
    $('#clients-table').DataTable({
      processing: true,
      serverSide: true,
      lengthMenu: [[15, 25, 50, -1], [15, 25, 50, "All"]],
      iDisplayLength: 50,
      ajax: '{!! route('clients.data') !!}',
      columns: [

        {data: 'namelink', name: 'name'},
        {data: 'company_name', name: 'company_name'},
        {data: 'email', name: 'email'},
        {data: 'primary_number', name: 'primary_number'},
          @ifUserCan('client.update')
        {
          data: 'edit', name: 'edit', orderable: false, searchable: false
        },
          @endif
          @ifUserCan('client.delete')
        {
          data: 'delete', name: 'delete', orderable: false, searchable: false
        },
        @endif

      ]
    });
  });
</script>
@endpush
