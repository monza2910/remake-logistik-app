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
          @if (empty(auth::user()))
          <a href="{{route('login')}}" id="right">Login</a>
          @else
          <form action="{{ route('logout') }}" method="POST" id="right">
            @csrf
            <button type="submit" >Logout</button>
        </form>
          @endif
        </div>
      </nav>