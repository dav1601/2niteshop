@extends('admin.layout.app')
@section('import_css')
@endsection
@section('import_js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="{{ asset('admin/app/js/category.js')}}?ver=@php echo filemtime('public/admin/app/js/category.js') @endphp">
</script>
@endsection

@section('name')
Nhà Sản Xuất
@endsection

@section('content')
@if (session('ok'))
<script>
    toastr.success("Thêm Nhà Sản Xuất Thành Công Thành Công");
</script>
@endif
@if (session('delete'))
<script>
    toastr.success("Xoá Nhà Sản Xuất Thành Công");
</script>
@endif
<div id="pdc" class="row mx-0">
    <div class="col-6 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Thêm Nhà Sản Xuất
                </div>
                <div class="card-body" id="pdc__add">
                    {!! Form::open(['url' => route('handle_add_prdcer') , 'method' => "POST" ,'files' => true ]) !!}
                    <div class="form-group mb-5">
                        <label for="">Tên Nhà Sản Xuất</label>
                        <input type="text" class="form-control" name="name" id="" placeholder="">
                        @error('name')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug" id="" placeholder="">
                        @error('slug')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <input type="submit" value="Thêm Nhà Xuất" class="btn w-100 text-center navi_btn">
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    {{-- ------------------------ --}}
    <div class="col-6 mt-4 pr-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Danh Sách Nhà Sản Xuất
                </div>
                <div class="card-body" id="pdc__show">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Xoá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $producer as $pdc )
                            <tr>
                                <th scope="row">{{ $pdc -> id }}</th>
                                <td>{{ $pdc -> name }}</td>
                                <td>{{ $pdc -> slug }}</td>
                                <td>
                                    <a href="{{ route('handle_detele_prdcer', ['id'=> $pdc -> id]) }}" class="d-block">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- ------------------------ --}}
</div>
@endsection