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

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/coach/{{ Auth::user()->avatar }}" class="user-image" alt="">
              <span class="hidden-xs">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="/coach/{{ Auth::user()->avatar }}" class="img-circle" alt="User Image">
                <p>
                  {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                  <small>Member since {{ Auth::user()->created_at->toFormattedDateString() }}</small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="/coach/profile" class="btn btn-default btn-flat">Profile</a>
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
