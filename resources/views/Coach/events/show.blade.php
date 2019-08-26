@extends('Coach.layouts.master')

@section('content')
    <section class="content">
    <div class="row layout-boxed">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header"> 
              <div class="form-group" align="center">
                <h1>
                  {{ $event->title }}
                </h1>
                  <div class="pull-right">
                    <b>{{ $event->created_at->format('M d, Y h:i A') }}</b>
                  </div>
                </div>
              <hr>
          </div>
      <div class="modal-body">
          <p><b>Description:</b></p>
        <p>{{ $event->body }}</p>
      </div>
      <hr>
      <!-- COMMENTS -->
      <div class="content">
          <h3><i class="far fa-comments"></i>&emsp;<span>Comments</span></h3>
          <div class="comment">
              <ul class="list-group">
              @foreach($event->comment as $comments)
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
                  <form method="POST" action="/coach/{{ $event->id }}/comment/event">
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
        </div>
</div>
    </section>

@endsection