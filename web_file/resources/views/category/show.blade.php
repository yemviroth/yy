@extends('layouts.app')

@section('content')
<br><br><br><br>
 <!-- slide -->
  

       
        <hr>

<section class="p-2" style="background: #fff">
    <div class="header-title p-4 text-center">ផលិតផលថ្មី</div>        
    <div class="wrapper">

      <div class="container-fluid">

          <div class="row">
            @foreach ($pros as $pro)
                    
            <div class="col-sm-4 col-md-4 col-6 mt-3">
                 
                 <div class="">
                   <div class="content">
                     <a href="{{route('productdetail.show',$pro->proId)}}" target="">
                     <div class="content-overlay d-none d-md-block"></div>
                     <img class="content-image img-fluid" src="{{asset('images/product/'.$pro->proImage)}}">
                     <div class="content-details fadeIn-top float-left d-none d-md-block">
                       @if($pro->proIsInStock=='No')
                       <span class="badge badge-light mb-4">SOLDOUT</span>
                       @endif
                       <h6>{!!$pro->proName!!}</h6>
                       <p class="price">${{$pro->proPrice}}</p>
                       <p>{!!$pro->proTextIntro!!}</p>
                     
                     </div>
                     

                     <div class="d-block d-md-none">
                       <div class="text-under-product">
                           
                           <h6>{!!$pro->proName!!}</h6>
                           @if($pro->proIsInStock=='No')
                           <span class="badge badge-dark mb-2">SOLDOUT</span>
                           @endif
                         <p class="price">${{$pro->proPrice}}</p>
                         <p>{{ str_limit($pro->proTextIntro, 60) }}</p>
                         
                       </div>
                    </div>

                   </a>
                 </div>
               </div>
           </div>


            @endforeach

          </div> 
        </section>
        </div>
      </div>
</section>





  
@endsection