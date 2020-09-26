@extends('layouts.app')


@section('title')

@endsection
@section('content')


@component('layouts.mobile-about-link')
             
@endcomponent

   

    <section class="pt-3">
         <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            <!-- <li data-target="#carouselExampleCaptions" data-slide-to="3"></li> -->
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="w-100 img-fluid" src="https://theyeon.net/mainimage/shopinfo/ingredient3.jpg" alt="">
              
            
            </div>
            <div class="carousel-item">
              <img src="https://theyeon.net/mainimage/shopinfo/ingredient1.jpg" class="w-100 img-fluid">
             
            </div>
            <div class="carousel-item">
              <img src="https://theyeon.net/mainimage/shopinfo/ingredient2.jpg" class="w-100 img-fluid">
             
            </div>
           
          </div>
          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="fas fa-chevron-left fa-7x" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="fas fa-chevron-right fa-7x" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    </section>




@endsection