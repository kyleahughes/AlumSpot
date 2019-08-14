@extends('LandPage.layouts.master')

@section('content')
<div class='container' style='margin-bottom: 90px;'>
    
    <!--if the store() method returned that the team is already registered-->
    @if($flash = session('message'))
        <!-- Modal -->
        <div class="alert alert-danger m-4" role='alert'>
            <h2 class='alert-heading text-center'>Registration Failed</h2>
            <hr>
            <p class='text-center'>
                It appears <b>{{ $flash }}</b> already has their
                own AlumSpot page.<br>
                If you are the head coach of this team and this was not you,<br>
                <a class='alert-link' href="#">Click here</a> for more information
            </p>
        </div>
    @endif
    
    <!--if the store() method returned that the team is already registered-->
    @if($flash = session('message2'))
        <!-- Modal -->
        <div class="alert alert-danger m-4" role='alert'>
            <h2 class='alert-heading text-center'>Registration Failed</h2>
            <hr>
            <p class='text-center'>
                Although your school is registered for AlumSpot, 
                it appears the coach for your program has not yet
                set up their alumni page. Please contact the head coach of your program
                and encourage them to register for AlumSpot.<br>
                <a class='alert-link' href="#">Click here</a> for more information
            </p>
        </div>
    @endif
    
    <!-- Page Heading -->
    <h1 class="mt-4 mb-3 text-center">Select Registration User Type</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <!-- Tab Panes -->
                <div class='row text-center container'>
                    <div class='tablink card-body text-center' style='background-color: #cccccc;' onclick="openLog(event, 'Coach')"><h3>Coach</h3></div>
                    <div class='tablink card-body text-center' style='background: none;' onclick="openLog(event, 'Alumni')"><h3>Alumni</h3></div>
                </div>
                
                <!-- Register Form -->
                <div class='tab' id='Coach' style='background-color: #cccccc; display: none;'>
                    <div class='card-body'>
                        <form action="/coach/register" method="POST">
                          @csrf
                          
                          <div class='form-group has-feedback'>
                              <div class='row'>
                                <div class='col-md-4'>
                                    <select class="form-control" name='school'>
                                      <option disabled selected>School</option>
                                        <?php
                                          foreach($school as $names) {
                                            $schoolname = $names['Name'];
                                            echo "<option " . "value='" . $schoolname . "'>" . $schoolname . "</option>";
                                          }
                                        ?>
                                    </select>
                                    <a href='#' class='text-sm'>Don't see your school?</a>
                                </div>
                                <div class='col-md-4'>
                                    <select class="form-control" name='type'>
                                      <option disabled selected>Type</option>
                                      <option value='Mens'>Men's</option>
                                      <option value='Womens'>Women's</option>
                                      <option value='Integrated'>Integrated</option>
                                    </select>
                                </div>
                                <div class='col-md-4'>
                                    <select class="form-control" name='sport'>
                                      <option disabled selected>Sport</option>
                                      <?php
                                          foreach($sport as $names) {
                                            $sportname = $names['Name'];
                                            echo "<option " . "value='" . $sportname . "'>" . $sportname . "</option>";
                                          }
                                      ?>
                                    </select>
                                </div>
                              </div> 
                          </div> 

                            <hr>  

                          <div class='row'>
                              <div class="col-md-6">
                                  <div class="form-group has-feedback">
                                    <input type="text" class="form-control" name="first_name" placeholder="First Name">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group has-feedback">
                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                                  </div>
                              </div>
                          </div>
                          <div class="form-group has-feedback">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                          </div>
                          <div class="form-group has-feedback">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                          </div>
                          <div class="form-group has-feedback">
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Retype password">
                          </div>
                          <div class="row">
                            <div class="col-md-4">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" required> I agree to the <a href="#">terms</a>
                                </label>
                              </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-3 ml-auto">
                              <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                            </div>
                            <!-- /.col -->
                          </div>

                          @include('errors')
                        </form>
                        <a href="#" class="text-center">I already have a membership</a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /. Coach ID form -->
                
                
                <!-- Alumni Register Form -->
                <div class='tab' id='Alumni' style='display:none'>
                    <div class='card-body'>
                        <form action="/alumni/register" method="POST">
                          {{ csrf_field() }}  

                          <div class='form-group has-feedback'>
                              <div class='row'>
                                <div class='col-md-4'>
                                    <select class="form-control" name='schools_id' id='first-dropdown'>
                                        <option disabled selected>School</option>
                                     
                                        @foreach($alumSchool as $school)
                                            <option value='{{ $school->id }}'>{{ $school->name }}</option>
                                        @endforeach
                                    </select>
                                    <a href='#' class='text-sm'>Don't see your school?</a>
                                </div>
                                <div class='col-md-4'>
                                    <select class="form-control" name='type'>
                                      <option disabled selected>Type</option>
                                      <option value='Mens'>Men's</option>
                                      <option value='Womens'>Women's</option>
                                      <option value='Integrated'>Integrated</option>
                                    </select>
                                </div>
                                <div class='col-md-4'>
                                    <select class="form-control" name='sport'>
                                      <option disabled selected>Sport</option>
                                      <?php
                                          foreach($sport as $names) {
                                            $sportname = $names['Name'];
                                            echo "<option " . "value='" . $sportname . "'>" . $sportname . "</option>";
                                          }
                                      ?>
                                    </select>
                                </div>
                              </div> 
                          </div> 
                            <hr>  

                          <div class='row'>
                              <div class="col-md-6">
                                  <div class="form-group has-feedback">
                                    <input type="text" class="form-control" name="first_name" placeholder="First Name">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group has-feedback">
                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                                  </div>
                              </div>
                          </div>
                          <div class="form-group has-feedback">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                          </div>
                          <div class="form-group has-feedback">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                          </div>
                          <div class="form-group has-feedback">
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Retype password">
                          </div>
                          <div class="row">
                            <div class="col-md-4">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" required> I agree to the <a href="#">terms</a>
                                </label>
                              </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-3 ml-auto">
                              <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                            </div>
                            <!-- /.col -->
                          </div>

                          @include('errors')
                        </form>
                        <a href="#" class="text-center">I already have a membership</a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /. Alumni ID form -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.register-box -->
    </div>
</div>

@endsection
