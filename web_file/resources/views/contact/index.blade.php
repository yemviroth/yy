@extends('layouts.app')
@php
  $mytitle = " - Tropicana Resort & Casino";    
@endphp
@section('meta')
  <meta content='http://tropicanacasinopoipet.com/' property='og:url'/>
  <meta content='Tropicana Casino Poipet' property='og:title'/>    
  <meta content='{{Config::get('mysiteVars.meta_about.'. session()->get('LANG'))}}' name='description'/>
@endsection

@section('title')
{{Config::get('mysiteVars.menu_contact_us.'. session()->get('LANG'))}}{{$mytitle}}
@endsection
@section('content')
<!-- navigator -->
<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <p class="navigator-link" style="font-weight: bold;"><a href="{{route('home.index')}}">{{Config::get('mysiteVars.menu_home.'. session()->get('LANG'))}}</a><i class="fas fa-caret-right pl-1 pr-1"></i><a href="{{route('contact.index')}}" style="color: #057374">{{Config::get('mysiteVars.menu_contact_us.'. session()->get('LANG'))}}</a></p>
      </div>
    </div>
  </div>
</section>
<!-- end of navigator -->

<!-- service -->



  <div class="container-fluid">
    <div class="row pb-2">
      <div class="col text-center">        
        <h2><b>{{Config::get('mysiteVars.contactus_main_title.'. session()->get('LANG'))}}</b></h2>
        <hr align="center" width="70px" style="background-color: #ccc; height: 0.01em">
      </div>
    </div> 
  </div>
  <!-- map -->
<section class="p-3">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3876.9319542422927!2d102.55173501529684!3d13.661901503050066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311b16eaa3bdd863%3A0xa1a1c4048f2173c9!2sTropicana%20Resort%20%26%20Casino!5e0!3m2!1sen!2skh!4v1580230787496!5m2!1sen!2skh" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</section>
<!-- end map -->
<section class="pl-5 pr-5 pb-5 pt-1">
  <div class="container">  
    

    <div class="row">
        <div class="col-sm text-center">
         <h2 class="title">{{Config::get('mysiteVars.contactus_contactus_tropic.'. session()->get('LANG'))}}</h2><br>
         <p><i class="fas fa-map-marker-alt pr-3"></i>{{Config::get('mysiteVars.contactus_address_text.'. session()->get('LANG'))}}</p>         
         <hr>
      </div>

    </div>
    <div class="row">
        <div class="col-sm text-center">         
         <p style="color: red" class="bg-me text-light p-2">{{Config::get('mysiteVars.contactus_contact_room_and.'. session()->get('LANG'))}}</p>         
      </div>

    </div>

	  <div class="row">
	    <div class="col-sm-12 offset-sm-0 col-md-6 offset-md-3">
	     <div class="row">
	       <div class="col-sm">	       
	         <p class="title-sm"><i class="fas fa-phone-alt pr-3"></i>{{Config::get('mysiteVars.contactus_thai_mobile.'. session()->get('LANG'))}}</p>
	       </div>
	      
	       <div class="col-sm">
          <img src="{{asset('images/ais_logo.png')}}">
	       </div>
	        <div class="col-sm">
	         <p class="">081-996 4023</p>
	         <p class="">081-996 4032</p>
	         <p class="">081-996 4038</p>
	         <p class="">081-996 1546</p>
	       
	       </div>
	     </div>
	    </div>
	  </div>
	 <hr style="width: 50%">

          <div class="row">
            <div class="col-md-6 offset-md-3">
             <div class="row">
               <div class="col-sm">
                 <p class="title-sm"></p>
               </div>
              
               <div class="col-sm">
                <img src="{{asset('images/dtac_logo.png')}}">
               </div>
                <div class="col-sm">
                 <p class="">099-165 8778</p>
                
               </div>
             </div>
            </div>
          </div>
	 <hr style="width: 50%">
           <div class="row">
            <div class="col-md-6 offset-md-3">
             <div class="row">
               <div class="col-sm">
                 <p class="title-sm"><i class="fas fa-phone-alt pr-3"></i>{{Config::get('mysiteVars.contactus_combodia_tel.'. session()->get('LANG'))}}:</p>
               </div>
              
               <div class="col-sm">
                
               </div>
               
                <div class="col-sm">
                 <p class="">(855) 012-808 203</p>
                </div>
             </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 offset-md-3">
             <div class="row">
               <div class="col-sm">
                 <p class="title-sm"><i class="fas fa-at pr-3"></i>{{Config::get('mysiteVars.contactus_email_address.'. session()->get('LANG'))}} : tropicanapoipet@gmail.com</p>
               </div>
              
                <!--  <div class="col-sm">
               dd
               </div> -->

             </div>
            </div>
          </div>

       
 	<hr>
    <div class="row">
        <div class="col-sm text-center">         
         <p style="color: red" class="bg-me text-light p-2">{{Config::get('mysiteVars.contactus_vip_service_department.'. session()->get('LANG'))}}</p>         
         <p class="badge badge-success text-light p-2"> 
          {{Config::get('mysiteVars.contactus_vip_delivery_service.'. session()->get('LANG'))}} <i class="fas fa-arrows-alt-h"></i> {{Config::get('mysiteVars.contactus_vip_delivery_service_poipet.'. session()->get('LANG'))}}</p> 
      </div>
    </div> 	
 	<div class="row">
	    <div class="col-sm-12 offset-sm-0 col-md-6 offset-md-3">
	     <div class="row">
	       <div class="col-sm">	       
	         <p class="title-sm"><i class="fas fa-phone-alt pr-3"></i>{{Config::get('mysiteVars.contactus_thai_mobile.'. session()->get('LANG'))}}</p>
	       </div>
	      
	       <div class="col-sm">
          <img src="{{asset('images/ais_logo.png')}}">
	       </div>
	        <div class="col-sm">
	         <p class="">081-874 6789</p>
	         <p class="">081-837 5678</p>
	         <p class="">098-269 1096</p>	         
	       
	       </div>
	     </div>
	    </div>
	  </div>
	  	 <hr style="width: 50%">
	  	  	<div class="row">
	    <div class="col-sm-12 offset-sm-0 col-md-6 offset-md-3">
	     <div class="row">
	       <div class="col-sm">	       
	         
	       </div>
	      
	       <div class="col-sm">
          <img src="{{asset('images/line.png')}}">
	       </div>
	        <div class="col-sm">
	         <p class="">tropicana..vip1</p>
	         <p class="">tropicana2000</p>	         
	       
	       </div>
	     </div>
	    </div>
	  </div>

      <div class="row">
        <div class="col-sm">
          <img class="w-100 img-thumbnail pb-2" src="{{asset('images/contact-img1.jpg?ver=11')}}">
        </div>
        <div class="col-sm">
          <img class="w-100 img-thumbnail" src="{{asset('images/contact-img2.jpg?ver=11')}}">
        </div>
      </div>
        

      
     
    



    </div> 
  </div>
</section>

<!-- end service -->

@endsection