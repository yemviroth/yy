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

                        <table id="myTable" class="table table-border">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                </tr>
                            </thead>

                        </table>
                       
                 
                       
    </div>
<hr>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-m-6">
                                <?php //{{$products->links() }}?>
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