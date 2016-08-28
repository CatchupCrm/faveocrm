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
  <h1>Relations : RelationName</h1>
@stop


@section('heading')
  {{-- Breadcrumbs please --}}
@section('htmlheader_title', 'Relations: Relation Name')
@section('contentheader_title', 'Relations: Relation Name')
@endsection



@section('content')
  <script>
    $(document).ready(function () {
      $('[data-toggle="tooltip"]').tooltip(); //Tooltip on icons top
      $('.popoverOption').each(function () {
        var $this = $(this);
        $this.popover({
          trigger: 'hover',
          placement: 'left',
          container: $this,
          html: true,
          content: $this.find('#popover_content_wrapper').html()
        });
      });
    });
  </script>
  <div class="row">
    @include('partials.relationheader')
    @include('partials.userheader')
  </div>

  <div class="row" style="min-height:300px;">
    <div  class="col-sm-6">
      <h3>Left Tabs</h3>
      <hr/>
      <div class="col-xs-3"> <!-- required for floating -->
        <!-- Nav tabs -->
        <ul class="nav nav-tabs tabs-left">
          <li class="active"><a href="#timeLine" data-toggle="tab">TimeLine</a></li>
          <li><a href="#lead" data-toggle="tab">lead</a></li>
          <li><a href="#document" data-toggle="tab">document</a></li>
          <li><a href="#ticket" data-toggle="tab">ticket</a></li>
          <li><a href="#invoice" data-toggle="tab">invoice</a></li>
        </ul>
      </div>

      <div class="col-xs-9">
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="timeLine">@include('relations.tabs.timelinetab')</div>
          <div class="tab-pane" id="lead">@include('relations.tabs.leadtab')</div>
          <div class="tab-pane" id="document">@include('relations.tabs.documenttab')</div>
          <div class="tab-pane" id="ticket">@include('relations.tabs.tickettab')</div>
          <div class="tab-pane" id="invoice">@include('relations.tabs.invoicetab')</div>
        </div>
      </div>

      <div class="clearfix"></div>

    </div>
</div>
@stop