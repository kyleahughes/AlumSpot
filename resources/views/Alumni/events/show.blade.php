@extends('Alumni.layouts.master')

@section('content')    

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          <form method="POST" action="/alumni/event/rsvp/{{ $event->id }}">
             {{ csrf_field() }}
             <button type="submit" class="btn btn-primary">RSVP to Event</button>
          </form>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/alumni/event"><i class="far fa-arrow-alt-circle-left"></i> Events</a></li>
        <li class="active">View</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-8">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">{{ \Carbon\Carbon::parse($event->datetime)->format('F jS, Y \a\t g:i a') }}</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-10">
                  <h1><b>{{ $event->title }}</b></h1><br>
                  {{ $event->body }}
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              <div class="row">
                  <div class="col-md-12">
                      <!-- COMMENTS -->
                          <h3 class="box-title"><i class="far fa-comments"></i>&emsp;Comments</h3>
                          <div class="comment">
                              <ul class="list-group">
                              @foreach($event->comment as $comments)
                                 <li class="list-group-item">
                                    @if($comments->users_id === null)
                                     <strong>
                                         <a href="/alumni/alumSearch/{{ $comments->alumni->id }}">{{ $comments->alumni->first_name }} {{ $comments->alumni->last_name }} </a>
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
                                    @if($comments->users_id === Auth::user()->id
                                     <span class='pull-right'>
                                        <a onclick="return confirm('Are you sure you want to delete this comment?')" href="/alumni/delete/comment/{{ $comments->id }}" style="color: red;">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                     </span>
                                    @endif
                                 </li>
                              @endforeach
                              </ul>
                          </div>

                          <div class="card">
                              <div class="card-block">
                                  <form method="POST" action="/alumni/{{ $event->id }}/comment/event">
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
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        
        <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
              
              <span class="info-box-number">LOCATION</span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
                    {{ $event->location }}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">DATE</span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
                  {{ \Carbon\Carbon::parse($event->datetime)->format('m/d/Y') }},
                  {{ \Carbon\Carbon::parse($event->datetime)->format('g:i A') }}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">ATTENDING</span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
                    {{ $rsvpEvent->count() }}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- row -->
        
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <!-- MAP & BOX PANE -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Attendees</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="row">
                <div class="col-md-12">
                  <!-- USERS LIST -->
                  <ul class="users-list clearfix">
                    @if( $rsvpEvent->count() === 0)
                    <p>&emsp;<b>No alumni have registered for this event yet</b></p>
                    @else
                    @foreach( $rsvpEvent as $rsvp)
                    <li>
                      <img class="img-circle" src="/alumni/{{ $rsvp->alumni->avatar }}" alt="User Image">
                      <a class="users-list-name" href="#">{{ $rsvp->alumni->first_name }} {{ $rsvp->alumni->last_name }}</a>
                    </li>
                    @endforeach
                    @endif
                  </ul>
                  <!-- /.users-list -->
                  <div class="text-center">
                    <a href="javascript:void(0)" class="uppercase">View All Users</a>
                  </div>
                <!-- /.box-footer -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    
@endsection