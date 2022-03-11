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
Bảo Hành
@endsection

@section('content')
@if (session('ok'))
<script>
    toastr.success("Thêm Bảo Hành Thành Công");
</script>
@endif
@if (session('error'))
<script>
    toastr.error("Chính Sách Bảo Hành Này Đã Tồn Tại");
</script>
@endif
@if (session('delete'))
<script>
    toastr.success("Xoá Bảo Hành Thành Công");
</script>
@endif
<div id="pdc" class="row mx-0">
    <div class="col-6 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Thêm Bảo hành
                </div>
                <div class="card-body" id="pdc__add">
                    {!! Form::open(['url' => route('handle_add_insurance') , 'method' => "POST" ,'files' => true ]) !!}
                    <div class="form-group mb-5">
                        <label for="">Tên Chính Sách Bảo Hành</label>
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
                        <label for="">Giá</label>
                        <input type="text" class="form-control" name="price" id="ins_price" placeholder="">
                        <div class="box_output mt-3">
                            <span>Bạn Đang Nhập:<strong class="output_price pl-2">0đ</strong></span>
                        </div>
                        @error('price')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Group</label>
                        <select class="custom-select" name="group" id="">
                            <option value="1">Chế độ bảo hành</option>
                            <option value="2">Sản Phẩm Mua Kèm</option>
                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <input type="submit" value="Thêm Thể Loại" class="btn w-100 text-center navi_btn">
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
                    Danh Sách Bảo Hành
                </div>
                <div class="card-body" id="pdc__show">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Xoá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $insurances as $insurance )
                            <tr>
                                <th scope="row">{{ $insurance -> id }}</th>
                                <td>{{ $insurance -> name }}</td>
                                <td>{{ crf($insurance -> price) }}</td>
                                <td>
                                    <a href="{{ route('handle_detele_insurance', ['id'=> $insurance -> id]) }}"
                                        class="d-block">
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
