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
          <li><a href="<?php echo e(route('blog.showarticle')); ?>"  id="active">Artikel</a></li>
          <li><a href="service-lists.html">Layanan</a></li>
          <li><a href="<?php echo e(route('blog.gallery')); ?>">Galeri</a></li>
        </ul>
        <a href="<?php echo e(route('blog.contactus')); ?>" id="right">Contact Us</a>
      </div>
    </nav>

    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
    
    <!-- ARTICLE HEADER -->
    <div class="article-header">
      <img src="/images/thumbnail/<?php echo e($article->thumbnail); ?>" alt="" />
      <div class="article-content">
        <span class="date"><?php echo e($article->created_at->format('d M Y')); ?></span>
        <h1><?php echo e($article->title); ?></h1>
      </div>
    </div>

    <!-- ARTICLE TEXT -->
    <div class="article-text">
      <?php echo $article->content; ?>

    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <!-- ANOTHER LIST -->
    <div class="article-lists section section-wider">
      <h3>ARTIKEL LAIN</h3>
      <!-- NEWS LISTS -->
      <div class="news-container">
        <!-- News Card From Here -->
        <?php $__currentLoopData = $listarticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
        <div class="card card-news">
          <img src="/images/thumbnail/<?php echo e($list->thumbnail); ?>" alt="thumbnailArtikel" class="news" />
          <div class="news-content">
            <span class="card-title"><?php echo e($list->title); ?></span>
            <p><?php echo e($list->category->name); ?></p>
            <a href="<?php echo e(route('blog.openarticle',$list->slug)); ?>">BACA SELENGKAPNYA</a>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <!-- News Unto From Here -->
      </div>

      <!-- ADD COMMENT -->
      
    </div>

    <!-- COMMENT LISTS -->
    
      
    

    <!-- FOOTER -->
    <?php echo $__env->make('blog.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </body>

  <!-- JAVASCRIP IMPORT (DON'T MIND ABOUT THIS) -->
  <script src="<?php echo e(asset('blog/js/kmj.js')); ?>"></script>
</html>
<?php /**PATH C:\Monza\Developer\Project\KMJ-trans\logistic-app\resources\views/blog/article-detail.blade.php ENDPATH**/ ?>