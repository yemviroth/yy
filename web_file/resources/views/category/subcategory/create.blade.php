@extends('layouts.dash.app')
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
                        <span><i class="fas fa-plus-square"></i></span><span class="ml-2">Add Sub Category</span>
                        </p>
                    </div>
                    <form action="{{route('category/subcategory.store')}}" method="POST" enctype="multipart/form-data" class="">
                    <div class="modal-body">
                            
                                        @csrf

                                         <div class="form-group row">
                                            <label for="cateId" class="col-md-3 form-label text-md-right">Category :</label>
                                            <div class="col-md-9">
                                                <select name="cateId" id="" class="form-control">
                                                     @foreach($cates as $cate)
                                                        <option value="{{$cate->cateId}}">{{$cate->cateName}}</option>
                                                    @endforeach
                                                </select>
                                            </div>                                            
                                        </div>

                                        <div class="form-group row">
                                            <label for="subCateName" class="col-md-3 form-label text-md-right">Sub Name :</label>
                                            <div class="col-md-9">
                                                <input type="text" id="proName" class="form-control" name="subCateName" required>
                                            </div>                                            
                                        </div>
                                        <div class="form-group row">
                                            <label for="cateOrderBy" class="col-md-3 form-label text-md-right">In Order :</label>
                                            <div class="col-md-9">
                                                <input type="text" id="cateOrderBy" class="form-control" name="cateOrderBy" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="cateDescription" class="col-md-3 col-form-label text-md-right">Description:</label>
                                            <div class="col-md-9">
                                                
                                                <textarea name="cateDescription" class="form-control" id=""  rows="3"></textarea>
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