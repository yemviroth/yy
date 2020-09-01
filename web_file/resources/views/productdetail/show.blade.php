@extends('layouts.app')
@section('title')
@php
  $mytitle = " - Tropicana Resort & Casino";    
@endphp
<!-- @if(session()->get('LANG')=='EN')
                {{$products[0]->proName}}{{$mytitle}}
                @elseif(session()->get('LANG')=='TH')
                  {{$rooms[0]->name_th}}{{$mytitle}}
                @elseif(session()->get('LANG')=='CH')
                  {{$rooms[0]->name_ch}}{{$mytitle}}
              @endif -->
@endsection
@section('content')

<!-- navigator -->
<!-- <section>
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <p class="navigator-link" style="font-weight: bold;"><a href="{{route('home.index')}}">{{Config::get('mysiteVars.menu_home.'. session()->get('LANG'))}}</a><i class="fas fa-caret-right pl-1 pr-1"></i><a href="{{route('rooms.index')}}" style="color: #057374">{{Config::get('mysiteVars.menu_rooms.'. session()->get('LANG'))}}</a></p>
        </div>
      </div>
    </div>
  </section> -->
  <!-- end of navigator -->
  
  

  <div class="container"  style="padding-top:8%;">
  
    
    <div class="text-center header-title">Skin Care</div>
    
    
    <div class="row pt-5">

      <div class="col-2 col-md-2 col-sm-12 col-xs-12">
        <h6 class="text-kh-bold"><  Previous   Next ></h6>
        <div class="card">
        <div class="img-view">
          <img src="{{asset('images/product/vita7.jpg')}}" alt="">
        </div>
        </div>
      </div>

      <div class="col-5 col-md-5 col-sm-12 col-xs-12">
      <img class="content-image" src="{{asset('images/product/vita7.jpg')}}">
      </div>

      <div class="col-4 col-md-5 col-sm-12 col-xs-12">
      
              <h5 class="font-weight-bold">{{$products[0]->proName}}</h5>
              <hr>
              <h6>Price : {{$products[0]->proPrice}}</h6>
              <h6 class="text-kh-bold">Description</h6>
              <p>{{$products[0]->proDescription}}</p>
              <hr>
              <h6 class="text-kh-bold">Total : </h6>
         
      </div>
    </div>
         
  </div>
 
  
  

  
  
  </section>
  
  <!-- end service -->

@endsection

@section('script')

<script type="text/javascript">
  var owl = $('.owl-carousel');
  owl.owlCarousel({
      loop:true,
      nav:true,
      margin:10,
      autoplay:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:1
          // },            
          // 960:{
          //     items:5
          // },
          // 1200:{
          //     items:6
          }
      }
  });
  // owl.on('mousewheel', '.owl-stage', function (e) {
  //     if (e.deltaY>0) {
  //         owl.trigger('next.owl');
  //     } else {
  //         owl.trigger('prev.owl');
  //     }
  //     e.preventDefault();
  // });
  </script>
  
@endsection