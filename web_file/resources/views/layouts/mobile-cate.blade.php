<div class="pt-2 d-block d-md-none d-lg-none"></div>
<div class="d-sm-none pt-5">
  <div class="row text-kh">
    @foreach($cates as $cate)
     <div class="col-4 border">
          <a class="list-horizon" href="{{route('category.show', $cate->cateId)}}"><strong>{{$cate->cateName}}</strong></a>
      </div>
    @endforeach           
    </div>
  </diV>