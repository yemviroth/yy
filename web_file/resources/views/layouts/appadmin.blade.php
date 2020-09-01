<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fontawesome-free-5.12.0-web/css/all.css')}}  ">
    <link rel="stylesheet" href="{{asset('owlcarousel/owl.carousel.min.css')}} ">
<link rel="stylesheet" href="{{asset('owlcarousel/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{ asset('style.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css">
    
    <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('js/jquery-3.4.1.slim.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js') }}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <script src="{{asset('owlcarousel/owl.carousel.min.js')}}"></script>
    

    <title>
      
      @yield('title')

    </title>
  </head>
  <body>

    @php
      // echo \Request::route()->getName();
      // echo "<br>";
    @endphp

    <!-- nav bar -->
    
    <section class="text-center bg-header" style=""><img  src="{{asset('images/logo.png')}}" class="p-3" >
            
    <nav class="navbar navbar-expand-lg navbar-light bg-header" >
           <!-- style="background-color: #d8d8d8;" --><!--  -->
            
               
            
           
        
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
          
          
            
            <div class="collapse navbar-collapse justify-content-end nav-me" id="navbarSupportedContent">
            <ul class="navbar-nav ">
            
              <li class="nav-item {{ (\Request::route()->getName()=='home.index' ? 'active' : '') }}">
                <a class="nav-link" target="_blank" href="{{route('home.index')}}">HOME <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item {{ (\Request::route()->getName()=='rooms.main' ? 'active' : '') }}">
                <a class="nav-link" href="{{route('rooms.main')}}">ROOM MAIN</a>

                <li class="nav-item {{ (\Request::route()->getName()=='rooms.list' ? 'active' : '') }}">
                <a class="nav-link" href="{{route('rooms.list')}}">ROOM LIST</a>
              </li>
            
               <li class="nav-item {{ (\Request::route()->getName()=='rooms.detail.list' ? 'active' : '') }}">
                <a class="nav-link" href="{{route('rooms.detail.list')}}">ROOM DETAIL</a>
              </li>

              <li class="nav-item {{ (\Request::route()->getName()=='user.index' ? 'active' : '') }}">
                <a class="nav-link" href="{{route('user.index')}}">USER</a>
              </li>
            
            </ul>
            
          </div>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>

    </nav>
</section>

    <!-- end of navbar -->
@yield('content')




@yield('script')



  </body>
</html>