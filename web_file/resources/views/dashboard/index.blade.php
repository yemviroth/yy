@extends('layouts.dash.app')
@section('content')
        
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body p-5">Products Category</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body p-5">Products Sub Category</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body p-5">Products</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body p-5">
                                    <div class="d-flex">
                                        Users <span class="badge badge-pill badge-primary ml-auto justify-content-end">{{$users->count()}}</span>
                                    </div>

                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
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
                                                            
                                                            <a style="font-size:10px;" class="btn btn-sm btn-primary" href="{{route('user.edit', $room->id)}}"><i class="fas fa-edit"></i></a>
                                                            @csrf
                                                            @method('DELETE')
                                                            {{-- <button name="btndelete"  data-toggle="tooltip" title="Delete" type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>                                             --}}
                                                            <button style="font-size:10px;" name="btndelete" data-toggle="tooltip" title="Delete" type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this items : {{$room->username}} ?');"><i class="fas fa-trash"></i></button>
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

               
@endsection