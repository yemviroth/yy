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
                    
                        <h6 class="modal-title">
                        <span><i class="fas fa-plus-square"></i></span><span class="ml-2">បន្ថែមប្រភេទរងផលិតផល</span>
                        </h6>
                    </div>
                    <form action="{{route('category/subcategory.store')}}" method="POST" enctype="multipart/form-data" class="">
                    <div class="modal-body">
                            
                                        @csrf

                                         <div class="form-group row">
                                            <label for="cateId" class="col-md-3 col-form-label text-md-right">ក្នុងប្រភេទផលិតផល :</label>
                                            <div class="col-md-9">
                                                <select name="cateId" id="" class="form-control">
                                                     @foreach($cates as $cate)
                                                        <option value="{{$cate->cateId}}">{{$cate->cateName}}</option>
                                                    @endforeach
                                                </select>
                                            </div>                                            
                                        </div>

                                        <div class="form-group row">
                                            <label for="subCateName" class="col-md-3 col-form-label text-md-right">ឈ្មោះប្រភេទរង :</label>
                                            <div class="col-md-9">
                                                <input type="text" id="proName" class="form-control" name="subCateName" autocomplete="off" required>
                                            </div>                                            
                                        </div>
                                        <div class="form-group row">
                                            <label for="cateOrderBy" class="col-md-3 col-form-label text-md-right">តម្រៀប :</label>
                                            <div class="col-md-9">
                                                <input type="text" id="cateOrderBy" class="form-control" name="cateOrderBy" autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="cateDescription" class="col-md-3 col-form-label text-md-right">បរិយាយ:</label>
                                            <div class="col-md-9">
                                                
                                                <textarea name="cateDescription" class="form-control" id=""  rows="3"></textarea>
                                            </div>
                                        </div>
                                            
                            
                    </div>
                    <div class="modal-footer">
                            <a class="btn  btn-secondary text-md-left" href="{{route('category.list')}}">ត្រលប់ក្រោយ</a>
                                        
                           <button class="btn  btn-success text-md-left" type="submit">បន្ថែម</button>
                    </div>
                    </form>
                </div>
        </div>
    </div>
</div>

@endsection