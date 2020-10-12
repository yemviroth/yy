@extends('layouts.dash.app')
@section('content')

<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-info text-white mb-4">


            <div class="card-body p-5">
                <div class="d-flex">
                    Products Category <span class="  ml-auto justify-content-end">
                      
                        <h4>{{$cates->count()}}</h4>
                    </span>
                </div>

            </div>

            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="{{route('category.list')}}">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">


            <div class="card-body p-5">
                <div class="d-flex">
                    Products <span class="  ml-auto justify-content-end">
                        <h4>{{$pros}}</h4>
                    </span>
                </div>

            </div>

            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="{{route('productdetail.list')}}">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">


            <div class="card-body p-5">
                <div class="d-flex">
                    Distributor <span class="  ml-auto justify-content-end">
                        <h4>{{$brands->count()}}</h4>
                    </span>
                </div>

            </div>

            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="{{route('brand.list')}}">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body p-5">
                <div class="d-flex">
                    Users <span class="ml-auto justify-content-end">
                        <h4>{{$users->count()}}</h4>
                    </span>
                </div>

            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="{{route('user.index')}}">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>
<div class="row">

<div class="col-xl-8" style="font-size:13px">
        <div class="card">
            <div class="card-header bg-dark text-light">
                <i class="fas fa-users"></i><span class="ml-2">Distributor List</span>

            </div>
            <div class="card-body shadow">
                <div class="table-responsive">
                    <table class="table table-border datatable" style="" id="">

                        <thead class="">
                            <th>Distributor Name</th>
                            <th>Location</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>FB</th>
                            <th>IG</th>
                            <th>Action</th>

                        </thead>
                        @foreach($brands as $brand)
                        <tbody id="">
                            <tr style="">
                                <td>{{$brand->dsName}}</td>
                                <td>{{$brand->dsLocation}}</td>
                                <td>{{$brand->dsAddress}}</td>
                                <td>{{$brand->dsPhone}}</td>
                                <td>{{$brand->dsFb}}</td>
                                <td>{{$brand->dsIg}}</td>


                                <td>
                                    <form action="{{route('brand.destroy',$brand->id)}}" method="POST">

                                        <!-- @csrf
                                        @method('DELETE') -->

                                        <a style="font-size:8px;" class="btn btn-sm btn-primary" href="{{route('brand.edit', $brand->id)}}"><i class="fas fa-edit"></i></a>
                                        <!-- <button style="font-size:8px;" name="btndelete" data-toggle="tooltip" title="Delete" type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this items : {{$brand->bsName}} ?');"><i class="fas fa-trash"></i></button> -->
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
    
    <div class="col-xl-4" style="font-size:13px;">
        <div class="card shadow">
            <div class="card-header card-header bg-dark text-light"><i class="fas fa-user"></i> List User </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-border datatable">


                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Roles</th>



                            <th width="200px">Action</th>
                        </thead>
                        <tbody>
                            @foreach ($users as $room)
                            <tr>

                                <td>{{$room->id}}</td>
                                <td>{{$room->name}}</td>
                                <td>{{$room->username}}</td>
                                <td>{{$room->email}}</td>
                                <td>{{$room->roles}}</td>
                                <td>
                                    <form action="{{ route('user.destroy', $room->id) }}" method="POST">

                                        <a style="font-size:8px;" class="btn btn-sm btn-primary" href="{{route('user.edit', $room->id)}}"><i class="fas fa-edit"></i></a>
                                        <!-- @csrf
                                        @method('DELETE')
                                        
                                        <button style="font-size:8px;" name="btndelete" data-toggle="tooltip" title="Delete" type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this items : {{$room->username}} ?');"><i class="fas fa-trash"></i></button> -->
                                    </form>
                                </td>



                            </tr>

                            @endforeach
                        </tbody>






                    </table>
                </div>
            </div>

        </div>
    </div>
    
</div>


@endsection