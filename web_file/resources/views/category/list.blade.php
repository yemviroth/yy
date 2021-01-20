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
    <div class="col-md-10 mx-auto ml-0">



        <div class="">
            <div class=" ml-0 mr-0 pt-2 pb-1">
                <a href="{{ route('category.create') }}" class="btn btn-success btn-sm"><i
                        class="fas fa-plus-square"></i>បន្ថែមប្រភេទទំនិញ</a>
                <a href="{{ route('category/subcategory.create') }}" class="btn btn-info btn-sm"><i
                        class="fas fa-plus-square"></i>បន្ថែមប្រភេទទំនិញរង</a>
            </div>

        </div>

        <div class="">
            <div class="card">
                <h6 class="card-header bg-dark text-light">
                    <i class="fas fa-clipboard-list"></i><span class="ml-2">បញ្ចីប្រភេទទំនិញ</span>
                </h6>
                <div class="card-body shadow">
                    <div class="table-responsive">
                        <table class="table table-border datatable" style="font-size:14px;" id="">

                            <thead class="">
                                <th>ប្រភេទផលិតផល</th>
                                <th>ប្រភេទរងទំនិញ</th>
                                <th>តម្រៀប</th>
                                <th>បរិយាយ</th>
                                <th>សកម្មភាព</th>

                            </thead>
                            @foreach($cates as $cate)
                            <tbody id="">
                                <tr style="">
                                    <td>
                                        {{$cate->cateName}}
                                    </td>
                                    <td>

                                        @foreach($subcates as $subcate)
                                        @if($cate->cateId == $subcate->cateId)
                                        <table class="table table-sm table-striped" style="font-size:14px;">
                                            @if(isset($subcates))
                                            <tr class="table-secondary">
                                                <th>ឈ្មោះប្រភេទរង</th>
                                                <th>សកម្មភាព</th>
                                            </tr>
                                            @endif



                                            <tr>

                                                <td>{{$subcate->subCateName}}</td>
                                                <td>
                                                    <form
                                                        action="{{route('category/subcategory.destroy',$subcate->subCateId)}}"
                                                        method="POST">

                                                        @csrf
                                                        @method('DELETE')

                                                        <a href="{{route('category/subcategory.edit', $subcate->subCateId)}}"
                                                            class="btn btn-sm btn-warning"><i
                                                                class="fas fa-edit"></i></a>
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Are you sure you want to delete this items : {{$subcate->subCateName}} ?');"><i
                                                                class="fas fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        </table>
                                        @endif
                                        @endforeach





                                    </td>
                                    <td>{{$cate->cateOrderBy}}</td>
                                    <td>{{$cate->cateDescription}}</td>


                                    <td>
                                        <form action="{{route('category.destroy',$cate->cateId)}}" method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <a style="" class="btn btn-sm btn-primary"
                                                href="{{route('category.edit', $cate->cateId)}}"><i
                                                    class="fas fa-edit"></i></a>
                                            <button style="" name="btndelete" data-toggle="tooltip" title="Delete"
                                                type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this items : {{$cate->cateName}} ?');"><i
                                                    class="fas fa-trash"></i></button>
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