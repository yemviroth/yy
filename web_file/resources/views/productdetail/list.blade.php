@extends('layouts.appadmin')

@section('content')   

<div class="wrapper">
<div class="container-fluid" >
       

    <div class="row p-4" style="font-size:13px;">
                          
                        
              

                    <div class="col-12">
                        <div class="row">
                                    <div class=" ml-0 mr-2 pt-0 pb-1">                                    
                                                    <a href="{{ route('productdetail.create') }}" class="btn btn-sm btn-success"><i class="fas fa-plus-square"></i> Add New Product</a>                                
                                    </div>
                                   
                            </div>
                             
                        </div>

                        <table id="myTable" class="table table-border">
                            <thead class="fixed">
                                <th>#</th>
                                 <th >Image</th>
                               
                                <th style="width: 180px;">Product Name</th>
                                <th>Price</th>
                                <th>catId</th>
                                <!-- <th style="width:200px">How To Use</th>
                                <th style="width:200px">Description</th> -->
                                <th style="width: 280px;">product Intro</th>
                                <th style="">In Stock</th>
                                <!-- <th>Order</th> -->
                                <th>Created At</th>
                                <th>Update At</th>
                                <th>By</th>
                                <th style="width:90px;">Action</th>
                            </thead>
                            <?php $i=0;?>
                           

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
       
        // processing : true,
        serverSide : true,
        fixedHeader: true,
      
        
        ajax:{
            url: "{{route('productdetail.list')}}",
           
        },
        
        columns: [
            // {data: 'DT_RowData.proImage',name: 'proImage'},
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'proImage', name: 'proImage',
                    render: function( data, type, full, meta ) {
                        return "<img src=\"{{asset('images/product')}}/" + data + "\" height=\"75\"/>";
                    }
                },

            {data: 'proName',name: 'proName'},
            {data: 'proPrice',name: 'proPrice'},
            {data: 'cateId',name: 'cateId'},

            {data: 'proTextIntro',name: 'proTextIntro',
                    render: function( data, type, full, meta ) {
                        return data.substr( 0, 100 ) +'...';

                    }
                },
                {data: 'proIsInStock',name: 'proIsInStock'},        
            {data: 'created_at',name: 'created_at'},
            {data: 'updated_at',name: 'updated_at'},
            {data: 'createdBy',name: 'createdBy'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
        
    });

    order:[7,'DESC']
  
});

// {data: 'drivers.name', name:'drivers.name', searchable: true, sortable : true, visible:false},

  


  </script>
</div>

@endsection
