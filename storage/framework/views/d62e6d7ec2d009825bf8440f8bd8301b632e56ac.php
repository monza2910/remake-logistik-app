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
          <li class="nav-item dropdown <?php echo e('dashboard' == request()->path() ? 'active' : ''); ?>">
            <a href="<?php echo e(route('dashboard.index')); ?>" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>
          </li>

          <li class="menu-header">Navigation</li>
          <li class="nav-item dropdown  <?php echo e('slider' == request()->path()||'slider.create' == request()->path() ? 'active' : ''); ?>">
            <a href="#" class="nav-link has-dropdown "><i class="far fa-images"></i><span>Slider</span></a>
            <ul class="dropdown-menu ">
              <li><a class="nav-link " href="<?php echo e(route('slider.create')); ?>">Create Slider</a></li>
              <li><a class="nav-link " href="<?php echo e(route('slider.index')); ?>">List Slider</a></li>
            </ul>
          </li>
          
          <li class="nav-item <?php echo e('buttons' == request()->path() ? 'active' : ''); ?>">
            <a href="<?php echo e(route('buttons.index')); ?>" class="nav-link "><i class="far fa-compass"></i><span>Button</span></a>
          </li>

          <li class="menu-header">Content</li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="far fa-file"></i><span>Post</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="index-0.html">Create Post</a></li>
              <li><a class="nav-link" href="index.html">List Post</a></li>
              <li><a class="nav-link" href="index.html">Deleted Post</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown <?php echo e('category' == request()->path()||'category.create' == request()->path() ? 'active' : ''); ?>">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-clipboard-list"></i><span>Category</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="<?php echo e(route('category.create')); ?>"></i>Create Category</a></li>
              <li><a class="nav-link" href="<?php echo e(route('category.index')); ?>">List Category</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown <?php echo e('tags' == request()->path()||'tags.create' == request()->path() ? 'active' : ''); ?>">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-tags"></i><span>Tags</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="<?php echo e(route('tags.create')); ?>">Create Tag</a></li>
              <li><a class="nav-link" href="<?php echo e(route('tags.index')); ?>"></i>List Tags</a></li>
            </ul>
          </li>

          <li class="menu-header">Product & Services</li>
          <li class="nav-item dropdown <?php echo e('outlet' == request()->path() ? 'active' : ''); ?>">
            <a href="<?php echo e(route('outlet.index')); ?>" class="nav-link"><i class="fas fa-store"></i><span>Outlets</span></a>
          </li>
          <li class="nav-item dropdown <?php echo e('variant' == request()->path() ? 'active' : ''); ?>">
            <a href="<?php echo e(route('variant.index')); ?>" class="nav-link"><i class="fas fa-receipt"></i><span>Variant Service</span></a>
          </li>
          <li class="nav-item dropdown <?php echo e('origin' == request()->path()||'destination' == request()->path() ? 'active' : ''); ?>">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-map-marked"></i><span>Origin & Destination</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="<?php echo e(route('origin.index')); ?>">Origin</a></li>
              <li><a class="nav-link" href="<?php echo e(route('destination.index')); ?>">Destination</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown <?php echo e('rate' == request()->path()||'rate.create' == request()->path() ? 'active' : ''); ?>">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-money-bill-wave-alt"></i><span>Price Service</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="<?php echo e(route('rate.create')); ?>">Create Price</a></li>
              <li><a class="nav-link" href="<?php echo e(route('rate.index')); ?>"></i>List Price</a></li>
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
          <li class="nav-item dropdown <?php echo e('user' == request()->path()||'user.create' == request()->path() ? 'active' : ''); ?>">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>User</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="<?php echo e(route('user.create')); ?>">Create users</a></li>
              <li><a class="nav-link" href="<?php echo e(route('user.index')); ?>">List Users</a></li>
              <li><a class="nav-link" href="">Deleted Users</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown <?php echo e('role' == request()->path() ? 'active' : ''); ?>">
            <a href="<?php echo e(route('role.index')); ?>" class="nav-link"><i class="fas fa-crosshairs"></i><span>Roles</span></a>
          </li>
          <li class="nav-item <?php echo e('partner' == request()->path() ? 'active' : ''); ?>">
            <a href="<?php echo e(route('partner.index')); ?>" class="nav-link "><i class="far fa-handshake"></i><span>List Partners</span></a>
          </li>

          <li class="menu-header">Interaction</li>
          <li class="nav-item <?php echo e('testimonial' == request()->path() ? 'active' : ''); ?>">
            <a href="<?php echo e(route('testimonial.index')); ?>" class="nav-link "><i class="fas fa-star"></i><span>Testimoni</span></a>
          </li>
          <li class="nav-item ">
            <a href="#" class="nav-link "><i class="far fa-comments"></i> <span>Comments</span></a>
          </li>
          <li class="nav-item ">
            <a href="#" class="nav-link "><i class="fas fa-headset"></i> <span>Contact Us</span></a>
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
          <form action="<?php echo e(route('logout')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <button class="btn btn-primary btn-lg btn-block btn-icon-split" type="submit">
              Logout<i class="fas fa-sign-out-alt"></i> 
          </button>
        </form>
        </div>
    </aside>
  </div><?php /**PATH F:\Kerjaan\BOIS\Project\KMJTRANS\example-appcompany-profile\resources\views/dashboard-admin/sidebar.blade.php ENDPATH**/ ?>