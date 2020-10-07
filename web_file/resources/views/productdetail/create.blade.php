@extends('layouts.dash.app')
@section('title')
The Yeon Cambodia
@endsection
@section('content')


        <div class="card text-kh">
            <div class="card-header bg-dark text-light">
                <span><i class="fas fa-plus-square"></i></span><span class="ml-2">Add New Product</span>
            </div>
            <div class="card-body shadow">
                <!-- <h5 class="card-title">Special title treatment</h5> -->

                <form action="{{route('productdetail.store')}}" method="POST" enctype="multipart/form-data" class="">
                    @csrf


                    <div class="form-group row">
                        <label for="" class="col-md-2 col-form-label text-md-right">Product Category :</label>
                        <div class="col-md-10">
                            <select name="cateId" class="custom-select my-1 mr-sm-2" id="category">
                                <option selected value="">Choose Product Category</option>
                                @foreach($cate as $cat)
                                <option class="" value="{{$cat->cateId}}">{{$cat->cateName}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="subCateId" class="col-md-2 col-form-label text-md-right">Sub Category :</label>
                        <div class="col-md-10">
                            <select name="subCateId" class="custom-select my-1 mr-sm-2" id="subCategory">
                                <option value="0">-- Select Sub Category --</option>

                            </select>
                        </div>
                    </div>


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




                    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.min.js"></script>



                    <div class="form-group row">
                        <label for="proName" class="col-md-2 form-label text-md-right">Product Name :</label>
                        <div class="col-md-10">
                            <input type="text" id="proName" class="form-control" name="proName" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="proName" class="col-md-2 form-label text-md-right">Color :</label>
                        <div class="col-md-2">
                            <div id="" class="input-group dd colorpicker-component">
                                <input name="proColor1" placeholder="Color 1" type="text" class="form-control color1" />


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
                                <input name="proColor2" placeholder="Color 2" type="text"  class="form-control vaLcolor2" />
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
                                <input name="proColor3" placeholder="Color 3" type="text"  class="form-control vaLcolor3" />
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
                                <input name="proColor4" placeholder="Color 4" type="text" class="form-control vaLcolor4" />
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
                                <input name="proColor5" placeholder="Color 5" type="text" class="form-control vaLcolor5" />
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
                            <!-- <input type="text" id="proPrice" class="form-control" name="proPrice" required> -->

                            <div class="input-group mb-2">

                                <input type="text" class="form-control" id="proPrice" placeholder="$" name="proPrice" required autocomplete="off">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">$</div>
                                </div>
                            </div>

                        </div>

                        <label for="proOrderBy" class="col-md-2 col-form-label text-md-right">Product Order List :</label>
                        <div class="col-md-4">
                            <input type="text" id="proOrderBy" class="form-control" name="proOrderBy">
                        </div>

                    </div>


                    <div class="form-group row">
                        <label for="full_name" class="col-md-2 col-form-label text-md-right">Image :</label>
                        <div class="col-md-10">
                            <div class="custom-file col-sm-12">

                                <input type="file" name="filephoto1" class="custom-file-input" id="validatedCustomFile">
                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                @if ($errors->has('proImage'))
                                <div class="error"> <strong>{{ $errors->first('filephoto1') }}</strong></div>
                                @endif

                            </div>

                            <!-- <div class="col-sm-3 img-view">
                    
                <img id="output" src="" width="100" height="100">

                    
                </div> -->

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="proTextIntro" class="col-md-2 col-form-label text-md-right">Product Intro :</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="proTextIntro" id="textIntro-textarea" rows="2"></textarea>
                        </div>
                    </div>

                    <div class="form-group row text-kh">
                        <label for="proHowTo" class="col-md-2 col-form-label text-md-right">How To Use :</label>
                        <div class="col-md-10">
                            <textarea class="form-control sm text-kh" name="proHowTo" id="txt-sm" rows="2"></textarea>

                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="proDescription" class="col-md-2 col-form-label text-md-right">Description :</label>

                        <div class="col-md-10">
                            <textarea class="form-control sm text-kh" name="proDescription" id="txt-sm" rows="8"></textarea>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Is In Stock" class="col-md-2 col-form-label text-md-right">Product Is In Stock :</label>

                        <div class="col-md-10">
                            <select name="proIsInStock" class="form-control">
                                <option @if (old('proIsInStock')=='Yes' ) {{'selected'}} @endif value="Yes">Yes</option>
                                <option @if (old('proIsInStock')=='No' ) {{'selected'}} @endif value="No">No</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="proDetail" class="col-md-2 col-form-label text-md-right">Product Detail :</label>

                        <div class="col-md-10">
                            <textarea class="form-control text-kh" name="proDetail" id="txt-lg" rows="8"></textarea>
                        </div>
                    </div>


                    <hr>
                    <div class="float-right">

                        <!-- <button class="btn  btn-secondary text-md-left" type="">Back</button> -->
                        <a class="btn  btn-secondary text-md-left" href="{{route('productdetail.list')}}">Back</a>

                        <button class="btn  btn-success text-md-left" type="submit">Submit</button>

                    </div>

                </form>
            </div>
        </div>

<br>

<!-- include summernote css/js -->
<!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script> -->





<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script language="javascript" type="text/javascript">
    $(function() {
        $("#fileupload").change(function() {
            $("#dvPreview").html("");
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
            if (regex.test($(this).val().toLowerCase())) {
                if ($.browser.msie && parseFloat(jQuery.browser.version) <= 9.0) {
                    $("#dvPreview").show();
                    $("#dvPreview")[0].filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = $(this).val();
                } else {
                    if (typeof(FileReader) != "undefined") {
                        $("#dvPreview").show();
                        $("#dvPreview").append("<img />");
                        var reader = new FileReader();
                        reader.onload = function(e) {
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