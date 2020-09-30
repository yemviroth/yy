<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=yes">

  @yield('meta')

  <!-- <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon"> -->
  <link href='https://fonts.googleapis.com/css?family=Bayon|Francois+One' rel='stylesheet' type='text/css'>
  <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('css/bootstrap-grid.css')}}">

  <!-- <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous"> -->


  <link rel="stylesheet" type="text/css" href="{{asset('fontawesome-free-5.12.0-web/css/all.min.css')}}  ">
  <link rel="stylesheet" href="{{asset('owlcarousel/owl.carousel.min.css')}} ">
  <link rel="stylesheet" href="{{asset('owlcarousel/owl.theme.default.min.css')}}">

  <link rel="stylesheet" href="{{asset('js/simple-lightbox.min.css')}}">

  <link rel="stylesheet" href="{{ asset('style.css')}}">
  <!-- <link rel="stylesheet" href="{{ asset('css/sidebarNavigation.css')}}"> -->



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
        <i class="fas fa-times fa-1x"></i>
      </div>

      <div class="sidebar-header">
        <h5 class="text-center">The Yeon Cambodia</h5>
      </div>
      <div class="p-3 font-weight-bold">

        <div>
          <form action="{{route('search')}}" method="GET" class="form-group">
            @csrf
            <input value="{{request()->input('search')}}" name="search" type="text" class="form-control" placeholder="ស្វែងរក">
          </form>
        </div>
        <hr>
        <div class="">
          <ul class="list-group list-group-horizontal">

            <li class="list-group-item flex-fill text-center" style="padding:1px;;"><a href="{{route('about.index')}}">អំពីយើង</a></li>
            <li class="list-group-item flex-fill text-center" style="padding:1px; "><a href="{{route('about.index')}}">About Us</a></li>
            <li class="list-group-item flex-fill text-center" style="padding:1px; "><a href="{{route('contact.index')}}">ទំនាក់ទំនង</a></li>
          </ul>
        </div>


        <ul class="nav nav-tabs pt-3" id="pills-tab" role="tablist">
          <li class="nav-item" style="width:50%">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">ផលិតផល</a>
          </li>
          <li class="nav-item" style="width:50%">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">តំណាងចែកចាយ</a>
          </li>

        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <ul class="nav  nav-stacked" style="display:block;">
              @foreach($cates as $cate)
              <li><a href="{{route('category.show', $cate->cateId)}}">{{$cate->cateName}}</a></li>
              @endforeach
            </ul>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>




        </div>

        <!-- <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
          </li>
         
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
          @foreach($cates as $cate)
              <li><a href="{{route('category.show', $cate->cateId)}}">{{$cate->cateName}}</a></li>
              @endforeach
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
          
        </div> -->



      </div>


      <!-- <ul class="list-unstyled components">
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
            </ul> -->
    </nav>


    <!-- end side nav -->

    <!-- nav me  -->
    <nav class="navbar navbar-expand-lg navbar-light bg-header" id="header">



      <!-- style="background-color: #d8d8d8;" -->
      <!--  -->
      <button type="button" id="sidebarCollapse" class="btn d-inline-block d-lg-none navbar-left">
        <i class="fas fa-align-justify"></i>

      </button>
      <a class="navbar-brand" href="{{route('home.index')}}"><span class="header-text" style="color:#057374; overflow: hidden;"><img class="img-fluid img-fluid-sm" src="{{asset('images')}}/logo.png"></span></a>


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

            <div class="dropdown">
              <a class="nav-link" href="#">អំពីយើង</a>
              <div class="dropdown-content">
                <a href="{{route('about.index')}}">Branh Story</a>
                <a href="{{route('about.index')}}">ដំណាងចែកចាយ</a>
                <a href="{{route('ingrediant')}}">គ្រឿងផ្សំ</a>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('rooms.index')}}">ប្រវត្តិ Branh</a>
          </li>
          <li class="nav-item {{ (\Request::route()->getName()=='service.index' ? 'active' : '') }}">
            <a class="nav-link" href="{{route('service.index')}}">កំណត់ចំណាំ</a>
          </li>
          </li>
          <!--  <li class="nav-item {{ (\Request::route()->getName()=='gallery.index' ? 'active' : '') }}">
                <a class="nav-link" href="{{route('gallery.index')}}">សំណួរចំលើយ</a>
              </li> -->

          <li class="nav-item {{ (\Request::route()->getName()=='contact.index' ? 'active' : '') }}">
            <a class="nav-link" href="{{route('contact.index')}}">ទំនាក់ទំនង</a>
          </li>

        </ul>
      </div>





      <button class="btn btn-sm btn-outline-dark border-0" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-search"></i></button>







    </nav>
    <!-- end nav me -->

  </section>

  <!-- end of navbar -->

  <div class="overlay"></div>
  <div class=""></div>

  @component('layouts.mobile-cate')

  @endcomponent

  @yield('content')

  <div class="modal bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-kh" id="exampleModalCenterTitle">ស្វែងរក</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('search')}}" method="GET" class="form-group">
          @csrf
          <div class="container-fluid">
            <div class="row pt-2">

              <div class="col-10">

                <input name="search" class="form-control mr-sm-1" type="search" placeholder="Search" aria-label="Search">
              </div>
              <div class="col-2">
                <button class="btn btn-outline-success d-inline" type="submit"><i class="fas fa-search"></i></button>
              </div>
        </form>

      </div>

    </div>
    </form>

    <div class="modal-footer text-kh text-light">

      <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">បិទ</button>

    </div>
  </div>



  </div>
  </div>



  <div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-kh" id="exampleModalCenterTitle">ស្វែងរក</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


        </div>

      </div>
    </div>
  </div>

  <!-- footer -->
  <!-- <div class="wrapper"> -->

  <!-- <div class="container-fluid">
      <footer class="pt-5 pb-2" style="font-size:.75rem;">

        <hr>
        <div class="row text-center-sm">

          <div class="col-12 col-sm-12 col-md-6">
            <h6 class="font-weight-bold">
              COMPANY INFO
            </h6>
            <p class="pt-2">

              <span>ក្រុមហុន : {{$company[0]->campanyName}} នាយក: {{$company[0]->campanyCEO}}　</span>
              <span>E-MAIL: theyeonglobal@theyeon.net ADDRESS: 608, 6F, SK V1 Center Bldg, 171, Gasan digital 1-ro, Geumcheon-gu, Seoul, Korea</span>

              E-COMMERCE PERMIT: 2013-SeoulJongno-0478　BUSINESS REGISTRATION NO: 264-81-02289 [BUSINESS INFORMATION]
            </p>
          </div>

          <div class="col-12 col-sm-12 col-md-6 text-center-sm pl-4" style="font-size:.75rem;">
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
        <div class="row text-center-sm">
          <div data-toggle="tooltip" data-placement="top" class="col text-center" title="">
            <p class="pt-2">COPYRIGHT © THEYEON CAMBODIA ALL RIGHTS RESERVED.</p>
          </div>
        </div>

      </footer>
      
    </div> -->

@component('layouts.app-footer')
@endcomponent


  @yield('script')

  <script>
    $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    });
  </script>

  <script>
    // When the user scrolls down 50px from the top of the document, resize the header's font size
    window.onscroll = function() {
      scrollFunction()
    };

    function scrollFunction() {
      if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 20) {
        document.getElementById("header").style.opacity = "80%";
      } else {
        document.getElementById("header").style.opacity = "100%";
      }
    }
  </script>



  <script type="text/javascript">
    $(document).ready(function() {
      // $("#sidebar").mCustomScrollbar({
      //     theme: ""
      // });

      $('#dismiss, .overlay').on('click', function() {
        $('#sidebar').removeClass('active');
        $('.overlay').removeClass('active');
      });

      $('.wrapper').on('click', function() {
        $('#sidebar').removeClass('active');
        $('.overlay').removeClass('active');
      });

      $('#sidebarCollapse').on('click', function() {
        $('#sidebar').addClass('active');
        $('.overlay').addClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
      });
    });
  </script>



</body>

</html>