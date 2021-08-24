<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perluasan Daerah di Area Jawa Barat</title>
    <link rel="stylesheet" href="{{asset('blog/css/splide.css')}}" />
    <link rel="stylesheet" href="{{asset('blog/css/splide-theme.css')}}" />
    <link rel="stylesheet" href="{{asset('blog/css/kmj.css')}}" />
    <link rel="stylesheet" href="{{asset('blog/src/fontisto/css/fontisto/fontisto.css')}}" />
  </head>
  <body>
    <!-- NAVBAR -->
    <nav id="nav" class="navbar fixed">
        <div id="sidebar">
          <a id="openBtn"><span></span></a>
          <ul>
            <li><a id="closeBtn">X</a></li>
            <li><a href="{{route('blog.index')}}" id="active">Home</a></li>
            <li><a href="{{route('blog.showarticle')}}">Article</a></li>
            <li><a href="{{route('blog-contactus')}}">Contact Us</a></li>
          </ul>
          <a href="{{route('login')}}" id="right">Login</a>
        </div>
      </nav>

    <!-- ARTICLE HEADER -->
    <div class="article-header">
      <img src="img/slide1.jpg" alt="" />
      <div class="article-content">
        <span class="date">14 Agustus 2021</span>
        <h1>Perluasan Wilayah di Area Jawa Barat</h1>
      </div>
    </div>

    <!-- ARTICLE TEXT -->
    <div class="article-text">
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis
        pellentesque erat faucibus libero viverra consequat. Mauris a neque non
        massa faucibus pellentesque id eu neque. Vivamus vitae viverra massa, a
        molestie nibh. Fusce semper mauris lorem, vitae porttitor mi efficitur
        nec. Praesent venenatis, nisi vel mollis dictum, justo elit egestas
        nibh, id molestie lectus ante in dui. Aenean justo ante, finibus vel
        convallis vitae, egestas non erat. Mauris mi elit, varius eget ornare
        ac, placerat sit amet ligula. Fusce ut varius est, nec accumsan nisl.
        Curabitur porttitor luctus orci, eget pharetra ligula semper ac. Aliquam
        eleifend neque vel sapien sagittis blandit. Sed id vulputate nisi.
        Maecenas dignissim felis in augue laoreet lacinia. Vestibulum placerat,
        felis at consequat tincidunt, elit quam fringilla libero, eget aliquet
        est augue nec ligula. In nisi felis, fermentum eu nisi sit amet, luctus
        imperdiet ante. Praesent tempus, dolor a elementum placerat, est quam
        hendrerit nulla, non lobortis ex justo nec mauris. In in blandit neque.
        Nullam ut venenatis nibh. Integer euismod ligula semper, ultrices diam
        quis, aliquet nisi. Ut nunc arcu, facilisis ac lorem sed, volutpat
        tincidunt mauris. Curabitur ac tincidunt risus. Maecenas mi turpis,
        finibus id mauris vel, facilisis bibendum diam.
      </p>
    </div>

    <!-- ANOTHER LIST -->
    <div class="article-lists section section-wider">
      <h3>ARTIKEL LAIN</h3>
      <!-- NEWS LISTS -->
      <div class="news-container">
        <!-- News Card From Here -->
        <div class="card card-news">
          <img src="" alt="thumbnailArtikel" class="news" />
          <div class="news-content">
            <span class="card-title">Gerai Baru di Surabaya</span>
            <p>Lorem ipsum dolor sit amet</p>
            <a href="">BACA SELENGKAPNYA</a>
          </div>
        </div>
        <!-- News Unto From Here -->
      </div>

      <!-- ADD COMMENT -->
      <div class="grid col col-40-60 grid-res">
        <div class="card grid-right-50">
          <span class="card-nav">PERTANYAAN</span>
          <span class="card-title"
            >Punya pertanyaan seputar artikel/berita di atas?</span
          >
        </div>
        <form action="" class="comment-form">
          <textarea name="" placeholder="Tulis pendapatmu ..."></textarea>
          <button type="submit">Kirim Komentar</button>
        </form>
      </div>
    </div>

    <!-- COMMENT LISTS -->
    <div class="comment-lists">
      <h2>Komentar</h2>

      <!-- COMMENT CARD -->
      <div class="comment-card">
        <div class="comment-detail">
          <span class="name">rexothyst</span>
          <span class="date">15 Agustus 2021</span>
        </div>
        <p>Lorem ipsum dolor sit amet</p>
        <a href="" class="reply">Balas</a>
      </div>
      <!-- COMMENT CARD -->

      <!-- COMMENT CARD for replying -->
      <div class="comment-card comment-reply">
        <div class="comment-detail">
          <span class="name">Admin KMJ</span>
          <span class="date">15 Agustus 2021</span>
        </div>
        <p>Lorem ipsum dolor sit amet</p>
      </div>
      <!-- COMMENT CARD for replying -->
    </div>

    <!-- FOOTER -->
    <div class="footer">
        <div class="footer-content">
          <ul>
            <li id="title">Link</li>
            <li><a href="{{route('blog.index')}}">Home</a></li>
            <li><a href="contactus.html">Hubungi Kami</a></li>
          </ul>
          <ul>
            <li id="title">Auth</li>
            <li><a href="{{route('login')}}">Login</a></li>
            {{-- <li><a href="register.html">Register</a></li> --}}
          </ul>
          <ul>
            <li id="title">Blog</li>
            <li><a href="{{route('blog.showarticle')}}">Berita Terbaru</a></li>
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
  <script src="{{asset('blog/js/kmj.js')}}"></script>
</html>
