@extends('layouts.appadmin')
@section('title')
TheYeon Cambodia
@endsection
@section('content')   

<div class="container p-4">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
                <div class="modal-content shadow m=3">
                    <div class="modal-header modal-md  text-light bg-dark">
                    
                        <p class="modal-title">
                        <span><i class="fas fa-plus-square"></i></span><span class="ml-2">Campany Info</span>
                        </p>
                    </div>
                    <form action="{{route('campany.store')}}" method="POST" enctype="multipart/form-data" class="">
                    <div class="modal-body">
                            
                                        @csrf
                                        <div class="form-group row">
                                            <label for="campanyName" class="col-md-3 form-label text-md-right">Campany Name :</label>
                                            <div class="col-md-9">
                                                <input type="text" id="campanyName" class="form-control" name="campanyName" required>
                                            </div>                                            
                                        </div>
                                        <div class="form-group row">
                                            <label for="campanyCEO" class="col-md-3 form-label text-md-right">CEO Name :</label>
                                            <div class="col-md-9">
                                                <input type="text" id="campanyCEO" class="form-control" name="campanyCEO">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="cateDescription" class="col-md-3 col-form-label text-md-right">Phone Number:</label>
                                            <div class="col-md-9">                                              
                                                <input type="text" id="campanyPhone" class="form-control" name="campanyPhone" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="campanyEmail" class="col-md-3 form-label text-md-right">Email :</label>
                                            <div class="col-md-9">
                                                <input type="text" id="campanyEmail" class="form-control" name="campanyEmail" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="campanyAddress" class="col-md-3 col-form-label text-md-right">Address:</label>
                                            <div class="col-md-9">                                              
                                                
                                                <textarea id="campanyAddress" class="form-control" name="campanyAddress"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="campanyOther" class="col-md-3 col-form-label text-md-right">Other:</label>
                                            <div class="col-md-9">                                                                                              
                                                <textarea id="campanyOther" class="form-control" name="campanyOther"></textarea>
                                            </div>
                                        </div>
                                            
                            
                    </div>
                    <div class="modal-footer">
                            <a class="btn  btn-secondary text-md-left" href="{{route('category.list')}}">Back</a>
                                        
                           <button class="btn  btn-success text-md-left" type="submit">Submit</button>
                    </div>
                    </form>
                </div>
        </div>
    </div>
</div>

@endsection