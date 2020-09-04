@extends('layouts.appadmin')
@section('title')
TROPICANA - ROOMS
@endsection
@section('content')   

<div class="container-fluid" >
       

    <div class="row p-4">
            <!-- <div class="container-fluid"> -->
               
               
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
                                                    <a href="{{ route('productdetail.create') }}" class="btn btn-sm btn-success"><i class="fas fa-plus-square"></i> Create New Room Detail</a>                                
                                    </div>
                                    <div class="ml-0 text-left">
                                                    <a data-toggle="collapse" href="#collapseSearch" role="button" aria-expanded="false" aria-controls="collapseSearch" class="btn btn-sm btn-primary"><i class="fas fa-search"></i> Filter</a>
                                    </div>
                            </div>
                            
                                   
                               
                        </div>
                        <div class="collapse @if (Request::is('rooms/search'))
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
                            </div>
                 
                        <div class="">

                        <table class="table  table-sm table-bordered  table-responsive" >
                            <tr class="thead-dark">
                                <th>catId</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th style="width:200px">How To Use</th>
                                <th style="width:200px">Description</th>
                                <th style="width:200px">product Intro</th>
                                <th>Order</th>
                                <th>Created At</th>
                                <th>Update At</th>
                                <th>Created By</th>
                                <th>Action</th>
                            </tr>
                            @foreach($products as $pro)
                            <tr style="height:10px">
                                <td>{{$pro->cateId}}</td>
                                <td>{{$pro->proName}}</td>
                                <td>{{$pro->proPrice}}</td>
                                <td><img src="{!!asset('images/product/'.$pro->proImage)!!}" class="img-fluid" style="width: 150px;"></td>
                                <td>{{$pro->proHowTo}}</td>
                                <td>{!! Str::limit($pro->proDescription,150)!!}</td>
                                <td>{{$pro->proTextIntro}}</td>
                                <td>{{$pro->proOrderBy}}</td>
                                <td>{{$pro->created_at}}</td>
                                <td>{{$pro->updated_at}}</td>
                                <td>{{$pro->createdBy}}</td>
                                <td>
                                <form action="" method="POST">
                                                            <a  style="font-size:8px;" class="btn btn-sm btn-success" href="{{route('productdetail.show', $pro->proId)}}"><i class="fas fa-eye"></i></a>
                                                            <a  style="font-size:8px;" class="btn btn-sm btn-primary" href="{{route('productdetail.edit', $pro->proId)}}"><i class="fas fa-edit"></i></a>
                                                            @csrf
                                                            @method('DELETE')                                                                                                
                                                            {{-- <button name="btndelete"  data-toggle="tooltip" title="Delete" type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>                                             --}}
                                                            <button  style="font-size:8px;" name="btndelete"  data-toggle="tooltip" title="Delete" type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this items : {{$pro->proName}} ?');"><i class="fas fa-trash"></i></button>                                            
                                                        </form>
                                </td>

                            </tr>
                            
                            @endforeach                        
                                                
                         </table>
                        </div>

                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-m-6">
                                {{ $products->links() }}
                                </div>
                            </div>
                            
                        </div>
                       
                      
              
                </div>
                 
            </div>
       <!-- </div> -->

  

</div>

@endsection