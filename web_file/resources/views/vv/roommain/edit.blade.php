@extends('layouts.appadmin')
@section('title')
TROPICANA - ROOMS MAIN
@endsection
@section('content')   

<div class="container pt-4">
     



    <div class="card">
  <div class="card-header bg-me text-light h4">
    <i class="fas fa-plus-square"></i> Edit Rooms Main
  </div>
  <div class="card-body">
    <!-- <h5 class="card-title">Special title treatment</h5> -->
        
    
        <!-- <form action="{{route('rooms.update',$edits->id)}}" method="Get" enctype="multipart/form-data"> -->
            <form action="{{route('rooms.main.update',$edits->id)}}" method="post" enctype="multipart/form-data">            
        
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
                                        <strong>Room Name :</strong>
                                       
    
                                        <input type="text"  value="{{$edits->name}}" name="name" id="name" class="form-control @if ($errors->has('name')) is-invalid @endif " placeholder="" autocomplete="off" >
                                        @if ($errors->has('name'))
                                            <div class="invalid-feedback"> <strong>{{ $errors->first('name') }}</strong></div>
                                        @endif
                                    </div>
                                        
                                      
                                    <div class="w-100"></div>

                                    @php
                                        $verroom="";
                                        if ($edits->updated_at =="") {
                                            $verroom=strtotime($edits->created_at);
                                        } else {
                                            $verroom=strtotime($edits->updated_at);
                                        }
                                    @endphp


                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <strong>Photo1 (Main):</strong>                                    
                                        <input type="file" name="filephoto1" class="form-control">
                                        @if ($errors->has('filephoto1'))
                                            <div class="error"> <strong>{{ $errors->first('filephoto1') }}</strong></div>
                                        @endif
                                    </div>
                                    <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                        <img class="mt-2" src="{{asset('images/'. $edits->photo1 .'?ver='.$verroom)}}" alt="" width="150px">
                                      </div>
                                    
                                    <div class="w-100"></div>

                                    
                                    
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <strong>Photo2:</strong>                                    
                                        <input type="file" name="filephoto2" class="form-control">
                                        @if ($errors->has('filephoto2'))
                                            <div class="error"> <strong>{{ $errors->first('filephoto2') }}</strong></div>
                                        @endif
                                    </div>

                                    <?php if ($edits->photo2 !="") { ?>                                  
                                        <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                            <img class="mt-2" src="{{asset('images/'. $edits->photo2 .'?ver='.$verroom)}}" alt="" width="150px">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="chkphoto2" id="chkphoto2">
                                                <label class="form-check-label" for="chkphoto2">
                                                        <i style="color:red" class="fas fa-trash"></i>
                                                </label>
                                            </div>
                                          </div>
                                          
                                                
                                       
                                         

                                        <div class="w-100"></div>
                                    <?php } ?>


                                    <div class="w-100"></div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <strong>Photo3:</strong>                                    
                                        <input type="file" name="filephoto3" class="form-control">
                                        @if ($errors->has('filephoto3'))
                                            <div class="error"> <strong>{{ $errors->first('filephoto3') }}</strong></div>
                                        @endif
                                    </div>
                                    <?php if ($edits->photo3 !="") { ?>                                  
                                        <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                            <img class="mt-2" src="{{asset('images/'. $edits->photo3 .'?ver='.$verroom)}}" alt="" width="150px">
                                            <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="chkphoto3" id="chkphoto3">
                                                    <label class="form-check-label" for="chkphoto3">
                                                            <i style="color:red" class="fas fa-trash"></i>
                                                    </label>
                                                </div>
                                          </div>
                                        
                                        <div class="w-100"></div>
                                    <?php } ?>

                                    <div class="w-100"></div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <strong>Photo4:</strong>                                    
                                        <input type="file" name="filephoto4" class="form-control">
                                        @if ($errors->has('filephoto4'))
                                            <div class="error"> <strong>{{ $errors->first('filephoto4') }}</strong></div>
                                        @endif
                                    </div>
                                    <?php if ($edits->photo4 !="") { ?>                                  
                                        <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                            <img class="mt-2" src="{{asset('images/'. $edits->photo4 .'?ver='.$verroom)}}" alt="" width="150px">
                                            <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="chkphoto4" id="chkphoto4">
                                                    <label class="form-check-label" for="chkphoto4">
                                                            <i style="color:red" class="fas fa-trash"></i>
                                                    </label>
                                                </div>
                                          </div>
                                        
                                        <div class="w-100"></div>
                                    <?php } ?>

                                    <div class="w-100"></div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <strong>Photo5:</strong>                                    
                                        <input type="file" name="filephoto5" class="form-control">
                                        @if ($errors->has('filephoto5'))
                                            <div class="error"> <strong>{{ $errors->first('filephoto5') }}</strong></div>
                                        @endif
                                    </div>
                                    <?php if ($edits->photo5 !="") { ?>                                  
                                        <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                            <img class="mt-2" src="{{asset('images/'. $edits->photo5 .'?ver='.$verroom)}}" alt="" width="150px">
                                            <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="chkphoto5" id="chkphoto5">
                                                    <label class="form-check-label" for="chkphoto5">
                                                            <i style="color:red" class="fas fa-trash"></i>
                                                    </label>
                                                </div>
                                          </div>
                                        
                                        <div class="w-100"></div>
                                    <?php } ?>

                                    <div class="w-100"></div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <strong>Photo6:</strong>                                    
                                        <input type="file" name="filephoto6" class="form-control">
                                        @if ($errors->has('filephoto6'))
                                            <div class="error"> <strong>{{ $errors->first('filephoto6') }}</strong></div>
                                        @endif
                                    </div>
                                    <?php if ($edits->photo6 !="") { ?>                                  
                                        <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                            <img class="mt-2" src="{{asset('images/'. $edits->photo6 .'?ver='.$verroom)}}" alt="" width="150px">
                                            <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="chkphoto6" id="chkphoto6">
                                                    <label class="form-check-label" for="chkphoto6">
                                                            <i style="color:red" class="fas fa-trash"></i>
                                                    </label>
                                                </div>
                                          </div>
                                        
                                        <div class="w-100"></div>
                                    <?php } ?>

                                    <div class="w-100"></div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <strong>Photo7:</strong>                                    
                                        <input type="file" name="filephoto7" class="form-control">
                                        @if ($errors->has('filephoto7'))
                                            <div class="error"> <strong>{{ $errors->first('filephoto7') }}</strong></div>
                                        @endif
                                    </div>
                                    <?php if ($edits->photo7 !="") { ?>                                  
                                        <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                            <img class="mt-2" src="{{asset('images/'. $edits->photo7 .'?ver='.$verroom)}}" alt="" width="150px">
                                            <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="chkphoto7" id="chkphoto7">
                                                    <label class="form-check-label" for="chkphoto7">
                                                            <i style="color:red" class="fas fa-trash"></i>
                                                    </label>
                                                </div>
                                          </div>
                                        
                                        <div class="w-100"></div>
                                    <?php } ?>

                                    <div class="w-100"></div>

                                    

                                      <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <strong>Published:</strong>
                                        <select name="published" class="form-control">
                                          <option @if ($edits->published =='Yes')
                                              selected
                                          @endif value="Yes" selected>Yes</option>
                                          <option @if ($edits->published =='No')
                                            selected
                                        @endif  value="No">No</option>
                                          
                                        </select>
                                      </div>


                                   {{-- @foreach($edits->details as $key)
                                      <br>  {{$key->text}}
                                   @endforeach
                                 --}}
                                 
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