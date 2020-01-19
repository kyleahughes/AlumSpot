  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>S</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Alum</b>Spot</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
    
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="far fa-envelope"></i>
              <span class="label label-success">{{ Auth::guard('alumni')->user()->unreadNotifications->count() }}</span>
            </a>
            <ul class="dropdown-menu"> 
              <li class="header">You have {{ Auth::guard('alumni')->user()->unreadNotifications->count() }} messages</li>
              <li>
                  @foreach(Auth::guard('alumni')->user()->unreadNotifications as $notification)
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                          <a href="/alumni/event/view">
                              {{ $notification->data['events_title'] }}
                          </a>   
                      </li>
                    </ul>
                  @endforeach
                    
                
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>  
            
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/alumni/{{ Auth::guard('alumni')->user()->avatar }}" class="user-image" alt="">
              <span class="hidden-xs">{{ Auth::guard('alumni')->user()->first_name }} {{ Auth::guard('alumni')->user()->last_name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="/alumni/{{ Auth::guard('alumni')->user()->avatar }}" class="img-circle" alt="User Image">
                <p>
                  {{ Auth::guard('alumni')->user()->first_name }} {{ Auth::guard('alumni')->user()->last_name }}
                  <small>Member since Nov. 2012</small>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                   <!-- https://laracasts.com/discuss/channels/laravel/laravel-53-logout-methodnotallowed?page=1 -->
                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>
  </header>
