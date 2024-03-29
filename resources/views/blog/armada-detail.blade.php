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
          <li><a href="{{route('blog.showarticle')}}" >Artikel</a></li>
          <li><a href="{{route('blog.service')}}"  id="active">Layanan</a></li>
          <li><a href="{{route('blog.gallery')}}">Galeri</a></li>
        </ul>
        <a href="{{route('blog.contactus')}}" id="right">Contact Us</a>
      </div>
    </nav>

    @foreach ($armadas as $armada)
        
    
    <!-- ARTICLE HEADER -->
    <div class="article-header">
      <img
        src="/images/armadas/{{$armada->thumbnail}}"
        alt=""
      />
      <div class="article-content article-content-center">
        <h1>{{$armada->name}}</h1>
        <h4>{{$armada->origin->city .' - '. $armada->destination->city}} </h4>
        <h4>{{$armada->variant .' (Rp. '. number_format($armada->price).')'}}</h4>
      </div>
    </div>

    <!-- ARTICLE TEXT -->
    <div class="article-text">
      <div>
        {!! $armada->content !!}


        <br>
        <p><strong>Fasilitas Yang Didapatkan :</strong></p>
        @foreach ($armada->facilitys as $fasilitas)
        <p>- {{$fasilitas->name}}</p>
        @endforeach
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
    
    @endforeach

    @if ($listarmada->isEmpty())
    @else
        
    <!-- ANOTHER LIST -->
    <div class="article-lists section section-wider">
      <h3>Layanan Lain</h3>
      <!-- NEWS LISTS -->
      
      <div class="news-container news-service-container">
        <!-- News Card From Here -->
        @foreach ($listarmada as $ltarmada)
        <div class="card card-news">    
          <!-- THUMBNAIL LAYANAN -->
          <img src="/images/armadas/{{$ltarmada->thumbnail}}" alt="" class="news" />
          <div class="news-content">
              <!-- JUDUL LAYANAN -->
              <span class="card-title">{{$ltarmada->name}}</span>
              <!-- RINGKASAN/ISI LAYANAN -->
              <p>{{$ltarmada->variant.', Rp.'. $ltarmada->price }}</p>
              <a href="{{route('blog.opentravel',$ltarmada->slug)}}">BACA SELENGKAPNYA</a>
          </div>
        </div>
      @endforeach
  
        <!-- News Unto From Here -->
      </div>
    </div>
    @endif

    <!-- FOOTER -->
    @include('blog.layout.footer')
  </body>

  <!-- JAVASCRIP IMPORT (DON'T MIND ABOUT THIS) -->
  <script src="{{asset('blog/js/kmj.js')}}"></script>
</html>
