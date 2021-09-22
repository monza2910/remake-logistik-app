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
          <li><a href="{{route('blog.showarticle')}}" >Artikel</a></li>
          <li><a href="{{route('blog.service')}} " id="active">Layanan</a></li>
          <li><a href="{{route('blog.gallery')}}" >Galeri</a></li>
        </ul>
        <a href="{{route('blog.contactus')}}" id="right">Contact Us</a>
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
            @foreach ($travels as $travel)
                
                <div class="card card-news">    
                <!-- THUMBNAIL LAYANAN -->
                <img src="/images/travels/{{$travel->thumbnail}}" alt="" class="news" />
                <div class="news-content">
                    <!-- JUDUL LAYANAN -->
                    <span class="card-title">{{$travel->name}}</span>
                    <!-- RINGKASAN/ISI LAYANAN -->
                    <p>{{$travel->variant.', Rp.'. $travel->price }}</p>
                    <a href="{{route('blog.opentravel',$travel->slug)}}">BACA SELENGKAPNYA</a>
                </div>
                </div>

            @endforeach

            </div>
            </div>

            <!-- SECTION JENIS LAYANAN 3 -->
            <div class="service-wrapper">
            <span class="service-wrapper-title">LAYANAN SEWA ARMADA</span>
            <div
                id="articles"
                class="news-container news-service-container section section-wider"
            >
            @foreach ($armadas as $armada)
                
                <div class="card card-news">    
                <!-- THUMBNAIL LAYANAN -->
                <img src="/images/armadas/{{$armada->thumbnail}}" alt="" class="news" />
                <div class="news-content">
                    <!-- JUDUL LAYANAN -->
                    <span class="card-title">{{$armada->name}}</span>
                    <!-- RINGKASAN/ISI LAYANAN -->
                    <p>{{$armada->variant.', Rp.'. $armada->price }}</p>
                    <a href="{{route('blog.armada',$armada->slug)}}">BACA SELENGKAPNYA</a>
                </div>
                </div>

            @endforeach
            </div>
            </div>

            <!-- PAGE BUTTON -->
            <!-- <div class="page-button">
            <a href=""><i class="fi fi-angle-left"></i></a>
            <span>1/5</span>
            <a href=""><i class="fi fi-angle-right"></i></a>
            </div> -->
        </div>


    @include('blog.layout.footer')
</body>
<!-- JAVASCRIP IMPORT (DON'T MIND ABOUT THIS) -->
<script src="{{asset('blog/js/kmj.js')}}"></script>
<script src="{{asset('blog/src/splidejs/dist/js/splide.min.js')}}"></script>
</html>