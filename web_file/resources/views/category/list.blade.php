@extends('layouts.appadmin')
@section('title')
TROPICANA - ROOMS
@endsection
@section('content')   

<div class="container" >
               
        @if ($message = Session::get('success'))
            <div id="malert" class="alert alert-success alert-dismissible fade show"  role="alert">{{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            
        @endif
    

        <div class="col-12">
            <div class="row">
                <div class=" ml-0 mr-2 pt-0 pb-1">                                    
                    <a href="{{ route('category.create') }}" class="btn btn-sm btn-success"><i class="fas fa-plus-square"></i> Create New Prouct Category</a>                                
                </div>
                <div class="ml-0 text-left">
                                <a data-toggle="collapse" href="#collapseSearch" role="button" aria-expanded="false" aria-controls="collapseSearch" class="btn btn-sm btn-primary"><i class="fas fa-search"></i> Filter</a>
                </div>
            </div>
        </div>
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
        <div class="row">
            <div class="col-md-12">
           

                <table class="table  table-sm table-bordered table-responsive" >
                    <tr class="thead-dark">
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Category OrderBy</th>
                        <th>Action</th>
                    
                    </tr>
                    @foreach($cates as $cate)
                    <tr style="height:10px">
                        <td>{{$cate->cateName}}</td>
                        <td>{{$cate->cateDescription}}</td>
                        <td>{{$cate->cateOrderBy}}</td>

                        <td>
                            <form action="{{route('category.destroy',$cate->cateId)}}" method="POST">
                                                    
                                @csrf
                                @method('DELETE')                                                                                                
                                
                                <a  style="font-size:8px;" class="btn btn-sm btn-primary" href="{{route('category.edit', $cate->cateId)}}"><i class="fas fa-edit"></i></a>
                                <button  style="font-size:8px;" name="btndelete"  data-toggle="tooltip" title="Delete" type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this items : {{$cate->cateName}} ?');"><i class="fas fa-trash"></i></button>                                            
                            </form>
                        </td>

                    </tr>
                    @endforeach                        
                                        
                </table>

            </div>        
                        
                
              
</div>

@endsection