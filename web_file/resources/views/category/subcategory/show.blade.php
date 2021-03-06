@extends('layouts.app')

@section('content')
<br>
<div class="w-100 d-none d-md-block pt-5"></div>
<div class="wrapper">
<div class="container-fluid">


<section class="" style="background: #fff">
    <div class="header-title pt-4 text-center">{{$pros[0]->subCateName}}</div>
    <!-- {{$pros[0]->subCategories_Category->cateName }} -->
    @foreach($pros as $pro)
      
      
    @endforeach
    
        <div class="text-center pt-2">
        

          @foreach ($subcatee as $subb)
          <li class="list-horizon d-inline pl-4"><a href="{{url("/category/$subb->cateId/subCates/$subb->subCateId")}}">{{$subb->subCateName}}</a></li>
          @endforeach
        </div>
        </div>

     
             
     
     
    
      <div class="row pt-4">
          <div class="col-md-6">
              <div class="text-kh">
                      <p class="font-weight-bold">ចំនួនផលិតផល :   {{$pros[0]->subCategories_product->count() }}</p>
                    </div>   
          </div>
          <div class="d-none d-md-block d-lg-block col-md-6 text-right text-kh">
            Sort : <a href="{{url()->current()}}/?sort=1">ផលិតផលថ្មី </a> | <a href="{{url()->current()}}/?sort=2"">ឈ្មោះផលិតផល </a>| <a href="{{url()->current()}}/?sort=3"">តំលៃខ្ពស់ </a>| <a href="{{url()->current()}}/?sort=4"">តំលៃទាប </a>
          </div>

          <div class="d-none d-sm-none d-xs-block col-md-6 col-sm-12 text-right text-kh">
          <div class="input-group mb-3">
            <!--   <div class="input-group-prepend">
                  <label class="input-group-text" for="sort">តម្រៀប</label>
                </div> -->
            <select name="sort" class="custom-select" id="sort" onchange="location='{{url()->current()}}/?sort='+ this.value">
              <option value="0" selected>--តម្រៀប--</option>
              <option value="1" @if(request()->input('sort')==1) selected @endif>ផលិតផលថ្មី</option>
              <option value="2" @if(request()->input('sort')==2) selected @endif>ឈ្មោះផលិតផល</option>
              <option value="3" @if(request()->input('sort')==3) selected @endif>តំលៃខ្ពស់</option>
              <option value="4" @if(request()->input('sort')==4) selected @endif>តំលៃទាប</option>
            </select>
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
                        <h5><span class="p-1 badge badge-light mb-4 ">មិនមានក្នុងស្តុក</span></h5>
                        @endif
                        <h6>{!!$pro->proName!!}</h6>
                        @if($pro->proColor1!="")<span class="badge pl-4 border" style="background-color:{!!$pro->proColor1!!};">  </span>@endif
                    @if($pro->proColor2!="")<span class="badge pl-4 border" style="background-color:{!!$pro->proColor2!!};">  </span>@endif
                    @if($pro->proColor3!="")<span class="badge pl-4 border" style="background-color:{!!$pro->proColor3!!};">  </span>@endif
                    @if($pro->proColor4!="")<span class="badge pl-4 border" style="background-color:{!!$pro->proColor4!!};">  </span>@endif
                    @if($pro->proColor5!="")<span class="badge pl-4 border" style="background-color:{!!$pro->proColor5!!};">  </span>@endif

                      
                       <p class="price">${{$pro->proPrice}}</p>
                       <p>{!!$pro->proTextIntro!!}</p>
                     
                     </div>
                     

                     <div class="d-block d-md-none">
                       <div class="text-under-product">
                           
                           <h6>{!!$pro->proName!!}</h6>
                           
                           @if($pro->proColor1!="")<span class="badge pl-4 border" style="background-color:{!!$pro->proColor1!!};">  </span>@endif
                    @if($pro->proColor2!="")<span class="badge pl-4 border" style="background-color:{!!$pro->proColor2!!};">  </span>@endif
                    @if($pro->proColor3!="")<span class="badge pl-4 border" style="background-color:{!!$pro->proColor3!!};">  </span>@endif
                    @if($pro->proColor4!="")<span class="badge pl-4 border" style="background-color:{!!$pro->proColor4!!};">  </span>@endif
                    @if($pro->proColor5!="")<span class="badge pl-4 border" style="background-color:{!!$pro->proColor5!!};">  </span>@endif

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
</div>
</div>



  
@endsection