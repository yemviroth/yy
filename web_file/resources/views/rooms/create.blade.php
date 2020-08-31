@extends('layouts.appadmin')
@section('title')
New Rooms
@endsection
@section('content')   

<div class="container pt-4">
     



    <div class="card">
  <div class="card-header bg-me text-light h4">
    <i class="fas fa-plus-square"></i> New Rooms
  </div>
  <div class="card-body">
    <!-- <h5 class="card-title">Special title treatment</h5> -->
        
    
        <form action="{{route('rooms.store')}}" method="POST" enctype="multipart/form-data">
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
                                        <strong>Room Main:</strong>
                                        <select  name="room_id" class="form-control">
                                                @foreach ($mains as $main)
                                                    <option value="{{$main->id}}">{{$main->name}}</option>          
                                                @endforeach

                                          
                                        </select>
                                      </div>

                                      <div class="w-100"></div>

                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <strong>Room Name English :</strong>
                                       
    
                                        <input type="text"  value="{{old('name')}}" name="name" id="name" class="form-control @if ($errors->has('name')) is-invalid @endif " placeholder="" autocomplete="off" >
                                        @if ($errors->has('name'))
                                            <div class="invalid-feedback"> <strong>{{ $errors->first('name') }}</strong></div>
                                        @endif
                                    </div>

                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <strong>Room Name Thai :</strong>
                                       
    
                                        <input type="text"  value="{{old('name_th')}}" name="name_th" id="name_th" class="form-control @if ($errors->has('name_th')) is-invalid @endif " placeholder="" autocomplete="off" >
                                        @if ($errors->has('name_th'))
                                            <div class="invalid-feedback"> <strong>{{ $errors->first('name_th') }}</strong></div>
                                        @endif
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <strong>Room Name Chinese :</strong>
                                       
    
                                        <input type="text"  value="{{old('name_ch')}}" name="name_ch" id="name_ch" class="form-control @if ($errors->has('name_ch')) is-invalid @endif " placeholder="" autocomplete="off" >
                                        @if ($errors->has('name_ch'))
                                            <div class="invalid-feedback"> <strong>{{ $errors->first('name_ch') }}</strong></div>
                                        @endif
                                    </div>

                                    <div class="w-100"></div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <strong>Room Price :</strong>
                                       
    
                                        <input type="text"  value="{{old('price')}}" name="price" id="price" class="form-control @if ($errors->has('price')) is-invalid @endif " placeholder="" autocomplete="off">
                                        @if ($errors->has('price'))
                                            <div class="invalid-feedback"> <strong>{{ $errors->first('price') }}</strong></div>
                                        @endif
                                    </div>

                                    <div class="w-100"></div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <strong>Description English :</strong>
                                    

                                        <textarea rows="6"  value="{{old('description')}}" name="description" id="description" class="form-control @if ($errors->has('description')) is-invalid @endif " placeholder="" autocomplete="off">{{old('description')}}</textarea>
                                        @if ($errors->has('description'))
                                            <div class="invalid-feedback"> <strong>{{ $errors->first('description') }}</strong></div>
                                        @endif
                                    </div>

                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <strong>Description Thai :</strong>
                                    

                                        <textarea rows="6"  value="{{old('description_th')}}" name="description_th" id="description_th" class="form-control @if ($errors->has('description_th')) is-invalid @endif " placeholder="" autocomplete="off">{{old('description')}}</textarea>
                                        @if ($errors->has('description_th'))
                                            <div class="invalid-feedback"> <strong>{{ $errors->first('description_th') }}</strong></div>
                                        @endif
                                    </div>

                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <strong>Description Chinese :</strong>
                                    

                                        <textarea rows="6"  value="{{old('description_ch')}}" name="description_ch" id="description_ch" class="form-control @if ($errors->has('description_ch')) is-invalid @endif " placeholder="" autocomplete="off">{{old('description')}}</textarea>
                                        @if ($errors->has('description_ch'))
                                            <div class="invalid-feedback"> <strong>{{ $errors->first('description_ch') }}</strong></div>
                                        @endif
                                    </div>

                                    <div id="dvPreview">
                                    </div>

                                    <div class="w-100"></div>         
                                    
                                 
                                    <div class="col-md-12  mt-2">
                                          <hr>
                                        <a href="{{route('rooms.list')}}" class="btn btn-success">Back</a>
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