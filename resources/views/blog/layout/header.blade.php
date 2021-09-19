    <!-- NAVBAR -->
    <nav id="nav" class="navbar">
        <div id="sidebar">
          <a id="openBtn"><span></span></a>
          <ul>
            <li><a id="closeBtn">X</a></li>
            <li><a href="{{route('blog.index')}}" id="active">Home</a></li>
            <li><a href="{{route('blog.showarticle')}}">Artikel</a></li>
            <li><a href="{{route('blog.service')}}">Layanan</a></li>
            <li><a href="{{route('blog.gallery')}}" >Galeri</a></li>
          </ul>
          <a href="{{route('blog.contactus')}}" id="right">Contact Us</a>
          
        </div>
      </nav>