
  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>ZenBlog</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="/">Home</a></li>
          <li><a href="{{route('about')}}">About Us</a></li>
          <li class="dropdown"><a href="#"><span>Categories</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              @foreach ($categories as $category)
                <li><a href="{{route('category',$category->id)}}">{{$category->name}}</a></li>                  
              @endforeach
             
            </ul>
          </li>
          <li><a href="{{route('contact')}}">Contact Us</a></li>
        </ul>
      </nav><!-- .navbar -->
      <div class="posistion-relative d-flex align-middle justify-center mt-3">
        <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
        <i class="bi bi-list mobile-nav-toggle"></i>

        <!-- ======= Search Form ======= -->
        <div class="search-form-wrap js-search-form-wrap mt-5">
          <form action="search-result.html" class="search-form">
            <span class="icon bi-search"></span>
            <input type="text" placeholder="Search" class="form-control">
            <button class="btn js-search-close"><span class="bi-x"></span></button>
          </form>
        </div><!-- End Search Form -->
        @if (auth()->check())
        <div id="navbar" class="navbar" style="margin-top: -.6rem;">
          <ul>
            <li class="dropdown"><a href="#"><span>{{Auth::user()->name}}</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
              <ul>
                  <li><a href="{{route('dashboard')}}">Dashboard</a></li>                  
                  <li><a href="{{route('profile.edit')}}">Update Profile</a></li>                  
                  <li>
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf

                      <x-dropdown-link :href="route('logout')"
                              onclick="event.preventDefault();
                                          this.closest('form').submit();">
                          {{ __('Log Out') }}
                      </x-dropdown-link>
                  </form>
                  </li>                  
              </ul>
            </li>
           </ul>
        </div>
        @else
        <ul>
          <li style="list-style-type: none;"><a href="{{route('login')}}">Login</a></li> 
        </ul>
        @endif
      </div>

    </div>

  </header><!-- End Header -->