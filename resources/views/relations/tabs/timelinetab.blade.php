<div id="timeline" class="tab-pane fade in active">
  <div class="boxspace">
    <table class="table table-bordered table-striped">
      <h4>All Timelines</h4>
      <thead>
      <thead>
      <tr>
        <th>Title</th>
        <th>Assigned user</th>
        <th>Created date</th>
        <th>Deadline</th>
        <th><a href="{{ route('timelines.create', ['relation' => $relation->id])}}">
            <button class="btn btn-success">Add new timeline</button>
          </a></th>

      </tr>
      </thead>
      <tbody>
      <?php  $tr = ""; ?>
      @foreach($relation->alltimelines as $timeline)
        @if($timeline->status == 1)
          <?php  $tr = '#adebad'; ?>
        @elseif($timeline->status == 2)
          <?php $tr = '#ff6666'; ?>
        @endif
        <tr style="background-color:<?php echo $tr;?>">

          <td><a href="{{ route('timelines.show', $timeline->id) }}">{{$timeline->title}} </a></td>
          <td>
            <div class="popoverOption"
                 rel="popover"
                 data-placement="left"
                 data-html="true"
                 data-original-title="<span class='glyphicon glyphicon-user' aria-hidden='true'> </span> {{$timeline->assignee->name}}">
              <div id="popover_content_wrapper" style="display:none; width:250px;">
                <img src='http://placehold.it/350x150' height='80px' width='80px'
                     style="float:left; margin-bottom:5px;"/>
                <p class="popovertext">
                  <span class="glyphicon glyphicon-envelope" aria-hidden="true"> </span>
                  <a href="mailto:{{$timeline->assignee->email}}">
                    {{$timeline->assignee->email}}<br/>
                  </a>
                  <span class="glyphicon glyphicon-headphones" aria-hidden="true"> </span>
                  <a href="mailto:{{$timeline->assignee->work_number}}">
                  {{$timeline->assignee->work_number}}</p>
                </a>

              </div>
              <a href="{{route('users.show', $timeline->assignee->id)}}"> {{$timeline->assignee->name}}</a>
            </div> <!--Shows users assigned to timeline -->
          </td>
          <td>{{date('d, M Y, H:i', strTotime($timeline->created_at))}}  </td>
          <td>{{date('d, M Y', strTotime($timeline->deadline))}}
            @if($timeline->status == 1)({{ $timeline->days_until_deadline }}) @endif</td>
          <td></td>
        </tr>

      @endforeach

      </tbody>
    </table>
  </div>