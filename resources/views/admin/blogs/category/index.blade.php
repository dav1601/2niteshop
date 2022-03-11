@extends('admin.layout.app')
@section('import_css')
@endsection
@section('import_js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
@endsection

@section('name')
Danh Mục Bài Viết
@endsection

@section('content')
@if (session('ok'))
<script>
    toastr.success("Thêm Thể Loại Thành Công");
</script>
@endif
@if (session('delete'))
<script>
    toastr.success("Xoá Thể Loại Thành Công");
</script>
@endif
<div class="row mx-0">


<div class="col-6 mt-4 p-0">
    <div class="w-100">
        <div class="card">
            <div class="card-header text-center">
                Thêm Danh Mục
            </div>
            <div class="card-body">
                {!! Form::open(['url' => route('handle_add_blog') , 'method' => "POST" ,'files' => true ]) !!}
                <div class="form-group mb-5">
                    <label for="">Tiêu đề</label>
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
                    <input type="submit" value="Thêm Danh Mục" class="btn w-100 text-center navi_btn">
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<div class="col-6 mt-4 pr-0">
    <div class="w-100">
        <div class="card">
            <div class="card-header text-center">
                Danh Sách Danh Mục
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
                        @foreach ( $category as $cate )
                        <tr>
                            <th scope="row">{{ $cate -> id }}</th>
                            <td>{{ $cate -> name }}</td>
                            <td>{{ $cate -> slug }}</td>
                            <td>
                                <a href="{{ route('delete_cat_blog', ['id'=> $cate -> id]) }}" class="d-block">
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
</div>
@endsection