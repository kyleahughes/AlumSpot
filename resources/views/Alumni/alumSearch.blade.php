@extends('Alumni.layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        
        
        <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Search By:</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-3 col-xs-6">
                    <div class="description-block border-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Industry
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                              @foreach($industry as $industrys)
                                <li><a href="/alumni/alumSearch/industry/{{ $industrys }}">{{ $industrys }}</a></li>
                              @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Grad Year
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                              @foreach($gradYear as $gradYears)
                                <li><a href="/alumni/alumSearch/gradYear/{{ $gradYears }}">{{ $gradYears }}</a></li>
                              @endforeach
                            </ul>
                        </div>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">

                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Company
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                          @foreach($company as $companys)
                            <li><a href="/alumni/alumSearch/company/{{ $companys }}">{{ $companys }}</a></li>
                          @endforeach
                        </ul>
                    </div>

                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block">
                    <div class="form-group">
                        <a href="/alumni/alumSearch" class="btn btn-default btn-block">Show All</a>
                    </div> 
                    <!-- /. mult select -->
                  </div>
                  <!-- /.description-block -->
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
        
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">

          <!-- USERS LIST -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Alumni Members</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <ul class="users-list clearfix">
                @foreach ($alumni as $alumnis)
                    <li>
                      <img src="/alumni/{{ $alumnis->avatar }}" alt="User Image">
                      <a class="users-list-name" href="#">{{ $alumnis->first_name }} {{ $alumnis->last_name }}</a>
                      <span class="users-list-date">Class of {{ $alumnis->gradYear }}</span>
                    </li>
                @endforeach
              </ul>
              <!-- /.users-list -->
            </div>
            <!-- /.box-body -->
          </div>
          <!--/.box -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->


@endsection