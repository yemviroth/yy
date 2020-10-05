@extends('layouts.app')

@section('content')

<!-- slide -->

<div class="wrapper">

  <div class="container-fluid">
    <div class="d-none d-sm-block d-md-block" style="padding-top: 100px;"></div>
    <section class="" style="background: #fff;">

      <div class="header-title text-center p-3">ស្វែងរកផលិតផល</div>

      <form action="{{route('search')}}" method="Get" class="form-group pt-2 mb-5">
        <div class="row">
          <div class="col-md-10 col-12 col-sm-12 mb-2">
            @csrf
            <input type="text" value="{{request()->input('search')}}" name="search" class="form-control" placeholder="ស្វែងរក​">
          </div>
          <div class="col-md-2 col-12 col-sm-12 mb-2">
            <button role="submit" class="btn btn-dark w-100"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </form>


      <div class="row pt-1">
        <div class="col-md-6 col-sm-12 ">


          <p class="font-weight-bold text-kh">លទ្ធផលសម្រាប់ {{request()->input('search')}} មាន: <span class="badge badge-primary badge-pill">{{$pros->count()}}</span></p>



        </div>
        <div class="d-none d-md-block d-lg-block col-md-6 col-sm-12 text-right text-kh">
          <strong>តម្រៀប :</strong> <a href="{{url()->full()}}&sort=1">ផលិតផលថ្មី </a> | <a href="{{url()->full()}}&sort=2">ឈ្មោះផលិតផល </a>| <a href="{{url()->full()}}&sort=3">តំលៃខ្ពស់ </a>| <a href="{{url()->full()}}&sort=4">តំលៃទាប </a>
        </div>

        <div class="d-none d-sm-none d-xs-block col-md-6 col-sm-12 text-right text-kh">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="sort">តម្រៀប</label>
            </div>
            <select name="sort" class="custom-select" id="sort" onchange="location='{{url()->full()}}&sort='+ this.value">
              <option value="1" @if(request()->input('sort')==1) selected @endif>ផលិតផលថ្មី</option>
              <option value="2" @if(request()->input('sort')==2) selected @endif>ឈ្មោះផលិតផល</option>
              <option value="3" @if(request()->input('sort')==3) selected @endif>តំលៃខ្ពស់</option>
              <option value="4" @if(request()->input('sort')==4) selected @endif>តំលៃទាប</option>
            </select>
          </div>
        </div>



      </div>

      <div class="row border">
        @foreach ($pros as $pro)

        <div class="col-sm-4 col-md-4 col-6 mt-3">

          <div class="">
            <div class="content">
              <div class="">
                <a href="{{route('productdetail.show',$pro->proId)}}" target="">
                  <div class="content-overlay d-none d-md-block"></div>
                  <img class="content-image img-fluid" src="{{asset('images/product/'.$pro->proImage)}}">
                  <div class="content-details fadeIn-top float-left d-none d-md-block">
                    @if($pro->proIsInStock=='No')
                    <span class="badge badge-light mb-4">SOLDOUT</span>
                    @endif
                    <h6>{!!$pro->proName!!}</h6>
                    @if($pro->proColor1!="")<span class="badge pl-4  border" style="background-color:{!!$pro->proColor1!!};">  </span>@endif
                    @if($pro->proColor2!="")<span class="badge pl-4  border" style="background-color:{!!$pro->proColor2!!};">  </span>@endif
                    @if($pro->proColor3!="")<span class="badge pl-4  border" style="background-color:{!!$pro->proColor3!!};">  </span>@endif
                    @if($pro->proColor4!="")<span class="badge pl-4  border" style="background-color:{!!$pro->proColor4!!};">  </span>@endif
                    @if($pro->proColor5!="")<span class="badge pl-4  border" style="background-color:{!!$pro->proColor5!!};">  </span>@endif

                    <p class="price">${{$pro->proPrice}}</p>
                    <p>{!!$pro->proTextIntro!!}</p>
                  </div>
              </div>


              <div class="d-block d-md-none">
                <div class="text-under-product">

                    <div class="pt-3">

                    @if($pro->proColor1!="")<span class="badge pl-4  border" style="background-color:{!!$pro->proColor1!!};">  </span>@endif
                    @if($pro->proColor2!="")<span class="badge pl-4  border" style="background-color:{!!$pro->proColor2!!};">  </span>@endif
                    @if($pro->proColor3!="")<span class="badge pl-4  border" style="background-color:{!!$pro->proColor3!!};">  </span>@endif
                    @if($pro->pror4!="")<span class="badge pl-4  border" style="background-color:{!!$pro->proColor4!!};">  </span>@endif
                    @if($pro->proColor5!="")<span class="badge pl-4  border" style="background-color:{!!$pro->proColor5!!};">  </span>@endif

          
                    </div>
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
</div>
</div>








@endsection