@extends('layouts.app')
@php  
  $mytitle = " - Tropicana Resort & Casino";    
@endphp

@section('meta')
  <meta content='http://tropicanacasinopoipet.com/' property='og:url'/>
  <meta content='Tropicana Casino Poipet' property='og:title'/>    
  <meta content="Tropicana Casino Poipet - Sitemap" name='description'/>
@endsection

@section('title')
Sitemap
@endsection
@section('content')

<!-- navigator -->
<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <p class="navigator-link" style="font-weight: bold;"><a href="{{route('home.index')}}">{{Config::get('mysiteVars.menu_home.'. session()->get('LANG'))}}</a><i class="fas fa-caret-right pl-1 pr-1"></i><a href="{{route('sitemap')}}" style="color: #057374">{{Config::get('mysiteVars.title_sitemap.'. session()->get('LANG'))}}</a></p>
      </div>
    </div>
  </div>
</section>
<!-- end of navigator -->

<section>
    <div class="container">
            <div class="row">
                    <div class="col">
                            <div class="col text-center">        
                                    <h2><b>{{Config::get('mysiteVars.title_sitemap.'. session()->get('LANG'))}}</b></h2>
                                    <hr align="center" width="70px" style="background-color: #ccc; height: 0.01em">
                                  </div>
                                  
                            <div id="cont">
                                    <ul class="level-0">
                            
                                        <li class="lhead">/  <span class="lcount">8 pages</span></li>
                                        
                            <li class="lpage"><a href="http://tropicanacasinopoipet.com/" title="
                                  
                              {{Config::get('mysiteVars.menu_home.'. session()->get('LANG'))}} 
                            
                                ">
                                  
                                {{Config::get('mysiteVars.menu_home.'. session()->get('LANG'))}}   </a></li>
                            <li class="lpage"><a href="http://tropicanacasinopoipet.com/about" title="
                                  
                              {{Config::get('mysiteVars.menu_about_us.'. session()->get('LANG'))}} 
                            
                                ">
                                  
                                {{Config::get('mysiteVars.menu_about_us.'. session()->get('LANG'))}}   </a></li>
                            <li class="lpage"><a href="http://tropicanacasinopoipet.com/rooms" title="
                                  
                              {{Config::get('mysiteVars.menu_rooms.'. session()->get('LANG'))}} 
                            
                                ">
                                  
                                {{Config::get('mysiteVars.menu_rooms.'. session()->get('LANG'))}}    </a></li>
                            <li class="lpage"><a href="http://tropicanacasinopoipet.com/service" title="
                                  
                              {{Config::get('mysiteVars.menu_services.'. session()->get('LANG'))}}  
                            
                                ">
                                  
                                {{Config::get('mysiteVars.menu_services.'. session()->get('LANG'))}}    </a></li>
                            <li class="lpage"><a href="http://tropicanacasinopoipet.com/contact" title="
                                  
                              {{Config::get('mysiteVars.menu_contact_us.'. session()->get('LANG'))}} 
                            
                                ">
                                  
                                {{Config::get('mysiteVars.menu_contact_us.'. session()->get('LANG'))}}   </a></li>
                            <li class="lpage"><a href="http://tropicanacasinopoipet.com/spa" title="
                                  
                              {{Config::get('mysiteVars.service_spa_title.'. session()->get('LANG'))}}
                            
                                ">
                                  
                                {{Config::get('mysiteVars.service_spa_title.'. session()->get('LANG'))}}   </a></li>
                            <li class="lpage"><a href="http://tropicanacasinopoipet.com/gym" title="
                                  
                              {{Config::get('mysiteVars.service_gym_title.'. session()->get('LANG'))}} 
                            
                                ">
                                  
                                {{Config::get('mysiteVars.service_gym_title.'. session()->get('LANG'))}}   </a></li>
                            <li class="lpage last-page"><a href="http://tropicanacasinopoipet.com/restaurant" title="
                                  
                              {{Config::get('mysiteVars.service_restaurant_title.'. session()->get('LANG'))}} 
                            
                                ">
                                  
                                {{Config::get('mysiteVars.service_restaurant_title.'. session()->get('LANG'))}}   </a></li><li><ul class="level-1">
                            
                                        <li class="lhead">rooms/  <span class="lcount">5 pages</span></li>
                                        
                            <li class="lpage"><a href="http://tropicanacasinopoipet.com/rooms/20" title="
                                  
                              {{Config::get('mysiteVars.title_room_president.'. session()->get('LANG'))}} 
                                            
                                ">
                                  
                                {{Config::get('mysiteVars.title_room_president.'. session()->get('LANG'))}}              
                                </a></li>
                                <li class="lpage"><a href="http://tropicanacasinopoipet.com/rooms/21" title="
                                  
                                  {{Config::get('mysiteVars.title_room_sweetroom.'. session()->get('LANG'))}} 
                                                
                                    ">
                                      
                                    {{Config::get('mysiteVars.title_room_sweetroom.'. session()->get('LANG'))}}              
                                    </a></li>
                                    <li class="lpage"><a href="http://tropicanacasinopoipet.com/rooms/22" title="
                                  
                                      {{Config::get('mysiteVars.title_room_junior.'. session()->get('LANG'))}} 
                                                    
                                        ">
                                          
                                        {{Config::get('mysiteVars.title_room_junior.'. session()->get('LANG'))}}              
                                        </a></li>
                                        <li class="lpage"><a href="http://tropicanacasinopoipet.com/rooms/23" title="
                                  
                                          {{Config::get('mysiteVars.title_room_delux.'. session()->get('LANG'))}} 
                                                        
                                            ">
                                              
                                            {{Config::get('mysiteVars.title_room_delux.'. session()->get('LANG'))}}              
                                            </a></li>
                                            <li class="lpage last-page"><a href="http://tropicanacasinopoipet.com/rooms/24" title="
                                  
                                              {{Config::get('mysiteVars.title_room_standard.'. session()->get('LANG'))}} 
                                                            
                                                ">
                                                  
                                                {{Config::get('mysiteVars.title_room_standard.'. session()->get('LANG'))}}             
                                                </a></li>

                            </ul></li>
                            </ul>

                                </div>                           
                    </div>
            </div>
    </div>
</section>


@endsection