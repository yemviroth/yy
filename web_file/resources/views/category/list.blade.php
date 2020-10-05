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
    

   
      

<div class="wrapper" >
    <div class="container ">
        <DIV class="row ">        
            <div class="form-group row">
                <div class="col-12 col-md-12 pl-4">
                    <a href="{{ route('category.create') }}" class="btn btn-success"><i class="fas fa-plus-square"></i> New Category</a>                                
                    <a href="{{ route('category/subcategory.create') }}" class="btn btn-info "><i class="fas fa-plus-square"></i> New Sub Category</a>                                
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
                            <table class="table table-border" style="font-size:14px;" id="" >

                                <thead class="thead-dark">
                                    <th>Category Name</th>
                                    <th>Sub Category</th>
                                    <th>OrderBy</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                
                                </thead>
                                @foreach($cates as $cate)
                                <tbody id="">
                                <tr style="">
                                    <td>
                                        {{$cate->cateName}}
                                    
                                    </td>
                                    <td>
                                        <table class="table-striped table-sm">
                            
                                
                                            <tr>
                                            
                                                <th>Sub Name</th>
                                                <th>Action</th>
                                            </tr>
                                
                            
                                                                        
                                                
                                                @foreach($subcates as $subcate)
                                                @if($cate->cateId == $subcate->cateId) 
                                            <tr>
                                        
                                                <td>{{$subcate->subCateName}}</td>
                                                <td>
                                                <form action="{{route('category/subcategory.destroy',$subcate->subCateId)}}" method="POST">
                                                                
                                                @csrf
                                                @method('DELETE')                                                                   

                                                    <a href="{{route('category/subcategory.edit', $subcate->subCateId)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                                    <button type="submit"  class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this items : {{$subcate->subCateName}} ?');"><i class="fas fa-trash"></i></button>
                                                </form>
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
                                </tbody>
                                @endforeach                        
                                                    
                            </table>
                        </div>
                        
                    </div>
            </div>
        </div>



    </div>
</div>
@endsection

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>