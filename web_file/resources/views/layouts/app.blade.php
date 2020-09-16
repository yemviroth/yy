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
    <link rel="stylesheet" href="{{asset('css/bootstrap-grid.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('fontawesome-free-5.12.0-web/css/all.min.css')}}  ">
    <link rel="stylesheet" href="{{asset('owlcarousel/owl.carousel.min.css')}} ">
<link rel="stylesheet" href="{{asset('owlcarousel/owl.theme.default.min.css')}}">

  <link rel="stylesheet" href="{{asset('js/simple-lightbox.min.css')}}">

  <link rel="stylesheet" href="{{ asset('style.css')}}">
  <!-- <link rel="stylesheet" href="{{ asset('css/sidebarNavigation.css')}}"> -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css">


    <!-- test side nav -->
    <link rel="stylesheet" href="{{ asset('style3.css')}}">
   
    <!-- nav -->
    
    <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('js/jquery-3.4.1.slim.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js') }}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <!-- <script src="{{asset('js/sidebarNavigation.js')}}"></script> -->

    <script src="{{asset('owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/crawler.js')}}"></script>
    


      
 
      <title>TheYeon Cambodia</title>

  </head>
  <body style="font-size: 0.9rem">

    @php
      // echo \Request::route()->getName();
      // echo "<br>";
    @endphp

   
   
   
    <section>
   

      <!-- sid nav -->
      
      <nav id="sidebar">
            <div id="dismiss">
            <i class="fas fa-times fa-2x"></i>
            </div>

            <div class="sidebar-header">
                <h3>The Yeon Cambodia</h3>
            </div>
            <div class="form-group p-4">
            <input type="text" class="form-control" placeholder="ស្វែងរក">
            </div>
            <hr>
            <ul class="li-block"">
                  @foreach($cates as $cate)
                    <li class="w-50"><a href="">{{$cate->cateName}}</a></li>
                  @endforeach
                </ul>

            <ul class="nav nav-pills mb-1 p-4" id="pills-tab" role="tablist">
              <li class="nav-item" style="width:50%">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">ផលិតផល</a>
              </li>
              <li class="nav-item" style="width:50%">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
              </li>
              
            </ul>
            <div class="tab-content pl-4" id="pills-tabContent">
              <div class="tab-pane show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <ul class="nav  nav-stacked" style="display:block;">
                  @foreach($cates as $cate)
                    <li><a href="">{{$cate->cateName}}</a></li>
                  @endforeach
                </ul>
              </div>
              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
              
            </div>

            <ul class="list-unstyled components">
                <p>Dummy Heading</p>

                <li class="{{ (\Request::route()->getName()=='home.index' ? 'active' : '') }}">             
                      <a class="" data-toggle="collapse" aria-expanded="false" href="#homeSubmenu">ផលិតផល</a>   

                      <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul>
                </li>

                    
                    
                <li>
                    <a href="#">About</a>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Pages</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Portfolio</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
                </li>
                <li>
                    <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
                </li>
            </ul>
        </nav>

      
      <!-- end side nav -->
     
<!-- nav me  -->
<nav class="navbar navbar-expand-lg navbar-light bg-header" id="header" >

    
    
           <!-- style="background-color: #d8d8d8;" --><!--  -->
           <button type="button" id="sidebarCollapse" class="btn d-inline-block d-lg-none navbar-left">
           <i class="fas fa-align-justify"></i>
                        
              </button>
               <a class="navbar-brand" href="{{route('home.index')}}"><span class="header-text" style="color:#057374; overflow: hidden;"><img src="{{asset('images')}}/logo.png"></span></a>
            
           
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
               <li class="nav-item"> 
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

            

            
              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
              </form>
      
         

          

            
          
      
    </nav>
<!-- end nav me -->
     
</section>

    <!-- end of navbar -->

    <div class="overlay"></div>
    <div class=""></div>
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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            // $("#sidebar").mCustomScrollbar({
            //     theme: ""
            // });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('.wrapper').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>



  </body>
</html>