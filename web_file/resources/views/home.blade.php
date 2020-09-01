@extends('layouts.app')
@section('meta')
  <meta content='http://tropicanacasinopoipet.com/' property='og:url'/>
  <meta content='Tropicana Casino Poipet' property='og:title'/>    
  <meta content='{{Config::get('mysiteVars.meta_about.'. session()->get('LANG'))}}' name='description'/>
@endsection
@php
  $mytitle = " - Tropicana Resort & Casino";    
@endphp
@section('title')
{{Config::get('mysiteVars.menu_home.'. session()->get('LANG'))}}{{$mytitle}}
@endsection

@section('content')
<br><br><br><br>
 <!-- slide -->
  <section>
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{asset('images/slide/slide1.jpg')}}" class="d-block img-fluid " alt="...">
      <div class="carousel-caption d-none d-md-block">
        <!-- <h5>First slide label</h5> -->
        <!-- <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> -->
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{asset('images/slide/slide2.jpg')}}" class="d-block img-fluid" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <!-- <h5>Second slide label</h5> -->
        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{asset('images/slide/slide3.jpg')}}" class="d-block img-fluid" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <!-- <h5>Third slide label</h5> -->
        <!-- <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> -->
      </div>
    </div>
   
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  </section>
<!-- end of slide -->

<!-- welcome -->

<!-- end welcome -->
<!-- <div class="parallax">
 <div class="caption_pp"> <center><span class="text-light pacap">{{Config::get('mysiteVars.home_welcome_text3.'. session()->get('LANG'))}}</span></center></div>
</div> -->

<!-- explorer -->



<section class="p-2" style="background: #fff">
<div class="header-title p-4 text-center">ផលិតផលថ្មី</div>
  <div class="container">
   <div class="row">
     @foreach ($product as $pro)
            
<div class="col-sm-12 col-md-4">
      <div class="">
        <div class="content">
        <a href="{{route('productdetail.show',$pro->proId)}}" target="">
          <div class="content-overlay"></div>
          <img class="content-image" src="{{asset('images/product/vita7.jpg')}}">
          <div class="content-details fadeIn-top float-left">
            <h6>{!!$pro->proName!!}</h6>
            <p class="price">${{$pro->proPrice}}</p>
            <p>{{$pro->proDescription}}</p>
           
           
          </div>
        </a>
      </div>
    </div>
</div>

@endforeach


      
    </div>
  </div>
</section>

<!-- end explorer -->

<!-- service -->


  
     

        

    </div> 
  </div>
</section>

<!-- end service -->


@endsection

@section('script')
<script>
  $('.owl-carousel').owlCarousel({
loop:true,
margin:10,
// nav:true,
autoplay:true,
responsive:{
0:{
   items:1
},
600:{
   items:3
// },
// 1000:{
//     items:5
}
}
});

$(document).ready(function () {
$('.navbar-light .dmenu').hover(function () {
$(this).find('.sm-menu').first().stop(true, true).slideDown(150);
}, function () {
$(this).find('.sm-menu').first().stop(true, true).slideUp(105)
});
});


</script>    
@endsection