@extends('layouts.appadmin')
@section('title')
The Yeon Cambodia
@endsection
@section('content')

<div class="wrapper">


<div class="container-fluid pt-4 text-kh">

    <div class="card">
        <div class="card-header bg-dark text-light">
        <i class="fas fa-edit"></i> Edit Product
        </div>
        <div class="card-body">
       
            <form action="{{url('products/update/'.$products[0]->proId)}}" enctype="multipart/form-data" class="" method="post">
          
                {{csrf_field()}}
                {{method_field('PUT')}}
   
 

  
            
                <div class="form-group row">
                    <label for="" class="col-md-2 col-form-label text-md-right">Product Category :</label>
                    <div class="col-md-10">
                        <select name="cateId" class="custom-select" id="category">
                            <option selected>Choose Product Category</option>
                            @foreach($cates as $cat)
                            @if ($products[0]->cateId == $cat->cateId)
                            <option value="{{ $cat->cateId }}" selected>{{ $cat->cateName }}</option>
                            @else
                            <option value="{{$cat->cateId}}">{{$cat->cateName}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                    <div class="form-group row">
                    <label for="subCateId" class="col-md-2 col-form-label text-md-right">Sub Category :</label>
                    <div class="col-md-10">
                        <select name="subCateId" class="custom-select" id="subCategory">
                            <option value="0">-- Select Sub Category --</option>

                        </select>
                    </div>
                </div>



                <div class="form-group row">
                    <label for="proName" class="col-md-2 col-form-label text-md-right">Product Name :</label>
                    <div class="col-md-10">
                        <input type="text" id="proName" value="{{$products[0]->proName}}" class="form-control" name="proName" required>
                    </div>
                </div>

     


                <div class="form-group row">
                    <label for="proName" class="col-md-2 col-form-label text-md-right">Image :</label>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-2 col-12" style="height: 150px;">
                                @if($products[0]->proImage)
                                     <img class="text-md-right" style="height:150px;width:auto" id="output" src="{{asset('images/product/'.$products[0]->proImage)}}" alt="">
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="custom-file col-12">
                                    <input type="file" class="custom-file-input" id="customFile" name="filephoto" onchange="loadFile(event)">
                                    <label class="custom-file-label" for="filephoto">Choose file..</label>
                                    <script>
                                        var loadFile = function(event) {
                                            var image = document.getElementById('output');
                                            image.src = URL.createObjectURL(event.target.files[0]);
                                        };
                                    </script>
                                    @if ($errors->has('filephoto'))
                                    <div class="error"> <strong>{{ $errors->first('filephoto') }}</strong></div>
                                    @endif

                                </div>
                               
                            </div>
                        </div>
                       
                    </div>
                </div>
                                            
  
                <div class="form-group row">
                        <label for="proName" class="col-md-2 form-label text-md-right">Color :</label>
                        <div class="col-md-2">
                            <div id="" class="input-group dd colorpicker-component">
                                <input autocomplete="off" name="proColor1" value="{{$products[0]->proColor1}}" placeholder="Color 1" type="text" class="form-control color1" />


                            </div>

                            <script>
                                $(function() {
                                    $('.dd').colorpicker();
                                });


                                $(document).ready(function() {
                                    $(".color1").change(function() {
                                        $(this).css("background-color", $(".color1").val());
                                    });
                                });
                            </script>
                        </div>

                        <div class="col-md-2">
                            <div id="" class="input-group color2 colorpicker-component">
                                <input autocomplete="off" name="proColor2" value="{{$products[0]->proColor2}}" placeholder="Color 2" type="text"  class="form-control vaLcolor2" />
                            </div>

                            <script>
                                $(function() {
                                    $('.color2').colorpicker();
                                });
                                $(document).ready(function() {
                                    $(".vaLcolor2").change(function() {
                                        $(this).css("background-color", $(".vaLcolor2").val());
                                    });
                                });
                            </script>
                        </div>

                        <div class="col-md-2">
                            <div id="" class="input-group color3 colorpicker-component">
                                <input autocomplete="off" name="proColor3" value="{{$products[0]->proColor3}}" placeholder="Color 3" type="text"  class="form-control vaLcolor3" />
                            </div>

                            <script>
                                $(function() {
                                    $('.color3').colorpicker();
                                });
                                $(document).ready(function() {
                                    $(".vaLcolor3").change(function() {
                                        $(this).css("background-color", $(".vaLcolor3").val());
                                    });
                                });
                            </script>
                        </div>

                        <div class="col-md-2">
                            <div id="" class="input-group color4 colorpicker-component">
                                <input autocomplete="off" name="proColor4" value="{{$products[0]->proColor4}}" placeholder="Color 4" type="text" class="form-control vaLcolor4" />
                            </div>

                            <script>
                                $(function() {
                                    $('.color4').colorpicker();
                                });
                                $(document).ready(function() {
                                    $(".vaLcolor4").change(function() {
                                        $(this).css("background-color", $(".vaLcolor4").val());
                                    });
                                });
                            </script>
                        </div>

                        <div class="col-md-2">
                            <div id="" class="input-group color5 colorpicker-component">
                                <input autocomplete="off" name="proColor5" value="{{$products[0]->proColor5}}" placeholder="Color 5" type="text" class="form-control vaLcolor5" />
                            </div>

                            <script>
                                $(function() {
                                    $('.color5').colorpicker();
                                });
                                $(document).ready(function() {
                                    $(".vaLcolor5").change(function() {
                                        $(this).css("background-color", $(".vaLcolor5").val());
                                    });
                                });
                            </script>
                        </div>
                    </div>


                <div class="form-group row">
                    <label for="proPrice" class="col-md-2 col-form-label text-md-right">Product Price :</label>
                    <div class="col-md-4">
                        <input type="number" id="proPrice" value="{{$products[0]->proPrice}}" class="form-control" name="proPrice" required>
                    </div>

                    <!-- <label for="proOrderBy" class="col-md-2 col-form-label text-md-right">Product Order List :</label>
                    <div class="col-md-4">
                        <input type="text" id="proOrderBy" value="{{$products[0]->proOrderBy}}" class="form-control" name="proOrderBy">
                    </div> -->

                </div>

         
                
              
                <div class="form-group row">
                    <label for="proTextIntro" class="col-md-2 col-form-label text-md-right">Product Intro :</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="proTextIntro" id="txt-sm" rows="4">{{$products[0]->proTextIntro}}</textarea>

                    </div>
                </div>



                <div class="form-group row">
                    <label for="proHowTo" class="col-md-2 col-form-label text-md-right">How To Use :</label>
                    <div class="col-md-10">
                        <textarea class="form-control sm text-kh" name="proHowTo" id="txt-sm" rows="8">{{$products[0]->proHowTo}}</textarea>

                    </div>
                </div>



                <div class="form-group row">
                    <label for="proDescription" class="col-md-2 col-form-label text-md-right">Description :</label>

                    <div class="col-md-10">
                        <textarea class="form-control sm text-kh" name="proDescription" id="" rows="9">{!!$products[0]->proDescription!!}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Is In Stock" class="col-md-2 col-form-label text-md-right">Product Is In Stock :</label>

                    <div class="col-md-10">
                        <select name="proIsInStock" class="form-control">
                            <option @if ($products[0]->proIsInStock=='Yes') {{'selected'}} @endif value="Yes">Yes</option>
                            <option @if ($products[0]->proIsInStock=='No') {{'selected'}} @endif value="No" >No</option>

                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="proDescription" class="col-md-2 col-form-label text-md-right">Product Detail :</label>

                    <div class="col-md-10">


                        <textarea class="form-control sm text-kh" name="proDetail" id="txt-lg" rows="10">{!!$products[0]->proDetail!!}</textarea>

                    </div>
                </div>

                <hr>



                <nav class="navbar fixed-bottom navbar-light bg-danger justify-content-end">
                    
                        <div class="float-right">
                            <a href="{{route('productdetail.list')}}" class="btn btn-secondary text-md-left">Back</a>
                            <button class="btn btn-primary text-md-left" type="submit">Update</button>
                        </div>
                   

                </nav>






            </form>
        </div>





    </div>
</div>

</div>
<br><br>






<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> -->
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

$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>




<script type="text/javascript">
        $(document).ready(function () {
           $('#category').change(function () {
             var id = $(this).val();

             $('#subCategory').find('option').not(':first').remove();

             $.ajax({
                url:'{{route('categories','')}}/'+id,
                type:'get',
                dataType:'json',
                success:function (response) {
                    var len = 0;
                    if (response.data != null) {
                        len = response.data.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.data[i].subCateId;
                             var name = response.data[i].subCateName;

                             var option = "<option value='"+id+"'>"+name+"</option>"; 

                             $("#subCategory").append(option);
                        }
                    }
                }
             })
           });
        });
    </script>

<script>
    $(document).ready(function() {
       
            $(".color1").css("background-color", $(".color1").val());
            $(".vaLcolor2").css("background-color", $(".vaLcolor2").val());
            $(".vaLcolor3").css("background-color", $(".vaLcolor3").val());
            $(".vaLcolor4").css("background-color", $(".vaLcolor4").val());
            $(".vaLcolor5").css("background-color", $(".vaLcolor5").val());
        
    });

    
</script>



@endsection