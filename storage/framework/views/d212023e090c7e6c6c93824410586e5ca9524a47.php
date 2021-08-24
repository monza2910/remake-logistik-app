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
          <li><a href="contactus.html">Contact Us</a></li>
        </ul>
        <a href="login.html" id="right">Login</a>
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
                <a href="post.html">BACA SELENGKAPNYA</a>
            </div>
            </div>  
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>

    <!-- FOOTER -->
    <div class="footer">
      <div class="footer-content">
        <ul>
          <li id="title">Link</li>
          <li><a href="index.html">Home</a></li>
          <li><a href="contactus.html">Hubungi Kami</a></li>
        </ul>
        <ul>
          <li id="title">Auth</li>
          <li><a href="login.html">Login</a></li>
          <li><a href="register.html">Register</a></li>
        </ul>
        <ul>
          <li id="title">Blog</li>
          <li><a href="article-lists.html">Berita Terbaru</a></li>
        </ul>
        <ul id="address">
          <li class="flex flex-inline flex-inline-top">
            <i class="fi fi-map-marker-alt fi-circle-small fi-circle-blue"></i>
            <p>
              Menara Kadin Indonesia, Lt.28. Jl.H.R.Rasuna Said Blok X-5 Kav.
              02/03 Jakarta 12950 PO BOX 5032 JKTM Jakarta 12700
            </p>
          </li>
        </ul>
      </div>

      <div class="footer-foot" class="flex flex-inline">
        <span>2021 KMJ Trans & Logistic</span>
        <img src="" alt="logoKMJ" />
      </div>
    </div>
  </body>
  <!-- JAVASCRIP IMPORT (DON'T MIND ABOUT THIS) -->
  <script src="<?php echo e(asset('blog/js/kmj.js')); ?>"></script>
  <script src="<?php echo e(asset('blog/src/splidejs/dist/js/splide.min.js')); ?>"></script>
</html>
<?php /**PATH F:\Kerjaan\BOIS\Project\KMJTRANS\LogisticApp\resources\views/blog/article-list.blade.php ENDPATH**/ ?>