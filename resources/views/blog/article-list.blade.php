<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Latest News</title>
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
          <li><a href="{{route('blog.showarticle')}}" id="active">Artikel</a></li>
          <li><a href="service-lists.html">Layanan</a></li>
          <li><a href="{{route('blog.gallery')}}" >Galeri</a></li>
        </ul>
        <a href="{{route('blog.contactus')}}" id="right">Contact Us</a>
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
            @foreach ($categorys as $category)
              <li><a href="{{route('blog.category',$category->id)}}">{{$category->name}}</a></li>
            @endforeach
          </ul>
        </div>
        @foreach ($articles as $article)
            
        <div class="card card-news">
        <!-- THUMBNAIL ARTIKEL -->
        <img src="/images/thumbnail/{{$article->thumbnail}}" alt="" class="news" />
        <div class="news-content">
            <!-- JUDUL ARTIKEL -->
            <span class="card-title">{{$article->title}}</span>
            <!-- RINGKASAN/ISI ARTIKEL -->
            @if ($article->category->name != null)
            <p>{{$article->category->name}}</p>
            @else
            <p></p>
            @endif
            <a href="{{route('blog.openarticle',$article->slug)}}">BACA SELENGKAPNYA</a>
        </div>
        </div>  
        @endforeach
        
      </div>

      <!-- PAGE BUTTON -->

      <div class="page-button">
        <a href=""><i class="fi fi-angle-left"></i></a>
        <span>1/5</span>
        <a href=""><i class="fi fi-angle-right"></i></a>
      </div>
    </div>

    <!-- FOOTER -->
    @include('blog.layout.footer')
  </body>
  <!-- JAVASCRIP IMPORT (DON'T MIND ABOUT THIS) -->
  <script src="{{asset('blog/js/kmj.js')}}"></script>
  <script src="{{asset('blog/src/splidejs/dist/js/splide.min.js')}}"></script>
</html>