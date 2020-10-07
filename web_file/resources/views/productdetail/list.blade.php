@extends('layouts.dash.app')

@section('content')


        <div class="">
            <div class=" ml-0 mr-2 pt-2 pb-1">
                <a href="{{ route('productdetail.create') }}" class="btn btn-sm btn-success"><i class="fas fa-plus-square"></i> Add New Product</a>
            </div>

        </div>
        <div class="" style="font-size:13px;">

            <div class="card shadow">
                <h6 class="card-header bg-dark text-light"><i class="fas fa-suitcase ">    </i>   Products List   </h6>
                <div class="card-body">
                    <div class="table-responsive">
                    <table id="myTable" class="table table-border">
                        <thead class="fixed">
                            <th>#</th>
                            <th>Image</th>

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
                        <?php $i = 0; ?>


                    </table>
                    </div>
                </div>
            </div>
            
        </div>
        <hr>
        <div class="pt-5"></div>
      



   
<!-- </div> -->

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({

            // processing : true,
            serverSide: true,
            fixedHeader: true,
            order: [7, 'DESC'],

            ajax: {
                url: "{{route('productdetail.list')}}",

            },

            columns: [
                // {data: 'DT_RowData.proImage',name: 'proImage'},
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'proImage',
                    name: 'products.proImage',
                    render: function(data, type, full, meta) {
                        return "<img src=\"{{asset('images/product')}}/" + data + "\" height=\"75\"/>";
                    }
                },

                {
                    data: 'proName',
                    name: 'products.proName'
                },
                {
                    data: 'proPrice',
                    name: 'products.proPrice'
                },
                {
                    data: 'cateName',
                    name: 'categories.cateName'
                },

                {
                    data: 'proTextIntro',
                    name: 'products.proTextIntro',
                    render: function(data, type, full, meta) {
                        return data.substr(0, 100) + '...';

                    }
                },
                {
                    data: 'Instock',
                    name: 'Instock',
                    orderable: true,
                    sortable: true
                },
                {
                    data: 'created_at',
                    name: 'products.created_at'
                },
                {
                    data: 'updated_at',
                    name: 'products.updated_at'
                },
                {
                    data: 'createdBy',
                    name: 'products.createdBy'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]

        });



    });

    // {data: 'drivers.name', name:'drivers.name', searchable: true, sortable : true, visible:false},
</script>


@endsection