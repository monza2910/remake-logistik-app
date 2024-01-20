<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Latest News</title>
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
          <li><a href="<?php echo e(route('blog.showarticle')); ?>" >Artikel</a></li>
          <li><a href="<?php echo e(route('blog.service')); ?> " id="active">Layanan</a></li>
          <li><a href="<?php echo e(route('blog.gallery')); ?>" >Galeri</a></li>
        </ul>
        <a href="<?php echo e(route('blog.contactus')); ?>" id="right">Contact Us</a>
      </div>
    </nav>
        <div id="servicecontainer" class="gradient-light-blue">
            <!-- FIRST SECTION -->
            <div id="servicesection" class="section section-wider">
            <div class="card card-center card-text-blue">
                <span class="card-nav">LAYANAN KAMI</span>
                <span class="card-title"> Jenis-Jenis Layanan Dari Kami </span>
                <p>Pahami lebih lanjut tentang layanan kami</p>

                <!-- FORM SEARCH ARTICLES/NEWS -->
                <!-- <form action="" class="big-search">
                <input type="text" placeholder="Penelusuran Artikel..." />
                <button class="big-search-button">
                    <i class="fi fi-search"></i>
                </button>
                </form> -->
            </div>
            </div>

            
            <!-- SECTION JENIS LAYANAN 2 -->
            <div class="service-wrapper">
            <span class="service-wrapper-title">LAYANAN TRAVEL</span>
            <div
                id="articles"
                class="news-container news-service-container section section-wider"
            >
            <?php $__currentLoopData = $travels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $travel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <div class="card card-news">    
                <!-- THUMBNAIL LAYANAN -->
                <img src="/images/travels/<?php echo e($travel->thumbnail); ?>" alt="" class="news" />
                <div class="news-content">
                    <!-- JUDUL LAYANAN -->
                    <span class="card-title"><?php echo e($travel->name); ?></span>
                    <!-- RINGKASAN/ISI LAYANAN -->
                    <p><?php echo e($travel->variant.', Rp.'. $travel->price); ?></p>
                    <a href="<?php echo e(route('blog.opentravel',$travel->slug)); ?>">BACA SELENGKAPNYA</a>
                </div>
                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
            </div>

            <!-- SECTION JENIS LAYANAN 3 -->
            <div class="service-wrapper">
            <span class="service-wrapper-title">LAYANAN SEWA ARMADA</span>
            <div
                id="articles"
                class="news-container news-service-container section section-wider"
            >
            <?php $__currentLoopData = $armadas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $armada): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <div class="card card-news">    
                <!-- THUMBNAIL LAYANAN -->
                <img src="/images/armadas/<?php echo e($armada->thumbnail); ?>" alt="" class="news" />
                <div class="news-content">
                    <!-- JUDUL LAYANAN -->
                    <span class="card-title"><?php echo e($armada->name); ?></span>
                    <!-- RINGKASAN/ISI LAYANAN -->
                    <p><?php echo e($armada->variant.', Rp.'. $armada->price); ?></p>
                    <a href="<?php echo e(route('blog.armada',$armada->slug)); ?>">BACA SELENGKAPNYA</a>
                </div>
                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            </div>

            <!-- PAGE BUTTON -->
            <!-- <div class="page-button">
            <a href=""><i class="fi fi-angle-left"></i></a>
            <span>1/5</span>
            <a href=""><i class="fi fi-angle-right"></i></a>
            </div> -->
        </div>


    <?php echo $__env->make('blog.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
<!-- JAVASCRIP IMPORT (DON'T MIND ABOUT THIS) -->
<script src="<?php echo e(asset('blog/js/kmj.js')); ?>"></script>
<script src="<?php echo e(asset('blog/src/splidejs/dist/js/splide.min.js')); ?>"></script>
</html><?php /**PATH G:\Developer\Website\Project\logistic-app\resources\views/blog/service-list.blade.php ENDPATH**/ ?>