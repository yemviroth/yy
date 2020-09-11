@extends('layouts.appadmin')
@section('title')
TROPICANA - ROOMS
@endsection
@section('content')   


               
        @if ($message = Session::get('success'))
            <div id="malert" class="alert alert-success alert-dismissible fade show"  role="alert">{{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            
        @endif
    

            <!-- <div class="collapse @if (Request::is('rooms/search'))
                show 
            @endif"  id="collapseSearch">
            <form action="{{ route('rooms.index') }}" method="get">
                    {{-- @csrf --}}
                    <div class="row">
                            <div class=" col-12 mb-1 form-inline p-1" style="border: 1px #ccc solid;">
                                        <div class="ml-2">
                                        Date: <input type="text" value="@php if (session()->has('index_logging_logdate')) { echo session()->get('index_logging_logdate');}@endphp" name="logdate" id="logdate" autocomplete="off" class="form-control form-control-sm">
                                    </div> 
                                    <div class="ml-2">
                                            Problem: <input type="text" value="@php if (session()->has('index_logging_problem')) { echo session()->get('index_logging_problem');}@endphp" name="problem" class="form-control form-control-sm">
                                        </div> 
                                    
                                        <div class="ml-2">
                                                                                                                
                                                    <button name="btnsearch" type="submit" class="btn btn-sm btn-success"><i class="fas fa-search"></i></button>
                                                
                                        </div> 
                                    
                            </div>                                    
                    </div>
                </form>
                </div> -->
   
      


<div class="container p-4">
    <DIV class="ROW">        
        <div class="form-group row">
            <div class="col-12 col-md-8">
                <a href="{{ route('category.create') }}" class="btn btn-success"><i class="fas fa-plus-square"></i> New Category</a>                                
                <a href="{{ route('category.create') }}" class="btn btn-info "><i class="fas fa-plus-square"></i> New Sub Category</a>                                
            </div> 

            <div class="col-12 col-md-4">
                <form class="" action="">
                    
                        <input type="text" class="form-control" placeholder="Search">
                    
                </form>     
            </div>
            
        </div>
                                  
    </DIV>

    <div class="row justify-content-center">
        <div class="col-md-12 col-12">
                <div class="modal-content shadow">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="modal-header modal-md">
                                
                                <p class="modal-title">
                                <span><i class="fas fa-clipboard-list"></i><span class="ml-2">Category List</span>
                                
                                </p>
                                
                            </div>                         
                        </div>                             
                    </div>
                                


                    <div class="table-responsive">
                        <table class="table" >
                            <tr class="thead-dark">
                                <th>Category Name</th>
                                <th>Sub Category</th>
                                <th>OrderBy</th>
                                <th>Description</th>
                                <th>Action</th>
                            
                            </tr>
                            @foreach($cates as $cate)
                            
                            <tr style="">
                                <td>
                                    {{$cate->cateName}}
                                
                                </td>
                                <td>
                                    <table class="table-striped table-sm">
                        
                            
                                        <tr>
                                            <th>ID</th>
                                            <th>Sub Name</th>
                                            <th>Action</th>
                                        </tr>
                            
                        

                                        @foreach($subcates as $subcate)
                                            @if($cate->cateId == $subcate->cateId) 
                                        <tr>
                                            <td>{{$subcate->subCateId}}</td>
                                            <td>{{$subcate->subCateName}}</td>
                                            <td>
                                                <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                            @endif
                                        @endforeach
                                    </table>
                                
                                </td>
                                <td>{{$cate->cateOrderBy}}</td>
                                <td>{{$cate->cateDescription}}</td>
                            

                                <td>
                                    <form action="{{route('category.destroy',$cate->cateId)}}" method="POST">
                                                            
                                        @csrf
                                        @method('DELETE')                                                                                                
                                        
                                        <a  style="" class="btn btn-sm btn-primary" href="{{route('category.edit', $cate->cateId)}}"><i class="fas fa-edit"></i></a>
                                        <button  style="" name="btndelete"  data-toggle="tooltip" title="Delete" type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this items : {{$cate->cateName}} ?');"><i class="fas fa-trash"></i></button>                                            
                                    </form>
                                </td>

                            </tr>
                            
                            @endforeach                        
                                                
                        </table>
                    </div>
                    
                </div>
        </div>
    </div>



</div>

@endsection