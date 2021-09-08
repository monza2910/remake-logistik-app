    <!-- NAVBAR -->
    <nav id="nav" class="navbar">
        <div id="sidebar">
          <a id="openBtn"><span></span></a>
          <ul>
            <li><a id="closeBtn">X</a></li>
            <li><a href="<?php echo e(route('blog.index')); ?>" id="active">Home</a></li>
            <li><a href="<?php echo e(route('blog.showarticle')); ?>">Article</a></li>
            <li><a href="<?php echo e(route('blog.contactus')); ?>">Contact Us</a></li>
          </ul>
          <?php if(empty(auth::user())): ?>
          <a href="<?php echo e(route('login')); ?>" id="right">Login</a>
          <?php else: ?>
          <form action="<?php echo e(route('logout')); ?>" method="POST" id="right">
            <?php echo csrf_field(); ?>
            <button type="submit" >Logout</button>
        </form>
          <?php endif; ?>
        </div>
      </nav><?php /**PATH C:\Monza\Developer\Project\KMJ-trans\logistic-app\resources\views/blog/layout/header.blade.php ENDPATH**/ ?>