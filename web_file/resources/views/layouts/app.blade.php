<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    @yield('meta')

    <!-- <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon"> -->
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
    <script src="{{asset('js/crawler.js')}}"></script>
    


      
 
      <title>TheYeon Cambodia</title>

  </head>
  <body style="font-size: 0.9rem">

    @php
      // echo \Request::route()->getName();
      // echo "<br>";
    @endphp

    <!-- nav bar -->
    <!-- <div style="margin-top: 2px;padding-right: 10px;position: absolute; left: 95%;" class="float-right pt-3"> -->
       <!-- <div style="width:100px;
            height:auto;
            
            color:#FFF;
            padding:5px 2px;
            text-align:center;
            top:0;
            position:absolute;
            right:0;">

        
        <a href="{{route('translate.show','EN')}}"><span class="@if(session()->get('LANG')=='EN') lang_active @endif   flag-icon flag-icon-gb mr-1 h4" style=""></span></a> 
        <a href="{{route('translate.show','TH')}}"><span class="@if(session()->get('LANG')=='TH') lang_active @endif flag-icon flag-icon-th mr-1 h4" style=""></span></a> 
        
       
      </div> -->
    <div style="clear:both;"> </div>
    <section class="" style="">
      <!-- <div style=" margin-top: 2px;margin-right:5px;z-index: 10000" class="float-right"> -->
        
         
      @php
        //echo Config::get('mysiteVars.welcome.'. session()->get('LANG'));
      @endphp
      

      
     

        <nav class="navbar navbar-expand-lg navbar-light bg-header" id="header" >
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
                                     <a href="{{route('category.show', $cate->cateId)}}">{{$cate->cateName}}</a>
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
                <a class="nav-link"   href="{{route('rooms.index')}}">ប្រវត្តិ Branh</a>
              </li>
                <li class="nav-item {{ (\Request::route()->getName()=='service.index' ? 'active' : '') }}">
                <a class="nav-link" href="{{route('service.index')}}">កំណត់ចំណាំ</a>
              </li>
            </li>
                <li class="nav-item {{ (\Request::route()->getName()=='gallery.index' ? 'active' : '') }}">
                <a class="nav-link" href="{{route('gallery.index')}}">សំណួរចំលើយ</a>
              </li>
            
               <li class="nav-item {{ (\Request::route()->getName()=='contact.index' ? 'active' : '') }}">
                <a class="nav-link" href="{{route('contact.index')}}">ទំនាក់ទំនង</a>
              </li>
            
            </ul>
            
          </div>

    </nav>
</section>

    <!-- end of navbar -->
@yield('content')


   

<!-- footer -->
<div class="wrapper">

<div class="container-fluid">
    <footer class="pt-2 pb-2" style="font-size:.75rem;">
      
      <hr>
        <div class="row">
        
          <div class="col-12 col-sm-12 col-md-7">
              <h6 class="font-weight-bold">
              COMPANY INFO
              </h6>
              <p class="pt-2">
                
                <span> COMPANY: THEYEON　CEO: KANG YOUNG AE　PHONE: 82-70-4266-2288　</span>
                <span>E-MAIL: theyeonglobal@theyeon.net ADDRESS: 608, 6F, SK V1 Center Bldg, 171, Gasan digital 1-ro, Geumcheon-gu, Seoul, Korea</span>

                E-COMMERCE PERMIT: 2013-SeoulJongno-0478　BUSINESS REGISTRATION NO: 264-81-02289 [BUSINESS INFORMATION]
              </p>
          </div>

          <div class="col-12 col-sm-12 col-md-5 pl-4" style="font-size:.75rem;">
              <h6 class="font-weight-bold">
              Customer Service
              </h6>
              <p class="pt-2">
                82-70-4266-2288
                MON-FRI 10:00-18:00 ( KOREAN TIME )
                SAT SUN HOLIDAY CLOSED
              </p>
          </div>

        </div>
          <hr>
          <div class="row">
            <div data-toggle="tooltip" data-placement="top" class="col text-center" title="Developed by MAKTA IT Group [Prem Phalin(+855 98920094), Yem Viroth (+855 69566295)">
                <p class="float-left pt-2">COPYRIGHT © THEYEON CAMBODIA ALL RIGHTS RESERVED.</p>
              </div>
        </div>
      
    </footer>
<!-- end footer -->
</div>



@yield('script')

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
});
</script>

<script>
// When the user scrolls down 50px from the top of the document, resize the header's font size
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 20) {
    document.getElementById("header").style.opacity = "80%";
  } else {
    document.getElementById("header").style.opacity = "100%";
  }
}
</script>

  </body>
</html>