<!-- EIGHTH SECTION -->
<div class="footer">
    <div class="footer-content">
      <ul>
        <li id="title">Link</li>
        <li><a href="{{route('blog.index')}}">Home</a></li>
      </ul>
      <ul>
        <li id="title">Contact</li>
        <li><a href="{{route('blog.contactus')}}">Hubungi Kami</a></li>
      </ul>
      <ul>
        <li id="title">Blog</li>
        <li><a href="{{route('blog.showarticle')}}">Berita Terbaru</a></li>
      </ul>
      <ul id="address">
        <li class="flex flex-inline flex-inline-top">
          <i class="fi fi-map-marker-alt fi-circle-small fi-circle-blue"></i>
          @foreach ($mainaddress as $address)
          <p>
            {{$address->content}}
          </p>
          @endforeach
        </li>
      </ul>
    </div>

    <div class="footer-foot" class="flex flex-inline">
      <span>2021 KMJ Trans & Logistic</span>
      @foreach ($logos as $logo)
      <img src="/assets/logo/{{$logo->image}}" alt="logoKMJ" />
      @endforeach
    </div>
  </div>