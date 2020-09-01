@extends('layouts.appadmin')
@section('title')
TROPICANA - ROOMS
@endsection
@section('content')   

<div class="container pt-4">
     



    <div class="card">
  <div class="card-header bg-dark text-light h4">
    <i class="fas fa-plus-square"></i> New Product
  </div>
  <div class="card-body">
    <!-- <h5 class="card-title">Special title treatment</h5> -->
        
    
        <form action="{{route('productdetail.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="container">
                    <div class="col-md-12 p-1">
                        <div class="row">
                                <div class="col-12">
                                    Description: 
                                <textarea class="form-control" id="summary-ckeditor" name="summary-ckeditor"></textarea
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
                                        <strong>Product Name :</strong>
                                       
    
                                        <input type="text"  value="{{old('name')}}" name="name" id="name" class="form-control @if ($errors->has('name')) is-invalid @endif " placeholder="" autocomplete="off" >
                                        @if ($errors->has('name'))
                                            <div class="invalid-feedback"> <strong>{{ $errors->first('name') }}</strong></div>
                                        @endif
                                    </div>

                                    <div class="w-100"></div>                                    

                                    <div id="dvPreview">
                                    </div>

                                    
                                      
                                    <div class="w-100"></div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <strong>Photo1 (Main):</strong>                                    
                                        <input type="file" name="filephoto1" class="form-control" id="filephoto1">
                                        @if ($errors->has('filephoto1'))
                                            <div class="error"> <strong>{{ $errors->first('filephoto1') }}</strong></div>
                                        @endif
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <strong>Photo2:</strong>                                    
                                        <input type="file" name="filephoto2" class="form-control" id="filephoto2">
                                        @if ($errors->has('filephoto1'))
                                            <div class="error"> <strong>{{ $errors->first('filephoto2') }}</strong></div>
                                        @endif
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <strong>Photo3:</strong>                                    
                                        <input type="file" name="filephoto3" class="form-control" id="filephoto3">
                                        @if ($errors->has('filephoto3'))
                                            <div class="error"> <strong>{{ $errors->first('filephoto3') }}</strong></div>
                                        @endif
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <strong>Photo4:</strong>                                    
                                        <input type="file" name="filephoto4" class="form-control" id="filephoto4">
                                        @if ($errors->has('filephoto4'))
                                            <div class="error"> <strong>{{ $errors->first('filephoto4') }}</strong></div>
                                        @endif
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <strong>Photo5:</strong>                                    
                                        <input type="file" name="filephoto5" class="form-control" id="filephoto5">
                                        @if ($errors->has('filephoto5'))
                                            <div class="error"> <strong>{{ $errors->first('filephoto5') }}</strong></div>
                                        @endif
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <strong>Photo6:</strong>                                    
                                        <input type="file" name="filephoto6" class="form-control" id="filephoto6">
                                        @if ($errors->has('filephoto6'))
                                            <div class="error"> <strong>{{ $errors->first('filephoto6') }}</strong></div>
                                        @endif
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <strong>Photo7:</strong>                                    
                                        <input type="file" name="filephoto7" class="form-control" id="filephoto7">
                                        @if ($errors->has('filephoto7'))
                                            <div class="error"> <strong>{{ $errors->first('filephoto7') }}</strong></div>
                                        @endif
                                    </div>
                                    <div class="w-100"></div>         

                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <strong>Published:</strong>
                                        <select  name="published" class="form-control">
                                          <option @if (old('published') =='Yes') {{'selected'}} @endif value="Yes">Yes</option>
                                          <option @if (old('published') =='No') {{'selected'}} @endif value="No" >No</option>
                                          
                                        </select>
                                      </div>
                                      
                                    
                                    <div class="w-100"></div>
                                 
                                    <div class="col-md-12  mt-2">
                                          <hr>
                                        <a href="{{route('rooms.main')}}" class="btn btn-success">Back</a>
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


<script>
CKEDITOR.replace( 'summary-ckeditor', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
</script>



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