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
{{Config::get('mysiteVars.menu_about_us.'. session()->get('LANG'))}}{{$mytitle}}
@endsection
@section('content')

 <!-- navigator -->
<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <p class="navigator-link" style="font-weight: bold;"><a href="{{route('home.index')}}">{{Config::get('mysiteVars.menu_home.'. session()->get('LANG'))}}</a><i class="fas fa-caret-right pl-1 pr-1"></i><a href="{{route('about.index')}}" style="color: #057374">{{Config::get('mysiteVars.menu_about_us.'. session()->get('LANG'))}}</a></p>
      </div>
    </div>
  </div>
</section>
<!-- end of navigator -->

<!-- service -->

<section class="pl-5 pr-5 pb-5 pt-1">
  <div class="container">
    <div class="row pb-5">
      <div class="col text-center">        
        <h2><b>{{Config::get('mysiteVars.about_us_main_title.'. session()->get('LANG'))}}</b></h2>
        <hr align="center" width="70px" style="background-color: #ccc; height: 0.01em">
      </div>
    </div> 

    <div class="row">
      <!-- <div class=" offset-md-1 offset-lg-2">
        
      </div> -->
      <div class="col-sm">
         <h2><span style="color: #057374;">{{Config::get('mysiteVars.about_us_title.'. session()->get('LANG'))}}</span></h2>
        <p>{{Config::get('mysiteVars.about_us_text1.'. session()->get('LANG'))}}</p>
         <p>{{Config::get('mysiteVars.about_us_text2.'. session()->get('LANG'))}}</p>
      </div>
      <div class="col-sm">
        
        <img class="w-100" src="{{asset('images/about.jpg?ver=11')}}">
      </div>
     <!--   <div class="offset-md-1 offset-lg-2">
        
      </div> -->



    </div> 
  </div>
</section>

<!-- end service -->

@endsection