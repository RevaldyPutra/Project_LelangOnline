<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      @if(auth()->user()->level == 'admin')
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/dashboard/admin" class="nav-link">Home</a>
      </li>
      @endif
      @if(auth()->user()->level == 'petugas')
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/dashboard/petugas" class="nav-link">Home</a>
      </li>
      @endif
      @if(auth()->user()->level == 'masyarakat')
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/dashboard/masyarakat" class="nav-link">Home</a>
      </li>
      @endif
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <li class="nav-item dropdown user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            @if(auth()->user()->level == 'admin')
            <img src="{{asset('adminlte/dist/img/user-gear.png')}}" class="user-image img-circle elevation-2">
            @else
            <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="user-image img-circle elevation-2">
            @endif
            <span class="d-none d-md-inline">{{Auth::user()->name}}</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- User image -->
            <li class="user-header bg-primary">
              @if(auth()->user()->level == 'admin')
              <img src="{{asset('adminlte/dist/img/user-gear.png')}}" class="user-image img-circle elevation-2">
              @else
              <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2">
              @endif
              <p>
                {{Auth::user()->name}} - {{Auth::user()->level}}
                <small>Member since {{Auth::user()->created_at}}</small>
              </p>
            </li>
            <!-- Menu Body -->
            <!-- Menu Footer-->
            <li class="user-footer">
             
              <a href="/profile" class="btn btn-default btn-flat">Profile</a>
              <a href="{{ route('logout.admin')}}" class="btn btn-default btn-flat float-right">Sign out</a>
             
            </li>
          </ul>
        </li>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>