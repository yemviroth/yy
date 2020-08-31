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
{{Config::get('mysiteVars.menu_gallerys.'. session()->get('LANG'))}}{{$mytitle}}
@endsection
@section('content')

<!-- navigator -->
<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <p class="navigator-link" style="font-weight: bold;"><a href="{{route('home.index')}}">{{Config::get('mysiteVars.menu_home.'. session()->get('LANG'))}}</a><i class="fas fa-caret-right pl-1 pr-1"></i><a href="{{route('gallery.index')}}" style="color: #057374">{{Config::get('mysiteVars.menu_gallerys.'. session()->get('LANG'))}}</a></p>
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
        <h2><b>{{Config::get('mysiteVars.menu_gallerys.'. session()->get('LANG'))}}</b></h2>
        <hr align="center" width="70px" style="background-color: #ccc; height: 0.01em">
      </div>
    </div>

 

    <div class="row pb-1">
      <div class="col-sm pl-1">
        <div class="card shadow">
          <div class="card-header bg-primary text-white text-center h4">
            {{Config::get('mysiteVars.service_fontoffice_title.'. session()->get('LANG'))}}
          </div>
          <div class="card-body">
            <div class="gallery"> 

              @for($fo=1; $fo<=4; $fo++)
                    <a href="{{asset('images/gallery/Front Office/fo'.$fo.'.jpg')}}" class="big">
                      <img class="img-fluid" src="{{asset('images/gallery/Front Office/thumbnail/fo'.$fo.'.jpg')}}" alt="" title="Tropicana {{Config::get('mysiteVars.service_fontoffice_title.'. session()->get('LANG'))}}">
                    </a>
              @endfor
              

            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="row pt-3">
      <div class="col-sm pl-1">
        <div class="card shadow">
          <div class="card-header bg-primary text-light text-center h4">
            {{Config::get('mysiteVars.service_healtybar_title.'. session()->get('LANG'))}}
          </div>
          <div class="card-body">
            <div class="gallery"> 

              @for($ht=1; $ht<=13; $ht++)
                    <a href="{{asset('images/gallery/HEALTHY BAR/ht'.$ht.'.jpg')}}" class="big">
                      <img class="img-fluid" src="{{asset('images/gallery/HEALTHY BAR/thumbnail/ht'.$ht.'.jpg')}}" alt="" title="Tropicana {{Config::get('mysiteVars.service_healtybar_title.'. session()->get('LANG'))}}">
                    </a>
              @endfor

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row pt-3">
      <div class="col-sm pl-1">
        <div class="card shadow">
          <div class="card-header bg-primary text-light text-center h4">
            {{Config::get('mysiteVars.service_restaurant_title.'. session()->get('LANG'))}}
          </div>
          <div class="card-body">
            <div class="gallery"> 

              @for($Restaurant=1; $Restaurant<=9; $Restaurant++)
                    <a href="{{asset('images/gallery/RESTAURANT/Restaurant'.$Restaurant.'.jpg')}}" class="big">
                      <img class="img-fluid" src="{{asset('images/gallery/RESTAURANT/thumbnail/Restaurant'.$Restaurant.'.jpg')}}" alt="" title="Tropicana {{Config::get('mysiteVars.service_restaurant_title.'. session()->get('LANG'))}}">
                    </a>
              @endfor

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row pt-3">
      <div class="col-sm pl-1">
        <div class="card shadow">
          <div class="card-header bg-primary text-light text-center h4">
            {{Config::get('mysiteVars.service_spa_title.'. session()->get('LANG'))}}
          </div>
          <div class="card-body">
            <div class="gallery"> 

              @for($SPA=1; $SPA<=13; $SPA++)
                    <a href="{{asset('images/gallery/SPA/SPA'.$SPA.'.jpg')}}" class="big">
                      <img class="img-fluid" src="{{asset('images/gallery/SPA/thumbnail/SPA'.$SPA.'.jpg')}}" alt="" title="Tropicana {{Config::get('mysiteVars.service_spa_title.'. session()->get('LANG'))}}">
                    </a>
              @endfor

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row pt-3">
      <div class="col-sm pl-1">
        <div class="card shadow">
          <div class="card-header bg-primary text-light text-center h4">
            {{Config::get('mysiteVars.service_gym_title.'. session()->get('LANG'))}}
          </div>
          <div class="card-body">
            <div class="gallery"> 

              @for($GYM=1; $GYM<=8; $GYM++)
                    <a href="{{asset('images/gallery/GYM/GYM'.$GYM.'.jpg')}}" class="big">
                      <img class="img-fluid" src="{{asset('images/gallery/GYM/thumbnail/GYM'.$GYM.'.jpg')}}" alt="" title="Tropicana {{Config::get('mysiteVars.service_gym_title.'. session()->get('LANG'))}}">
                    </a>
              @endfor

            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="row pt-3">
      <div class="col-sm pl-1">
        <div class="card shadow">
          <div class="card-header bg-primary text-light text-center h4">
            {{Config::get('mysiteVars.service_snooker_title.'. session()->get('LANG'))}}
          </div>
          <div class="card-body">
            <div class="gallery"> 

              @for($ht=1; $ht<=13; $ht++)
                  
                
                    <a href="{{asset('images/gallery/SNOOKER/sk'.$ht.'.jpg')}}" class="big">
                   
                        <img class="img-fluid" src="{{asset('images/gallery/SNOOKER/thumbnail/sk'.$ht.'.jpg')}}" alt="" title="Tropicana {{Config::get('mysiteVars.service_snooker_title.'. session()->get('LANG'))}}">
                    </a>

              @endfor

            </div>
          </div>
        </div>
      </div>
    </div>











  </div>
</section>

<!-- end service -->
@endsection

@section('script')
<script src="{{asset('js/simple-lightbox.min.js')}}"></script>
    <script src="{{asset('js/simple-lightbox.jquery.min.js')}}"></script>

    <script>
    // As A Vanilla JavaScript Plugin
var gallery = new SimpleLightbox('.gallery a', { 
  
    /* options */ 
});


    </script>
@endsection