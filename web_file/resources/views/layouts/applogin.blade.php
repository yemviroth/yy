<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <meta content='http://theyeon-kh.com/' property='og:url'/>
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
    
    <section class="text-center" style="">

      <img  src="{{asset('images/logo.png')}}" class="p-5" >
      

</section>

    <!-- end of navbar -->
@yield('content')





@yield('script')



  </body>
</html>