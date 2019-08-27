@extends('Coach.layouts.master')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><a data-toggle="modal" data-target="#create-event-modal" class="btn btn-primary btn-lg">Create Event</a></h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Upcoming Events</h4>
            </div>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Date</th>
                  <th>Title</th>
                  <th>RSVP</th>
                </tr>
                
                @if($upcomingEvent->count() === 0)
                    <tr>
                      <td>You have not yet scheduled any events. <b>Click above to schedule a new event</b></td>
                      <td></td>
                      <td></td>
                    </tr>
                @else 
                    @foreach ($upcomingEvent as $events)
                        <tr class='clickable-row' data-href='/coach/event/{{ $events->id }}' style='cursor:pointer;'>
                          <td>{{ \Carbon\Carbon::parse($events->datetime)->format('m/d/Y') }}</td>
                          <td>{{ $events->title }}</td>
                          <td>{{ $rsvpEvent->where('events_id', '=', $events->id)->count() }}</td>
                        </tr>
                    @endforeach
                @endif
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Past Events</h3>
            </div>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Date</th>
                  <th>Title</th>
                </tr>
                
                @if($pastEvent->count() === 0)
                    <tr>
                      <td>You have no past events. <b>Click above to schedule a new event</b></td>
                      <td></td>
                    </tr>
                @else 
                    @foreach ($pastEvent as $events)
                        <tr class='clickable-row' data-href='/coach/event/{{ $events->id }}' style='cursor:pointer;'>
                          <td>{{ \Carbon\Carbon::parse($events->datetime)->format('m/d/Y') }}</td>
                          <td>{{ $events->title }}</td>
                        </tr>
                    @endforeach
                @endif
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-body no-padding">
              {!! $calendar->calendar() !!}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->


    <!-- MODAL -->
    <div class="modal fade" id="create-event-modal">
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
    
@endsection

@section('script')
    {!! $calendar->script() !!}
    
    <script>
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });  
    </script>
        
@endsection