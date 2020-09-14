@extends('layouts.app')

@section('content')
<br><br><br><br>


<section class="p-2" style="background: #fff">
    <div class="header-title pt-4 text-center">{{$pros[0]->subCategories_Category->cateName }}</div>
        <div class="text-center pt-2">
           @foreach ($category as $cate)
              @foreach($cate->subCategories as $subcate)  

                <a href="{{route('category/subcategory.show',$subcate->subCateId)}}">{{$subcate->subCateName}}</a>
              @endforeach
          @endforeach  
        </div>
        </div>
    <div class="wrapper">
      <div class="container-fluid">
        <div class="row pt-4">
            <div class="col-md-6">
                <div class="text-kh">
                        <p class="font-weight-bold">ចំនួនផលិតផល :   {{$pros[0]->subCategories_product->count() }}</p>
                      </div>   
            </div>
            <div class="col-md-6 text-right text-kh">
              Sort : <a href="{{url()->current()}}/?sort=1">ផលិតផលថ្មី </a> | <a href="{{url()->current()}}/?sort=2"">ឈ្មោះផលិតផល </a>| <a href="{{url()->current()}}/?sort=3"">តំលៃខ្ពស់ </a>| <a href="{{url()->current()}}/?sort=4"">តំលៃទាប </a>
            </div>
          </div>
        </div> 
    </div>
      
        


        <div class="row">
           @foreach ($pros as $pross)
               @foreach($pross->subCategories_product as $pro)     
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
            @endforeach
          </div>
        </section>
        </div>
      </div>
</section>





  
@endsection