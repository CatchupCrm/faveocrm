<br/><br/>
<div class="col-sm-6">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h4 class="box-title">
        Tickets each month
      </h4>
      <div class="box-tools pull-right">
        <button type="button" id="collapse1" class="btn btn-box-tool" data-toggle="collapse"
                data-target="#collapseOne"><i id="toggler1" class="fa fa-minus"></i>
        </button>
      </div>
    </div>
    <div id="collapseOne" class="panel-collapse">
      <div class="box-body">
        <div>
          Box Body
        </div>
      </div>
    </div>
  </div>
  <div class="box box-primary">
    <div class="box-header with-border">
      <h4 class="box-title">
        Leads each month
      </h4>
      <div class="box-tools pull-right">
        <button type="button" id="collapse2" class="btn btn-box-tool" data-toggle="collapse"
                data-target="#collapseTwo"><i id="toggler2" class="fa fa-minus"></i>
        </button>
      </div>
    </div>
    <div id="collapseTwo" class="panel-collapse">
      <div class="box-body">
        <div>
          Leads
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-sm-6">
  <div class="col-lg-12">
    <!-- Info Boxes Style 2 -->
    <div class="info-box bg-yellow">
      <span class="info-box-icon"><i class="ion ion-ios-book-outline"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">All Tickets</span>
        <span class="info-box-number">{{$allCompletedTickets}} / {{$alltickets}}</span>

        <div class="progress">
          <div class="progress-bar" style="width: {{$totalPercentageTickets}}%"></div>
        </div>
                  <span class="progress-description">
                    {{number_format($totalPercentageTickets, 0)}}% Completed
                  </span>
      </div>
      <!-- /.info-box-content -->
    </div>
  </div>


</div>
