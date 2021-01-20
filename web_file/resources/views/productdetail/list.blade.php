@extends('layouts.dash.app')

@section('content')


<div class="row">
    <div class="col-12 col-sm-3  ml-0 mr-2 pt-2 pb-1 ">
        <a href="{{ route('productdetail.create') }}" class="btn btn-sm btn-success"><i class="fas fa-plus-square"></i>
            បន្ថែមផលិតផល</a>
    </div>
</div>


<div class="" style="font-size:13px;">

    <div class="card shadow">
        <h6 class="card-header bg-dark text-light"><i class="fas fa-suitcase "> </i> បញ្ចីរផលិតផល </h6>
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="table table-border">
                    <thead class="fixed">
                        <th>#</th>
                        <th>រូបភាព</th>

                        <th style="width: 180px;">ឈ្មោះផលិតផល</th>
                        <th>តំលៃ</th>
                        <th>ប្រភេទ</th>
                        <!-- <th style="width:200px">How To Use</th>
                                <th style="width:200px">Description</th> -->
                        <th style="width: 280px;">product Intro</th>
                        <th style="">ក្នុងស្តុក</th>
                        <!-- <th>Order</th> -->
                        <!-- <th>Created At</th>
                        <th>Update At</th> -->
                        <th>បញ្ជូលដោយ</th>
                        <th style="width:90px;">សកម្មភាព</th>
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
                    return "<img src=\"{{asset('images/product')}}/" + data +
                        "\" height=\"75\"/>";
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
            // {
            //     data: 'created_at',
            //     name: 'products.created_at'
            // },
            // {
            //     data: 'updated_at',
            //     name: 'products.updated_at'
            // },
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

<script>
function DeleteFunction() {
    if (confirm('Are you sure you want to delete this item?'))
        return true;
    else {
        return false;
    }
}
</script>
@endsection