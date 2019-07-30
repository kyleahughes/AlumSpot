@extends('Coach.layouts.master')

@section('content')

    <section class="content-header">
          <h1>
            {{ $alumni->first_name }}'s Profile
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="/alumni/{{ $alumni->avatar }}" alt="User profile picture">

                  <h3 class="profile-username text-center">{{ $alumni->first_name }} {{ $alumni->last_name }}</h3>

                  <p class="text-muted text-center">{{ $alumni->bio }}</p>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Class of</b> <div class="pull-right text-muted">{{ $alumni->gradYear }}</div>
                    </li>
                    <li class="list-group-item">
                      <b>Phone</b> <div class="pull-right text-muted">{{ $alumni->phone }}</div>
                    </li>
                    
                  </ul>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->

              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">About Me</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fas fa-map-marker margin-r-5"></i>Location</strong>

                  <p class="text-muted">
                    {{ $alumni->city }}, {{ $alumni->state }}
                  </p>

                  <hr>

                  <strong><i class="fas fa-map-marker margin-r-5"></i>Industry</strong>

                  <p class="text-muted">{{ $alumni->industry }}</p>

                  <hr>

                  <strong><i class="far fa-address-card margin-r-5"></i>Company</strong>

                  <p class="text-muted">{{ $alumni->company }}</p>
                  
                  <hr>
                  
                  <strong><i class="fas fa-map-marker margin-r-5"></i>Title</strong>

                  <p class="text-muted">{{ $alumni->title }}</p>

                  <hr>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a>Alumni Activity</a></li>
                </ul>
                <div class="tab-content">

                  <div id="settings">

                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div>
              <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

        </section>
        <!-- /.content -->

    @endsection