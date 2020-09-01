<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    @yield('meta')

    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Bayon|Francois+One' rel='stylesheet' type='text/css'>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fontawesome-free-5.12.0-web/css/all.min.css')}}  ">
    <link rel="stylesheet" href="{{asset('owlcarousel/owl.carousel.min.css')}} ">
<link rel="stylesheet" href="{{asset('owlcarousel/owl.theme.default.min.css')}}">

  <link rel="stylesheet" href="{{asset('js/simple-lightbox.min.css')}}">

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
  <body style="font-size: 0.9rem">

    @php
      // echo \Request::route()->getName();
      // echo "<br>";
    @endphp

    <!-- nav bar -->
    <!-- <div style="margin-top: 2px;padding-right: 10px;position: absolute; left: 95%;" class="float-right pt-3"> -->
       <div style="width:100px;
            height:auto;
            
            color:#FFF;
            padding:5px 2px;
            text-align:center;
            top:0;
            position:absolute;
            right:0;">

        
        <a href="{{route('translate.show','EN')}}"><span class="@if(session()->get('LANG')=='EN') lang_active @endif   flag-icon flag-icon-gb mr-1 h4" style=""></span></a> 
        <a href="{{route('translate.show','TH')}}"><span class="@if(session()->get('LANG')=='TH') lang_active @endif flag-icon flag-icon-th mr-1 h4" style=""></span></a> 
        
       
      </div>
    <div style="clear:both;"> </div>
    <section class="" style="">
      <!-- <div style=" margin-top: 2px;margin-right:5px;z-index: 10000" class="float-right"> -->
        
         
      @php
        //echo Config::get('mysiteVars.welcome.'. session()->get('LANG'));
      @endphp
      

      
     

        <nav class="navbar navbar-expand-lg navbar-light bg-header" >
           <!-- style="background-color: #d8d8d8;" --><!--  -->
            
               <a class="navbar-brand" href="{{route('home.index')}}"><span class="header-text" style="color:#057374; overflow: hidden;"><img src="https://theyeon.net/web/upload/webdesignu/logo.png"></span></a>
            
           
        
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
          
          
            
            <div class="collapse navbar-collapse  nav-me" style="padding-top:2rem;padding-bottom:0.7rem;color:#0000;" id="navbarSupportedContent">
            <ul class="navbar-nav ">
            
              <li class="nav-item {{ (\Request::route()->getName()=='home.index' ? 'active' : '') }}">
                <div class="dropdown">
                      <a class="nav-link" href="{{route('home.index')}}">ផលិតផល <span class="sr-only">(current)</span></a>
                            <div class="dropdown-content">
                                  @foreach ($cates as $cate)
                                     <a href="#">{{$cate->cateName}}</a>
                                  @endforeach
                                
                                </div>
                </div>
              </li>
              <li class="nav-item {{ (\Request::route()->getName()=='about.index' ? 'active' : '') }}">
                <a class="nav-link" href="{{route('about.index')}}">អំពីយើង</a>
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
            </li>
                <li class="nav-item {{ (\Request::route()->getName()=='gallery.index' ? 'active' : '') }}">
                <a class="nav-link" href="{{route('gallery.index')}}">{{Config::get('mysiteVars.menu_gallerys.'. session()->get('LANG'))}}</a>
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


   

<!-- footer -->
<footer class="pl-5 pr-5 pt-2 pb-2" style=" background: #d8d8d8;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
        <h4 class="title"  style="font-size:16px;">TROPICANA RESORT & CASINO</h4>
        <h5 class="title-sm"  style="font-size:14px;"><b>{{Config::get('mysiteVars.service_spa_title.'. session()->get('LANG'))}} - {{Config::get('mysiteVars.service_restaurant_title.'. session()->get('LANG'))}} - {{Config::get('mysiteVars.service_gym_title.'. session()->get('LANG'))}}</b></h5>
        <p></p>
      </div>

      <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
          <div class="row text-left">
            <div class="col text-left quick-link"  style="font-size:16px;">
              <h4 class="title"  style="font-size:16px;"  >{{Config::get('mysiteVars.buttom_quick_link.'. session()->get('LANG'))}}</h4>
              <hr align="left" width="20%" style="background-color: #057374; height: 1px">
              <p><a href="{{route('rooms.index')}}">{{Config::get('mysiteVars.menu_rooms.'. session()->get('LANG'))}}</a></p>
              <!--
              <p><a href="{{route('spa.index')}}">{{Config::get('mysiteVars.service_spa_title.'. session()->get('LANG'))}}</a></p>
              <p><a href="{{route('gym.index')}}">{{Config::get('mysiteVars.service_gym_title.'. session()->get('LANG'))}}</a></p>
              <p><a href="{{route('restaurant.index')}}">{{Config::get('mysiteVars.service_restaurant_title.'. session()->get('LANG'))}}</a></p>
              -->
              <p><a href="{{route('service.index')}}">{{Config::get('mysiteVars.menu_services.'. session()->get('LANG'))}}</a></p>
              <p><a href="{{route('gallery.index')}}">{{Config::get('mysiteVars.menu_gallerys.'. session()->get('LANG'))}}</a></p>
              <p><a href="{{route('contact.index')}}">{{Config::get('mysiteVars.menu_contact_us.'. session()->get('LANG'))}}</a></p>
              <p><a href="{{route('about.index')}}">{{Config::get('mysiteVars.menu_about_us.'. session()->get('LANG'))}}</a></p>
              <p><a href="{{route('sitemap')}}">{{Config::get('mysiteVars.title_sitemap.'. session()->get('LANG'))}}</a></p>

            </div>
          </div>
      </div>
      <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
          <div class="row text-left">
            <div class="col text-left quick-link"  style="font-size:16px;">

              <h4 class="title"  style="font-size:16px;">{{Config::get('mysiteVars.buttom_get_in_touch.'. session()->get('LANG'))}}</h4>
              <hr align="left" width="20%" style="background-color: #057374; height: 1px">
              <p><i class="fas fa-map-marker-alt pr-2"></i>{{Config::get('mysiteVars.buttom_address.'. session()->get('LANG'))}}</p>
              <p><span class="flag-icon flag-icon-th mr-3"> </span> 081-996 4023</p>

              <p><span class="pr-5"> </span>  081-996 4032</p>
              <p><span class="pr-5"> </span>  081-996 4038</p>
              <p><span class="pr-5"> </span>  081-996 1546</p>
             
                         
              <p><span class="flag-icon flag-icon-kh mr-3"></span> (855) 012-808 203</span>

            </div>
          </div>
      </div>
    </div>
    <div class="row" style="border-top: 1px solid #ccc">
        <div data-toggle="tooltip" data-placement="top" class="col text-center" title="Developed by MAKTA IT Group [Prem Phalin(+855 98920094), Yem Viroth (+855 69566295)">
          <center><small>&copy; Copyright 2020, TROPICANA RESORT & CASINO</small></center>
          </div>
    </div>
  </div>
</footer>
<!-- end footer -->



@yield('script')

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
});
</script>



  </body>
</html>