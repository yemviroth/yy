@extends('layouts.app')
@section('title')
@php
  $mytitle = " - Tropicana Resort & Casino";    
@endphp
@if(session()->get('LANG')=='EN')
                {{$rooms[0]->name}}{{$mytitle}}
                @elseif(session()->get('LANG')=='TH')
                  {{$rooms[0]->name_th}}{{$mytitle}}
                @elseif(session()->get('LANG')=='CH')
                  {{$rooms[0]->name_ch}}{{$mytitle}}
              @endif
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
  @foreach ($rooms as $room)
      
  <section class="pl-5 pr-5 pb-5 pt-1">
    <div class="container">
    <div class="row  pb-2">

        <div class="col text-center">        
          <h2><b>
           
             @if(session()->get('LANG')=='EN')
                {{$room->name}}
                @elseif(session()->get('LANG')=='TH')
                  {{$room->name_th}}
                @elseif(session()->get('LANG')=='CH')
                  {{$room->name_ch}}  
              @endif
          </b></h2>
          <hr align="center" width="70px" style="background-color: #ccc; height: 0.01em">
        </div>
     
        @php
            $verroom="";
            if ($room->RoomMain->updated_at =="") {
                $verroom=strtotime($room->RoomMain->created_at);
            } else {
                $verroom=strtotime($room->RoomMain->updated_at);
            }
        @endphp

        <div class="owl-carousel owl-theme">
           
            <?php if ($room->RoomMain->photo1 !="") { ?>        
              <div class="item">
                  <img class="w-100" src="{{asset('images/'. $room->RoomMain->photo1 .'?ver='.$verroom)}}">
              </div>
            <?php } ?>
              <?php if ($room->RoomMain->photo2 !="") { ?>        
                  <div class="item">
                      <img class="w-100" src="{{asset('images/'. $room->RoomMain->photo2 .'?ver='.$verroom)}}">
                  </div>
              <?php } ?>
              <?php if ($room->RoomMain->photo3 !="") { ?>        
                <div class="item">
                    <img class="w-100" src="{{asset('images/'. $room->RoomMain->photo3 .'?ver='.$verroom)}}">
                </div>
            <?php } ?>
            <?php if ($room->RoomMain->photo4 !="") { ?>        
              <div class="item">
                  <img class="w-100" src="{{asset('images/'. $room->RoomMain->photo4 .'?ver='.$verroom)}}">
              </div>
          <?php } ?>
          <?php if ($room->RoomMain->photo5 !="") { ?>        
            <div class="item">
                <img class="w-100" src="{{asset('images/'. $room->RoomMain->photo5 .'?ver='.$verroom)}}">
            </div>
        <?php } ?>
        <?php if ($room->RoomMain->photo6 !="") { ?>        
          <div class="item">
              <img class="w-100" src="{{asset('images/'. $room->RoomMain->photo6 .'?ver='.$verroom)}}">
          </div>
      <?php } ?>
      <?php if ($room->RoomMain->photo7 !="") { ?>        
        <div class="item">
            <img class="w-100" src="{{asset('images/'. $room->RoomMain->photo7 .'?ver='.$verroom)}}">
        </div>
    <?php } ?>
       </div>     
     </div>
   </div>
  </section>
  @endforeach
  
  
    <div class="container pb-2">
      <hr>
        <div class="row">
          <div class="col-sm pl-5">
                
               
                <ul style="list-style-type:none;padding: 0">
                 
                  @foreach ($details as $detail)
                  <li>{!!$detail->icon!!}{{$detail->text}}</li>                  
                  @endforeach
                
              
                   {{-- <li><i class="fas fa-users pr-3 "></i>3 People</li>
                   <li><i class="fas fa-bed pr-3 "></i>30 sqm</li>
                   <li><i class="fas fa-wifi pr-3 "></i>Free Wifi</li> --}}
  
                   <li><span class="bg-danger rounded-pill p-1 text-light">From {{$room->price}}</span></li>
                </ul>
                <p><a href="{{route('contact.index')}}" class="btn text-light btn-success bg-me">{{Config::get('mysiteVars.detail_btn_contact_us.'. session()->get('LANG'))}}</a></p>
          </div>
  
          <div class="col-sm">
                <p>
                 <!-- 
                  <span class="first-letter"><?php echo mb_substr($room->description, 0,1,"utf-8"); ?></span> -->
                 
                      <!-- echo mb_substr($room->description,1,100,"utf-8"); -->
               
                   @if(session()->get('LANG')=='EN')
                     {{$room->description}}
                    @elseif(session()->get('LANG')=='TH')
                      {{$room->description_th}}
                    @elseif(session()->get('LANG')=='CH')
                     {{$room->description_ch}}
                  @endif


                  
                </p>
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