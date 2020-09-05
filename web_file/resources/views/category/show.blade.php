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
                    
                <div class="col-sm-4 col-md-4 col-xs-4">
                      <div class="">
                        <div class="content">
                        <a href="{{route('productdetail.show',$pro->proId)}}" target="">
                          <div class="content-overlay"></div>
                          <img class="content-image" src="{{asset('images/product/'.$pro->proImage)}}">
                          <div class="content-details fadeIn-top float-left">
                            <h6>{!!$pro->proName!!}</h6>
                            <p class="price">${{$pro->proPrice}}</p>
                            <p>{!!$pro->proDescription!!}</p>
                          
                          
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