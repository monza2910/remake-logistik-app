<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{route('blog.index')}}">KMJ TRANS </a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{route('blog.index')}}">KMJ</a>
      </div>
      <ul class="sidebar-menu">
          
          <li class="menu-header">Dashboard</li>
          <li class="nav-item dropdown {{'admin/dashboard' == request()->path() ? 'active' : ''}}">
            <a href="{{route('dashboard.index')}}" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>
          </li>
          @if (auth::user()->role->name == 'super-admin')
            <li class="menu-header">Navigation</li>
            <li class="nav-item dropdown  {{'admin/slider' == request()->path()||'admin/slider/create' == request()->path() ? 'active' : ''}}">
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
            <li class="nav-item {{(request()->path() == 'admin/gallery') ? 'active' : ''}}">
              <a href="{{route('gallery.index')}}" class="nav-link "><i class="fas fa-camera-retro"></i><span>Gallery</span></a>
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
            <li class="nav-item dropdown {{'admin/category' == request()->path()||'admin/category/create' == request()->path() ? 'active' : ''}}">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-clipboard-list"></i><span>Category</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('category.create')}}"></i>Create Category</a></li>
                <li><a class="nav-link" href="{{route('category.index')}}">List Category</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown {{'admin/tags' == request()->path()||'admin/tags/create' == request()->path() ? 'active' : ''}}">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-tags"></i><span>Tags</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('tags.create')}}">Create Tag</a></li>
                <li><a class="nav-link" href="{{route('tags.index')}}"></i>List Tags</a></li>
              </ul>
            </li>



            <li class="menu-header">Logistic</li>
            <li class="nav-item dropdown {{'admin/outlet' == request()->path() ? 'active' : ''}}">
              <a href="{{route('outlet.index')}}" class="nav-link"><i class="fas fa-store"></i><span>Outlets</span></a>
            </li>
            <li class="nav-item dropdown {{'admin/variant' == request()->path() ? 'active' : ''}}">
              <a href="{{route('variant.index')}}" class="nav-link"><i class="fas fa-receipt"></i><span>Variant Service</span></a>
            </li>
            <li class="nav-item dropdown {{'admin/origin' == request()->path()||'admin/destination' == request()->path() ? 'active' : ''}}">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-map-marked"></i><span>Origin & Destination</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('origin.index')}}">Origin</a></li>
                <li><a class="nav-link" href="{{route('destination.index')}}">Destination</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown {{'admin/rate' == request()->path()||'admin/rate/create' == request()->path() ? 'active' : ''}}">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-money-bill-wave-alt"></i><span>Price Logistic</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('rate.create')}}">Create Price</a></li>
                <li><a class="nav-link" href="{{route('rate.index')}}"></i>List Price</a></li>
              </ul>
            </li>
            <li class="menu-header"></li>


            <li class="menu-header">Travel</li>
            <li class="nav-item dropdown {{'admin/facility' == request()->path() ? 'active' : ''}}">
              <a href="{{route('facility.index')}}" class="nav-link"><i class="fas fa-store"></i><span>Facility</span></a>
            </li>
            <li class="nav-item dropdown {{'admin/travel' == request()->path()||'admin/travel/create' == request()->path()||'admin/travel/trash' == request()->path() ? 'active' : ''}}">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-money-bill-wave-alt"></i><span>Price Travel</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('travel.create')}}">Create Price</a></li>
                <li><a class="nav-link" href="{{route('travel.index')}}"></i>List Price</a></li>
                <li><a class="nav-link" href="{{route('travel.trash')}}"></i>List Trash</a></li>
              </ul>
            </li>
            
            <li class="menu-header">Armada</li>
            <li class="nav-item {{'admin/facility' == request()->path() ? 'active' : ''}}">
              <a href="{{route('facility.index')}}" class="nav-link"><i class="fas fa-store"></i><span>Facility</span></a>
            </li>
            <li class="nav-item dropdown {{'admin/armada' == request()->path()||'admin/armada/create' == request()->path()||'admin/armada/trash' == request()->path()? 'active' : ''}}">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-money-bill-wave-alt"></i><span>Price Armada</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('armada.create')}}">Create Price</a></li>
                <li><a class="nav-link" href="{{route('armada.index')}}"></i>List Price</a></li>
                <li><a class="nav-link" href="{{route('armada.trash')}}"></i>List Trash</a></li>
              </ul>
            </li>

            
            
            <li class="menu-header">Transaction</li>
            <li class="nav-item dropdown  {{'admin/transaction/trash' == request()->path()||'admin/transaction' == request()->path()||'admin/transaction/logistic/cart' == request()->path() ? 'active' : ''}}">
              <a href="#" class="nav-link has-dropdown "><i class="fas fa-dollar-sign"></i><span>Logistic</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('transaction.index')}}"></i>List</a></li>
                <li><a class="nav-link" href="{{route('transaction.trash')}}"></i>Deleted</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown  {{'admin/transactiontravel/trash' == request()->path()||'admin/transactiontravel' == request()->path()||'admin/transactiontravel/cart' == request()->path() ? 'active' : ''}}">
              <a href="#" class="nav-link has-dropdown "><i class="fas fa-dollar-sign"></i><span>Travel</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('transactiontravel.index')}}"></i>List</a></li>
                <li><a class="nav-link" href="{{route('transactiontravel.trash')}}"></i>Deleted</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown  {{'admin/transactionarmada/trash' == request()->path()||'admin/transactionarmada' == request()->path()||'admin/transactionarmada/cart' == request()->path() ? 'active' : ''}}">
              <a href="#" class="nav-link has-dropdown "><i class="fas fa-dollar-sign"></i><span>Armada</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('transactionarmada.index')}}"></i>List</a></li>
                <li><a class="nav-link" href="{{route('transactionarmada.trash')}}"></i>Deleted</a></li>
              </ul>
            </li>
            
            <li class="menu-header">Membership</li>
          

            <li class="nav-item dropdown {{'admin/role' == request()->path() ? 'active' : ''}}">
              <a href="{{route('role.index')}}" class="nav-link"><i class="fas fa-crosshairs"></i><span>Roles</span></a>
            </li>

          

            <li class="nav-item dropdown {{'admin/team' == request()->path()||'admin/partner' == request()->path() ? 'active' : ''}}">
              <a href="#" class="nav-link has-dropdown"><i class="far fa-handshake"></i><span>Teams</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('team.index')}}">Team</a></li>
                <li><a class="nav-link" href="{{route('partner.index')}}">Partner</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown {{'admin/user' == request()->path()||'admin/user/crate' == request()->path() ? 'active' : ''}}">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>User</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('user.create')}}">Create users</a></li>
                <li><a class="nav-link" href="{{route('user.index')}}">List Users</a></li>
                <li><a class="nav-link" href="{{route('user.trash')}}">Deleted Users</a></li>
              </ul>
            </li>

            <li class="menu-header">Interaction</li>
            <li class="nav-item {{'admin/testimonial' == request()->path() ? 'active' : ''}}">
              <a href="{{route('testimonial.index')}}" class="nav-link "><i class="fas fa-star"></i><span>Testimoni</span></a>
            </li>
            {{-- <li class="nav-item ">
              <a href="#" class="nav-link "><i class="far fa-comments"></i> <span>Comments</span></a>
            </li> --}}
            <li class="nav-item {{'admin/contact' == request()->path() ? 'active' : ''}}">
              <a href="{{route('contact.index')}}" class="nav-link "><i class="fas fa-headset"></i> <span>Contact Us</span></a>
            </li>

            <li class="menu-header">Setting</li>
            <li class="nav-item ">
              <a href="#" class="nav-link "><i class="fas fa-users-cog"></i> <span>Profile Setting</span></a>
            </li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-cogs"></i><span>Site Setting</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('generalsetting.index')}}">General Setting</a></li>
                {{-- <li><a class="nav-link" href="index.html">Sitemap</a></li> --}}
                {{-- <li><a class="nav-link" href="index.html">Ads</a></li> --}}
              </ul>
            </li>
            
          @elseif(auth::user()->role->name == 'admin')
          <li class="menu-header">Navigation</li>
          <li class="nav-item dropdown  {{'admin/slider' == request()->path()||'admin/slider/create' == request()->path() ? 'active' : ''}}">
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
          <li class="nav-item {{(request()->path() == 'admin/gallery') ? 'active' : ''}}">
            <a href="{{route('gallery.index')}}" class="nav-link "><i class="fas fa-camera-retro"></i><span>Gallery</span></a>
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
          <li class="nav-item dropdown {{'admin/category' == request()->path()||'admin/category/create' == request()->path() ? 'active' : ''}}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-clipboard-list"></i><span>Category</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{route('category.create')}}"></i>Create Category</a></li>
              <li><a class="nav-link" href="{{route('category.index')}}">List Category</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown {{'admin/tags' == request()->path()||'admin/tags/create' == request()->path() ? 'active' : ''}}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-tags"></i><span>Tags</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{route('tags.create')}}">Create Tag</a></li>
              <li><a class="nav-link" href="{{route('tags.index')}}"></i>List Tags</a></li>
            </ul>
          </li>

          <li class="menu-header">Logistic</li>
            <li class="nav-item dropdown {{'admin/outlet' == request()->path() ? 'active' : ''}}">
              <a href="{{route('outlet.index')}}" class="nav-link"><i class="fas fa-store"></i><span>Outlets</span></a>
            </li>
            <li class="nav-item dropdown {{'admin/variant' == request()->path() ? 'active' : ''}}">
              <a href="{{route('variant.index')}}" class="nav-link"><i class="fas fa-receipt"></i><span>Variant Service</span></a>
            </li>
            <li class="nav-item dropdown {{'admin/origin' == request()->path()||'admin/destination' == request()->path() ? 'active' : ''}}">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-map-marked"></i><span>Origin & Destination</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('origin.index')}}">Origin</a></li>
                <li><a class="nav-link" href="{{route('destination.index')}}">Destination</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown {{'admin/rate' == request()->path()||'admin/rate/create' == request()->path() ? 'active' : ''}}">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-money-bill-wave-alt"></i><span>Price Logistic</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('rate.create')}}">Create Price</a></li>
                <li><a class="nav-link" href="{{route('rate.index')}}"></i>List Price</a></li>
              </ul>
            </li>
            <li class="menu-header"></li>


            <li class="menu-header">Travel</li>
            <li class="nav-item dropdown {{'admin/facility' == request()->path() ? 'active' : ''}}">
              <a href="{{route('facility.index')}}" class="nav-link"><i class="fas fa-store"></i><span>Facility</span></a>
            </li>
            <li class="nav-item dropdown {{'admin/travel' == request()->path()||'admin/travel/create' == request()->path()||'admin/travel/trash' == request()->path() ? 'active' : ''}}">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-money-bill-wave-alt"></i><span>Price Travel</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('travel.create')}}">Create Price</a></li>
                <li><a class="nav-link" href="{{route('travel.index')}}"></i>List Price</a></li>
                <li><a class="nav-link" href="{{route('travel.trash')}}"></i>List Trash</a></li>
              </ul>
            </li>
            
            <li class="menu-header">Armada</li>
            <li class="nav-item {{'admin/facility' == request()->path() ? 'active' : ''}}">
              <a href="{{route('facility.index')}}" class="nav-link"><i class="fas fa-store"></i><span>Facility</span></a>
            </li>
            <li class="nav-item dropdown {{'admin/armada' == request()->path()||'admin/armada/create' == request()->path()||'admin/armada/trash' == request()->path()? 'active' : ''}}">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-money-bill-wave-alt"></i><span>Price Armada</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('armada.create')}}">Create Price</a></li>
                <li><a class="nav-link" href="{{route('armada.index')}}"></i>List Price</a></li>
                <li><a class="nav-link" href="{{route('armada.trash')}}"></i>List Trash</a></li>
              </ul>
            </li>

            
            
            <li class="menu-header">Transaction</li>
            <li class="nav-item dropdown  {{'admin/transaction/trash' == request()->path()||'admin/transaction' == request()->path()||'admin/transaction/logistic/cart' == request()->path() ? 'active' : ''}}">
              <a href="#" class="nav-link has-dropdown "><i class="fas fa-dollar-sign"></i><span>Logistic</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('transaction.index')}}"></i>List</a></li>
                <li><a class="nav-link" href="{{route('transaction.trash')}}"></i>Deleted</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown  {{'admin/transactiontravel/trash' == request()->path()||'admin/transactiontravel' == request()->path()||'admin/transactiontravel/cart' == request()->path() ? 'active' : ''}}">
              <a href="#" class="nav-link has-dropdown "><i class="fas fa-dollar-sign"></i><span>Travel</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('transactiontravel.index')}}"></i>List</a></li>
                <li><a class="nav-link" href="{{route('transactiontravel.trash')}}"></i>Deleted</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown  {{'admin/transactionarmada/trash' == request()->path()||'admin/transactionarmada' == request()->path()||'admin/transactionarmada/cart' == request()->path() ? 'active' : ''}}">
              <a href="#" class="nav-link has-dropdown "><i class="fas fa-dollar-sign"></i><span>Armada</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('transactionarmada.index')}}"></i>List</a></li>
                <li><a class="nav-link" href="{{route('transactionarmada.trash')}}"></i>Deleted</a></li>
              </ul>
            </li>
            
          
          <li class="menu-header">Membership</li>
        
        

          <li class="nav-item dropdown {{'admin/team' == request()->path()||'admin/partner' == request()->path() ? 'active' : ''}}">
            <a href="#" class="nav-link has-dropdown"><i class="far fa-handshake"></i><span>Teams</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{route('team.index')}}">Team</a></li>
              <li><a class="nav-link" href="{{route('partner.index')}}">Partner</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown {{'admin/user' == request()->path()||'admin/user/crate' == request()->path() ? 'active' : ''}}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>User</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{route('user.create')}}">Create users</a></li>
              <li><a class="nav-link" href="{{route('user.index')}}">List Users</a></li>
              <li><a class="nav-link" href="{{route('user.trash')}}">Deleted Users</a></li>
            </ul>
          </li>

          <li class="menu-header">Interaction</li>
          <li class="nav-item {{'admin/testimonial' == request()->path() ? 'active' : ''}}">
            <a href="{{route('testimonial.index')}}" class="nav-link "><i class="fas fa-star"></i><span>Testimoni</span></a>
          </li>
          {{-- <li class="nav-item ">
            <a href="#" class="nav-link "><i class="far fa-comments"></i> <span>Comments</span></a>
          </li> --}}
          <li class="nav-item {{'admin/contact' == request()->path() ? 'active' : ''}}">
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

          @elseif(auth::user()->role->name == 'petugas')
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-dollar-sign"></i><span>Transaction</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{route('transaction.index')}}"></i>Transaction</a></li>
              {{-- <li><a class="nav-link" href="{{route('transaction.trash')}}"></i>Deleted Transaction</a></li> --}}
            </ul>
          </li>
          @elseif(auth::user()->role->name == 'writer')
            <li class="menu-header">Content</li>
            <li class="nav-item dropdown  {{'admin/article' == request()->path()||'admin/article/create' == request()->path()||'admin/article/trash' == request()->path() ? 'active' : ''}} ">
              <a href="#" class="nav-link has-dropdown"><i class="far fa-file"></i><span>Articles</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('article.create')}}">Create Article</a></li>
                <li><a class="nav-link" href="{{route('article.index')}}">List Article</a></li>
                <li><a class="nav-link" href="{{route('article.trash')}}">Deleted Article</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown {{'admin/category' == request()->path()||'admin/category/create' == request()->path() ? 'active' : ''}}">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-clipboard-list"></i><span>Category</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('category.create')}}"></i>Create Category</a></li>
                <li><a class="nav-link" href="{{route('category.index')}}">List Category</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown {{'admin/tags' == request()->path()||'admin/tags/create' == request()->path() ? 'active' : ''}}">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-tags"></i><span>Tags</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('tags.create')}}">Create Tag</a></li>
                <li><a class="nav-link" href="{{route('tags.index')}}"></i>List Tags</a></li>
              </ul>
            </li>
          @endif

          
          
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