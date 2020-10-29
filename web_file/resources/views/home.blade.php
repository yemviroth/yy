@extends('layouts.app')
@section('meta')


@section('content')
<br>
<!-- slide -->
<div class="d-md-block d-sm-none" style="padding-top: 60px"></div>


<section class="d-none d-md-block">
  <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('images/slide/slide1.jpg')}}" class="d-block"  class="img-fluid" alt="...">

        <div class="carousel-caption d-none d-md-block">
          <!-- <h5>First slide label</h5> -->
          <!-- <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> -->
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{asset('images/slide/slide2.jpg')}}" class="d-block"  class="img-fluid" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <!-- <h5>Second slide label</h5> -->
          <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{asset('images/slide/slide3.jpg')}}" class="d-block"  class="img-fluid" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <!-- <h5>Third slide label</h5> -->
          <!-- <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> -->
        </div>
      </div>

    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</section>


<!-- mobile -->
<div class="">
  <section class="d-lg-none d-xl-none">
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{asset('images/slide/slide-sm-1.jpg')}}" class="w-100" alt="...">

          <div class="carousel-caption d-none d-md-block">
            <!-- <h5>First slide label</h5> -->
            <!-- <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> -->
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{asset('images/slide/slide-sm-2.jpg')}}" class="w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <!-- <h5>Second slide label</h5> -->
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{asset('images/slide/slide-sm-3.jpg')}}" class="w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <!-- <h5>Third slide label</h5> -->
            <!-- <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> -->
          </div>
        </div>

      </div>
      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </section>
</div>
<!-- end mobile -->

<!-- end of slide -->

<script type="text/javascript">
  marqueeInit({
    uniqueid: 'mycrawler',
    style: {
      'padding': '5px',
      'width': '100%',
      'background': '#ffff'
    },
    inc: 2, //speed - pixel increment for each iteration of this marquee's movement
    mouse: 'cursor driven', //mouseover behavior ('pause' 'cursor driven' or false)
    moveatleast: 2,
    neutral: 150,
    persist: true,
    savedirection: true
  });
</script>
<div class="pt-5 d-none d-md-block"><br><br></div>
<div class="d-none d-md-block">

  <div class="marquee" id="mycrawler2" style="width:100%;">
    @foreach ($product as $pro)

    <a href="{{route('productdetail.show',$pro->proId)}}"><img src="{{asset('images/product/'.$pro->proImage)}}" style="width:250px" class="" alt=""></a>
    @endforeach
  </div>
</div>
</div>





<script type="text/javascript">
  marqueeInit({
    uniqueid: 'mycrawler2',
    style: {
      'padding': '2px',
      'width': '100%',
      // 'height': '180px'
    },
    inc: 2, //speed - pixel increment for each iteration of this marquee's movement
    mouse: 'cursor pause', //mouseover behavior ('pause' 'cursor driven' or false)
    moveatleast: 2,
    neutral: 150,
    savedirection: true,
    random: true
  });
</script>


<div class="" style="margin-top:-50px;">
  @component('layouts.mobile-cate')
  @endcomponent
</div>





<section class="pt-4" style="background: #fff">

  <div class="header-title pt-5 text-center d-none d-md-block d-lg-block">ផលិតផលថ្មី</div>
  <div class="wrapper">

    <div class="container-fluid">
      <div class="d-block d-sm-block d-md-none d-lg-none">
        <div class="text-center list-tab my-3 mx-3">
          <a href="#" id="linkGrid-1">
            <img src="https://m.theyeon.net/web/upload/labelmobile/designu/btn_list_01.png" alt="">
          </a>
          <a href="#" id="linkGrid-2">
            <img src="https://m.theyeon.net/web/upload/labelmobile/designu/btn_list_02.png" alt="">
          </a>
          <a href="#" id="linkGrid-3">
            <img src="https://m.theyeon.net/web/upload/labelmobile/designu/btn_list_03.png" alt="">
          </a>

        </div>
      </div>

      <div class="row">
        @foreach ($product as $pro)

        <div class="col-sm-4 col-md-3 col-lg-4 col-6 p-1 text-kh" id="proGrid">

          <div class="">
            <div class="content">

              <a href="{{route('productdetail.show',$pro->proId)}}" target="">
                <div class="content-overlay d-none d-md-block"></div>

                <img class="content-image img-fluid" src="{{asset('images/product/'.$pro->proImage)}}">
                <div class="content-details fadeIn-top float-left d-none d-md-block">
                  @if($pro->proIsInStock=='No')
                  <span class="badge badge-light mb-4">SOLDOUT</span>
                  @endif
                  <div class="pb-4"><i class="fas fa-plus-circle fa-2x text-light" style="opacity: 0.5;"></i></i></div>
                  <h6>{!!$pro->proName!!}</h6>

                  @if($pro->proColor1!="")<span class="badge pl-4 border" style="background-color:{!!$pro->proColor1!!};"> </span>@endif
                  @if($pro->proColor2!="")<span class="badge pl-4 border" style="background-color:{!!$pro->proColor2!!};"> </span>@endif
                  @if($pro->proColor3!="")<span class="badge pl-4 border" style="background-color:{!!$pro->proColor3!!};"> </span>@endif
                  @if($pro->proColor4!="")<span class="badge pl-4 border" style="background-color:{!!$pro->proColor4!!};"> </span>@endif
                  @if($pro->proColor5!="")<span class="badge pl-4 border" style="background-color:{!!$pro->proColor5!!};"> </span>@endif

                  <p class="price">${{$pro->proPrice}}</p>
                  <p>{!!$pro->proTextIntro!!}</p>

                </div>

                <!-- mobile -->
                <div class="d-block d-lg-none">
                  <div class="text-under-product">

                    <h6>{!!$pro->proName!!}</h6>

                    @if($pro->proColor1!="")<span class="badge pl-4 border" style="background-color:{!!$pro->proColor1!!};"> </span>@endif
                    @if($pro->proColor2!="")<span class="badge pl-4 border" style="background-color:{!!$pro->proColor2!!};"> </span>@endif
                    @if($pro->proColor3!="")<span class="badge pl-4 border" style="background-color:{!!$pro->proColor3!!};"> </span>@endif
                    @if($pro->proColor4!="")<span class="badge pl-4 border" style="background-color:{!!$pro->proColor4!!};"> </span>@endif
                    @if($pro->proColor5!="")<span class="badge pl-4 border" style="background-color:{!!$pro->proColor5!!};"> </span>@endif

                    @if($pro->proIsInStock=='No')
                    <span class="badge badge-dark mb-2">SOLDOUT</span>
                    @endif
                    <p class="price">${{$pro->proPrice}}</p>
                    <p>{!!str_limit($pro->proTextIntro, 60)!!}</p>

                  </div>
                </div>
                <!-- mobile -->

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

<div class="container pt-5">
  <div class="row justify-content-center">
    <div class="col-m-6">
      {{ $product->links() }}
    </div>
  </div>

</div>


<!-- end service -->


@endsection

@section('script')
<script>
  $('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    // nav:true,
    autoplay: true,
    responsive: {
      0: {
        items: 1
      },
      100: {
        items: 3
        // },
        // 1000:{
        //     items:5
      }
    }
  });

  $(document).ready(function() {
    $('.navbar-light .dmenu').hover(function() {
      $(this).find('.sm-menu').first().stop(true, true).slideDown(150);
    }, function() {
      $(this).find('.sm-menu').first().stop(true, true).slideUp(105)
    });
  });



  $(document).ready(function() {
    $("#linkGrid-3").click(function() {
      $("div #proGrid").removeClass("col-6");
      $("div #proGrid").removeClass("col-4");
      $("div #proGrid").removeClass("col-12");
      $("div #proGrid").addClass("col-4");

    });

    $("#linkGrid-1").click(function() {
      $("div #proGrid").removeClass("col-6");
      $("div #proGrid").removeClass("col-4");
      $("div #proGrid").removeClass("col-12");
      $("div #proGrid").addClass("col-12");

    });

    $("#linkGrid-2").click(function() {
      $("div #proGrid").removeClass("col-6");
      $("div #proGrid").removeClass("col-4");
      $("div #proGrid").removeClass("col-12");
      $("div #proGrid").addClass("col-6");

    });
  });
</script>
@endsection