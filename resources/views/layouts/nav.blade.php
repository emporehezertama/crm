<div class="navbar-container content">
    <div class="collapse navbar-collapse" id="navbar-mobile">
    @if(Auth::check())
     @if(Auth::user()->user_access_id == 1)
      <ul class="nav navbar-nav mr-auto float-left">
        <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
        <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
        <li class="dropdown nav-item mega-dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Sales</a>
          <ul class="mega-dropdown-menu dropdown-menu row">
            <li class="col-md-3">
              <h6 class="dropdown-menu-header text-uppercase"><i class="la la-random"></i> Menu</h6>
              <ul class="drilldown-menu">
                <li class="menu-list">
                  <ul>
                    <li><a class="dropdown-item" href="{{ route('client.index') }}"><i class="ft-user"></i> Client / Customer</a></li>
                    <!-- <li><a class="dropdown-item" href="{{ route('project.index') }}"><i class="ft-user"></i> Project</a></li> -->
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="dropdown nav-item mega-dropdown">
          <a href="{{ route('admin.product.index') }}" class="nav-link">Product</a>
        </li>
        <li class="dropdown nav-item mega-dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Users</a>
           <ul class="mega-dropdown-menu dropdown-menu row">
            <li class="col-md-3">
              <h6 class="dropdown-menu-header text-uppercase"><i class="la la-random"></i> List</h6>
              <ul class="drilldown-menu">
                <li class="menu-list">
                  <ul>
                    <li><a class="dropdown-item" href="{{ route('admin.users.index') }}"><i class="ft-user"></i> User</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.user-access.index') }}"><i class="ft-users"></i> User Access</a></li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="dropdown nav-item mega-dropdown"><a class="nav-link" href="{{ route('pipeline.index') }}">Pipeline</a>
        <li class="dropdown nav-item mega-dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Setting</a>
           <ul class="mega-dropdown-menu dropdown-menu row">
            <li class="col-md-3">
              <h6 class="dropdown-menu-header text-uppercase"><i class="la la-random"></i> Setting</h6>
              <ul class="drilldown-menu">
                <li class="menu-list">
                  <ul>
                    <li><a class="dropdown-item" href="{{ route('admin.setting.index') }}"><i class="ft-user"></i> General</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.setting.index') }}"><i class="ft-users"></i> SMTP Server</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.setting.index') }}"><i class="ft-users"></i> Contact</a></li>
                  </ul>
                </li>
                </ul>
            </li>
          </ul>
        </li>
      </ul>
      @endif
      @if(Auth::user()->user_access_id == 4)
      <ul class="nav navbar-nav mr-auto float-left">
        <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
        <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
        <li class="dropdown nav-item mega-dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Sales</a>
          <ul class="mega-dropdown-menu dropdown-menu row">
            <li class="col-md-3">
              <h6 class="dropdown-menu-header text-uppercase"><i class="la la-random"></i> Menu</h6>
              <ul class="drilldown-menu">
                <li class="menu-list">
                  <ul>
                    <li><a class="dropdown-item" href="{{ route('client.index') }}"><i class="ft-user"></i> Client / Customer</a></li>
                    <!-- <li><a class="dropdown-item" href="{{ route('project.index') }}"><i class="ft-user"></i> Project</a></li> -->
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="dropdown nav-item "><a class="nav-link" href="{{ route('pipeline.index') }}">Pipeline</a>
      </ul>
      @endif
      @endif
      <ul class="nav navbar-nav float-right">
        <li class="dropdown dropdown-user nav-item">
          <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
            <span class="mr-1">Hello,
              <span class="user-name text-bold-700">{{ Auth::user()->name }}</span>
            </span>
            <span class="avatar avatar-online">
              @if(!empty(\Auth::user()->foto))
              <img src="{{ \Auth::user()->foto }}" alt="{{ \Auth::user()->name }}"><i></i>
              @else
              <img src="../../../app-assets/images/portrait/small/avatar-s-19.png" alt="{{ \Auth::user()->name }}"><i></i>
              @endif
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="ft-user"></i> Edit Profile</a>
            <a class="dropdown-item" href="{{ route('admin.setting.index') }}"><i class="ft-mail"></i> Setting</a>
            <div class="dropdown-divider"></div><a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"><i class="ft-power"></i> Logout</a>
          </div>
        </li>
        <li class="dropdown dropdown-notification nav-item">
          <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i>
            <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">0</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
            <li class="dropdown-menu-header">
              <h6 class="dropdown-header m-0">
                <span class="grey darken-2">Notifications</span>
              </h6>
              <span class="notification-tag badge badge-default badge-danger float-right m-0">0 New</span>
            </li>
            <li class="scrollable-container media-list w-100">
            </li>
            <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all notifications</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>