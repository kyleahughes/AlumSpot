@extends('Coach.layouts.master')

@section('content')
<section class='content'>
    <div class="row layout-boxed">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header"> 
                <div class="form-group" align="center"><h2>Registered Alumni</h2></div>
                <hr>

            <div class='col-md-3'>
              <div class="form-group">
                <div class="btn-group">
                  <button type="button" class="btn btn-default">Search By Industry</button>
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    @if($alumni->count() === 0)
                        <li>No Alumni</li>
                    @elseif($industry->count() === 0)
                        <li>No Industries</li>
                    @else
                        @foreach($industry as $industrys)
                          <li><a href="/coach/alumSearch/industry/{{ $industrys }}">{{ $industrys }}</a></li>
                        @endforeach
                    @endif
                  </ul>
                </div>
              </div>
              <!-- /.form-group -->
            </div>
            
            <div class='col-md-3'>
              <div class="form-group">
                <div class="btn-group">
                  <button type="button" class="btn btn-default">Search By Grad Year</button>
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    @if($alumni->count() === 0)
                        <li>No Alumni</li>
                    @elseif($gradYear->count() === 0)
                        <li>No Grad Years</li>
                    @else
                        @foreach($gradYear as $gradYears)
                          <li><a href="/coach/alumSearch/gradYear/{{ $gradYears }}">{{ $gradYears }}</a></li>
                        @endforeach
                    @endif
                  </ul>
                </div>
              </div>
              <!-- /.form-group -->
            </div>
            <div class='col-md-3'>
              <div class="form-group">
                <div class="btn-group">
                  <button type="button" class="btn btn-default">Search By Company</button>
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    @if($alumni->count() === 0)
                        <li>No Alumni</li>
                    @elseif($company->count() === 0)
                        <li>No Companies</li>
                    @else
                        @foreach($company as $companys)
                          <li><a href="/coach/alumSearch/company/{{ $companys }}">{{ $companys }}</a></li>
                        @endforeach
                    @endif
                  </ul>
                </div>
              </div>
              <!-- /.form-group -->
            </div>
            
            <div class='col-md-3'>
                <div class="form-group">
                    <a href="/coach/alumSearch" class="btn btn-default btn-block">Show All</a>
                </div> 
                <!-- /. mult select -->
            </div>
            </div>
             <!--/.box-header-->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
            @if($alumni->count() === 0)
                <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header bg-aqua-active">
                        <h3 class="widget-user-username">No Alumni Registered yet.</h3>
                      </div>
                      
                      <div class="box-footer">
                      <div class="row">
                        <div class="border-right">
                          <div class="description-block">
                              <h5 class="description-header">Email this link to your alumni and tell them to register!<br><a>alumspot.com/register</a></h5>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                </div>
            @else 
            @foreach ($alumni as $alumnis)
              <div class="col-md-4">
                <!-- Widget: user widget style 1 -->
                <div class="box box-widget widget-user">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header bg-aqua-active">
                    <h3 class="widget-user-username">{{ $alumnis->first_name }} {{ $alumnis->last_name }}</h3>
                    <h5 class="widget-user-desc">Class of {{ $alumnis->gradYear }}</h5>
                  </div>
                  <div class="widget-user-image">
                    <img class="img-circle" src="/alumni/{{ $alumnis->avatar }}" alt="User Avatar">
                  </div>
                  <div class="box-footer">
                    <div class="row">
                      <div class="col-sm-4 border-right">
                        <div class="description-block">
                          <h5 class="description-header">Industry</h5>
                          <span class="description-text">{{ $alumnis->industry }}</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 border-right">
                        <div class="description-block">
                          <h5 class="description-header">Company</h5>
                          <span class="description-text">{{ $alumnis->company }}</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4">
                        <div class="description-block">
                          <h5 class="description-header">State</h5>
                          <span class="description-text">{{ $alumnis->state }}</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </div>
                </div>
                <!-- /.widget-user -->
              </div>
              <!-- /.col -->
            @endforeach
            @endif
        </div>
    </div>
</section>
@endsection