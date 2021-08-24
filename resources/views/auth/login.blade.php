<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KMJ Trans & Logistic</title>
    <link rel="stylesheet" href="{{asset('blog/css/splide.css')}}" />
    <link rel="stylesheet" href="{{asset('blog/css/splide-theme.css')}}" />
    <link rel="stylesheet" href="{{asset('blog/css/kmj.css')}}" />
    <link rel="stylesheet" href="{{asset('blog/src/fontisto/css/fontisto/fontisto.css')}}" />
  </head>

  <body>
    <!-- NAVBAR -->
    <nav id="nav" class="navbar">
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

    <!-- SECTION -->
    <div id="auth" class="section section-blue section-wider flex flex-center">
        <div class="card card-text-white card-center">
          <span class="card-title">Login</span>
          <span class="card-nav">
            Dengan login anda akan mendapatkan kebebasan untuk mengakses beberapa
            fitur yang terkunci
          </span>
        </div>
  
        <!-- FORM LOGIN -->
        <form method="POST" action="{{ route('login') }}" class="form">
            @csrf
                <div class="input-line">
                    <span class="input-title">Username</span>
                    <input id="email" type="text"   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input-line">
                    <span class="input-title">Password</span>
                    <input type="password"  id="password" type="password"  name="password" required autocomplete="current-password"/>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
          <p id="disclaimer">
            Dengan masuk anda menyetujui Persyaratan Pengguna dan Kebijakan
            Privasi
          </p>
          <button type="submit">Masuk</button>
        </form>
        <!-- FORM LOGIN -->
  
        <span class="foot"
          >Belum punya akun? <a href="register.html">Daftar</a> sekarang</span
        >
      </div>

    <!-- EIGHTH SECTION -->
    <div class="footer">
      <div class="footer-content">
        <ul>
          <li id="title">Link</li>
          <li><a href="{{route('blog.index')}}">Home</a></li>
          <li><a href="{{route('blog.contactus')}}">Hubungi Kami</a></li>
        </ul>
        <ul>
          <li id="title">Auth</li>
          <li><a href="login.html">Login</a></li>
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

  <!-- JAVASCRIPT IMPORT (DON'T MIND ABOUT THIS) -->
  <script src="{{asset('blog/js/kmj.js')}}"></script>
  <script src="{{asset('blog/src/splidejs/dist/js/splide.min.js')}}"></script>
  <script src="{{asset('blog/js/splide.js')}}"></script>
</html>
