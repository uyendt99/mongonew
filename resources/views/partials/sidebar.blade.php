<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info" style="display:inline-flex">
        @if(Auth::check())
          <a href="#" class="d-block">{{Auth::user()->name}}</a><span style="color:#fff; padding: 0 10px;"> | </span><a href="{{route('logout')}}">Đăng xuất</a>
        @endif

        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->
      <!-- {{  request()->routeIs('customer|customer.create') ? 'active' : '' }} -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('customer')}}" class="nav-link ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Quản lý khách hàng
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('order')}}" class="nav-link">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
                Quản lý đơn hàng
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('company')}}" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Quản lý công ty
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('user')}}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Quản lý tài khoản
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Phân quyền
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('role')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vai trò</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('permission')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quyền</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
