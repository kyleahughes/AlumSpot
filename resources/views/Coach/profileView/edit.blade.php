@extends('Coach.layouts.master')

@section('content')

        <section class="content-header">
          <h1>
            {{ Auth::user()->first_name }}'s Profile
          </h1>
        </section>

        <!--if the store() method returned that the team is already registered-->
        @if($flash = session('welcome'))
            <!-- Modal -->
            <div class='content'>
                <div class="alert alert-success" role='alert'>
                    <h2 class='alert-heading text-center'>{{ $flash }}</h2>
                    <hr>
                    <p class='text-center'>
                        Please complete filling in your profile so alumni
                        can begin to find their program
                    </p>
                </div>
            </div>
        @endif
    
        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="/coach/{{ Auth::user()->avatar }}" alt="User profile picture">

                  <h3 class="profile-username text-center">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>

                  <p class="text-muted text-center">Head Coach</p>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item box-body">
                        <b>Email</b><div class="pull-right text-muted">{{ Auth::user()->email }}</div>
                    </li>
                    <li class="list-group-item">
                      <b>Phone</b> <div class="pull-right text-muted">{{ Auth::user()->phone }}</div>
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
                  <strong><i class="fas fa-book margin-r-5"></i> Education</strong>

                  <p class="text-muted">
                    {{ Auth::user()->education }}
                  </p>

                  <hr>

                  <strong><i class="fas fa-map-marker margin-r-5"></i> Location</strong>

                  <p class="text-muted">{{ Auth::user()->city }}, {{ Auth::user()->state }}</p>

                  <hr>

                  <strong><i class="far fa-address-card margin-r-5"></i>Head Coach Since</strong>

                  <p class="text-muted">
                      {{ Auth::user()->startYear }}
                  </p>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a>Edit Your Profile</a></li>
                </ul>
                <div class="tab-content">

                  <div id="settings">
                    <form class="form-horizontal" enctype='multipart/form-data' action='/coach/profile' method='POST'>
                        {{ csrf_field() }}
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Update Profile Photo</label>
                        <input type='file' name='avatar'>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                          <div class="row">
                              <div class="col-md-6">
                                  <input type="text" name="first_name" class="form-control" id="inputName" placeholder="First">
                              </div>
                              <div class="col-md-6">
                                  <input type="text" name="last_name" class="form-control" id="inputName" placeholder="Last">
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-10">
                          <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Phone Number</label>

                        <div class="col-sm-10">
                          <input type="text" name="phone" class="form-control" id="inputEmail" maxlength="10" placeholder="0000000000">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Education</label>

                        <div class="col-sm-10">
                          <textarea class="form-control" name="education" id="inputExperience" placeholder="Describe your previous education"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Head Coach Since</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="startYear" id="inputExperience" placeholder="Year started as head coach">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Residing In:</label>
                        <div class="col-sm-10">
                          <div class="row">
                              <div class="col-md-6">
                                  <input type="text" name="city" class="form-control" id="inputName" placeholder="City">
                              </div>
                              <div class="col-md-6">
                                  <input type="text" name="state" class="form-control" id="inputName" placeholder="State">
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div>
              <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.nav-tabs-custom -->

        </section>
        <!-- /.content -->

    @endsection