

@extends('layouts.appadmin')
@section('title')
TROPICANA - ROOMS
@endsection
@section('content')   

<div class="container-fluid" >
       

    <div class="row p-4">
                          
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
                       
                 
                        <div class="">


               <div class="modal-content shadow">
                    <div class="modal-header modal-md">
                    
                        <p class="modal-title">
                        <span><i class="fas fa-clipboard-list"></i><span class="ml-2">Products List</span>
                        </p>
                    </div>
                    <div class="table-responsive">
                <table class="table table-condensed" id="myTable" >
                            <tr class="thead-dark">
                                <th>#</th>
                                 <th>Image</th>
                               
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>catId</th>
                                <!-- <th style="width:200px">How To Use</th>
                                <th style="width:200px">Description</th> -->
                                <th style="width:200px">product Intro</th>
                                <!-- <th>Order</th> -->
                                <th>Created At</th>
                                <th>Update At</th>
                                <th>By</th>
                                <th>Action</th>
                            </tr>
                            <?php $i=0;?>
                            @foreach($products as $pro)
                            <?php
                                
                                $i+=1;
                                ?>

                            <tr style="height:15px">
                                
                                <td><?=$i;?></td>
                                
                                
                                <td><img src="{!!asset('images/product/'.$pro->proImage)!!}" class="img-fluid" style="width: 100px;"></td>
                               
                                <td>{{$pro->proName}}</td>
                                <td>{{$pro->proPrice}}</td>
                                <td>{{$pro->cateId}}</td>
                                <!-- <td>{{$pro->proHowTo}}</td> -->
                                <!-- <td>{!! Str::limit($pro->proDescription,150)!!}</td> -->
                                <td>{{Str::limit($pro->proTextIntro,100)}}</td>
                                <!-- <td>{{$pro->proOrderBy}}</td> -->
                                <td>{{$pro->created_at}}</td>
                                <td>{{$pro->updated_at}}</td>
                                <td>{{$pro->createdBy}}</td>
                                <td>
                                <form action="{{route('productdetail.destroy',$pro->proId)}}" method="POST">
                                    <a  style="font-size:10px;" class="btn btn-sm btn-success" href="{{route('productdetail.show', $pro->proId)}}"><i class="fas fa-eye"></i></a>
                                    <a  style="font-size:10px;" class="btn btn-sm btn-primary" href="{{route('productdetail.edit', $pro->proId)}}"><i class="fas fa-edit"></i></a>
                                    @csrf
                                    @method('DELETE')                                                                                                
                                    {{-- <button name="btndelete"  data-toggle="tooltip" title="Delete" type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>                                             --}}
                                    <button  style="font-size:10px;" name="btndelete"  data-toggle="tooltip" title="Delete" type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this items : {{$pro->proName}} ?');"><i class="fas fa-trash"></i></button>                                            
                                </form>
                                </td>

                            </tr>
                            
                            @endforeach                        
                                                
                            </table>
                    </div>
                    
                </div>
        </div>
    </div>
<hr>
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

  <script>
      $(document).ready( function () {
    $('#myTable').DataTable({
        processing : true,
        serverSide : true,
        ajax:{
            url: "{{route('productdetail.list')}}",
        },
        columns: [
            {
                data: 'proName',
                name: 'proName'
            },
            {
                data: 'proPrice',
                name: 'proPrice'
            }
        ]
    });
});
  </script>

</div>

@endsection