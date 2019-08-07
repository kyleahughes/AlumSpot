@extends('Alumni.layouts.master')

@section('content')

    <section class="content-header">
          <h1>
            Coach {{ $coach->last_name }}'s Profile
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="/coach/{{ $coach->avatar }}" alt="User profile picture">

                  <h3 class="profile-username text-center">{{ $coach->first_name }} {{ $coach->last_name }}</h3>

                  <p class="text-muted text-center">Head Coach</p>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Email</b> <div class="pull-right text-muted">{{ $coach->email }}</div>
                    </li>
                    <li class="list-group-item">
                      <b>Phone</b> <div class="pull-right text-muted">{{ $coach->phone }}</div>
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
                  <strong><i class="fas fa-map-marker margin-r-5"></i>Education</strong>

                  <p class="text-muted">
                    {{ $coach->education }}
                  </p>

                  <hr>

                  <strong><i class="fas fa-map-marker margin-r-5"></i>Residence</strong>

                  <p class="text-muted">{{ $coach->city }}, {{ $coach->state }}</p>

                  <hr>

                  <strong><i class="far fa-address-card margin-r-5"></i>Head Coach Since</strong>

                  <p class="text-muted">{{ $coach->startYear }}</p>
                  
                  <hr>
                  
                  <strong><i class="fas fa-map-marker margin-r-5"></i>Team</strong>

                  <p class="text-muted">{{ $coach->school->name }} {{ $coach->program->type }} {{ $coach->program->sport }}</p>

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
                  <li class="active"><a>Coach Activity</a></li>
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
