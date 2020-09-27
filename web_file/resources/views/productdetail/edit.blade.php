@extends('layouts.appadmin')
@section('title')
The Yeon Cambodia
@endsection
@section('content')   

<div class="container pt-4 text-kh">
     



    <div class="card">
  <div class="card-header bg-dark text-light h4">
    <i class="fas fa-plus-square"></i>    Edit Product
  </div>
  <div class="card-body">
    <!-- <h5 class="card-title">Special title treatment</h5> -->
        
    <form action="{{url('products/update/'.$products[0]->proId)}}" enctype="multipart/form-data" class="" method="post">
    <!-- <form action="{{action('ProductController@update',$products[0]->proId)}}" enctype="multipart/form-data" class="" method="post"> -->
            <!-- @method('PUT') -->
            {{csrf_field()}}
            {{method_field('PUT')}}
            <!-- @csrf
            @method('PUT') -->
            <!-- <input type="hidden" name="_method" value="POST"> -->
		        		
                     

            <div class="form-group row">
                <label for="" class="col-md-2 col-form-label text-md-right">Product Category :</label>
                <div class="col-md-10">
                    <select name="cateId" class="custom-select my-1 mr-sm-2" id="category">
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
                        <select name="subCateId" class="custom-select my-1 mr-sm-2" id="subCategory">
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
                <label for="proPrice" class="col-md-2 col-form-label text-md-right">Product Price :</label>
                <div class="col-md-4">
                    <input type="text" id="proPrice" value="{{$products[0]->proPrice}}" class="form-control" name="proPrice" required>
                </div>

                <label for="proOrderBy" class="col-md-2 col-form-label text-md-right">Product Order List :</label>
                <div class="col-md-4">
                    <input type="text" id="proOrderBy" value="{{$products[0]->proOrderBy}}" class="form-control" name="proOrderBy">
                </div>

            </div>


            <div class="form-group row">
                <label for="full_name" class="col-md-2 col-form-label text-md-right">Image :</label>
                <div class="col-md-10">
                    <div class="custom-file col-sm-7">
                        <input type="file" class="custom-file-input" id="customFile" name="filephoto" onchange="loadFile(event)">
                        <label class="custom-file-label" for="filephoto">Choose file</label>
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
                    @if($products[0]->proImage)
                        <img class="img-view col-md-2 text-md-right" style="width:100px" id="output" src="{{asset('images/product/'.$products[0]->proImage)}}" alt="">
                    @endif
                </div>
               
            </div>                       
                <div class="form-group row">
                    <label for="proTextIntro" class="col-md-2 col-form-label text-md-right">Product Intro :</label>
                    <div class="col-md-10">
                    <textarea class="form-control" name="proTextIntro" id="proTextIntro" rows="2">{{$products[0]->proTextIntro}}</textarea>
                    
                    </div>
                </div>

                

            <div class="form-group row">
                <label for="proHowTo" class="col-md-2 col-form-label text-md-right">How To Use :</label>
                <div class="col-md-10">
                    <textarea class="form-control" name="proHowTo" id="proHowTo-textarea" rows="2">{{$products[0]->proHowTo}}</textarea>
                    
                </div>
            </div>

           

            <div class="form-group row">
              <label for="proDescription" class="col-md-2 col-form-label text-md-right">Description :</label>    
            
                <div class="col-md-10">
                    <textarea class="form-control" name="proDescription" id="richTextArea" rows="8">{!!$products[0]->proDescription!!}</textarea>
                </div>
           </div>

           <div class="form-group row">
              <label for="Is In Stock" class="col-md-2 col-form-label text-md-right">Product Is In Stock :</label>    
            
                <div class="col-md-10">
                    <select  name="proIsInStock" class="form-control">
                        <option @if ($products[0]->proIsInStock=='Yes') {{'selected'}} @endif value="Yes">Yes</option>
                        <option @if ($products[0]->proIsInStock=='No') {{'selected'}} @endif value="No" >No</option>
                        
                    </select>
                </div>
           </div>

           <div class="form-group row">
              <label for="proDescription" class="col-md-2 col-form-label text-md-right">Product Detail :</label>    
            
                <div class="col-md-10">
                    
                    
                    <textarea class="form-control text-kh" name="proDetail" id="richTextArea" rows="8">{!!$products[0]->proDetail!!}</textarea>
                       
                </div>
           </div>

            <hr>
                <div class="float-right">
                        
                        <a href="{{route('productdetail.list')}}" class="btn btn-lg btn-secondary text-md-left">Back</a>
                        <button class="btn btn-lg btn-primary text-md-left" type="submit">Update</button>
                    
                </div>
         
            
            


           

            

        </form>
    </div>
  

    


  </div>
</div>

</div>
<br><br>


<script>
	tinymce.init({
		selector : '#richTextArea',
		plugins : 'image',
		toolbar : 'image',
    
		images_upload_url : 'http://192.168.10.243:8080/tp/public_html/upload.php',
		automatic_uploads : false,

		images_upload_handler : function(blobInfo, success, failure) {
			var xhr, formData;

			xhr = new XMLHttpRequest();
			xhr.withCredentials = false;
			xhr.open('POST', 'http://192.168.10.243:8080/tp/public_html/upload.php');

			xhr.onload = function() {
				var json;

				if (xhr.status != 200) {
					failure('HTTP Error: ' + xhr.status);
					return;
				}

				json = JSON.parse(xhr.responseText);

				if (!json || typeof json.file_path != 'string') {
					failure('Invalid JSON: ' + xhr.responseText);
					return;
				}

				success(json.file_path);
			};

			formData = new FormData();
			formData.append('file', blobInfo.blob(), blobInfo.filename());

			xhr.send(formData);
		},
    });
    
    
</script>



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

<!-- script input image  -->

@endsection