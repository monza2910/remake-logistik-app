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
        <form action="<?php echo e(route('logout')); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <button type="submit" class="dropdown-item has-icon text-danger">Logout</button>
      </form>
        <?php endif; ?>
      </div>
    </nav>

    <!-- SLIDER -->
    <div class="splide">
      <div class="splide__track">
        <ul class="splide__list">
            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                <li class="splide__slide">
                    <!-- ========================== -->
                    <!-- !!!!!!!!!!!!!!!!!!!!!!!!!! -->
                    <img id="splide__image" src="/sliders/<?php echo e($slider->image); ?>" alt="sliderbackground" />
                    <div class="splide__content">
                    <span><?php echo e($slider->title_one); ?></span>
                    <h1><?php echo e($slider->title_two); ?></h1>
                    <p>
                        <?php echo e($slider->description); ?>

                        
                    </p>
                    </div>
                    <!-- !!!!!!!!!!!!!!!!!!!!!!!!!! -->
                    <!-- ========================== -->
                </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
      <div class="splide__arrows">
        <button class="splide__arrow splide__arrow--prev">
          <i class="fi fi-angle-left"></i>
        </button>
        <button class="splide__arrow splide__arrow--next">
          <i class="fi fi-angle-right"></i>
        </button>
      </div>
    </div>

    <!-- MAIN SECTION -->
    <div
      id="tab"
      class="grid col col-40-60 grid-res section section-wider section-white"
    >
      <div>
        <div class="card card-res">
          <span class="card-nav">LAYANAN</span>
          <span class="card-title"
            >Mulai dari Cek Harga sampai Cek Lokasi Penjemputan</span
          >
          <p>
            Lakukan pengecekan harga sebelum memesan, atau melacak paket pesanan
          </p>
        </div>
        <div class="navigation grid-right-50">
          <a
            class="nav-link active"
            href="#tab"
            onclick="openTab(event, 'Bayar')"
            >Hitung Tarif</a
          >
          <a class="nav-link" href="#tab" onclick="openTab(event, 'Lacak')"
            >Lacak Paket</a
          >
          <a class="nav-link" href="#tab" onclick="openTab(event, 'Lokasi')"
            >Lokasi</a
          >
        </div>
      </div>
      <div id="tabcontent">
        <div class="flex flex-center">
          <!-- >>>>>>>>>>>>>>>>>>> -->
          <!-- ESTIMASI PEMBAYARAN -->
          <!-- <<<<<<<<<<<<<<<<<<< -->
          <div id="Bayar" class="tabcontent">
            <!-- Form Estimasi Pembayaran -->
            <form action="<?php echo e(route('estimasi.cek')); ?>" method="POST">
              <?php echo csrf_field(); ?>
              <div class="grid col col-2 grid-res">
                <div class="card card-white">
                  <div class="card-inline">
                    <i class="fi fi-map-marker-alt"></i>
                    <span>Lokasi Awal</span>
                  </div>
                  <p>Pilih lokasi penjemputan barang yang akan dikirim</p>
                  <div class="data-live">
                    <!-- Input Pilih Lokasi Awal -->
                    <input type="text" placeholder="Pilih Lokasi" />
                    <!-- Input Pilih Lokasi Awal -->
                    <ul>
                      <li>Malang</li>
                      <li>Surabaya</li>
                      <li>Jayapura</li>
                      <li>Blitar</li>
                      <li>Bogor</li>
                      <li>Makassar</li>
                      <li>Surakarta</li>
                    </ul>
                  </div>
                </div>
                <div class="card card-white">
                  <div class="card-inline">
                    <i class="fi fi-navigate"></i>
                    <span>Lokasi Tujuan</span>
                  </div>
                  <p>Barang yang dijemput akan dikirimkan ke lokasi ini</p>
                  <div class="data-live">
                    <!-- Input Pilih Lokasi Tujuan -->
                    <input type="text" placeholder="Pilih Lokasi" />
                    <!-- Input Pilih Lokasi Tujuan -->
                    <ul>
                      <li>Malang</li>
                      <li>Surabaya</li>
                      <li>Jayapura</li>
                      <li>Blitar</li>
                      <li>Bogor</li>
                      <li>Makassar</li>
                      <li>Surakarta</li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="grid col">
                <div class="card card-white">
                  <div class="card-inline">
                    <i class="fi fi-shopping-basket"></i>
                    <span>Berat Barang</span>
                  </div>
                  <p>Berat/Weight dari barang yang akan dikirimkan</p>
                  <!-- Input Masukkan Berat -->
                  <input type="text" placeholder="Masukkan Berat (kg)" />
                  <!-- Input Masukkan Berat -->
                </div>
              </div>
              <button id="centered" type="submit">Cek Estimasi Biaya</button>
            </form>

            <!-- Hasil Dari Cek Estimasi Harga -->
            <div class="result">
              <div class="result-price">
                <div>
                  <span id="from">Malang</span>
                  <span id="to">Surabaya</span>
                  <span id="weight">50kg</span>
                </div>
                <div>
                  <span id="price">30.000</span>
                </div>
              </div>
            </div>
            <!-- Hasil Dari Cek Estimasi Harga -->
          </div>
        </div>

        <!-- >>>>>>>>>>> -->
        <!-- LACAK PAKET -->
        <!-- <<<<<<<<<<< -->
        <div id="Lacak" class="tabcontent" style="display: none">
          <form action="<?php echo e(route('blog.index')); ?>" method="get ">
            <div class="grid col">
              <div class="card card-white">
                <div class="card-inline">
                  <i class="fi fi-ticket-alt"></i>
                  <span>Masukkan No. Resi</span>
                </div>
                <p>
                  Nomor Resi didapatkan setelah barang diambil untuk dikirmkan
                </p>
                <input type="text" name="resi" placeholder="Cth: 94328012" />
              </div>
            </div>
            <button id="centered" type="submit">Konfirmasi No. Resi</button>
          </form>

          <!-- Hasil Dari Lacak Lokasi Barang -->

          <?php if(isset($record)): ?>
              
          <?php endif; ?>
          <?php if(!empty($transactions) ): ?>
          <div class="result">
            <div class="result-header">
              <span id="name"> <?php echo e($transactions->penerima); ?> </span>
              <span id="id"> <?php echo e($transactions->tracking_number); ?> </span>
            </div>
            <div class="result-content">
              <div id="address">
                <span id="from"><?php echo e($transactions->address_sender); ?></span>
                <span id="to"><?php echo e($transactions->address_penerima); ?></span>
              </div>
                <div id="tracking">
                  <span>STATUS PENGIRIMAN</span>
                  <?php if(!empty($trackings)): ?>
                    <?php $__currentLoopData = $trackings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $track): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="list">
                      <div id="time">
                        <span id="hour"><?php echo e($track->created_at->format('H:i')); ?></span>
                        <span id="date"><?php echo e($track->created_at->format('d M y')); ?></span>
                      </div>
                      <div id="detail">
                        <p><?php echo e($track->status." [". $track->location."]"); ?></p>
                      </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
                  <?php else: ?>
                      
                  <?php endif; ?>
                </div>
              </div>
            </div>


          <?php else: ?>

           
          <?php endif; ?>
          
          <!-- Hasil Dari Lacak Lokasi Barang -->
        </div>

        <!-- >>>>>> -->
        <!-- LOKASI -->
        <!-- <<<<<< -->
        <div id="Lokasi" class="tabcontent" style="display: none">
          <div class="grid col col-2 grid-res">
            <?php $__currentLoopData = $origins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $origin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card card-white card-text-small">
              <span class="card-title"><?php echo e($origin->city); ?></span>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>
    </div>

    <!-- SECOND SECTION -->
    <div class="section section-wider section-blue">
      <div class="grid col col-60-40 mg-top-bottom-50 grid-res">
        <div class="grid col col-2 grid-res grid-right-50">
          <span class="feat">Akses Mudah</span>
          <span class="feat">Fitur Lengkap</span>
          <span class="feat">Layanan 24-jam</span>
        </div>
        <div class="card card-text-white card-res">
          <span class="card-nav">PELAYANAN</span>
          <span class="card-title">Mengapa Memilih Kami?</span>
          <p>
            Lihat berbagai alasan mengapa anda harus memilih kami dalam membantu
            bisnis anda
          </p>
        </div>
      </div>
    </div>

    <!-- THIRD SECTION -->
    <!-- Third Section Was Deleted :) -->

    <!-- FOURTH SECTION -->
    <div
      class="grid col col-40-60 grid-res section section-wider section-white"
    >
      <div class="card grid-right-50 card-res" style="margin-bottom: 50px">
        <span class="card-nav">KLIEN</span>
        <span class="card-title">Mitra Kerja</span>
        <p>
          Kami bekerja sama dengan banyak klien untuk mempermudah
          penjemputan/pengiriman barang
        </p>
        <a href="" class="button button-1 button-orange">Gabung</a>
      </div>
      <div class="image-flex flex flex-row">
          <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
          <a href="<?php echo e($partner->website); ?>">
              <img src="/partners/<?php echo e($partner->image); ?>" alt="perusahaan" />
          </a>

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>

    <!-- FIFTH SECTION -->
    <div class="section section-blue section-wider">
      <!-- >>>>>>>>>>>>>>>> -->
      <!-- Slider Testimoni -->
      <!-- <<<<<<<<<<<<<<<< -->
      <div class="splide testimony center-pagination">
        <div class="splide__track">
          <ul class="splide__list">
            <!-- Copasnya dari Line Ini -->
            <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
            <li class="splide__slide">
                <div class="testy-grid">
                    <div>
                        <!-- Foto Orang -->
                  <img src="/testimonials/<?php echo e($testi->image); ?>" alt="fotocogan:v" />
                  <!-- Foto Orang -->
                </div>
                <div class="flex flex-left">
                    <!-- Quotenya -->
                    <p id="quote">
                        <?php echo e($testi->quote); ?>

                        
                    </p>
                    <div id="author" class="flex flex-left">
                        <!-- Nama Orangnya -->
                        <span class="bold"><?php echo e($testi->name); ?></span>
                        <!-- Jabatan/Pekerjaan -->
                        <span><?php echo e($testi->position .' '. $testi->company); ?> </span>
                    </div>
                </div>
                </div>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!-- Copasnya Dari Line Ini -->
          </ul>
        </div>
        <div class="splide__arrows" style="display: none">
          <button class="splide__arrow splide__arrow--prev">
            <i class="fi fi-angle-left"></i>
          </button>
          <button class="splide__arrow splide__arrow--next">
            <i class="fi fi-angle-right"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- SIXTH SECTION -->
    <div class="section section-white section-wider center">
      <!-- >>>>>>>>>>>>>>>>>>> -->
      <!-- List Berita/Artikel -->
      <!-- <<<<<<<<<<<<<<<<<<< -->
      <div class="card card-center">
        <span class="card-nav">BERITA</span>
        <span class="card-title">Baca Artikel Terbaru Dari Kami</span>
      </div>
      <div class="news-container">
        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hasil => $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              
        
        <div class="card card-news">
          <!-- Thumbnail Berita/Artikel -->
          <img src="/images/thumbnail/<?php echo e($article->thumbnail); ?>" alt="thumbnailberita" class="news" />
          <div class="news-content">
            <!-- Judul Artikel -->
            <span class="card-title"><?php echo e($article->title); ?></span>
            <!-- Ringkasan Isi/Cuplikan Isi -->
            <?php if($article->category->name != null): ?>
            <p><?php echo e($article->category->name); ?></p>
            <?php else: ?>
            <p></p>
            <?php endif; ?>
            <a href="post.html">BACA SELENGKAPNYA</a>
          </div>
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('blog.showarticle')); ?>" class="button button-1 button-orange"
          >Lihat Semua Berita</a>
      </div>
    </div>

    <!-- SEVENTH SECTION -->
    <div class="about-us" style="background-image: url('blog/img/slide1.jpg')">
      <div class="splash">
        <div class="card card-text-white">
          <span class="card-nav">TENTANG KAMI</span>
          <span class="card-title">kmjtrans</span>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in
            aliquet nunc, vitae cursus orci. Lorem ipsum dolor sit amet,
            consectetur adipiscing elit. Aenean laoreet eleifend dolor ultrices
            scelerisque. Curabitur scelerisque molestie massa in tempor. Morbi
            vestibulum neque ut vulputate semper.
          </p>
        </div>
      </div>
      
    </div>

    <!-- OUR TEAM -->
    <div class="our-team section section-blue section-wider">
      <div class="grid col col-2 grid-res">
        <!-- >>>>>>>>>>> -->
        <!-- Anggota KMJ -->
        <!-- <<<<<<<<<<< -->
        <div class="card card-text-white">
          <span class="card-nav">TEAM</span>
          <span class="card-title">Anggota Team</span>
        </div>
        <div>
          <!-- Copas Loop From Here -->
          <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              
          <div class="team-card">
            <!-- Foto Profil -->
            <img src="/images/team/<?php echo e($team->image); ?>" alt="" />
            <div>
              <!-- Nama Orang -->
              <span id="name"><?php echo e($team->name); ?></span>
              <!-- Title/Jabatan -->
              <span id="title"><?php echo e($team->jabatan); ?></span>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <!-- Copas Loop From Here -->
        </div>
      </div>
    </div>

    <!-- EIGHTH SECTION -->
    <div class="footer">
      <div class="footer-content">
        <ul>
          <li id="title">Link</li>
          <li><a href="<?php echo e(route('blog.index')); ?>">Home</a></li>
          <li><a href="<?php echo e(route('blog.contactus')); ?>">Hubungi Kami</a></li>
        </ul>
        <ul>
          <li id="title">Auth</li>
          <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
          
        </ul>
        <ul>
          <li id="title">Blog</li>
          <li><a href="<?php echo e(route('blog.showarticle')); ?>">Berita Terbaru</a></li>
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

  <!-- JAVASCRIPT IMPORT (DON'T MIND ABOUT THIS) -->
  <script src="<?php echo e(asset('blog/js/kmj.js')); ?>"></script>
  <script src="<?php echo e(asset('blog/src/splidejs/dist/js/splide.min.js')); ?>"></script>
  <script src="<?php echo e(asset('blog/js/splide.js')); ?>"></script>
</html>
<?php /**PATH F:\Kerjaan\BOIS\Project\KMJTRANS\LogisticApp\resources\views/blog/index.blade.php ENDPATH**/ ?>