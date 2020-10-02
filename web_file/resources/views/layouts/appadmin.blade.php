<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fontawesome-free-5.12.0-web/css/all.css')}}  ">
    <link rel="stylesheet" href="{{asset('owlcarousel/owl.carousel.min.css')}} ">
<link rel="stylesheet" href="{{asset('owlcarousel/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{ asset('style.css')}}">


  <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> -->


        <!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">


<!-- css -->
 <!-- bootstrap-colorpicker -->
<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"> -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.2.0/css/bootstrap-colorpicker.min.css"
    rel="stylesheet">
 

    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.bootstrap4.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
<!-- end css -->
    
    <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <!-- <script src="{{asset('js/jquery-3.4.1.slim.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js') }}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script> -->
    
    <script src="{{asset('owlcarousel/owl.carousel.min.js')}}"></script>
    
  
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    
  
   <!--  -->
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>



<!-- color picker -->
<!-- <link rel="stylesheet" href="{{asset('js/spectrum.css')}}">

<script src="{{asset('js/spectrum.js')}}"></script> -->



<!-- color picker -->


    <title>      
      The Yeon Cambodia
    </title>
  </head>
  <body>

    @php
      // echo \Request::route()->getName();
      // echo "<br>";
    @endphp

    <!-- nav bar -->
    
    
            
    <nav class="navbar navbar-expand-lg bg-me" style="border:1px solid;">
           <!-- style="background-color: #d8d8d8;" --><!--  -->
           <img  src="{{asset('images/logo.png')}}">   
               
            
           
        
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
          
          
            
            <div class="collapse navbar-collapse justify-content-end nav-me" id="navbarSupportedContent">
            <ul class="navbar-nav ">
            
              <li class="nav-item {{ (\Request::route()->getName()=='home.index' ? 'active' : '') }}">
                <a class="nav-link" target="_blank" href="{{route('home.index')}}">HOME <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item {{ (\Request::route()->getName()=='category.list' ? 'active' : '') }}">
                <a class="nav-link" href="{{route('category.list')}}">CATEGORY</a>

                <li class="nav-item {{ (\Request::route()->getName()=='productdetail.list' ? 'active' : '') }}">
                <a class="nav-link" href="{{route('productdetail.list')}}">PRODUCT</a>
              </li>

              <li class="nav-item ">
                <a class="nav-link" href="{{route('company.edit','1')}}">COMPANY INFO</a>
              </li>

            
             <!--   <li class="nav-item {{ (\Request::route()->getName()=='rooms.detail.list' ? 'active' : '') }}">
                <a class="nav-link" href="{{route('rooms.detail.list')}}">ROOM DETAIL</a>
              </li> -->

              <li class="nav-item {{ (\Request::route()->getName()=='user.index' ? 'active' : '') }}">
                <a class="nav-link" href="{{route('user.index')}}">USER</a>
              </li>
            
            </ul>
            
          </div>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>

    </nav>
    <br><br><br>
</section>


@if ($message = Session::get('success'))

<div class="alert alert-success fade show" role="alert" style="position:fixed;z-index:1000; width: 96%; left:2%;bottom:2px;">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <center><strong>{{ $message }}</strong></center>
</div>

@endif


@if ($message = Session::get('error'))

<div class="alert alert-error fade show" role="alert" style="position:fixed;z-index:1000; width: 96%; left:2%;bottom:2px;">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <center><strong>{{ $message }}</strong></center>
</div>

@endif


@if ($message = Session::get('warning'))

<div class="alert alert-warning fade show" role="alert" style="position:fixed;z-index:1000; width: 96%; left:2%;bottom:2px;">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <center><strong>{{ $message }}</strong></center>
</div>

@endif


@if ($message = Session::get('info'))

<div class="alert alert-info fade show" role="alert" style="position:fixed;z-index:1000; width: 96%; left:2%;bottom:2px;">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <center><strong>{{ $message }}</strong></center>
</div>

@endif


@if ($errors->any())

<div class="alert alert-danger fade show" role="alert" style="position:fixed;z-index:1000; width: 96%; left:2%;bottom:2px;">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <center><strong>{{ $message }}</strong></center>
</div>

@endif


    <!-- end of navbar -->
@yield('content')




@yield('script')

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.2.0/js/bootstrap-colorpicker.min.js"></script>

  

<script src="{{asset('js/tinymce_image_upload.js')}}"></script>

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>



<script type="text/javascript"> 
        setTimeout(function () { 
  
            // Closing the alert 
            $('div #alert').alert('close'); 
        }, 5000); 

        window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);



$(function() {	
$.getScript("https://www.jqueryscript.net/demo/Delete-Confirmation-Dialog-Plugin-with-jQuery-Bootstrap/bootstrap-confirm-delete.js", function(){
	  $('button.delete').bootstrap_confirm_delete({
		  // heading: 'Delete',
		  message: 'Are you sure you want to delete this record?'		
});
	 });
});


    </script> 


  </body>
</html>