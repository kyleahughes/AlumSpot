@extends('Coach.layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ Auth::user()->school->name }}
        <small>{{ Auth::user()->program->type }} {{ Auth::user()->program->sport }}</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
          <div class="col-md-8">
              <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <h3>{{ Auth::user()->program->alumni->count() }}</h3>

                      <h4>Total Alumni</h4>
                    </div>
                    <div class="icon">
                      <i class="far fa-address-book"></i>
                    </div>
                    <a href="/coach/alumSearch" class="small-box-footer">
                      View <i class="fa fa-arrow-circle-right"></i>
                    </a>
                  </div>
                </div>
                <!-- /.col -->

                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3>{{ Auth::user()->program->event->count() }}</h3>

                      <h4>Events</h4>
                    </div>
                    <div class="icon">
                      <i class="far fa-calendar-alt"></i>
                    </div>
                    <a href="/coach/event/view" class="small-box-footer">
                      View <i class="fa fa-arrow-circle-right"></i>
                    </a>
                  </div>
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix visible-sm-block"></div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="small-box bg-red">
                    <div class="inner">
                      <h3>{{ Auth::user()->program->email->count() }}</h3>

                      <h4>Emails</h4>
                    </div>
                    <div class="icon">
                      <i class="far fa-envelope"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                      View <i class="fa fa-arrow-circle-right"></i>
                    </a>
                  </div>
                </div>
              </div>
              <!-- /.row -->

          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Alumni Events</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Event</th>
                    <th>Date</th>
                    <th>Attending</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  @if($event->count() === 0)
                    <tr>
                      <td>You have not yet scheduled any events</td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  @else 
                      
                      @foreach ($event as $events)
                          <tr>
                            <td><a href="#">{{ $events->title }}</a></td>
                            <td>{{ \Carbon\Carbon::parse($events->datetime)->toDayDateTimeString() }}</td>
                            <td>
                              <div class="sparkbar" data-color="#00a65a" data-height="20">{{ $rsvpEvent->where('events_id', '=', $events->id)->count() }}</div>
                            </td>
                            @if($events->datetime <= now())
                                <td><span class="label label-success">Passed</span></td>
                            @else
                                <td><span class="label label-warning">Upcoming</span></td>
                            @endif
                          </tr>
                      @endforeach
                    @endif
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="/coach/event/view" class="btn btn-sm btn-info btn-flat pull-left">Create New Event</a>
              <a href="/coach/event/view" class="btn btn-sm btn-default btn-flat pull-right">View All Events</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Active Coaches at <br />{{ Auth::user()->school->name }}</span>
              <span class="info-box-number">{{ Auth::user()->school->coach->count() }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-industry"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Industries</span>
              <span class="info-box-number">{{ $industries }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->

          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-building"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Companies</span>
              <span class="info-box-number">{{ $companies }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->

          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion-earth"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">States</span>
              <span class="info-box-number">{{ $states }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection
