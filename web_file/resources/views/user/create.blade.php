@extends('layouts.appadmin')
@section('title')
New Rooms
@endsection
@section('content')   

<div class="container pt-4">
     



    <div class="card">
  <div class="card-header bg-me text-light h4">
    <i class="fas fa-plus-square"></i> New User
  </div>
  <div class="card-body">
    <!-- <h5 class="card-title">Special title treatment</h5> -->
        
    
        <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="container">
                    <div class="col-md-12 p-1">
                        <div class="row">
                                <div class="col-12">
                                        @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible fade show"  role="alert"><strong>Whoops</strong> there where some problems with your input.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            
                                            {{-- <ul  class="list-unstyled">
                                                @foreach ($errors->all() as $error)
                                                    <li class="alert alert-danger">{{$error}}</li>
                                                @endforeach
                                            </ul> --}}
                                        @endif
                                    </div>

{{--                                     <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <strong>Language:</strong>
                                        <select  name="lang" class="form-control">
                                          <option @if (old('lang') =='EN') {{'selected'}} @endif value="EN">English</option>
                                          <option @if (old('lang') =='TH') {{'selected'}} @endif value="TH" >Thailand</option>
                                          <option @if (old('lang') =='CH') {{'selected'}} @endif value="CH" >China</option>
                                          
                                        </select>
                                      </div> --}}

                                   

                                      <div class="w-100"></div>

                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <strong>Name :</strong>
                                       
    
                                        <input type="text"  value="{{old('name')}}" name="name" id="name" class="form-control @if ($errors->has('name')) is-invalid @endif " placeholder="" autocomplete="off" >
                                        @if ($errors->has('name'))
                                            <div class="invalid-feedback"> <strong>{{ $errors->first('name') }}</strong></div>
                                        @endif
                                    </div>

                                    <div class="w-100"></div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <strong>Username :</strong>
                                       
    
                                        <input type="text"  value="{{old('username')}}" name="username" id="username" class="form-control @if ($errors->has('username')) is-invalid @endif " placeholder="" autocomplete="off">
                                        @if ($errors->has('username'))
                                            <div class="invalid-feedback"> <strong>{{ $errors->first('username') }}</strong></div>
                                        @endif
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <strong>Email :</strong>
                                       
    
                                        <input type="email"  value="{{old('email')}}" name="email" id="email" class="form-control @if ($errors->has('email')) is-invalid @endif " placeholder="" autocomplete="off">
                                        @if ($errors->has('email'))
                                            <div class="invalid-feedback"> <strong>{{ $errors->first('email') }}</strong></div>
                                        @endif
                                    </div>
                                    <div class="w-100"></div>
                                     <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <strong>Password :</strong>
                                       
    
                                        <input type="password"  value="" name="password" id="password" class="form-control @if ($errors->has('password')) is-invalid @endif " placeholder="" autocomplete="new-password">
                                        @if ($errors->has('password'))
                                            <div class="invalid-feedback"> <strong>{{ $errors->first('password') }}</strong></div>
                                        @endif
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                       <strong>Confirm Password :</strong>
                                      
   
                                       <input type="password"  value="" name="password_confirmation" id="password_confirmation" class="form-control @if ($errors->has('password_confirmation')) is-invalid @endif " placeholder="" autocomplete="new-password">
                                       @if ($errors->has('password_confirmation'))
                                           <div class="invalid-feedback"> <strong>{{ $errors->first('password') }}</strong></div>
                                       @endif
                                   </div>
                                   
                                   
                                   


                                    <div class="w-100"></div>         
                                    
                                 
                                    <div class="col-md-12  mt-2">
                                          <hr>
                                        <a href="{{route('user.index')}}" class="btn btn-success">Back</a>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                        </div>
                            
                    </div>
            </div>
               
                
                    
                
                    
          
        </div>

    
    </form>
    


  </div>
</div>

</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script language="javascript" type="text/javascript">
$(function () {
    $("#fileupload").change(function () {
        $("#dvPreview").html("");
        var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
        if (regex.test($(this).val().toLowerCase())) {
            if ($.browser.msie && parseFloat(jQuery.browser.version) <= 9.0) {
                $("#dvPreview").show();
                $("#dvPreview")[0].filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = $(this).val();
            }
            else {
                if (typeof (FileReader) != "undefined") {
                    $("#dvPreview").show();
                    $("#dvPreview").append("<img />");
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $("#dvPreview img").attr("src", e.target.result);
                    }
                    reader.readAsDataURL($(this)[0].files[0]);
                } else {
                    alert("This browser does not support FileReader.");
                }
            }
        } else {
            alert("Please upload a valid image file.");
        }
    });
});
</script>
@endsection