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
  
  
<div class="wrapper">
    <div class="container-fluid"  style="padding-top:8%;">
      
        
      <div class="text-center header-title pt-5">Skin Care</div>
      
      
      <div class="row pt-5">

        <div class="col-md-2 col-sm-12 col-12 d-none d-sm-block d-md-block">
          <h6 class="text-kh-bold"><  Previous   Next ></h6>
          <div class="">
          <div class="img-view">
            <img class="shadow" src="{{asset('images/product/'.$products[0]->proImage)}}" alt="">
          </div>
          </div>
        </div>

        <div class="pr-5 col-md-5 col-sm-12 col-12">
        <img class="content-image" src="{{asset('images/product/'.$products[0]->proImage)}}">
        </div>

        <div class="pl-5 col-md-5 col-sm-12 col-12 text-kh">
        
                <h5 class="font-weight-normal">{!!$products[0]->proName!!}</h5>
                
                <h6 class="pt-3 price">${{$products[0]->proPrice}}</h6>
                <p class="pt-3 text-muted">{!!$products[0]->proTextIntro!!}</p>
                
                <h6 class="text-kh-bold pt-3">របៀបប្រើ</h6>
                <p>{!!$products[0]->proHowTo!!}</p>
                <h6 class="text-kh-bold pt-3">បរិយាយ </h6>
                <div class="text-kh">{!!$products[0]->proDescription!!}</div>
                
                <h6 class="text-kh-bold">Total : </h6>
          
        </div>
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