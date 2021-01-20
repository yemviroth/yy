@extends('layouts.app')


@section('title')

@endsection
@section('content')

@component('layouts.mobile-about-link')

@endcomponent
<div class="pt-5">
    <img class="w-100" src="{{asset('images/brand_story.jpg')}}" alt="">
</div>


@endsection