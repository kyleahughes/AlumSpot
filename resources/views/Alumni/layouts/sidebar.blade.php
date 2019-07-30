  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/alumni/{{ Auth::guard('alumni')->user()->avatar }}" class="img-circle" alt="">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::guard('alumni')->user()->first_name }} {{ Auth::guard('alumni')->user()->last_name }}</p>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"></li>
        <li>
          <a href="/alumni/home">
            <i class="far fa-newspaper"></i>&emsp;<span>Feed</span>
            <span class="pull-right-container">
              
            </span>
          </a>
        </li>
        <li>
          <a href="/alumni/alumSearch">
            <i class="fas fa-search"></i>&emsp;<span>Find Alumni</span>
            <span class="pull-right-container">
              
            </span>
          </a>
        </li>
        <li>
          <a href="/alumni/event/view">
            <i class="far fa-calendar-alt"></i>&emsp;<span>Events</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="/alumni/profile">
            <i class="fas fa-cog"></i>&emsp;<span>My Profile</span>
            <span class="pull-right-container">
              
            </span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>