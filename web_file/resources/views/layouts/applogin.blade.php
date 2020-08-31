<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <meta content='http://tropicanacasinopoipet.com/' property='og:url'/>
    <meta content='Tropicana Casino Poipet' property='og:title'/>    
    <meta content='Tropicana Casino Poipet : A great place that offers a variety of excitment entertainment and excelent service for everyone' name='description'/>

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
    
    <section class="text-center bg-header" style="">
      <div style=" margin-top: 2px;margin-right:5px;z-index: 10000" class="float-right">
        
        <a href="{{route('translate.show','EN')}}"><span class="@if(session()->get('LANG')=='EN') lang_active @endif   flag-icon flag-icon-gb mr-1"></span></a> 
        <a href="{{route('translate.show','TH')}}"><span class="@if(session()->get('LANG')=='TH') lang_active @endif flag-icon flag-icon-th mr-1"></span></a> 
        
       
      </div>
      <img  src="{{asset('images/logo.png')}}" class="p-3" >
      
      @php
        //echo Config::get('mysiteVars.welcome.'. session()->get('LANG'));
      @endphp
      

      
     

        <nav class="navbar navbar-expand-lg navbar-light bg-header" >
           <!-- style="background-color: #d8d8d8;" --><!--  -->
            
               <a class="navbar-brand" href="{{route('home.index')}}"><span class="header-text" style="color:#057374; overflow: hidden;">TROPICANA RESORT & CASINO</span></a>
            
           
        
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
          
          
            
            <div class="collapse navbar-collapse justify-content-end nav-me" id="navbarSupportedContent">
            <ul class="navbar-nav ">
            
              <li class="nav-item {{ (\Request::route()->getName()=='home.index' ? 'active' : '') }}">
                <a class="nav-link" href="{{route('home.index')}}">{{Config::get('mysiteVars.menu_home.'. session()->get('LANG'))}} <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item {{ (\Request::route()->getName()=='about.index' ? 'active' : '') }}">
                <a class="nav-link" href="{{route('about.index')}}">{{Config::get('mysiteVars.menu_about_us.'. session()->get('LANG'))}}</a>
              </li>
               <li class="nav-item 
                  @php
                      // if (\Request::route()->getName();) {
                      //   echo 'active';
                      // }else {
                      //   echo '';
                      // }

                      if (request()->is('rooms') || request()->is('rooms/*')) {
                        echo 'active';
                     } else{
                      echo '';
                     }
                  @endphp
                 
                
                
                ">
                <a class="nav-link"   href="{{route('rooms.index')}}">{{Config::get('mysiteVars.menu_rooms.'. session()->get('LANG'))}}</a>
              </li>
                <li class="nav-item {{ (\Request::route()->getName()=='service.index' ? 'active' : '') }}">
                <a class="nav-link" href="{{route('service.index')}}">{{Config::get('mysiteVars.menu_services.'. session()->get('LANG'))}}</a>
              </li>
            
               <li class="nav-item {{ (\Request::route()->getName()=='contact.index' ? 'active' : '') }}">
                <a class="nav-link" href="{{route('contact.index')}}">{{Config::get('mysiteVars.menu_contact_us.'. session()->get('LANG'))}}</a>
              </li>
            
            </ul>
            
          </div>

    </nav>
</section>

    <!-- end of navbar -->
@yield('content')





@yield('script')



  </body>
</html>