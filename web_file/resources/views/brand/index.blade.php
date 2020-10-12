@extends('layouts.app')

@section('content')

<div class="w-100 d-none d-md-block pt-5"></div>
<section class="" style="background: #fff">
  <div class="pt-4 d-none d-lg-block"></div>
  <div class="header-title pt-4 text-center">ដំណាងចែកចាយ</div>

</section>

<div class="wrapper pt-5">
  <div class="container-fluid">

    <section>

      <div class="row">
      @foreach($brands as $brand)
        <div class="col-sm-12 col-md-6 col-xl-3 pb-3">
          <div class="col-12 align-self-center">
            <img class="shadow card-img-top rounded-circle text-center" src="@if($brand->dsPhoto == ''){{asset('images/profile/noImg.png')}}@else{{asset('images/profile/'.$brand->dsPhoto)}}@endif" alt="Card image cap" style="height: 300px;">
          </div>
          <div class="col-12 align-self-center text-center">
            <hr>
            <b>
              <h4>{{$brand->dsLocation}}</h4>
            </b>
            ​<p> ឈ្មោះ : <strong> {{$brand->dsName}}</strong> </p>
            <p>អស័យដ្ឋាន : <strong> {{$brand->dsAddress}}</strong> </p>
            <p>លេខទូរស័ព្ទ : <strong> {{$brand->dsPhone}}</strong> </p>
            <p>Page : <strong> {{$brand->dsFb}}</strong> </p>
            <p>IG : <strong> {{$brand->dsIg}}</strong> </p>
            <hr>
          </div>
        </div>

      @endforeach
        

      </div>

    </section>
  </div>
</div>


@endsection