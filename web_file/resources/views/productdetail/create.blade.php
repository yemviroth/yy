@extends('layouts.appadmin')
@section('title')
TROPICANA - ROOMS
@endsection
@section('content')   

<div class="container pt-4">
     



    <div class="card">
  <div class="card-header bg-dark text-light">
    <span><i class="fas fa-plus-square"></i></span><span class="ml-2">Add New Product</span>  
  </div>
  <div class="card-body">
    <!-- <h5 class="card-title">Special title treatment</h5> -->
        
    <form action="{{route('productdetail.store')}}" method="POST" enctype="multipart/form-data" class="">
            @csrf


            <div class="form-group row">
                <label for="" class="col-md-2 col-form-label text-md-right">Product Category :</label>
                <div class="col-md-10">
                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                            <option selected>Choose Product Category</option>
                    
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="proName" class="col-md-2 col-form-label text-md-right">Product Name :</label>
                <div class="col-md-10">
                    <input type="text" id="proName" class="form-control" name="proName" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="proPrice" class="col-md-2 col-form-label text-md-right">Product Price :</label>
                <div class="col-md-4">
                    <input type="text" id="proPrice" class="form-control" name="proPrice" required>
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

                    <input type="file" name="filephoto1" class="custom-file-input" id="validatedCustomFile" required>
                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                    @if ($errors->has('proImage'))
                    <div class="error"> <strong>{{ $errors->first('filephoto1') }}</strong></div>
                @endif

                     </div>
                </div>
            </div>


            <div class="form-group row">
                <label for="proHowTo" class="col-md-2 col-form-label text-md-right">How To Use :</label>
                <div class="col-md-10">
                    <input type="text" id="proHowTo" class="form-control" name="proHowTo">
                </div>
            </div>

            <div class="form-group row">
                <label for="proTextIntro" class="col-md-2 col-form-label text-md-right">Product Intro :</label>
                <div class="col-md-10">
                <textarea class="form-control" name="proTextIntro" id="textIntro-textarea" rows="2"></textarea>
                </div>
            </div>

            <div class="form-group row">
              <label for="proDescription" class="col-md-2 col-form-label text-md-right">Description :</label>    
            
                <div class="col-md-10">
                    <textarea class="form-control" name="proDescription" id="description-textarea" rows="8"></textarea>
                </div>
           </div>

           <div class="form-group row">
              <label for="Is In Stock" class="col-md-2 col-form-label text-md-right">Product Is In Stock :</label>    
            
                <div class="col-md-10">
                    <select  name="published" class="form-control">
                        <option @if (old('published') =='Yes') {{'selected'}} @endif value="Yes">Yes</option>
                        <option @if (old('published') =='No') {{'selected'}} @endif value="No" >No</option>
                        
                    </select>
                </div>
           </div>
            <hr>
                <div class="float-right">
                        
                        <button class="btn  btn-secondary text-md-left" type="">Back</button>
                        <button class="btn  btn-success text-md-left" type="submit">Submit</button>
                    
                </div>
           
        </form>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.5/tinymce.min.js"></script>
    <script>
        var editor_config = {
            selector: '#description-textarea',
            directionality: document.dir,
            path_absolute: "/",
            menubar: 'edit insert view format table',
            plugins: [
                "advlist autolink lists link image charmap preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media save table contextmenu directionality",
                "paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | formatselect styleselect | bold italic strikethrough forecolor backcolor permanentpen formatpainter | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | fullscreen code",
            relative_urls: false,
            language: document.documentElement.lang,
            height: 300,
        }
        tinymce.init(editor_config);
    </script>
   
   <script>
        var editor_config = {
            selector: '#textIntro-textarea',
            directionality: document.dir,
            path_absolute: "/",
           
            plugins: [
                
              
              
                "paste textcolor colorpicker textpattern"
            ],
            toolbar: " bold italic strikethrough | alignleft aligncenter alignright alignjustify | ",
            relative_urls: false,
            language: document.documentElement.lang,
            height: 100,
        }
        tinymce.init(editor_config);
    </script>
                                    
          
        

  </div>
</div>

</div>
<br><br>

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