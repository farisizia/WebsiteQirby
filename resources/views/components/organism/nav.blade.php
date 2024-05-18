<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #00A5A7">
<link rel="stylesheet" href="{{ asset('assets/css/navbar.css')}}" />

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color: white"></i></a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">

      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell" style="color: white"></i>
          <span class="badge badge-danger navbar-badge">1</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">1 Notifications</span>
          
          <div class="dropdown-divider"></div>
          <x-molecules.m-notif></x-molecules.m-notif>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt" style="color: white"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <button style="background-color: white; color: black; border-radius: 20px; border: none">
          <i class="nav-icon fa fa-user" style="padding-right: 7px;" aria-hidden="true"></i>
          Admin
        </button>
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <x-molecules.m-admin></x-molecules.m-admin>
          <x-molecules.m-logout></x-molecules.m-logout>
          
        </div>
      </li>
    </ul>
  </nav>
  </nav>