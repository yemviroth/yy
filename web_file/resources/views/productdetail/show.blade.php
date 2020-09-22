@extends('layouts.app')

@section('content')


  
<div class="wrapper">
    <div class="container-fluid"  style="padding-top:8%;">
      
        
      <div class="text-center header-title pt-2">
     
        @foreach($products as $pro)
          @foreach($cates as $cate)
            @if($cate->cateId == $pro->cateId)
              {{$cate->cateName}}
            @endif
          @endforeach
        @endforeach
      </div>
      
      
      <div class="row pt-5">

        <div class="col-md-2 col-sm-12 col-12 d-none d-sm-block d-md-block">
          <h6 class=""><  Previous   Next ></h6>
          <div class="">
          <div class="img-view">
            <img class="border" src="{{asset('images/product/'.$products[0]->proImage)}}" alt="">
          </div>
          </div>
        </div>

        <div class="pr-sm-5 col-md-5 col-sm-12 col-12">
        <img class="img-fluid" src="{{asset('images/product/'.$products[0]->proImage)}}">
        </div>

        <div class="pl-sm-5 col-md-5 col-sm-12 col-12 text-kh">
        
                <h5 class="font-weight-normal">{!!$products[0]->proName!!}</h5>
                
                <h6 class="pt-3 price">${{$products[0]->proPrice}}</h6>
                <p class="pt-3 text-muted">{!!$products[0]->proTextIntro!!}</p>
                
                <h6 class="text-kh-bold pt-3">របៀបប្រើ</h6>
                <p>{!!$products[0]->proHowTo!!}</p>
                <h6 class="text-kh-bold pt-3">បរិយាយ </h6>
                <div class="text-kh">{!!$products[0]->proDescription!!}</div>
                
                <h6 class="text-kh-bold">Total : </h6>
          
        </div>
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