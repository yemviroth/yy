@extends('layouts.app')


@section('title')

@endsection
@section('content')

<div class="d-sm-none pt-5">
  <div class="row text-kh">
    @foreach($cates as $cate)
     <div class="col-4 border">
          <a class="list-horizon" href="{{route('category.show', $cate->cateId)}}"><strong>{{$cate->cateName}}</strong></a>
      </div>
    @endforeach           
    </div>
  </diV>

<div class=" d-sm-none list pt-3 text-center text-kh font-weight-bold">
    <a class="pl-4" href="">
        Branch Story
    </a>

    <a class="pl-4" href="">
        ដំណាងចែកចាយ
    </a>

    <a class="pl-4" href="">
        គ្រឿងផ្សំ
    </a>
</div>
<div class="pt-5">
    <img class="w-100" src="https://theyeon.net/mainimage/shopinfo/brand_story.jpg" alt="">
</div>


@endsection