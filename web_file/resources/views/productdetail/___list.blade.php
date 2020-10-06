
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Primary Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Warning Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Success Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Danger Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area mr-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                DataTable Example
                            </div>
                            
                            <div class="card shadow">
                                <h6 class="card-header bg-dark text-light"><i class="fas fa-suitcase "> Products List </i> </h6>
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
                    </div>
                
                    @extends('layouts.dash.app')
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
        
    </body>
</html>
