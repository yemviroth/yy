@extends('layouts.app')
@section('meta')


@section('content')
<br>
 <!-- slide -->
 <div class="row" style="padding-top: 10px">
   

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
              <img src="{{asset('images/slide/slide1.jpg')}}" class="d-block" style="width:100%; height:38vw" alt="...">
              
              <div class="carousel-caption d-none d-md-block">
                <!-- <h5>First slide label</h5> -->
                <!-- <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> -->
              </div>
            </div>
            <div class="carousel-item">
              <img src="{{asset('images/slide/slide2.jpg')}}" class="d-block" style="width:100%; height:38vw" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <!-- <h5>Second slide label</h5> -->
                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
              </div>
            </div>
            <div class="carousel-item">
              <img src="{{asset('images/slide/slide3.jpg')}}" class="d-block" style="width:100%; height:38vw" alt="...">
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

<div class="row">
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
            <img src="{{asset('images/slide/slide-sm-1.jpg')}}" class="img-fluid" alt="...">
            
            <div class="carousel-caption d-none d-md-block">
              <!-- <h5>First slide label</h5> -->
              <!-- <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> -->
            </div>
          </div>
          <div class="carousel-item">
            <img src="{{asset('images/slide/slide-sm-2.jpg')}}" class="img-fluid" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <!-- <h5>Second slide label</h5> -->
              <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
            </div>
          </div>
          <div class="carousel-item">
            <img src="{{asset('images/slide/slide-sm-3.jpg')}}" class="img-fluid" alt="...">
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

<!-- end of slide -->

<!-- welcome -->

<!-- end welcome -->
<!-- <div class="parallax">
 <div class="caption_pp"> <center><span class="text-light pacap">{{Config::get('mysiteVars.home_welcome_text3.'. session()->get('LANG'))}}</span></center></div>
</div> -->

<!-- explorer -->


 
    
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
                
<div class="row">
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
	inc: 3, //speed - pixel increment for each iteration of this marquee's movement
	mouse: 'cursor pause', //mouseover behavior ('pause' 'cursor driven' or false)
	moveatleast: 2,
	neutral: 150,
	savedirection: true,
	random: true
});
</script>


<section>
  <div class="d-sm-none">
  <div class="row">
    @foreach($cates as $cate)
     <div class="col-4 border">
          <a class="list-horizon" href="{{route('category.show', $cate->cateId)}}"><strong>{{$cate->cateName}}</strong></a>
      </div>
    @endforeach
     
             
    </div>
  </diV>
</section>
  
<section class="pt-2" style="background: #fff">

    <div class="header-title pt-2 text-center">ផលិតផលថ្មី</div>        
    <div class="wrapper">

      <div class="container-fluid">

          <div class="row">
            @foreach ($product as $pro)
                    
                <div class="col-sm-4 col-md-4 col-6 p-1 text-kh">
                 
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
loop:true,
margin:10,
// nav:true,
autoplay:true,
responsive:{
0:{
   items:1
},
100:{
   items:3
// },
// 1000:{
//     items:5
}
}
});

$(document).ready(function () {
$('.navbar-light .dmenu').hover(function () {
$(this).find('.sm-menu').first().stop(true, true).slideDown(150);
}, function () {
$(this).find('.sm-menu').first().stop(true, true).slideUp(105)
});
});


</script>    
@endsection