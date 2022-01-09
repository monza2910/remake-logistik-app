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

    @include('blog.layout.header')

    <!-- SLIDER -->
    <div class="splide">
      <div class="splide__track">
        <ul class="splide__list">
            @foreach ($sliders as $slider)   
                <li class="splide__slide">
                    <!-- ========================== -->
                    <!-- !!!!!!!!!!!!!!!!!!!!!!!!!! -->
                    <img id="splide__image" src="{{$slider->image}}" alt="sliderbackground" />
                    <div class="splide__content">
                    <span>{{$slider->title_one }}</span>
                    <h1>{{$slider->title_two}}</h1>
                    <p>
                        {{$slider->description}}
                        
                    </p>
                    </div>
                    <!-- !!!!!!!!!!!!!!!!!!!!!!!!!! -->
                    <!-- ========================== -->
                </li>
          @endforeach
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
            <form action="{{route('blog.index')}}" method="get" >
              @csrf
              <div class="grid col col-2 grid-res">
                <div class="card card-white">
                  <div class="card-inline">
                    <i class="fi fi-map-marker-alt"></i>
                    <span>Lokasi Awal</span>
                  </div>
                  <p>Pilih lokasi penjemputan barang yang akan dikirim</p>
                  <div class="custom-select">
                    <select name="origin">
                      <option value="" selected>Pilih</option>

                      @foreach ($origins as $origin)
                      <option value="{{$origin->id}}">{{$origin->province.', '.$origin->city.', '.$origin->subdistrict}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="card card-white">
                  <div class="card-inline">
                    <i class="fi fi-navigate"></i>
                    <span>Lokasi Tujuan</span>
                  </div>
                  <p>Barang yang dijemput akan dikirimkan ke lokasi ini</p>
                  <div class="custom-select">
                    <select name="destination">
                      <option value="" selected>Pilih</option>
                      @foreach ($destinations as $destination)
                      <option value="{{$destination->id}}">{{$destination->province.', '.$destination->city.', '.$destination->subdistrict}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>

              <div class="grid col col-2 grid-res">
                <div class="card card-white">
                  <div class="card-inline">
                    <i class="fi fi-shopping-basket"></i>
                    <span>Berat Barang</span>
                  </div>
                  <p>Berat/Weight dari barang yang akan dikirimkan</p>
                  <!-- Input Masukkan Berat -->
                  <input type="number" name="berat" placeholder="Masukkan Berat (kg)" />
                  <!-- Input Masukkan Berat -->
                </div>
                <div class="card card-white">
                  <div class="card-inline">
                    <i class="fi fi-shopping-basket"></i>
                    <span>Satuan Berat</span>
                  </div>
                  <p>Pilih satuan berat barang yang akan dikirim</p>
                  <div class="custom-select">
                    <select name="satuan">
                      <option value="" selected>Pilih</option>
                      <option value="ton">Ton</option>
                      <option value="kg">Kg</option>
                    </select>
                  </div>
                </div>
              </div>
              <button id="centered" type="submit">Cek Estimasi Biaya</button>
            </form>

            <!-- Hasil Dari Cek Estimasi Harga -->
            @if (!empty($estimations))
            @foreach ($estimations as $est)
            <div id="priceTab" class="result">
              <div class="result-price">
                <div>
                  <span id="from">{{$est->origin->province.', '.$est->origin->city.', '.$est->origin->subdistrict}}</span>
                  <span id="to">{{$est->destination->province.', '.$est->destination->city.', '.$est->destination->subdistrict}}</span>
                  <span id="weight">{{$berat}}kg</span>
                </div>
                <div>
                  @if ($satuan == 'kg')
                    @if ($est->variantservice->variant_service == "Reguler")
                      @if ($berat > 50)
                        <span id="reguler">{{$berat*$est->above_terms}}</span>
                      @else
                        <span id="reguler">{{$berat*$est->under_terms}}</span>
                      @endif
                    @else
                      @if ($berat > 50)
                        <span id="express">{{$berat*$est->above_terms}}</span> 
                      @else
                        <span id="express">{{$berat*$est->under_terms}}</span> 
                          
                      @endif
                    @endif
                  @elseif($satuan =='ton')
                    @if ($est->variantservice->variant_service == "Reguler")
                      @if ($berat >= 1 && $berat <= 5)
                        <span id="reguler">{{$berat*$est->one_ton}}</span>
                      @elseif($berat > 5 && $berat <10)
                        <span id="reguler">{{$berat*$est->five_ton}}</span>
                      @elseif($berat >= 10)
                        <span id="reguler">{{$berat*$est->ten_ton}}</span>
                      @endif
                    @else
                      @if ($berat >= 1 && $berat <= 5)
                        <span id="express">{{$berat*$est->one_ton}}</span>
                      @elseif($berat > 5 && $berat <10)
                        <span id="express">{{$berat*$est->five_ton}}</span>
                      @elseif($berat >= 10)
                        <span id="express">{{$berat*$est->ten_ton}}</span>
                      @endif
                    @endif
                  @endif
                  
                </div>
              </div>
            </div>
            @endforeach
            @else
              
            @endif
            
            <!-- Hasil Dari Cek Estimasi Harga -->
          </div>
        </div>
        <!-- >>>>>>>>>>> -->
        <!-- LACAK PAKET -->
        <!-- <<<<<<<<<<< -->
        <div id="Lacak" class="tabcontent" style="display: none">
          <form action="{{route('blog.index')}}" method="get">
            @csrf
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

          @if (!empty($transactions) )
          <div id="resultTab" class="result">
            <div class="result-header">
              <span id="name"> {{$transactions->penerima}} </span>
              <span id="id"> {{$transactions->tracking_number}} </span>
            </div>
            <div class="result-content">
              <div id="address">
                <span id="from">{{$transactions->alamat_pengirim}}</span>
                <span id="to">{{$transactions->alamat_penerima}}</span>
              </div>
                <div id="tracking">
                  <span>STATUS PENGIRIMAN</span>
                  @if (!empty($trackings))
                    @foreach ($trackings as $track)
                    <div class="list">
                      <div id="time">
                        <span id="hour">{{$track->created_at->format('H:i')}}</span>
                        <span id="date">{{$track->created_at->format('d M y')}}</span>
                      </div>
                      <div id="detail">
                        <p>{{$track->status." [". $track->location."]"}}</p>
                      </div>
                    </div>
                    @endforeach
    
                  @else
                      
                  @endif
                </div>
            </div>
          </div>


          @else
          
          @endif
           <!-- Hasil Dari Lacak Lokasi Barang -->
         
        </div>

        <!-- >>>>>> -->
        <!-- LOKASI -->
        <!-- <<<<<< -->
        <div id="Lokasi" class="tabcontent" style="display: none">
          <div class="grid col col-2 grid-res">
            @foreach ($locations as $location)
              <div class="card card-news">
                <!-- THUMBNAIL ARTIKEL -->
                <div class="mapouter">
                  <div class="gmap_canvas">
                    <iframe width="150" height="150" id="gmap_canvas" src="https://maps.google.com/maps?q={{$location->keyword}}&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://soap2day-to.com">365 days soap2day</a><br>
                    <style>.mapouter{position:relative;text-align:right;height:150px;width:150px;}</style>
                    <a href="https://www.embedgooglemap.net">google map on my website</a>
                    <style>.gmap_canvas {overflow:hidden;background:none!important;height:150px;width:150px;}</style>
                  </div>
                </div>
                <div class="news-content">
                    <!-- JUDUL ARTIKEL -->
                    <span class="card-title"></span>
                    <!-- RINGKASAN/ISI ARTIKEL -->
                    <a href="">{{$location->name}}</a>
                </div>
              </div>  
            @endforeach
          </div>
          {{-- {{$locations->links('blog.vendor.paginator')}} --}}
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
        <a href="{{route('blog.contactus')}}" class="button button-1 button-orange">Gabung</a>
      </div>
      <div class="image-flex flex flex-row">
          @foreach ($partners as $partner)
        
          <a href="{{$partner->website}}">
              <img src="/partners/{{$partner->image}}" alt="perusahaan" />
          </a>

          @endforeach
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
            @foreach ($testimonials as $testi)
                
            <li class="splide__slide">
                <div class="testy-grid">
                    <div>
                        <!-- Foto Orang -->
                  <img src="/testimonials/{{$testi->image}}" alt="fotocogan:v" />
                  <!-- Foto Orang -->
                </div>
                <div class="flex flex-left">
                    <!-- Quotenya -->
                    <p id="quote">
                        {{$testi->quote}}
                        
                    </p>
                    <div id="author" class="flex flex-left">
                        <!-- Nama Orangnya -->
                        <span class="bold">{{$testi->name}}</span>
                        <!-- Jabatan/Pekerjaan -->
                        <span>{{$testi->position .' '. $testi->company}} </span>
                    </div>
                </div>
                </div>
            </li>
            @endforeach
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
        @foreach ($articles as $hasil => $article)
              
        
        <div class="card card-news">
          <!-- Thumbnail Berita/Artikel -->
          <img src="{{$article->thumbnail}}" alt="thumbnailberita" class="news" />
          <div class="news-content">
            <!-- Judul Artikel -->
            <span class="card-title">{{$article->title}}</span>
            <!-- Ringkasan Isi/Cuplikan Isi -->
            @if ($article->category->name != null)
            <p>{{$article->category->name}}</p>
            @else
            <p></p>
            @endif
            <a href="{{route('blog.openarticle',$article->slug)}}">BACA SELENGKAPNYA</a>
          </div>
        </div>

        @endforeach
        <a href="{{route('blog.showarticle')}}" class="button button-1 button-orange"
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
            @foreach ($aboutus as $about)
              {{$about->content}}  
            @endforeach
          </p>
        </div>
      </div>
      {{-- <div class="image-sliding">
        <!-- Input Foto Galeri Perusahaan -->
        @foreach ($gallerys as $gallery)
          <img src="/images/gallery/{{$gallery->image}}" alt="" />
        @endforeach
      </div> --}}
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
          @foreach ($teams as $team)
              
          <div class="team-card">
            <!-- Foto Profil -->
            <img src="/images/team/{{$team->image}}" alt="" />
            <div>
              <!-- Nama Orang -->
              <span id="name">{{$team->name}}</span>
              <!-- Title/Jabatan -->
              <span id="title">{{$team->jabatan}}</span>
            </div>
          </div>
          @endforeach
          <!-- Copas Loop From Here -->
        </div>
      </div>
    </div>

    @include('blog.layout.footer')
  </body>

  <!-- JAVASCRIPT IMPORT (DON'T MIND ABOUT THIS) -->
  <script src="{{asset('blog/js/kmj.js')}}"></script>
  <script src="{{asset('blog/src/splidejs/dist/js/splide.min.js')}}"></script>
  <script src="{{asset('blog/js/splide.js')}}"></script>
</html>
