<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">KMJ TRANS </a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">KMJ</a>
      </div>
      <ul class="sidebar-menu">
          
          <li class="menu-header">Dashboard</li>
          <li class="nav-item dropdown {{'dashboard' == request()->path() ? 'active' : ''}}">
            <a href="{{route('dashboard.index')}}" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>
          </li>

          <li class="menu-header">Navigation</li>
          <li class="nav-item dropdown  {{'slider' == request()->path()||'slider.create' == request()->path() ? 'active' : ''}}">
            <a href="#" class="nav-link has-dropdown "><i class="far fa-images"></i><span>Slider</span></a>
            <ul class="dropdown-menu ">
              <li><a class="nav-link " href="{{route('slider.create')}}">Create Slider</a></li>
              <li><a class="nav-link " href="{{route('slider.index')}}">List Slider</a></li>
            </ul>
          </li>
          {{-- <li class="nav-item dropdown ">
            <a href="#" class="nav-link has-dropdown"><i class="far fa-image"></i><span>Event Banner</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="index-0.html">Create Banner</a></li>
              <li><a class="nav-link" href="index.html">List Banner</a></li>
            </ul>
          </li> --}}
          {{-- <li class="nav-item {{'buttons' == request()->path() ? 'active' : ''}}"> --}}
          <li class="nav-item {{(request()->path() == 'admin/buttons') ? 'active' : ''}}">
            <a href="{{route('buttons.index')}}" class="nav-link "><i class="far fa-compass"></i><span>Button</span></a>
          </li>

          <li class="menu-header">Content</li>
          <li class="nav-item dropdown  {{'admin/article' == request()->path()||'admin/article/create' == request()->path()||'admin/article/trash' == request()->path() ? 'active' : ''}} ">
            <a href="#" class="nav-link has-dropdown"><i class="far fa-file"></i><span>Articles</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{route('article.create')}}">Create Article</a></li>
              <li><a class="nav-link" href="{{route('article.index')}}">List Article</a></li>
              <li><a class="nav-link" href="{{route('article.trash')}}">Deleted Article</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown {{'category' == request()->path()||'category.create' == request()->path() ? 'active' : ''}}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-clipboard-list"></i><span>Category</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{route('category.create')}}"></i>Create Category</a></li>
              <li><a class="nav-link" href="{{route('category.index')}}">List Category</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown {{'tags' == request()->path()||'tags.create' == request()->path() ? 'active' : ''}}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-tags"></i><span>Tags</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{route('tags.create')}}">Create Tag</a></li>
              <li><a class="nav-link" href="{{route('tags.index')}}"></i>List Tags</a></li>
            </ul>
          </li>

          <li class="menu-header">Product & Services</li>
          <li class="nav-item dropdown {{'outlet' == request()->path() ? 'active' : ''}}">
            <a href="{{route('outlet.index')}}" class="nav-link"><i class="fas fa-store"></i><span>Outlets</span></a>
          </li>
          <li class="nav-item dropdown {{'variant' == request()->path() ? 'active' : ''}}">
            <a href="{{route('variant.index')}}" class="nav-link"><i class="fas fa-receipt"></i><span>Variant Service</span></a>
          </li>
          <li class="nav-item dropdown {{'origin' == request()->path()||'destination' == request()->path() ? 'active' : ''}}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-map-marked"></i><span>Origin & Destination</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{route('origin.index')}}">Origin</a></li>
              <li><a class="nav-link" href="{{route('destination.index')}}">Destination</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown {{'rate' == request()->path()||'rate.create' == request()->path() ? 'active' : ''}}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-money-bill-wave-alt"></i><span>Price Service</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{route('rate.create')}}">Create Price</a></li>
              <li><a class="nav-link" href="{{route('rate.index')}}"></i>List Price</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-dollar-sign"></i><span>Transaction</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="index-0.html">Create Transaction</a></li>
              <li><a class="nav-link" href="index.html"></i>List Transaction</a></li>
            </ul>
          </li>
          
          <li class="menu-header">Membership</li>
          <li class="nav-item dropdown {{'user' == request()->path()||'user.crate' == request()->path() ? 'active' : ''}}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>User</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{route('user.create')}}">Create users</a></li>
              <li><a class="nav-link" href="{{route('user.index')}}">List Users</a></li>
              <li><a class="nav-link" href="{{route('user.trash')}}">Deleted Users</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown {{'role' == request()->path() ? 'active' : ''}}">
            <a href="{{route('role.index')}}" class="nav-link"><i class="fas fa-crosshairs"></i><span>Roles</span></a>
          </li>
          <li class="nav-item {{'partner' == request()->path() ? 'active' : ''}}">
            <a href="{{route('partner.index')}}" class="nav-link "><i class="far fa-handshake"></i><span>List Partners</span></a>
          </li>

          <li class="menu-header">Interaction</li>
          <li class="nav-item {{'testimonial' == request()->path() ? 'active' : ''}}">
            <a href="{{route('testimonial.index')}}" class="nav-link "><i class="fas fa-star"></i><span>Testimoni</span></a>
          </li>
          <li class="nav-item ">
            <a href="#" class="nav-link "><i class="far fa-comments"></i> <span>Comments</span></a>
          </li>
          <li class="nav-item {{'contact' == request()->path() ? 'active' : ''}}">
            <a href="{{route('contact.index')}}" class="nav-link "><i class="fas fa-headset"></i> <span>Contact Us</span></a>
          </li>

          <li class="menu-header">Setting</li>
          <li class="nav-item ">
            <a href="#" class="nav-link "><i class="fas fa-users-cog"></i> <span>Profile Setting</span></a>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-cogs"></i><span>Site Setting</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="index-0.html">General Setting</a></li>
              <li><a class="nav-link" href="index.html">Sitemap</a></li>
              <li><a class="nav-link" href="index.html">Ads</a></li>
            </ul>
          </li>
          
          
        </ul>
        
    

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-primary btn-lg btn-block btn-icon-split" type="submit">
              Logout<i class="fas fa-sign-out-alt"></i> 
          </button>
        </form>
        </div>
    </aside>
  </div>