@extends('Alumni.layouts.master')

@section('content')

<div class='content'>
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3>Events</h3>

              <div class="box-tools">
                <div class="input-group" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Title</th>
                  <th>Date</th>
                  <th>Attending</th>
                  <th>Description</th>
                  <th>Created By</th>
                </tr>
                @foreach ($event as $events)
                    <tr>
                      <td><a data-toggle="modal" data-target="#modal-default-{{ $events->id }}">{{ $events->title }}</a></td>
                      <td>{{ $events->date->toFormattedDateString() }}</td>
                      <td>number attending</td>
                      <td>{{ $events->body }}</td>
                      <td><a href="/coach/alumSearch/coach/{{ $events->coach->id }}"><img src="/coach/{{ $events->coach->avatar }}" class="img-circle" height="40">{{ $events->coach->first_name }} {{ $events->coach->last_name }}</a></td>
                    </tr>
                    
                    <!-- MODAL -->
                    <div class="modal fade" id="modal-default-{{ $events->id }}">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                              <div class="pull-left">
                                <h4 class="modal-title"><b>Created By:</b>&nbsp;&nbsp;&nbsp;<a href="/coach/alumSearch/{{ $events->coach->id }}"><img src="/coach/{{ $events->coach->avatar }}" class="img-circle" height="40">{{ $events->coach->first_name }} {{ $events->coach->last_name }}</a></h4>
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
                                             <a href="/alumni/alumSearch/{{ $comments->alumni->id }}">{{ $comments->alumni->first_name }} {{ $comments->alumni->last_name }} </a>
                                         </strong>
                                         @else
                                         <strong>
                                             <a href="/alumni/alumSearch/coach/{{ $comments->coach->id }}">{{ $comments->coach->first_name }} {{ $comments->coach->last_name }} </a>
                                         </strong>
                                         @endif
                                         <span class="text-muted">
                                           {{ $comments->created_at->diffForHumans() }}:&nbsp;  
                                         </span>
                                         {{ $comments->body }}
                                     </li>
                                  @endforeach
                                  </ul>
                              </div>
                          
                              <div class="card">
                                  <div class="card-block">
                                      <form method="POST" action="/alumni/{{ $events->id }}/comment/event">
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
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
</div>

@endsection

