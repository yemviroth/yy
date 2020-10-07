
@extends('layouts.app')
@php
  $mytitle = " - Tropicana Resort & Casino";    
@endphp

@section('meta')
  <meta content='http://tropicanacasinopoipet.com/' property='og:url'/>
  <meta content='Tropicana Casino Poipet' property='og:title'/>    
  <meta content="{{Config::get('mysiteVars.meta_service.'. session()->get('LANG'))}}" name='description'/>
@endsection

@section('title')
{{Config::get('mysiteVars.service_healthybar_title.'. session()->get('LANG'))}}{{$mytitle}}
@endsection
@section('content')

<!-- navigator -->
<section>
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <p class="navigator-link" style="font-weight: bold;"><a href="{{route('home.index')}}">{{Config::get('mysiteVars.menu_home.'. session()->get('LANG'))}}</a><i class="fas fa-caret-right pl-1 pr-1"></i><a href="{{route('service.index')}}" style="color: #057374">{{Config::get('mysiteVars.menu_services.'. session()->get('LANG'))}}</a><i class="fas fa-caret-right pl-1 pr-1"></i><a href="{{route('restaurant.index')}}" style="color: #057374">{{Config::get('mysiteVars.service_healtybar_title.'. session()->get('LANG'))}}</a></p>
        </div>
      </div>
    </div>
  </section>
  <!-- end of navigator -->
  
  <!-- service -->
  
  <section class="pl-5 pr-5 pb-5 pt-1">
    <div class="container">
      <div class="row  pb-5">
        <div class="col text-center">        
          <h2><b>{{Config::get('mysiteVars.service_healtybar_title.'. session()->get('LANG'))}}</b></h2>
          <hr align="center" width="70px" style="background-color: #ccc; height: 0.01em">
        </div>
      </div> 
  
      <div class="row pb-5">
        
        
        
  
        <div class="col-sm col-xl-4"">
  
            <P class="">{{Config::get('mysiteVars.healtybar_text1.'. session()->get('LANG'))}}</P>
  
        </div>
  
        <div class="col-sm col-xl-8"><img class="pb-2 w-100 img-thumbnail" src="images/healthybar1.jpg"></div>
  
      </div> 
  
      <div class="row pb-5">
        
        
        <div class="col-sm col-xl-8"><img class="pb-2 w-100 img-thumbnail" src="images/healthybar2.jpg"></div>
  
        <div class="col-sm col-xl-4">        
            <!-- <P>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is tent here, content here',    </P> -->
  
        </div>
        
  
      </div> 
  
      <div class="row pb-5">
        
        <div class="col-sm col-xl-4">        
           <!--  <P>Whether you want to do yoga, or run using the treadmill machines, ride 
  stationary bikes or lift barbells, we are sure you won't be disappointed.</P>
   -->
        </div>
        <div class="col-sm col-xl-8"><img class="pb-2 w-100 img-thumbnail" src="images/healthybar3.jpg"></div>
  
        
        
  
      </div> 
  
      
  
  
      <!-- <div class="row pb-3">
        <div class=" offset-md-1 offset-lg-2"></div>
        
        <div class="col-sm"><img class="w-100" src="images/gym.jpg"></div>
  
        <div class="col-sm">        
            <h3 class="title-sm"><a href="gym.html">GYM</a></h3>
          We provide many type of gym such as hand, leg, shouder, chest tools.
  
        </div>
         <div class="offset-md-1 offset-lg-2"></div>
  
      </div> 
      <div class="row">
        <div class=" offset-md-1 offset-lg-2"></div>
        
        <div class="col-sm"><img class="w-100" src="images/restaurant.jpg"></div>
  
        <div class="col-sm">        
            <h3 class="title-sm"><a href="restaurant.html">RESTAURANT</a></h3>
          We provide many type of food such as thai , foreigner
  
        </div>
         <div class="offset-md-1 offset-lg-2"></div>
  
      </div>  -->
  
  
    </div>
  </section>
  
  <!-- end service -->

  
  @endsection