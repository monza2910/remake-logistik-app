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
          <?php if(auth()->user()->image): ?>
          <img alt="image" src="/users/<?php echo e(auth()->user()->image); ?>" class="rounded-circle mr-1">
          <?php else: ?>
          <i class="fas fa-user"></i>
          <?php endif; ?>
          <div class="d-sm-none d-lg-inline-block">Hi, <?php echo e(auth::user()->name); ?> </div></a>
          <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-title">Logged in 5 min ago</div>
            <a href="<?php echo e(route('profile.setting')); ?>" class="dropdown-item has-icon">
              <i class="far fa-user"></i> Profile
            </a>
            
            <div class="dropdown-divider"></div>

            <form action="<?php echo e(route('logout')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <button type="submit" class="dropdown-item has-icon text-danger">Logout</button>
            </form>

          </div>
        </li>
      </ul>
    </nav><?php /**PATH C:\Monza\Developer\Project\KMJ-trans\logistic-app\resources\views/dashboard-admin/navbar.blade.php ENDPATH**/ ?>