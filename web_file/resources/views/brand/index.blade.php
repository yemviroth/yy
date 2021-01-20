@extends('layouts.app')

@section('content')

<div class="w-100 d-none d-md-block pt-5"></div>
<section style="background: #fff">
    <div class="pt-4 d-none d-lg-block"></div>
    <div class="header-title pt-4 text-center">ដំណាងចែកចាយ</div>

</section>

<div class="wrapper pt-5">
    <div class="container">

        <section>

            <div class="row">
                @foreach($brands as $brand)

                <div class="col-md-4">
                    <div class="card col-sm-12 ml-2 mb-3">
                        <img class="card-img-top img-fluid"
                            src="@if($brand->dsPhoto == ''){{asset('images/profile/noImg.png')}}@else{{asset('images/profile/'.$brand->dsPhoto)}}@endif"
                            alt="Card image cap">
                        <div class="card-body">
                            <hr>
                         
                            <h4 class="card-title text-center">{{$brand->dsLocation}}</h4>
                            ​<p> ឈ្មោះ : <strong> {{$brand->dsName}}</strong> </p>
                            <p>អស័យដ្ឋាន : <strong> {{$brand->dsAddress}}</strong> </p>
                            <p>លេខទូរស័ព្ទ : <strong> {{$brand->dsPhone}}</strong> </p>
                            <p>Page : <strong> {{$brand->dsFb}}</strong> </p>
                            <p>IG : <strong> {{$brand->dsIg}}</strong> </p>
                            <hr>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card col-sm-12 ml-2 mb-3">
                        <img class="card-img-top img-fluid"
                            src="@if($brand->dsPhoto == ''){{asset('images/profile/noImg.png')}}@else{{asset('images/profile/'.$brand->dsPhoto)}}@endif"
                            alt="Card image cap">
                        <div class="card-body">
                            <hr>
                         
                            <h4 class="card-title text-center">{{$brand->dsLocation}}</h4>
                            ​<p> ឈ្មោះ : <strong> {{$brand->dsName}}</strong> </p>
                            <p>អស័យដ្ឋាន : <strong> {{$brand->dsAddress}}</strong> </p>
                            <p>លេខទូរស័ព្ទ : <strong> {{$brand->dsPhone}}</strong> </p>
                            <p>Page : <strong> {{$brand->dsFb}}</strong> </p>
                            <p>IG : <strong> {{$brand->dsIg}}</strong> </p>
                            <hr>
                        </div>
                    </div>
                </div>
                @endforeach





            </div>

        </section>
    </div>
</div>


@endsection