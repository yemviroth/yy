@extends('layouts.dash.app')
@section('title')
USER
@endsection
@section('content')

<div class="" style="font-size:13px;">

   
        <div class="container">
            <div class="col-8">
                <div class="row">
                    <div class="  pt-2 pb-1">
                        <a href="{{ route('user.create') }}" class="btn btn-sm btn-success"><i class="fas fa-plus-square"></i> បង្កើតអ្នកប្រើថ្មី</a>
                   </div>
               </div>
            </div>

            <div class="card shadow">
                <div class="card-header card-header bg-dark text-light"><i class="fas fa-user"></i> បញ្ជីអ្នកប្រើ  </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-border datatable">


                            <thead>
                                <th>#</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                
                                <th width="200px">Action</th>
                            </thead>
                            <tbody>
                                <?php $id=0;?>
                                @foreach ($users as $room)
                                <tr>

                                    <td>{{++$id}}</td>
                                    <td>{{$room->name}}</td>
                                    <td>{{$room->username}}</td>
                                    <td>{{$room->email}}</td>
                                   


                                   

                                    <td>
                                        <form action="{{ route('user.destroy', $room->id) }}" method="POST">
                                            
                                            <a style="font-size:8px;" class="btn btn-sm btn-primary" href="{{route('user.edit', $room->id)}}"><i class="fas fa-edit"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            {{-- <button name="btndelete"  data-toggle="tooltip" title="Delete" type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>                                             --}}
                                            <!-- <button style="font-size:8px;" name="btndelete" data-toggle="tooltip" title="Delete" type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this items : {{$room->username}} ?');"><i class="fas fa-trash"></i></button> -->
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