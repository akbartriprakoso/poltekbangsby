<!-- Main Sidebar Container -->
{{-- <aside class="main-sidebar sidebar-dark-primary bg-navy elevation-4"> --}}
<aside class="main-sidebar d-flex flex-column flex-shrink-0 sidebar-dark-primary bg-navy" style="position: fixed">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="/img/logosam.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">E - Book</span>
    </a>

    <!-- Sidebar -->
    {{-- <div class="sidebar"> --}}
      <div class="sidebar os-host os-theme-light os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition os-host-overflow os-host-overflow-y">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        {{-- <div class="image">
          <img src="/adminlte/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> --}}
        <div class="info">
          {{-- <a href="#" class="d-block">Alexander Pierce</a> --}}
          {{-- <a href="#" class="d-block">{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email ? }}}</a> --}}
          <a href="#" class="d-block">{{{ isset(Auth::user()->name) ? Auth::user()->name : '' }}}</a>
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

          @if (isset(Auth::user()->name))
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Menu Admin
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                {{-- <a href="/post/create" class="nav-link"> --}}
                <a href="/post/create" class="nav-link {{ ($title === 'Tambah') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Problem</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/post/edit" class="nav-link disabled {{ ($title === 'Ubah') ? 'active' : ''}}">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Ubah Problem</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/post/index" class="nav-link {{ ($title === 'Daftar') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Problem</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Beranda</p>
            </a>
          </li>

          <li class="nav-item">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
              <i class="fas fa-circle nav-icon"></i>
              {{ __('Logout') }}
            </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        </li>

          @else
            <li class="nav-item">
              <a href="/" class="nav-link">
                <i class="fas fa-circle nav-icon"></i>
                <p>Beranda</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="/login" class="nav-link">
                <i class="fas fa-circle nav-icon"></i>
                <p>Login</p>
              </a>
            </li>
          </ul>
          @endif
          
          
          

          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>