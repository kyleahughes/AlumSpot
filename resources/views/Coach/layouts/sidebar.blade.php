  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/coach/{{ Auth::user()->avatar }}" class="img-circle" alt="Usr Img">
        </div>
        <div class="pull-left info">
          <p>Coach  {{ Auth::user()->last_name }} </p>
        </div> 
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"></li>
        <li>
          <a href="{{ route('coach.home') }}">
            <i class="fas fa-home"></i>&emsp;<span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="{{ route('coach.feed') }}">
            <i class="far fa-newspaper"></i>&emsp;<span>Activity</span>
            <span class="pull-right-container">
              
            </span>
          </a>
        </li>
        <li>
          <a href="{{ route('coach.emailCenter') }}">
            <i class="far fa-envelope"></i>&emsp;<span>Email Center</span>
            <span class="pull-right-container">
              
            </span>
          </a>
        </li>
        <li>
          <a href="{{ route('coach.alumSearch') }}">
            <i class="fas fa-search"></i>&emsp;<span>Manage Alumni</span>
            <span class="pull-right-container">
              
            </span>
          </a>
        </li>
        
        <li class="treeview">

        <li>
          <a href="{{ route('coach.events') }}">
            <i class="far fa-calendar-check"></i>&emsp;<span>Events</span>
            <span class="pull-right-container">
              
            </span>
          </a>
        </li>
            
        <li>
          <a href="{{ route('coach.profile') }}">
            <i class="fas fa-cog"></i>&emsp;<span>My Profile</span>
            <span class="pull-right-container">
              
            </span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>