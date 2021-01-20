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
                        <span><i class="fas fa-plus-square"></i></span><span class="ml-2">បន្ថែមប្រភេទផលិតផល</span>
                        </h6>
                    </div>
                    <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data" class="">
                    <div class="modal-body">
                            
                                        @csrf
                                        <div class="form-group row">
                                            <label for="cateName" class="col-md-3 form-label text-md-right">ឈ្មោះប្រភេទផលិតផល :</label>
                                            <div class="col-md-9">
                                                <input type="text" id="proName" class="form-control" name="cateName" autocomplete="off" required>
                                            </div>                                            
                                        </div>
                                        <div class="form-group row">
                                            <label for="cateOrderBy" class="col-md-3 form-label text-md-right">តម្រៀប :</label>
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