<div class="main-wrapper">
    <div class="navbar-bg"></div>
    <nav class="navbar navbar-expand-lg main-navbar">
      <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
          <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
        <div class="search-element">
          
        </div>
      </form>
      <ul class="navbar-nav navbar-right">
        
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
          @if(auth()->user()->image)
          <img alt="image" src="{{auth()->user()->image}}" class="rounded-circle mr-1">
          @else
          <i class="fas fa-user"></i>
          @endif
          <div class="d-sm-none d-lg-inline-block">Hi, {{auth::user()->name}} </div></a>
          <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-title">Logged in 5 min ago</div>
            <a href="{{route('profile.setting')}}" class="dropdown-item has-icon">
              <i class="far fa-user"></i> Profile
            </a>
            {{-- <a href="features-activities.html" class="dropdown-item has-icon">
              <i class="fas fa-bolt"></i> Activities
            </a>
            <a href="features-settings.html" class="dropdown-item has-icon">
              <i class="fas fa-cog"></i> Settings
            </a> --}}
            <div class="dropdown-divider"></div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item has-icon text-danger">Logout</button>
            </form>

          </div>
        </li>
      </ul>
    </nav>