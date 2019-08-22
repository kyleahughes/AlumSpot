@extends('Coach.layouts.master')

@section('content')

<div class='content'>
<div class="row">
    <div class="col-md-3">
      <div class="box box-default collapsed-box">
        <div class="box-header with-border">
            <h3 class="box-title"><a data-toggle="modal" data-target="#modal-default-event">Create Event</a></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          Click here to choose a time and date for an event that alumni can register for
          directly through AlumSpot.
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- .col -->
    
    
    
    <!-- MODAL -->
    <div class="modal fade" id="modal-default-event">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="box box-info">
                <div class="modal-header">
                  <div class="pull-left">
                    <h4 class="modal-title"><b>Created By:</b>&nbsp;&nbsp;&nbsp;<a href=""><img src="" class="img-circle" height="40"></a></h4>
                  </div>
                  <div class="pull-right">
                    <b></b>
                  </div>
                </div>
                <div class="modal-body">
                      <p><b>Description:</b></p>
                    <p></p>
                </div>
                <form action="/coach/event" method="POST">
                    <div class="box-body">

                        {{ csrf_field() }}
                        <div class="row">

                            <div class="form-group col-md-6">
                              <input type="text" class="form-control" id="title" name="title" placeholder="Event Title">
                            </div>
                            <div class="form-group col-md-6">
                              <input type="text" class="form-control" id="title" name="location" placeholder="Location of Event">
                            </div>
                        </div>
                        <div class="form-group">
                          <textarea class="textarea" placeholder="Body" name="body" id="body"
                                    style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>

                        <div class="form-group login-box-msg">
                            <h3>Event Date</h3>
                            <input id="datetime" name ="datetime" type="datetime-local">
                        </div>

                    @include('errors')
                    </div>
                    <div class="box-footer clearfix">
                      <button type="submit" class="pull-right btn btn-lg btn-primary">Create</button>
                    </div>

                </form>

              </div>
              <!-- /.box -->
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
              </div>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
</div> 
<!-- /.row -->
<div class='container-fluid'>
<div class="row">
        <div class="col-xs-4">
          <div class="box">
            <div class="box-header">
              <h3>Events</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Title</th>
                  <th>Date</th>
                  <th>Attending</th>
                </tr>
                
                @if($upcomingEvent->count() === 0)
                    <tr>
                        <td>You have not yet scheduled any events. <b>Click above to schedule a new event</b></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                @else 
                
                    @foreach ($upcomingEvent as $events)
                        <tr>
                          <td><a data-toggle="modal" data-target="#modal-default-{{ $events->id }}">{{ $events->title }}</a></td>
                          <td>{{ \Carbon\Carbon::parse($events->datetime)->toFormattedDateString() }}</td>
                          <td>{{ $rsvpEvent->where('events_id', '=', $events->id)->count() }}</td>
                        </tr>

                        <!-- MODAL -->
                        <div class="modal fade" id="modal-default-{{ $events->id }}">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                  <div class="pull-left">
                                    <h4 class="modal-title"><b>Created By:</b>&nbsp;&nbsp;&nbsp;<a href="/alumni/alumSearch/{{ $events->coach->id }}"><img src="/coach/{{ $events->coach->avatar }}" class="img-circle" height="40">{{ $events->coach->first_name }} {{ $events->coach->last_name }}</a></h4>
                                  </div>
                                  <div class="pull-right">
                                    <b>{{ $events->created_at->format('M d, Y h:i A') }}</b>
                                  </div>
                              </div>
                              <div class="modal-body">
                                  <p><b>Description:</b></p>
                                <p>{{ $events->body }}</p>
                              </div>
                              <hr>
                              <!-- COMMENTS -->
                              <div class="content">
                                  <h3><i class="far fa-comments"></i>&emsp;<span>Comments</span></h3>
                                  <div class="comment">
                                      <ul class="list-group">
                                      @foreach($events->comment as $comments)
                                         <li class="list-group-item">
                                            @if($comments->users_id === null)
                                             <strong>
                                                 <a href="/coach/alumSearch/{{ $comments->alumni->id }}">{{ $comments->alumni->first_name }} {{ $comments->alumni->last_name }} </a>
                                             </strong>
                                             @else
                                             <strong>
                                                 <a href="#">{{ $comments->coach->first_name }} {{ $comments->coach->last_name }} </a>
                                             </strong>
                                             @endif
                                             <span class="text-muted">
                                               {{ $comments->created_at->diffForHumans() }}:&nbsp;  
                                             </span>
                                             {{ $comments->body }}
                                             <span class='pull-right'>
                                                <a onclick="return confirm('Are you sure you want to delete this comment?')" href="/coach/delete/comment/{{ $comments->id }}" style="color: red;">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                             </span>
                                         </li>
                                      @endforeach
                                      </ul>
                                  </div>

                                  <div class="card">
                                      <div class="card-block">
                                          <form method="POST" action="/coach/{{ $events->id }}/comment/event">
                                              {{ csrf_field() }}
                                              <div class="form-group">
                                                  <textarea name="body" placeholder="Your comment here.." class="form-control" required></textarea>
                                              </div>
                                              <div class="form-goup">
                                                <button type="submit" class="btn btn-primary">Add Comment</button>
                                              </div>
                                              @include('errors')
                                          </form>
                                      </div>
                                  </div>
                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                              </div>

                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->

                    @endforeach
                @endif
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    
        <div class="container">
            <div class="row" >
                <div class="col-xs-7" >
                    <div class="panel panel-default" >
                        <div class="panel-heading">Full Calendar Example</div>

                        <div class="panel-body" align="center">
                            {!! $calendar->calendar() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    
      </div>
</div>
</div>

@endsection

@section('script')
    {!! $calendar->script() !!}
@endsection
