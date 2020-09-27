@extends('layouts.app')

@section('content')

<div class="wrapper">
  <div class="container-fluid">
  <div class="d-none d-lg-block" style="padding-top: 8%;"></div>

    <div class="text-center header-title pt-3 d-none d-md-block">

      @foreach($products as $pro)
      @foreach($cates as $cate)
      @if($cate->cateId == $pro->cateId)
      {{$cate->cateName}}
      @endif
      @endforeach
      @endforeach
    </div>

    <?php

    if ($previous !== null) {
      $pre = URL::to('products/' . $previous);
    } else {
      $pre = url()->current() . '/#';
    }
    ?>
    <div class="d-none d-md-block">
      <div class="row pt-4">
        <div class="col-md-2 col-sm-12 col-12 d-none d-sm-block d-md-block">
          <div class="">
            <div class="img-view text-kh">
              <a href="{{$pre}}" class="{{isset($previous) ? '' : 'isDisabled'}}"><i class="fas fa-chevron-left fa-2x"></i></a>
              <img class="border" src="{{asset('images/product/'.$products[0]->proImage)}}" alt="">
              <a href="{{ isset($next) ? URL::to( 'products/' . $next) : url()->current().'/#' }}" class="{{isset($next) ? '' : 'isDisabled'}}">
                <i class="fas fa-chevron-right fa-2x"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="p-sm-3 col-md-5 col-sm-12 col-12">
          <img class="img-fluid" src="{{asset('images/product/'.$products[0]->proImage)}}">
        </div>

        <div class="p-sm-4 col-md-5 col-sm-12 col-12 text-kh">

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
      <div class="container">
      <div class="row w-100">
           {!!$products[0]->proDetail!!}
        </div> 
      </div>
         
    </div>

    <!-- row sm -->
    <div class="d-block d-lg-none">
      <div class="row pt-5">


        <div class="col-sm-12 border">
          <img class="w-100" src="{{asset('images/product/'.$products[0]->proImage)}}">
        </div>
      </div>

      <h5 class="font-weight-normal text-center pt-3 pb-3">{!!$products[0]->proName!!}</h5>
      <div class="row border">
        <div class="pt-4 col-sm-12 text-kh">


          <!-- <div>
          <span class="fab fa-facebook fa-4x"></span>  <span class="fab fa-instagram-square fa-4x"></span>
          </div> -->


          <div class="row">
            <div class="col-3">
              <strong>តំលៃ</strong>
            </div>
            <div class="col-9">
              <h6 class="" id="priceS">${{$products[0]->proPrice}}</h6>
            </div>
          </div>

          <div class="row">
            <div class="col-3">
              Comment
            </div>
            <div class="col-9 text-mute">
              <p class="text-muted">{!!$products[0]->proTextIntro!!}</p>
            </div>
          </div>

          <div class="row">
            <div class="col-3 text-mute">
              <p>របៀបប្រើ</p>
            </div>
            <div class="col-9">
              <p class="text-muted">{!!$products[0]->proHowTo!!}</p>
            </div>
          </div>

          <div class="row">
            <div class="col-3 text-mute">
              <p>បរិយាយ</p>
            </div>
            <div class="col-9">
              <p class="">{!!$products[0]->proDescription!!}</p>
            </div>
          </div>

          
        </div>

      </div>


      <br>
     

      <div class="p-2 row border">
        <div class="col-sm-12 text-kh">
          <div class="row">
            <div class="col-3">
              <strong>ចំនួន</strong>
            </div>
            <div class="col-9 form-group row">
              <button onclick="buttonClickPlus()" class="btn btn-dark">+</button> <input id="inc" type="text" style="width: 50px;" value="1" class="text-center form-control"> <button onclick="buttonClickMn()" class="btn btn-dark">-</button>
            </div>
          </div>
        </div>
      </div>

      <script>
        var i = 1;
        
        function buttonClickPlus() {
          document.getElementById('inc').value = ++i;
          document.getElementById('price').innerHTML = '$'+ ('{{$products[0]->proPrice}}' * i).toFixed(2);         
        }   
      </script>
      <script>
        var i = 1;
        function buttonClickMn(){
          if (document.getElementById('inc').value==1) {
            
            return ;
          }else{
            document.getElementById('inc').value = --i;
            document.getElementById('price').innerHTML = '$'+ ('{{$products[0]->proPrice}}' * i).toFixed(2);
          }
                   
        }   
        
      </script>
      

      <br>

      <div class="p-2 row border">
        <div class="col-sm-12 text-kh">
          <div class="row">
            <div class="col-3">
              <strong>តំលៃសរុប</strong>
            </div>
            <div class="col-9">
              <h6 id="price" class="float-right">${{$products[0]->proPrice}}</h6>
            </div>
          </div>
        </div>
      </div>

    <div class="row">
    {!!$products[0]->proDetail!!}
    </div>    




    </div>
    <!-- end row sm -->


  </div>
</div>







</section>

<!-- end service -->

@endsection

@section('script')

<script type="text/javascript">
  var owl = $('.owl-carousel');
  owl.owlCarousel({
    loop: true,
    nav: true,
    margin: 10,
    autoplay: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
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