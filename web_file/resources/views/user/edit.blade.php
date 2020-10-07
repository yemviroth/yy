@extends('layouts.dash.app')

@section('content')

<div class="container pt-4">




    <div class="card">
        <div class="card-header bg-dark text-light h4">
            <i class="fas fa-plus-square"></i> Edit User
        </div>
        <div class="card-body">
            <!-- <h5 class="card-title">Special title treatment</h5> -->


            <!-- <form action="{{route('user.update',$edits->id)}}" method="Get" enctype="multipart/form-data"> -->
            <form action="{{route('user.update',$edits->id)}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group row">
                    <label for="proDescription" class="col-md-2 col-form-label text-md-right">Name :</label>

                    <div class="col-md-10">
                        <input type="text" value="{{$edits->name}}" name="name" id="name" class="form-control @if ($errors->has('name')) is-invalid @endif " placeholder="" autocomplete="off">
                        @if ($errors->has('name'))
                        <div class="invalid-feedback"> <strong>{{ $errors->first('name') }}</strong></div>
                        @endif

                    </div>
                </div>

                <div class="form-group row">
                    <label for="proDescription" class="col-md-2 col-form-label text-md-right">User Name :</label>

                    <div class="col-md-10">
                        <input type="text" value="{{$edits->username}}" name="username" id="username" class="form-control @if ($errors->has('username')) is-invalid @endif " placeholder="" autocomplete="off">
                        @if ($errors->has('username'))
                        <div class="invalid-feedback"> <strong>{{ $errors->first('username') }}</strong></div>
                        @endif

                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-md-right">Email :</label>

                    <div class="col-md-10">
                        <input type="email" value="{{$edits->email}}" name="email" id="email" class="form-control @if ($errors->has('email')) is-invalid @endif " placeholder="" autocomplete="off">
                        @if ($errors->has('email'))
                        <div class="invalid-feedback"> <strong>{{ $errors->first('email') }}</strong></div>
                        @endif

                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-2 col-form-label text-md-right">Password :</label>

                    <div class="col-md-10">
                        <input type="password" value="" name="password" id="password" class="form-control @if ($errors->has('password')) is-invalid @endif " placeholder="" autocomplete="off">
                        @if ($errors->has('password'))
                        <div class="invalid-feedback"> <strong>{{ $errors->first('password') }}</strong></div>
                        @endif

                    </div>
                </div>

                <div class="form-group row">
                    <label for="Confirm Password" class="col-md-2 col-form-label text-md-right">Password :</label>

                    <div class="col-md-10">
                        <input type="password" value="" name="password_confirmation" id="password_confirmation" class="form-control @if ($errors->has('password_confirmation')) is-invalid @endif " placeholder="" autocomplete="off">
                        @if ($errors->has('password_confirmation'))
                        <div class="invalid-feedback"> <strong>{{ $errors->first('password_confirmation') }}</strong></div>
                        @endif

                    </div>
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

</form>

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