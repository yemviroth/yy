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
{{Config::get('mysiteVars.menu_services.'. session()->get('LANG'))}}{{$mytitle}}
@endsection
@section('content')

<!-- navigator -->
<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <p class="navigator-link" style="font-weight: bold;"><a href="{{route('home.index')}}">{{Config::get('mysiteVars.menu_home.'. session()->get('LANG'))}}</a><i class="fas fa-caret-right pl-1 pr-1"></i><a href="{{route('service.index')}}" style="color: #057374">{{Config::get('mysiteVars.menu_services.'. session()->get('LANG'))}}</a></p>
      </div>
    </div>
  </div>
</section>
<!-- end of navigator -->

<!-- service -->

<section class="pl-5 pr-5 pb-5 pt-1">
  <div class="container-fluid">
    <div class="row  pb-5">
      <div class="col text-center">        
        <h2><b>{{Config::get('mysiteVars.service_main_title.'. session()->get('LANG'))}}</b></h2>
        <hr align="center" width="70px" style="background-color: #ccc; height: 0.01em">
      </div>
    </div> 

    <div class="row pb-3">
      <div class=" offset-md-1 offset-lg-2"></div>
      
      <div class="col-sm"><img class="w-100 img-thumbnail" src="{{asset('images/thumbnail/spa.jpg?ver=11')}}"></div>

      <div class="col-sm">        
          <h3 class="title-sm"><a href="{{route('spa.index')}}">{{Config::get('mysiteVars.service_spa_title.'. session()->get('LANG'))}}</a></h3>
          {{Config::get('mysiteVars.service_spa_text.'. session()->get('LANG'))}}

      </div>
       <div class="offset-md-1 offset-lg-2"></div>

    </div> 

    <div class="row pb-3">
      <div class=" offset-md-1 offset-lg-2"></div>
      
      <div class="col-sm"><img class="w-100 img-thumbnail" src="{{asset('images/thumbnail/gym.jpg?ver=11')}}"></div>

      <div class="col-sm">        
          <h3 class="title-sm"><a href="{{route('gym.index')}}">{{Config::get('mysiteVars.service_gym_title.'. session()->get('LANG'))}}</a></h3>
          {{Config::get('mysiteVars.service_gym_text.'. session()->get('LANG'))}}

      </div>
       <div class="offset-md-1 offset-lg-2"></div>

    </div> 
    <div class="row  pb-3">
      <div class=" offset-md-1 offset-lg-2"></div>
      
      <div class="col-sm"><img class="w-100 img-thumbnail" src="{{asset('images/thumbnail/healthybar.jpg?ver=11')}}"></div>

      <div class="col-sm">        
          <h3 class="title-sm"><a href="{{route('healthybar')}}">{{Config::get('mysiteVars.service_healtybar_title.'. session()->get('LANG'))}}</a></h3>{{Config::get('mysiteVars.healtybar_text1.'. session()->get('LANG'))}}

      </div>
       <div class="offset-md-1 offset-lg-2"></div>

    </div>
    <div class="row  pb-3">
      <div class=" offset-md-1 offset-lg-2"></div>
      
      <div class="col-sm"><img class="w-100 img-thumbnail" src="{{asset('images/thumbnail/restaurant.jpg?ver=11')}}"></div>

      <div class="col-sm">        
          <h3 class="title-sm"><a href="{{route('restaurant.index')}}">{{Config::get('mysiteVars.service_restaurant_title.'. session()->get('LANG'))}}</a></h3>{{Config::get('mysiteVars.service_restaurant_text.'. session()->get('LANG'))}}

      </div>
       <div class="offset-md-1 offset-lg-2"></div>

    </div> 
    <div class="row">
      <div class=" offset-md-1 offset-lg-2"></div>
      
      <div class="col-sm"><img class="w-100 img-thumbnail" src="{{asset('images/thumbnail/snooker.jpg')}}"></div>

      <div class="col-sm">        
          <h3 class="title-sm"><a href="{{route('snooker')}}">{{Config::get('mysiteVars.service_snooker_title.'. session()->get('LANG'))}}</a></h3>{{Config::get('mysiteVars.service_snooker_text.'. session()->get('LANG'))}}

      </div>
       <div class="offset-md-1 offset-lg-2"></div>

    </div>


  </div>
</section>

<!-- end service -->
@endsection