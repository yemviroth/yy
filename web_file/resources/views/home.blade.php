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
<div class="header-title p-4 text-center">ផលិតផលថ្មី</div>
<section class="p-2" style="background: #fff">
  <div class="container-fluid">
   <div class="row">
     @foreach ($product as $pro)
            
<div class="col-sm-12 col-md-4">
      <div class="">
        <div class="content">
        <a href="https://unsplash.com/photos/HkTMcmlMOUQ" target="_blank">
          <div class="content-overlay"></div>
          <img class="content-image" src="{{asset('images/product/vita7.jpg')}}">
          <div class="content-details fadeIn-top float-left">
            <h6>{{$pro->proName}}</h6>
            <p class="price">${{$pro->proPrice}}</p>
            <p>{{$pro->proDescription}}</p>
          </div>
        </a>
      </div>
    </div>
</div>

<!-- <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
    <div class="hovereffect">
        <img class="img-responsive" src="{{asset('images/product/vita7.jpg')}}" alt="">
            <div class="overlay">
                <h2>Effect 13</h2>
        <p>
          <a href="#">LINK HERE</a>
        </p>
            </div>
    </div>
</div> -->
@endforeach

      <div class="row">
        
        <!-- slide -->

          <div class="container-fluid">

     <!-- Set up your HTML -->
  <div class="owl-carousel owl-theme">
    

       
       

  </div>

   
    



      </div>
      
    </div>
  </div>
</section>

<!-- end explorer -->

<!-- service -->

<section class="p-5">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <h2 class="title">{{Config::get('mysiteVars.home_welcome_text6.'. session()->get('LANG'))}}</h2>
        <h2><b>{{Config::get('mysiteVars.home_welcome_text7.'. session()->get('LANG'))}}</b></h2>
      </div>
    </div> 

    <div class="row">
      <div class="col-sm ">
        <h3 class="title-sm mt-3"><a href="{{route('spa.index')}}">{{Config::get('mysiteVars.service_spa_title.'. session()->get('LANG'))}}</a></a></h3>
        <img class="w-100 mt-3" src="{{asset('images/thumbnail/spa.jpg?ver=11')}}">
         {{Config::get('mysiteVars.service_spa_text.'. session()->get('LANG'))}}
      
      </div>

      <div class="col-sm">
        <h3 class="title-sm mt-3"><a href="{{route('gym.index')}}">{{Config::get('mysiteVars.service_gym_title.'. session()->get('LANG'))}}</a></h3>
        <img class="w-100 mt-3" src="{{asset('images/thumbnail/gym.jpg?ver=11')}}">
          {{Config::get('mysiteVars.service_gym_text.'. session()->get('LANG'))}}
      
      </div>

      <div class="col-sm">
        <h3 class="title-sm mt-3"><a href="{{route('healthybar')}}">{{Config::get('mysiteVars.service_healtybar_title.'. session()->get('LANG'))}}</a></h3>
        <img class="w-100 mt-3" src="{{asset('images/thumbnail/healthybar.jpg?ver=11')}}">
       {{Config::get('mysiteVars.healtybar_text1.'. session()->get('LANG'))}}

      
      </div>

      <div class="col-sm">
        <h3 class="title-sm mt-3"><a href="{{route('restaurant.index')}}">{{Config::get('mysiteVars.service_restaurant_title.'. session()->get('LANG'))}}</a></h3>
        <img class="w-100 mt-3" src="{{asset('images/thumbnail/restaurant.jpg?ver=11')}}">
       {{Config::get('mysiteVars.service_restaurant_text.'. session()->get('LANG'))}}

      
      </div>

      <div class="col-sm">
        <h3 class="title-sm mt-3"><a href="{{route('snooker')}}">{{Config::get('mysiteVars.service_snooker_title.'. session()->get('LANG'))}}</a></h3>
        <img class="w-100 mt-3" src="{{asset('images/thumbnail/snooker.jpg?ver=11')}}">
          {{Config::get('mysiteVars.service_snooker_text.'. session()->get('LANG'))}}
        
      </div>

     

        

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