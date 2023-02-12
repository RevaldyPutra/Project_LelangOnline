<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="{{ asset('adminlte/dist/img/lelangonline.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light">Lelang Online</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if (auth()->user()->level == 'petugas')
          <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            @elseif (auth()->user()->level == 'masyarakat')
            <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            @elseif (auth()->user()->level == 'admin')
            <img src="{{ asset('adminlte/dist/img/user-gear.png')}}"alt="User Image">
          @endif
        </div>
        <div class="info">
          @if (auth()->user()->level == 'petugas')
          <a href="/dashboard/petugas" class="d-block">{{ Auth::user()->name}}</a>
          @elseif (auth()->user()->level == 'admin')
          <a href="/dashboard/admin" class="d-block">{{ Auth::user()->name}}</a>
          @elseif (auth()->user()->level == 'masyarakat')
          <a href="/dashboard/masyarakat" class="d-block">{{ Auth::user()->name}}</a>
          @endif
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          @if (auth()->user()->level == 'petugas')
          <li class="nav-item">
            <a href="/petugas/barang" class="nav-link">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Barang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/petugas/lelang" class="nav-link">
              <i class="nav-icon fas fa-tag"></i>
              <p>
                Lelang
              </p>
            </a>
          </li>

          @elseif (auth()->user()->level == 'admin')
          <li class="nav-item">
            <a href="/admin/barang" class="nav-link">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Barang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/operator" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Operator
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/masyarakat" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Masyarakat
              </p>
            </a>
          </li>

          @elseif (auth()->user()->level == 'masyarakat')
          <li class="nav-item">
            <a href="/listlelang" class="nav-link">
              <i class="nav-icon fas fa-tag"></i>
              <p>
                List Lelang
              </p>
            </a>
          </li>
          
          @endif

          <li class="nav-item">
            <a href="/logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                LOGOUT
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>