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
          <li><a href="<?php echo e(route('blog.showarticle')); ?>" id="active">Article</a></li>
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
    </nav>

    <div class="gradient-light-blue">
      <!-- FIRST SECTION -->
      <div class="section section-wider">
        <div class="card card-center card-text-blue">
          <span class="card-nav">BERITA</span>
          <span class="card-title"> Cari Tau Perkembangan Dari Kami </span>
          <p>
            Baca berita-berita seputar update dari kami yang telah disajikan
            dalam bentuk artikel
          </p>
        </div>
      </div>

      <!-- SECOND SECTION -->
      <div id="articles" class="news-container section section-wider">
        <div class="category" tabindex="1">
          <span>Lihat Kategori</span>
          <ul>
            <?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><a href="<?php echo e(route('blog.category',$category->id)); ?>"><?php echo e($category->name); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </div>
        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
        <div class="card card-news">
        <!-- THUMBNAIL ARTIKEL -->
        <img src="/images/thumbnail/<?php echo e($article->thumbnail); ?>" alt="" class="news" />
        <div class="news-content">
            <!-- JUDUL ARTIKEL -->
            <span class="card-title"><?php echo e($article->title); ?></span>
            <!-- RINGKASAN/ISI ARTIKEL -->
            <?php if($article->category->name != null): ?>
            <p><?php echo e($article->category->name); ?></p>
            <?php else: ?>
            <p></p>
            <?php endif; ?>
            <a href="<?php echo e(route('blog.openarticle',$article->slug)); ?>">BACA SELENGKAPNYA</a>
        </div>
        </div>  
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
      </div>

      <!-- PAGE BUTTON -->

      <div class="page-button">
        <a href=""><i class="fi fi-angle-left"></i></a>
        <span>1/5</span>
        <a href=""><i class="fi fi-angle-right"></i></a>
      </div>
    </div>

    <!-- FOOTER -->
    <?php echo $__env->make('blog.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </body>
  <!-- JAVASCRIP IMPORT (DON'T MIND ABOUT THIS) -->
  <script src="<?php echo e(asset('blog/js/kmj.js')); ?>"></script>
  <script src="<?php echo e(asset('blog/src/splidejs/dist/js/splide.min.js')); ?>"></script>
</html><?php /**PATH F:\Kerjaan\BOIS\Project\KMJTRANS\LogisticApp\resources\views/blog/article-list.blade.php ENDPATH**/ ?>