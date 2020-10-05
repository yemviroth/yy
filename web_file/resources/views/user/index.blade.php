@extends('layouts.appadmin')
@section('title')
USER
@endsection
@section('content')   

<div class="container-fluid" >
   
    <div class="row"  style="margin-bottom: -12px;">
        <div class="col-md-2 col-lg-2">
            <h4 style="color:black" class="mytitle"><i class="fas fa-list-ul"></i> List User </h4>
        </div>
    </div>
    <div class="row">
            <div class="container-fluid">
                <div class="col-md-12 card p-1"  style="border:1px solid #38c172;">
               
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
                                                    <a href="{{ route('user.create') }}" class="btn btn-sm btn-success"><i class="fas fa-plus-square"></i> Create New</a>                                
                                    </div>
                                   
                            </div>
                            
                                   
                               
                        </div>

                        <div class="w-100"></div>
                        <div class="table-responsive">

                        <table class="table table-condensed table-sm table-hover table-bordered table-striped" >
                            
                            <tr>
                              
                                <th>ID</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Roles</th>

                                <th>Created By</th>
                                <th>Created Date</th>
                                <th>Updated By</th>
                                <th>Updated Date</th>
                                        
                                <th width="200px">Action Rooms</th>
                               
                                
                            </tr>
                
                            @foreach ($users as $room) 
                            <tr>
                           
                            <td>{{$room->id}}</td>                                                        
                            <td>{{$room->name}}</td>
                            <td>{{$room->username}}</td>
                            <td>{{$room->email}}</td>
                            <td>{{$room->roles}}</td>
                            
                            
                            <td>{{$room->created_by}}</td>
                            <td>{{$room->created_at}}</td>
                            <td>{{$room->updated_by}}</td>
                            <td>{{$room->updated_at}}</td>
                            
                            <td>
                                <form action="{{ route('user.destroy', $room->id) }}" method="POST">
                                    <a  style="font-size:8px;" class="btn btn-sm btn-success" href="{{route('user.show', $room->id)}}"><i class="fas fa-eye"></i></a>
                                    <a  style="font-size:8px;" class="btn btn-sm btn-primary" href="{{route('user.edit', $room->id)}}"><i class="fas fa-edit"></i></a>
                                    @csrf
                                    @method('DELETE')                                                                                                
                                    {{-- <button name="btndelete"  data-toggle="tooltip" title="Delete" type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>                                             --}}
                                    <button  style="font-size:8px;" name="btndelete"  data-toggle="tooltip" title="Delete" type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this items : {{$room->username}} ?');"><i class="fas fa-trash"></i></button>                                            
                                </form>
                            </td> 

                           

                            </tr>
                       
                            @endforeach                          
                         </table>
                        </div>
                
                    {{--
                     $rooms->appends(Request::capture()->except('page'))->render()
                     --}}
                </div>
                 
            </div>
       </div>

  

</div>

@endsection