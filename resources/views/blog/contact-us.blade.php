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
            <li><a href="{{route('blog.contactus')}}">Contact Us</a></li>
          </ul>
          <a href="{{route('login')}}" id="right">Login</a>
        </div>
      </nav>

    <!-- ARTICLE HEADER -->
    <div class="section section-blue section-wider">
        <div class="grid col col-40-60 grid-res">
          <div class="card card-text-white grid-right-50">
            <span class="card-nav">HUBUNGI KAMI</span>
            <span class="card-title"
              >Hubungi kami melalui kontak di bawah atau isi form yang
              tertera</span
            >
            <div id="socmed">
              <a href="">
                <div class="flex flex-inline">
                  <i class="fi fi-instagram fi-circle"></i>
                  <span>@kmjtrans</span>
                </div>
              </a>
              <a href="">
                <div class="flex flex-inline">
                  <i class="fi fi-facebook fi-circle"></i>
                  <span>Karuni Maju Jaya Trans</span>
                </div>
              </a>
              <a href="">
                <div class="flex flex-inline">
                  <i class="fi fi-whatsapp fi-circle"></i>
                  <span>+6285-125-679-092</span>
                </div>
              </a>
            </div>
          </div>
          <div>
            <form action="{{route('blog.storecontactus')}}" method="POST" class="form">
                @csrf
                @if ($message = Session::get('success'))
                <div class="alert alert-success mx-4 my-4">
                    <p>{{ $message }}</p>
                </div>
                @elseif($message = session::get('deleted'))
                <div class="alert alert-danger mx-4 my-4">
                    <p>{{ $message }}</p>
                </div>
                @endif
              <div class="input-line">
                <span class="input-title">Nama</span>
                <input type="text" name="name" value="{{old('name')}}"/>
                @error('name')
                <small class="text-danger">{{$message}}</small>
                @enderror
              </div>
              <div class="input-line">
                <span class="input-title">E-Mail</span>
                <input type="text" name="email" value="{{old('email')}}"/>
                @error('email')
                <small class="text-danger">{{$message}}</small>
                @enderror
              </div>
              <div class="input-line">
                <span class="input-title">WA/Telp</span>
                <input type="text" name="phone" value="{{old('phone')}}"/>
                @error('phone')
                <small class="text-danger">{{$message}}</small>
                @enderror
              </div>
              <div class="input-line">
                <span class="input-title">Pesan</span>
                <textarea name="message" id="" cols="30" rows="10">{{old('message')}}</textarea>
                @error('message')
                <small class="text-danger">{{$message}}</small>
                @enderror
              </div>
              <p id="disclaimer">
                Informasi anda akan disimpan aman dan tidak akan disalah gunakan
              </p>
              <button type="submit">Kirim Pesan</button>
            </form>
          </div>
        </div>
      </div>

    <!-- FOOTER -->
    <div class="footer">
        <div class="footer-content">
          <ul>
            <li id="title">Link</li>
            <li><a href="{{route('blog.index')}}">Home</a></li>
            <li><a href="{{route('blog.contactus')}}">Hubungi Kami</a></li>
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
