@extends('layouts.dash.app')
@section('title')
TheYeon Cambodia
@endsection
@section('content')   


<div class="container p-4">
    <div class="row justify-content-center">
        <div class="col-md-12 ">
                <div class="modal-content shadow m=3">
                    <div class="modal-header modal-md  text-light bg-dark">
                    
                        <p class="modal-title">
                        <span><i class="fas fa-building"></i></span><span class="ml-2">Campany Info</span>
                        </p>
                    </div>
                    <form action="{{route('company.update','1')}}" method="POST" enctype="multipart/form-data" class="">
                    <div class="modal-body">
                            
                    {{csrf_field()}}
                     {{method_field('PUT')}}
                                        <div class="form-group row">
                                            <label for="campanyName" class="col-md-3 form-label text-md-right">Company Name :</label>
                                            <div class="col-md-9">
                                                <input value="{{$campany[0]->campanyName}}" type="text" id="campanyName" class="form-control" name="campanyName" required>
                                            </div>                                            
                                        </div>
                                        <div class="form-group row">
                                            <label for="campanyCEO" class="col-md-3 form-label text-md-right">CEO Name :</label>
                                            <div class="col-md-9">
                                                <input value="{{$campany[0]->campanyCEO}}" type="text" id="campanyCEO" class="form-control" name="campanyCEO">
                                            </div>
                                        </div>
                                       

                                        <div class="form-group row">
                                            <label for="campanyReg" class="col-md-3 form-label text-md-right">Registration No :</label>
                                            <div class="col-md-9">
                                                <input value="{{$campany[0]->campanyReg}}" type="text" id="campanyReg" class="form-control" name="campanyReg">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="cateDescription" class="col-md-3 col-form-label text-md-right">Phone Number:</label>
                                            <div class="col-md-9">                                              
                                                <input value="{{$campany[0]->campanyPhone}}" type="text" id="campanyPhone" class="form-control" name="campanyPhone" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="campanyEmail" class="col-md-3 form-label text-md-right">Email :</label>
                                            <div class="col-md-9">
                                                <input value="{{$campany[0]->campanyEmail}}" type="text" id="campanyEmail" class="form-control" name="campanyEmail" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="campanyAddress" class="col-md-3 col-form-label text-md-right">Address:</label>
                                            <div class="col-md-9">                                              
                                                
                                                <textarea id="campanyAddress" class="form-control" name="campanyAddress" rows="5">{{$campany[0]->campanyAddress}}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="campanyOther" class="col-md-3 col-form-label text-md-right">Other:</label>
                                            <div class="col-md-9">                                                                                              
                                                <textarea id="campanyOther" class="form-control" name="campanyOther">{{$campany[0]->campanyOther}}</textarea>
                                            </div>
                                        </div>
                                            
                            
                    </div>
                    <div class="modal-footer">
                           
                                        
                           <button class="btn  btn-success text-md-left" type="submit">Update</button>
                    </div>
                    </form>
                </div>
        </div>
    </div>
</div>

@endsection