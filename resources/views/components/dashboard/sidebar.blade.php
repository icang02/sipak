<div id="sidebar" class='active'>
  <div class="sidebar-wrapper active">
    <div class="sidebar-header text-center">
      <img src="{{ asset('img/bkkbn.png') }}" alt="LOGO" style="width: 150px; height: 60px;">
      <h6 class="text-center mt-1">Sulawesi Tenggara</h6>
      <hr>
      <h4 class="text-center fw-bold">SIPAK</h4>
      <h6 class="text-center" style="margin-top: -7px;">Sistem Monitoring DUPAK</h6>
    </div>
    <hr style="margin-top: 0px;">
    <div class="sidebar-menu" style="margin-top: -20px;">
      <ul class="menu">

        <li class='sidebar-title'>Main Menu</li>

        <li class="sidebar-item {{ request()->is('dashboard') ? 'active' : '' }}">
          <a href="{{ route('dashboard') }}" class='sidebar-link'>
            <i data-feather="home" width="20"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <li class="sidebar-item {{ request()->is('tim-penilai*') ? 'active' : '' }}">
          <a href="{{ route('tim.penilai') }}" class='sidebar-link'>
            <i data-feather="file-text" width="20"></i>
            <span>Data Tim Penilai</span>
          </a>
        </li>

        <li class="sidebar-item {{ request()->is('data-dupak*') ? 'active' : '' }}">
          <a href="{{ route('data.dupak') }}" class='sidebar-link'>
            <i data-feather="file-text" width="20"></i>
            <span>Data DUPAK</span>
          </a>
        </li>

        <li class="sidebar-item  has-sub">
          <a href="#" class='sidebar-link'>
            <i data-feather="briefcase" width="20"></i>
            <span>Master Data</span>
          </a>
          <ul class="submenu ">
            <li>
              <a href="{{ route('index.jabatan') }}">List Jabatan</a>
            </li>
          </ul>
        </li>

        {{-- <li class="sidebar-item {{ request()->is('add') ? 'active' : '' }}">
          <a href="{{ route('add.dupak') }}" class='sidebar-link'>
            <i data-feather="file-plus" width="20"></i>
            <span>Tambah Data</span>
          </a>
        </li> --}}

      </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
  </div>
</div>
