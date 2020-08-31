@extends('layouts.appadmin')
@section('title')
TROPICANA - ROOMS Detail
@endsection
@section('content')   

<div class="container pt-4">
     



    <div class="card">
  <div class="card-header bg-me text-light h4">
    <i class="fas fa-plus-square"></i> Edit Rooms Detail
  </div>
  <div class="card-body">
    <!-- <h5 class="card-title">Special title treatment</h5> -->
        
    
       <!--  <form action="{{route('rooms.detail.update',$details->id)}}" method="Get" enctype="multipart/form-data"> -->
            <form action="{{route('rooms.detail.update',$details->id)}}" method="post" enctype="multipart/form-data">            
        
         <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">

                                         <strong>Language:</strong>
                                        <select  name="lang" class="form-control">
                                          <option @if ($details->lang =='EN') {{'selected'}} @endif value="EN">English</option>
                                          <option @if ($details->lang =='TH') {{'selected'}} @endif value="TH" >Thailand</option>
                                          <option @if ($details->lang =='CH') {{'selected'}} @endif value="CH" >China</option>
                                          
                                        </select>
                                   <!--      <strong>Language :</strong>
                                       
    
                                        <input type="text"  value="{{$details->lang}}" name="lang" id="lang" class="form-control @if ($errors->has('lang')) is-invalid @endif " placeholder="" autocomplete="off" >
                                        @if ($errors->has('lang'))
                                            <div class="invalid-feedback"> <strong>{{ $errors->first('lang') }}</strong></div>
                                        @endif
                                       -->  
                                   </div>

                                   


                                    <div class="w-100"></div>
                                    
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <strong>Text :</strong>
                                       
    
                                        <input type="text" required value="{{$details->text}}" name="text" id="text" class="form-control @if ($errors->has('text')) is-invalid @endif " placeholder="" autocomplete="off" >
                                        @if ($errors->has('text'))
                                            <div class="invalid-feedback"> <strong>{{ $errors->first('text') }}</strong></div>
                                        @endif
                                    </div>
                                        
                                      
                                    <div class="w-100"></div>

                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <strong>Order :</strong>
                                       
    
                                        <input type="text" required  value="{{$details->order}}" name="order" id="order" class="form-control @if ($errors->has('order')) is-invalid @endif " placeholder="" autocomplete="off" >
                                        @if ($errors->has('order'))
                                            <div class="invalid-feedback"> <strong>{{ $errors->first('order') }}</strong></div>
                                        @endif
                                    </div>
                                        
                                      
                                    <!-- <div class="w-100"></div>

                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <strong>Icon :</strong>
                                       
    
                                        <input type="text"  value="{{$details->icon}}" name="Icon" id="Icon" class="form-control @if ($errors->has('Icon')) is-invalid @endif " placeholder="" autocomplete="off" >
                                        @if ($errors->has('Icon'))
                                            <div class="invalid-feedback"> <strong>{{ $errors->first('Icon') }}</strong></div>
                                        @endif
   
                                   
                                    </div> -->
                                       
                                            
                                       
                                      
                                    <div class="w-100"></div>

                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                            <strong>Icon :</strong>
                                            <div class="font-awesome">       

                                             <select name="icon" id="Icon" class="form-control fa">
                                               <option class="fa"  value='<i class="fas fa-person-booth pr-3"></i>' @if($details->icon =='<i class="fas fa-person-booth pr-3"></i>') selected @endif>        &#xf756 
                                                </option> <!-- room/bed size -->

                                                <option class="fa" value='<i class="fas fa-wifi pr-3 "></i>' @if($details->icon =='<i class="fas fa-wifi pr-3 "></i>') selected @endif>        &#xf1eb
                                                </option> <!-- wifi -->

                                              

                                                <option class="fa" value='<i class="fas fa-users pr-3"></i>' @if($details->icon =='<i class="fas fa-users pr-3"></i>') selected @endif>        &#xf0c0
                                                </option> <!-- user -->
                                                
                                        </select>
                                         @if ($errors->has('Icon'))
                                            <div class="invalid-feedback"> <strong>{{ $errors->first('Icon') }}</strong></div>
                                        @endif
                                        </div>  
                                    </div>

                                    

                                   
                                 
                                    <div class="w-100"></div>
                                 
                                    <div class="col-md-12  mt-2">
                                          <hr>
                                        <a href="{{route('rooms.detail.list')}}" class="btn btn-success">Back</a>
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