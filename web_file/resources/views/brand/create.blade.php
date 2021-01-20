@extends('layouts.dash.app')
@section('title')
TheYeon Cambodia
@endsection
@section('content')

<div class="pt-4">
    <div class="row justify-content-center">
        <div class="col-md-10 ">
            <div class="modal-content shadow m=3">
                <div class="modal-header modal-md  text-light bg-dark">

                    <h6 class="modal-title">
                        <span><i class="fas fa-plus-square"></i></span><span class="ml-2">បន្ថែមដំណាងចែកចាយ</span>
                    </h6>
                </div>
                <form action="{{route('brand.store')}}" method="post" enctype="multipart/form-data" class="">
                    <div class="modal-body">

                        @csrf
                        <div class="row pt-3">
                            <div class="col-sm-7">

                                <div class="form-group row">
                                    <label for="dsName" class="col-md-3 col-form-label text-md-right">ឈ្មោះដំណាងចែកចាយ :</label>
                                    <div class="col-md-9">
                                        <input type="text" id="dsName" class="form-control" name="dsName" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dsLocation" class="col-md-3 col-form-label text-md-right">ទីតាំង / ខេត្ត :</label>
                                    <div class="col-md-9">
                                        <input type="text" id="dsLocation" class="form-control" name="dsLocation" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="dsAddress" class="col-md-3 col-form-label text-md-right">អស័យដ្ឋាន:</label>
                                    <div class="col-md-9">

                                        <textarea name="dsAddress" class="form-control" id="" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="dsPhone" class="col-md-3 col-form-label text-md-right">លេខទូរស័ព្ទ :</label>
                                    <div class="col-md-9">
                                        <input type="text" id="dsPhone" class="form-control" name="dsPhone" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="dsFb" class="col-md-3 col-form-label text-md-right">FB :</label>
                                    <div class="col-md-9">
                                        <input type="text" id="dsFb" class="form-control" name="dsFb">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="dsIg" class="col-md-3 col-form-label text-md-right">IG :</label>
                                    <div class="col-md-9">
                                        <input type="text" id="dsIg" class="form-control" name="dsIg">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="dsDescription" class="col-md-3 col-form-label text-md-right">បរិយាយ:</label>
                                    <div class="col-md-9">

                                        <textarea name="dsDescription" class="form-control" id="" rows="3"></textarea>
                                    </div>
                                </div>




                            </div>

                            <div class="col-sm-5">

                                <div class="form-group row">
                                    <label for="" class="col-md-2 col-form-label text-md-right">រូបថត :</label>
                                    <div class="col-md-10">
                                        <div class="pb-2">
                                            <div class="col-md-8 col-sm-12 border" style="height: 250px;">

                                                <img for="customFile" class="text-md-right img-fluid " style="height:250px;" id="output" src="" alt="">

                                            </div>
                                        </div>
                                        <br>

                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="custom-file col-md-8 col-sm-8">
                                                    <input type="file" multiple accept='image/*' class="custom-file-input" id="customFile" name="filephoto1" onchange="loadFile(event)" required>
                                                    <label class="custom-file-label" for="customFile">Choose file..</label>
                                                    <script>
                                                        var loadFile = function(event) {
                                                            var image = document.getElementById('output');
                                                            image.src = URL.createObjectURL(event.target.files[0]);
                                                        };
                                                    </script>
                                                    @if ($errors->has('photo'))
                                                    <div class="error"> <strong>{{ $errors->first('photo') }}</strong></div>
                                                    @endif

                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <a class="btn  btn-secondary text-md-left" href="{{route('brand.list')}}">ត្រលប់ក្រោយ</a>

                        <button class="btn  btn-success text-md-left" type="submit">រក្សាទុក</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection