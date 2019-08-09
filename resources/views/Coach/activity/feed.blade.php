@extends('Coach.layouts.master')


@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Team Activity
        <small>{{ Auth::user()->school->name }} {{ Auth::user()->program->type }} {{ Auth::user()->program->sport }}</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        
      <!-- row -->
      <div class="row">
          
          
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            @if($activity->count() === 0)
                <li>
                  <div class="timeline-item">
                    <div class="timeline-body">
                      Your program has no recent activity
                    </div>
                  </div>
                </li>
            @else 
                <!--foreach loop to loop through activities-->
                @foreach($activity as $activitys)
                    <!--if statement to loop through each type of activity by id number-->
                    @if($activitys->emails_id!==null)
                    <!-- timeline time label -->
                    <li class="time-label">
                          <span class="bg-red">
                          {{ $activitys->created_at->format('M d, Y h:i A') }}
                          </span>
                    </li>
                    <!-- /.timeline-label -->

                    <li class="time-label">
                        <span class="bg-red">
                        <i class="far fa-envelope" style='font-size: 25px;'></i>
                        </span>
                    </li>

                    <!-- timeline item -->
                    <li>
                      <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i>&nbsp;{{ $activitys->created_at->diffForHumans() }}</span>
                        <h3 class="timeline-header"><a href="#">{{ $activitys->coach->first_name }} {{ $activitys->coach->last_name }}</a> sent an email</h3>

                        <div class="timeline-body">
                          {{ $activitys->email->body }}
                        </div>
                        <div class="timeline-footer">
                          <a class="btn btn-primary btn-xs">Read more</a>
                        </div>
                      </div>
                    </li>
                    <!-- END timeline item -->


                    @elseif($activitys->events_id!==null)
                    <!-- timeline time label -->
                    <li class="time-label">
                          <span class="bg-blue">

                            {{ $activitys->created_at->format('M d, Y h:i A') }}
                          </span>
                    </li>
                    <!-- /.timeline-label -->

                    <li class="time-label">
                        <span class="bg-blue">
                            <i class="far fa-calendar-alt" style='font-size: 25px;'></i>
                        </span>
                    </li>

                    <!-- timeline item -->
                    <li>
                      <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i>&nbsp;{{ $activitys->created_at->diffForHumans() }}</span>

                        <h3 class="timeline-header"><a href="#">{{ $activitys->coach->first_name }} {{ $activitys->coach->last_name }}</a> created an event</h3>

                        <div class="timeline-body">
                          {{ $activitys->event->body }}
                        </div>
                        <div class="timeline-footer">
                          <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-events-{{ $activitys->event->id }}">Read More</a>
                          <a class="btn btn-danger btn-xs">Delete</a>
                        </div>
                      </div>
                    </li>
                    <!-- END timeline item -->

                    @else
                    <!-- timeline time label -->
                    <li class="time-label">
                          <span class="bg-green">
                            {{ $activitys->created_at->format('M d, Y h:i A') }}
                          </span>
                    </li>
                    <!-- /.timeline-label -->

                    <li class="time-label">
                        <span class="bg-green">
                            <i class="fas fa-trophy" style='font-size: 25px;'></i>
                        </span>
                    </li>

                    <!-- timeline item -->
                    <li>
                      <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i>&nbsp;{{ $activitys->created_at->diffForHumans() }}</span>

                        <h3 class="timeline-header"><a href="#">{{ $activitys->alumni->first_name }} {{ $activitys->alumni->last_name }}</a> created a challenge</h3>

                        <div class="timeline-body">
                          {{ $activitys->fundraiser->description }}
                        </div>
                        <div class="timeline-footer">
                          <a class="btn btn-primary btn-xs">Read more</a>
                          <a class="btn btn-danger btn-xs">Delete</a>
                        </div>
                      </div>
                    </li>
                    <!-- END timeline item -->
                    @endif
                @endforeach
            @endif
          </ul>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->

@endsection
