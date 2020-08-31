@extends('layouts.app')
@php  
  $mytitle = " - Tropicana Resort & Casino";    
@endphp

  @php
  $myroom="";
  @endphp

  @foreach ($rooms as $room)
    @if(session()->get('LANG')=='EN')
      <?php $myroom = $myroom .  $room->name." ,"; ?>
    @elseif(session()->get('LANG')=='TH')
    <?php $myroom = $myroom .  $room->name_th." ,"; ?>
    @elseif(session()->get('LANG')=='CH')
    <?php $myroom = $myroom .  $room->name_ch." ,"; ?>
    @endif    
  @endforeach

@section('meta')
  <meta content='http://tropicanacasinopoipet.com/' property='og:url'/>
  <meta content='Tropicana Casino Poipet' property='og:title'/>    
  <meta content="{{Config::get('mysiteVars.meta_room.'. session()->get('LANG'))}}{{$myroom}}" name='description'/>
@endsection

@section('title')
{{Config::get('mysiteVars.menu_rooms.'. session()->get('LANG'))}}{{$mytitle}}
@endsection
@section('content')

<!-- navigator -->
<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <p class="navigator-link" style="font-weight: bold;"><a href="{{route('home.index')}}">{{Config::get('mysiteVars.menu_home.'. session()->get('LANG'))}}</a><i class="fas fa-caret-right pl-1 pr-1"></i><a href="{{route('rooms.index')}}" style="color: #057374">{{Config::get('mysiteVars.menu_rooms.'. session()->get('LANG'))}}</a></p>
      </div>
    </div>
  </div>
</section>
<!-- end of navigator -->

<!-- service -->

<section class="pl-5 pr-5 pb-5 pt-1">
  <div class="container-fluid">
  <div class="row  pb-2">
      <div class="col text-center">        
        <h2><b>{{Config::get('mysiteVars.rooms_main_title.'. session()->get('LANG'))}}</b></h2>
        <hr align="center" width="70px" style="background-color: #ccc; height: 0.01em">
      </div>
    </div>

    @php
        $row_reset = 0;
        echo '<br>';
        // $totalrow =  count($rooms);
        // $row_count = 0;
    @endphp


    @foreach ($rooms as $room)
      <?php 
        // $row_count =  $row_count + 1;

        if ($row_reset == 0) {
      ?>
          <div class="row">
      <?php
        }
      ?>

@php
$verroom="";
if ($room->RoomMain->updated_at =="") {
    $verroom=strtotime($room->RoomMain->created_at);
} else {
    $verroom=strtotime($room->RoomMain->updated_at);
}
@endphp

     
        <div class="col-sm col-md-4 pb-3">
          <div class="card shadow" style="">
            <div class="c-inline">
              <img class="card-img-top w-100" src="{{asset('images/thumbnail/'. $room->RoomMain->photo1 .'?ver='.$verroom)}}" alt="Card image cap"> 
            </div>
            
            <div class="card-body">
              <h5 class="card-title">
              <h3 class="title-small mt-3"><a href="{{route('rooms.show', $room->id)}}">
                  @if(session()->get('LANG')=='EN')
                    {{$room->name}}
                    @elseif(session()->get('LANG')=='TH')
                      {{$room->name_th}}
                    @elseif(session()->get('LANG')=='CH')
                      {{$room->name_ch}}  
                  @endif
                </a>
              </h3>

              </h5>
              <p class="card-text">
              <hr class="mt-0" style="background-color: #ccc">
              <ul style="list-style-type:none;padding: 0">
                <!--  <li><i class="far fa-check-square pr-3"></i>3 People</li>
                <li><i class="far fa-check-square pr-3"></i>30 sqm</li> -->
                {{-- <li><i class="fas fa-wifi pr-3 "></i>Free Wifi</li> --}}
                
                

                @foreach ($details as $detail)
                    @if ($detail->room_id == $room->RoomMain->id && $detail->text != '')
                      <li>{!!$detail->icon!!}{{$detail->text}}</li>
                    @endif
                @endforeach
                
            
              <li><span class="bg-danger rounded-pill p-1 text-light">{{Config::get('mysiteVars.rooms_from.'. session()->get('LANG'))}} {{$room->price}}</span></li>
            </ul>
            


              </p>
              <a href="{{route('rooms.show', $room->id)}}" class="btn text-light btn-success bg-me">{{Config::get('mysiteVars.rooms_detail_btn.'. session()->get('LANG'))}}</a>
            </div>
          </div>

          

            
        </div>

      <?php


      

        $row_reset = $row_reset + 1;
        if ($row_reset==3) {
          $row_reset=0;
        ?>
            </div>
        <?php
        }
        // echo $row_reset;
      ?>


    @endforeach
  
      


  </div>
</section>

<!-- end service -->

@endsection