<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perluasan Daerah di Area Jawa Barat</title>
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
          <li><a href="<?php echo e(route('blog.showarticle')); ?>" >Artikel</a></li>
          <li><a href="<?php echo e(route('blog.service')); ?>"  id="active">Layanan</a></li>
          <li><a href="<?php echo e(route('blog.gallery')); ?>">Galeri</a></li>
        </ul>
        <a href="<?php echo e(route('blog.contactus')); ?>" id="right">Contact Us</a>
      </div>
    </nav>

    <?php $__currentLoopData = $armadas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $armada): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
    
    <!-- ARTICLE HEADER -->
    <div class="article-header">
      <img
        src="/images/armadas/<?php echo e($armada->thumbnail); ?>"
        alt=""
      />
      <div class="article-content article-content-center">
        <h1><?php echo e($armada->name); ?></h1>
        <h4><?php echo e($armada->origin->city .' - '. $armada->destination->city); ?> </h4>
        <h4><?php echo e($armada->variant .' (Rp. '. number_format($armada->price).')'); ?></h4>
      </div>
    </div>

    <!-- ARTICLE TEXT -->
    <div class="article-text">
      <div>
        <?php echo $armada->content; ?>



        <br>
        <p><strong>Fasilitas Yang Didapatkan :</strong></p>
        <?php $__currentLoopData = $armada->facilitys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fasilitas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p>- <?php echo e($fasilitas->name); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <div class="contact-card">
        <span class="contact-card-title">Hubungi Kami</span>
        <a href="https://wa.me/+6288803524505" class="button button-1 button-orange">
          <i class="fi fi-whatsapp"></i>
          WhatsApp
        </a>
        <a href="https://www.instagram.com/kmj_trans/" class="button button-1 button-orange">
          <i class="fi fi-instagram"></i>
          Instagram
        </a>
      </div>
    </div>
    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if($listarmada->isEmpty()): ?>
    <?php else: ?>
        
    <!-- ANOTHER LIST -->
    <div class="article-lists section section-wider">
      <h3>Layanan Lain</h3>
      <!-- NEWS LISTS -->
      
      <div class="news-container news-service-container">
        <!-- News Card From Here -->
        <?php $__currentLoopData = $listarmada; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ltarmada): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card card-news">    
          <!-- THUMBNAIL LAYANAN -->
          <img src="/images/armadas/<?php echo e($ltarmada->thumbnail); ?>" alt="" class="news" />
          <div class="news-content">
              <!-- JUDUL LAYANAN -->
              <span class="card-title"><?php echo e($ltarmada->name); ?></span>
              <!-- RINGKASAN/ISI LAYANAN -->
              <p><?php echo e($ltarmada->variant.', Rp.'. $ltarmada->price); ?></p>
              <a href="<?php echo e(route('blog.opentravel',$ltarmada->slug)); ?>">BACA SELENGKAPNYA</a>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
        <!-- News Unto From Here -->
      </div>
    </div>
    <?php endif; ?>

    <!-- FOOTER -->
    <?php echo $__env->make('blog.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </body>

  <!-- JAVASCRIP IMPORT (DON'T MIND ABOUT THIS) -->
  <script src="<?php echo e(asset('blog/js/kmj.js')); ?>"></script>
</html>
<?php /**PATH C:\Monza\Developer\Project\KMJ-trans\logistic-app\resources\views/blog/armada-detail.blade.php ENDPATH**/ ?>