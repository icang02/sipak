<nav class="navbar navbar-header navbar-expand navbar-light">
  <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
  <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
      <li class="dropdown">
        <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
          <div class="avatar me-1">
            <img src="{{ asset('voler') }}/assets/images/avatar/user.png" alt="" srcset="">
          </div>
          <div class="d-none d-md-block d-lg-inline-block">Hi, {{ auth()->user()->name }}</div>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
          <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
          <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
          <div class="dropdown-divider"></div>
          <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="dropdown-item"><i data-feather="log-out"></i> Logout</button>
          </form>
        </div>
      </li>
    </ul>
  </div>
</nav>
