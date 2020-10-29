<section>


    <!-- sid nav -->

    <nav id="sidebar">
      <div id="dismiss">
        <i class="fas fa-times fa-1x"></i>
      </div>

      <div class="sidebar-header">
        <h5 class="text-center">The Yeon Cambodia</h5>
      </div>
      <div class="p-3 font-weight-bold">

        <div>
          <form action="{{route('search')}}" method="GET" class="form-group">
            @csrf
            <input value="{{request()->input('search')}}" name="search" type="text" class="form-control" placeholder="ស្វែងរក">
          </form>
        </div>
        <hr>
        <div class="">
          <ul class="list-group list-group-horizontal">

            <li class="list-group-item flex-fill text-center" style="padding:1px;;"><a href="{{route('about.index')}}">អំពីយើង</a></li>
            <li class="list-group-item flex-fill text-center" style="padding:1px; "><a href="{{route('about.index')}}">About Us</a></li>
            <li class="list-group-item flex-fill text-center" style="padding:1px; "><a href="{{route('contact.index')}}">ទំនាក់ទំនង</a></li>
          </ul>
        </div>


        <ul class="nav nav-tabs pt-3" id="pills-tab" role="tablist">
          <li class="nav-item" style="width:50%">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">ផលិតផល</a>
          </li>
          <li class="nav-item" style="width:50%">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">តំណាងចែកចាយ</a>
          </li>

        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <ul class="nav  nav-stacked" style="display:block;">
              @foreach($cates as $cate)
              <li><a href="{{route('category.show', $cate->cateId)}}">{{$cate->cateName}}</a></li>
              @endforeach
            </ul>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>




        </div>




      </div>

    </nav>


    <!-- end side nav -->

    <!-- nav me  -->
    <nav class="navbar navbar-expand-lg navbar-light bg-header" id="header">

      <button type="button" id="sidebarCollapse" class="btn d-inline-block d-lg-none navbar-left">
        <i class="fas fa-align-justify"></i>

      </button>
      <a class="navbar-brand" href="{{route('home.index')}}"><span class="header-text" style="color:#057374; overflow: hidden;"><img class="img-fluid img-fluid-sm" src="{{asset('images')}}/logo.png"></span></a>


      <div class="collapse navbar-collapse  nav-me" style="padding-top:2rem;padding-bottom:0.7rem;color:#0000;" id="navbarSupportedContent">
        <ul class="navbar-nav ">
          <li class="nav-item {{ (\Request::route()->getName()=='home.index' ? 'active' : '') }}">
            <a class="nav-link" href="{{route('home.index')}}">ទំព័រដើម</a>
          </li>
          <!-- <i class="fas fa-home"></i> -->

          <li class="nav-item {{ (\Request::route()->getName()=='home.index' ? 'active' : '') }}">
            <div class="dropdown">
              <a class="nav-link" href="#">ផលិតផល <span class="sr-only">(current)</span></a>
              <div class="dropdown-content">
                @foreach ($cates as $cate)
                <a href="{{route('category.show', $cate->cateId)}}">{{$cate->cateName}}</a>
                @endforeach

              </div>
            </div>
          </li>
          <li class="nav-item {{ (\Request::route()->getName()=='about.index' ? 'active' : '') }}">

            <div class="dropdown">
              <a class="nav-link {{ (\Request::route()->getName()=='about.index' ? 'active' : '') }}{{ (\Request::route()->getName()=='ingrediant' ? 'active' : '') }}"  href="#">អំពីយើង</a>
              <div class="dropdown-content">
                <a class="{{ (\Request::route()->getName()=='about.index' ? 'active' : '') }}" href="{{route('about.index')}}">Branh Story</a>
                <a class="" href="{{route('brand.index')}}">ដំណាងចែកចាយ</a>
                <a class="{{ (\Request::route()->getName()=='ingrediant' ? 'active' : '') }}" href="{{route('ingrediant')}}">គ្រឿងផ្សំ</a>
              </div>
            </div>
          </li>

          <li class="nav-item {{ (\Request::route()->getName()=='brand.index' ? 'active' : '') }}">
            <a class="nav-link" href="{{route('brand.index')}}">ដំណាងចែកចាយ</a>
          </li>
         

          <li class="nav-item {{ (\Request::route()->getName()=='contact.index' ? 'active' : '') }}">
            <a class="nav-link" href="{{route('contact.index')}}">ទំនាក់ទំនង</a>
          </li>

        </ul>
      </div>

      <button class="btn btn-outline-primary border-0" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-search"></i></button>

      <!-- <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
               
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button" onclick="openSearch()"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form> -->
    </nav>
    <!-- end nav me -->
<script>
  function openSearch() {
  document.getElementById("myOverlay").style.display = "block";
  document.getElementById("myOverlay").style.opacity = 1;
}

// Close the full screen search box
function closeSearch() {
  document.getElementById("myOverlay").style.display = "none";
}
</script>
  </section>

  <!-- end of navbar -->