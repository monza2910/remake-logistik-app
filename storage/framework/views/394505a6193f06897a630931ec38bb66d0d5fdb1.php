<!-- EIGHTH SECTION -->
<div class="footer">
    <div class="footer-content">
      <ul>
        <li id="title">Link</li>
        <li><a href="<?php echo e(route('blog.index')); ?>">Home</a></li>
      </ul>
      <ul>
        <li id="title">Contact</li>
        <li><a href="<?php echo e(route('blog.contactus')); ?>">Hubungi Kami</a></li>
      </ul>
      <ul>
        <li id="title">Blog</li>
        <li><a href="<?php echo e(route('blog.showarticle')); ?>">Berita Terbaru</a></li>
      </ul>
      <ul id="address">
        <li class="flex flex-inline flex-inline-top">
          <i class="fi fi-map-marker-alt fi-circle-small fi-circle-blue"></i>
          <?php $__currentLoopData = $mainaddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <p>
            <?php echo e($address->content); ?>

          </p>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </li>
      </ul>
    </div>

    <div class="footer-foot" class="flex flex-inline">
      <span>2021 KMJ Trans & Logistic</span>
      <?php $__currentLoopData = $logos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <img src="/assets/logo/<?php echo e($logo->image); ?>" alt="logoKMJ" />
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div><?php /**PATH C:\Monza\Developer\Project\KMJ-trans\logistic-app\resources\views/blog/layout/footer.blade.php ENDPATH**/ ?>