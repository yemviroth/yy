@extends('layouts.appadmin')
@section('title')
TROPICANA - ROOMS
@endsection
@section('content')   

<div class="container-fluid" >
       
    <div class="row"  style="margin-bottom: -12px;">
        <div class="col-md-2 col-lg-2">
            <h4 style="color:black" class="mytitle"><i class="fas fa-list-ul"></i> List Room Detail</h4>
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
                                                    <a href="{{ route('rooms.detail.create') }}" class="btn btn-sm btn-success"><i class="fas fa-plus-square"></i> Create New Room Detail</a>                                
                                    </div>
                                    <div class="ml-0 text-left">
                                                    <a data-toggle="collapse" href="#collapseSearch" role="button" aria-expanded="false" aria-controls="collapseSearch" class="btn btn-sm btn-primary"><i class="fas fa-search"></i> Filter</a>
                                    </div>
                            </div>
                            
                                   
                               
                        </div>
                        <div class="container-fluid  collapse @if (Request::is('rooms/search'))
                            show 
                        @endif"  id="collapseSearch">
                        <form action="{{ route('rooms.index') }}" method="get">
                                {{-- @csrf --}}
                                <div class="row">
                                        <div class=" col-12 mb-1 form-inline p-1" style="border: 1px #ccc solid;">
                                            

                                                <div class="ml-2">
                                                    Date: <input type="text" value="@php if (session()->has('index_logging_logdate')) { echo session()->get('index_logging_logdate');}@endphp" name="logdate" id="logdate" autocomplete="off" class="form-control form-control-sm">
                                                </div> 
                                                <div class="ml-2">
                                                        Problem: <input type="text" value="@php if (session()->has('index_logging_problem')) { echo session()->get('index_logging_problem');}@endphp" name="problem" class="form-control form-control-sm">
                                                 </div> 
                                                
                                                 <div class="ml-2">
                                                                                                                            
                                                                <button name="btnsearch" type="submit" class="btn btn-sm btn-success"><i class="fas fa-search"></i></button>
                                                            
                                                 </div> 
                                                
                                        </div>
                                    
                                </div>
                            </form>
                            </div>
                        <div class="w-100"></div>
                        <div class="table-responsive">

                        <table class="table table-condensed table-sm table-hover table-bordered table-striped" >
                            
                            <tr>
                              
                                <th>ID</th>
                                <th>Language</th>
                                <th>MAIN</th>
                                <th></th>                                
                                
                                
                                
                               
                                
                            </tr>
                
                            @foreach ($rooms as $room) 
                            <tr>
                           
                            <td>{{$room->id}}</td>
                            <td>{{$room->lang}}</td>
                            <td>
                          
                                    {{$room->name}}

                                    @php
                                    //$room->RoomMain->name
                                    @endphp
                            
                            </td>
                            <td>
                            
                                <table>
                                    <tr>
                                        <th>Language</th>
                                        <th width="220px">Text</th>
                                        <th>Created By</th>
                                        <th width="200px">Created Date</th>
                                        <th>Updated By</th>
                                        <th width="200px">Updated Date</th>
                                                
                                        <th width="200px">Action Rooms</th>
                                    </tr>
                                    @foreach ($details as $detail)
                                        @if ($detail->room_id == $room->id && $detail->text != '')                                            
                                        
                                                <tr>
                                                        <td>{{$detail->lang}} </td>
                                                    <td>{{$detail->text}} </td>
                                                    <td>{{$detail->created_by}}</td>
                                                    <td>{{$detail->created_at}}</td>
                                                    <td>{{$detail->updated_by}}</td>
                                                    <td>{{$detail->updated_at}}</td>
                                                    
                                                    <td>
                                                        <form action="{{ route('rooms.detail.delete', $detail->id) }}" method="POST">
                                                            <a  style="font-size:8px;" class="btn btn-sm btn-success" href="{{route('rooms.show', $detail->id)}}"><i class="fas fa-eye"></i></a>
                                                            <a  style="font-size:8px;" class="btn btn-sm btn-primary" href="{{route('rooms.detail.edit', $detail->id)}}"><i class="fas fa-edit"></i></a>
                                                            @csrf
                                                            @method('DELETE')                                                                                                
                                                            {{-- <button name="btndelete"  data-toggle="tooltip" title="Delete" type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>                                             --}}
                                                            <button  style="font-size:8px;" name="btndelete"  data-toggle="tooltip" title="Delete" type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this items : {{$detail->text}} ?');"><i class="fas fa-trash"></i></button>                                            
                                                        </form>
                                                    </td> 
                                                </tr>    
                                            

                                        @endif
                                    @endforeach
                                </table>
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