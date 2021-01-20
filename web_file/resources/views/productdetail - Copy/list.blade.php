@extends('layouts.dash.app')

@section('content')


<div class="">
    <div class="row">
        <div class="col-12 col-sm-3  ml-0 mr-2 pt-2 pb-1 ">
            <a href="{{ route('productdetail.create') }}" class="btn btn-sm btn-success"><i class="fas fa-plus-square"></i> Add New Product</a>
        </div>

    <div class="col-5">
        <div class="row">
            Filter :
            <div class="col-5">

                <select name="" id="cates" class="form-control pl-2">
                    <option value="0">All</option>
                    @foreach($cates as $cate)
                    <option value="{{$cate->cateId}}">{{$cate->cateName}}</option>

                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="col-3">
        <div class="row">
            Filter :
            <div class="col-5">

                <select name="" id="cates" class="form-control pl-2">
                    <option value="0">All</option>
                    
                    <option value="Yes">Yes</option>

                    
                </select>
            </div>
        </div>
    </div>



    </div>

</div>
<div class="" style="font-size:13px;">

    <div class="card shadow">
        <h6 class="card-header bg-dark text-light"><i class="fas fa-suitcase "> </i> Products List </h6>
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
        var table = $('#myTable').DataTable({

            // processing : true,
            serverSide: true,
            fixedHeader: true,
            order: [7, 'DESC'],

            ajax: {
                url: "{{route('productdetail.list')}}",
                data: function(d) {
                    d.cates = $('#cates').val()
                }
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

        $('#cates').change(function() {
            table.draw();
        });

    });

    // {data: 'drivers.name', name:'drivers.name', searchable: true, sortable : true, visible:false},
</script>


@endsection