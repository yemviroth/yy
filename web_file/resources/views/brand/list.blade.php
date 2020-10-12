@extends('layouts.dash.app')

@section('content')



<!-- @if ($message = Session::get('success'))
<div id="malert" class="alert alert-success alert-dismissible fade show" role="alert">{{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

@endif -->



<div class="">
    <div class="">



        <div class="">
            <div class=" ml-0 mr-0 pt-2 pb-1">
                <a href="{{ route('brand.create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus-square"></i> New Distributor</a>

            </div>

        </div>

        <div class="">
            <div class="card">
                <div class="card-header bg-dark text-light">
                    <i class="fas fa-users"></i><span class="ml-2">Distributor List</span>

                </div>
                <div class="card-body shadow">
                    <div class="table-responsive">
                        <table class="table table-border datatable" style="font-size:14px;" id="">

                            <thead class="">
                                <th>Image</th>
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
                                    <td><img class="rounded-circle" style="width: 80px;height:80px;" src="@if($brand->dsPhoto!=''){{asset('images/profile/'.$brand->dsPhoto)}} @else {{asset('images/profile/noImg.png')}}@endif" alt=""></td>
                                    <td>{{$brand->dsName}}</td>
                                    <td>{{$brand->dsLocation}}</td>
                                    <td>{{$brand->dsAddress}}</td>
                                    <td>{{$brand->dsPhone}}</td>
                                    <td>{{$brand->dsFb}}</td>
                                    <td>{{$brand->dsIg}}</td>


                                    <td>
                                        <form action="{{route('brand.destroy',$brand->id)}}" method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <a style="" class="btn btn-sm btn-primary" href="{{route('brand.edit', $brand->id)}}"><i class="fas fa-edit"></i></a>
                                            <button style="" name="btndelete" data-toggle="tooltip" title="Delete" type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this items : {{$brand->bsName}} ?');"><i class="fas fa-trash"></i></button>
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
    </div>
</div>
@endsection

<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>