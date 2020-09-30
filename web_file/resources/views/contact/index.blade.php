@extends('layouts.app')
@php
  $mytitle = " - The Yeon Cambodia";    
@endphp

@section('content')
<section style="background: url(https://theyeon.net/mainimage/pc/contactus.jpg) no-repeat;
    background-size: 100% 100%;">
<div class="wrapper">
   <div class="container-fluid"  style="padding-top:9%";>

      <div class="text-center header-title pt-2 text-light">          
          ទំនាក់ទំនង
          <hr align="center" width="70px" style="background-color: #ccc; height: 0.01em">
       
      </div> 
    
    <!-- map -->
  <section class="pt-3">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3881.8004256628615!2d103.85384621477493!3d13.362682290600196!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311017677a2896e9%3A0xee049d66e0940743!2sThe%20YEON!5e0!3m2!1skm!2skh!4v1601042746743!5m2!1skm!2skh" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  </section>
  <!-- end map -->

  <!-- contact -->
  <div class="text-center text-kh pt-3 pb-3 text-light">
    
  
        <h6> អាសយដ្ឋាន </h6>
      <p> {{$company[0]->campanyAddress}} </p>
      <br/><h6> E-MAIL </h6>
      <p> {{$company[0]->campanyEmail}} </p>
      <br/><h6> លេខទូរស័ព្ទ </h6>
     
      <h6> {{$company[0]->campanyPhone}} </h6>
  </div>
  <!-- end contact -->

  </div> <!-- --container-- -->
</div>
</section>
@endsection