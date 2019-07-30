@extends('Coach.layouts.master')

@section('content')
    <section class="content-header">
      <h1>
        Email Center
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          @if($alumni->count() === 0)
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i>No email list</h4>
                It appears there is nobody on your email list. Please create that list via the button below or encourage your alumni
                to sign up to this site via email address.
            </div>
          @else
              <a data-toggle="modal" data-target="#modal-default-event" class="btn btn-primary btn-block margin-bottom">Compose Email</a>
          @endif
          <a href="/coach/email/editlist" class="btn btn-primary btn-block margin-bottom">Edit Email List</a>
  
        <!-- MODAL -->
        <div class="modal fade" id="modal-default-event">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="box box-info">
                    <form action="/coach/email" method="POST">
                        <div class="modal-header">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <h3 class="modal-title">Create Email</h3>
                                    </div>
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject of Email">
                                </div>

                            </div>
                        </div>
                    
                        <div class="modal-body">

                            <div class="box-body">

                                {{ csrf_field() }}

                                <div class="form-group">
                                  <textarea class="textarea" placeholder="Body" name="body" id="body"
                                            style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>

                                @include('errors')
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="pull-right btn btn-lg btn-primary">Send</button>
                        </div>
                    </form>
                  </div>
                  <!-- /.box -->
                  
                
                      
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
          
          
          <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><b>Attention</b></h3>
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li class="active content">
                    All emails sent from ©AlumSpot will be sent from the email
                    you used to register for the site. Therefore you will not receive
                    replies through AlumSpot, only through your registered email account provider.
                    If you would like to change this email, please edit your profile in the 'My Profile' tab.
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Sent</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Search Mail">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button>
                <div class="pull-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                  @foreach ($emails as $email)
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-name"><a data-toggle="modal" data-target="#modal-default-{{ $email->id }}">{{ $email->subject }}</a></td>
                    <td class="mailbox-subject">{{ $email->body }}</td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date">{{ $email->created_at->diffForHumans() }}</td>
                  </tr>
                  
                  <!-- MODAL -->
                    <div class="modal fade" id="modal-default-{{ $email->id }}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header" style="color:#C0C0C0; background-color: #E8E8E8;">
                              <h3 class="modal-title text-center">{{ Auth::user()->school->name }}</h3>
                          </div>
                          <div class="modal-body">
                              <div class="margin-bottom" style="padding-left: 45px;">
                                  <h4><b>{{ Auth::user()->program->type }} {{ Auth::user()->program->sport }} Alumni,</b></h4>
                                  <br />
                                  <p style="color:gray;">
                                      {{ $email->body }}
                                  </p>
                                  <br />
                                  <p style="color:gray">
                                      Thanks,<br />
                                      {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                  </p>
                              </div>
                          </div>   
                          <div class="modal-footer" style="color:#B0B0B0; background-color: #E8E8E8;">
                              <p class="text-center">
                                  © 2018 AlumSpot. All rights reserved.
                              </p>
                          </div>
                          
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                  @endforeach
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                
                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button>
                <div class="pull-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  @endsection