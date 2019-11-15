@extends('Alumni.layouts.master')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Alumni Events</h1>
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
                        <tr class='clickable-row' data-href='/alumni/event/{{ $events->id }}' style='cursor:pointer;'>
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
                        <tr class='clickable-row' data-href='/alumni/event/{{ $events->id }}' style='cursor:pointer;'>
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

