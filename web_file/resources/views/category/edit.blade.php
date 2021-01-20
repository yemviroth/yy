@extends('layouts.dash.app')

@section('content')   

<div class="container p-4">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
                <div class="modal-content shadow m-3">
                    <div class="modal-header modal-md  text-light bg-dark">
                    
                        <H6 class="modal-title">
                        <span><i class="fas fa-edit"></i></span><span class="ml-2">កែប្រែប្រភេទទំនិញ</span>
                        </H6>
                    </div>
                    <form action="{{route('category.update',$edit->cateId)}}" method="POST" class="">
                    <div class="modal-body">

                    {{csrf_field()}}
                     {{method_field('PUT')}}
                                        <div class="form-group row">
                                            <label for="cateName" class="col-md-3 form-label text-md-right">ឈ្មោះប្រភេទទំនិញ :</label>
                                            <div class="col-md-9">
                                                <input value="{{$edit->cateName}}" type="text" id="proName" class="form-control" name="cateName" required>
                                            </div>                                            
                                        </div>
                                        <div class="form-group row">
                                            <label for="cateOrderBy" class="col-md-3 form-label text-md-right">តម្រៀប :</label>
                                            <div class="col-md-9">
                                                <input type="text" value="{{$edit->cateOrderBy}}" id="cateOrderBy" class="form-control" name="cateOrderBy" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="cateDescription" class="col-md-3 col-form-label text-md-right">បរិយាយ:</label>
                                            <div class="col-md-9">
                                                
                                                <textarea name="cateDescription" class="form-control" id=""  rows="3">{{$edit->cateDescription}}</textarea>
                                            </div>
                                        </div>
                                            
                            
                    </div>
                    <div class="modal-footer">
                            <a class="btn  btn-secondary text-md-left" href="{{route('category.list')}}">ត្រលប់ក្រោយ</a>
                                        
                           <button class="btn  btn-success text-md-left" type="submit">កែប្រែ</button>
                    </div>
                    </form>
                </div>
        </div>
    </div>
</div>

@endsection