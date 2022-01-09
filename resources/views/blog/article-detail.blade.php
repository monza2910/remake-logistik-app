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
    <nav id="nav" class="navbar sticky">
      <div id="sidebar">
        <a id="openBtn"><span></span></a>
        <ul>
          <li><a id="closeBtn">X</a></li>
          <li><a href="{{route('blog.index')}}">Home</a></li>
          <li><a href="{{route('blog.showarticle')}}"  id="active">Artikel</a></li>
          <li><a href="{{route('blog.service')}}">Layanan</a></li>
          <li><a href="{{route('blog.gallery')}}">Galeri</a></li>
        </ul>
        <a href="{{route('blog.contactus')}}" id="right">Contact Us</a>
      </div>
    </nav>

    @foreach ($articles as $article)
        
    
    <!-- ARTICLE HEADER -->
    <div class="article-header">
      <img src="{{$article->thumbnail}}" alt="" />
      <div class="article-content">
        <span class="date">{{$article->created_at->format('d M Y')}}</span>
        <h1>{{$article->title}}</h1>
      </div>
    </div>

    <!-- ARTICLE TEXT -->
    <div class="article-text">
      {!! $article->content !!}
    </div>
    @endforeach
    <!-- ANOTHER LIST -->
    <div class="article-lists section section-wider">
      <h3>ARTIKEL LAIN</h3>
      <!-- NEWS LISTS -->
      <div class="news-container">
        <!-- News Card From Here -->
        @foreach ($listarticles as $list)
            
        <div class="card card-news">
          <img src="{{$list->thumbnail}}" alt="thumbnailArtikel" class="news" />
          <div class="news-content">
            <span class="card-title">{{$list->title}}</span>
            <p>{{$list->category->name}}</p>
            <a href="{{route('blog.openarticle',$list->slug)}}">BACA SELENGKAPNYA</a>
          </div>
        </div>
        @endforeach
        <!-- News Unto From Here -->
      </div>

      <!-- ADD COMMENT -->
      {{-- <div class="grid col col-40-60 grid-res">
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
      </div> --}}
    </div>

    <!-- COMMENT LISTS -->
    {{-- <div class="comment-lists"> --}}
      {{-- <h2>Komentar</h2>

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
      <!-- COMMENT CARD for replying --> --}}
    {{-- </div> --}}

    <!-- FOOTER -->
    @include('blog.layout.footer')
  </body>

  <!-- JAVASCRIP IMPORT (DON'T MIND ABOUT THIS) -->
  <script src="{{asset('blog/js/kmj.js')}}"></script>
</html>
