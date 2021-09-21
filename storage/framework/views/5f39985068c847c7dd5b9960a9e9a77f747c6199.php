<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KMJ Trans & Logistic</title>
    <link rel="stylesheet" href="<?php echo e(asset('blog/css/splide.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('blog/css/splide-theme.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('blog/css/kmj.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('blog/src/fontisto/css/fontisto/fontisto.css')); ?>" />
  </head>

  <body>
    <!-- NAVBAR -->

    <nav id="nav" class="navbar sticky">
        <div id="sidebar">
          <a id="openBtn"><span></span></a>
          <ul>
            <li><a id="closeBtn">X</a></li>
            <li><a href="<?php echo e(route('blog.index')); ?>">Home</a></li>
            <li><a href="<?php echo e(route('blog.showarticle')); ?>">Artikel</a></li>
            <li><a href="<?php echo e(route('blog.service')); ?>">Layanan</a></li>
            <li><a href="<?php echo e(route('blog.gallery')); ?>" id="active">Galeri</a></li>
          </ul>
          <a href="<?php echo e(route('blog.contactus')); ?>" id="right">Contact Us</a>
        </div>
      </nav>
    <!-- GALLERY SECTION -->
    <div id="gallery" class="section section-white section-wider">
        <div class="card card-center card-text-blue">
        <span class="card-nav">FOTO</span>
        <span class="card-title">Galeri Perusahaan</span>
        </div>
    </div>

    <!-- PICTURE LIST -->
    <div class="gallery">
        <?php $__currentLoopData = $gallerys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
        <div class="gallery-column">
            <figure>
                <img
                src="/images/gallery/<?php echo e($gallery->image); ?>"
                alt=""
                />
                <figcaption><?php echo e($gallery->description); ?></figcaption>
            </figure>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</body>

<!-- JAVASCRIPT IMPORT (DON'T MIND ABOUT THIS) -->
<script src="<?php echo e(asset('blog/js/kmj.js')); ?>"></script>
<script src="<?php echo e(asset('blog/src/splidejs/dist/js/splide.min.js')); ?>"></script>
<script src="<?php echo e(asset('blog/js/splide.js')); ?>"></script>
</html>
  <?php /**PATH C:\Monza\Developer\Project\KMJ-trans\logistic-app\resources\views/blog/gallery.blade.php ENDPATH**/ ?>