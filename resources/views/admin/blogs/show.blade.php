@extends('admin.layout.app')
@section('import_css')
<link rel="stylesheet"
    href="{{ asset('client/Date-Time-Picker-Bootstrap-4/build/css/bootstrap-datetimepicker.min.css') }}">
@endsection
@section('import_js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="{{ asset('admin/app/js/tinymce.js')}}?ver=@php echo filemtime('public/admin/app/js/tinymce.js') @endphp">
</script>
<script src="{{ asset('client/Date-Time-Picker-Bootstrap-4/build/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script src="{{ asset('admin/app/js/blogs.js')}}?ver=@php echo filemtime('public/admin/app/js/blogs.js') @endphp">
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

    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Bảng Lọc
                </div>
                <div class="card-body row mx-0" id="blog__filter">
                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Sắp xếp</label>
                            <select class="custom-select" name="" id="blog__filter--sort">
                                <option value="DESC" sort="id">Mới nhất</option>
                                <option value="ASC" sort="id">Cũ nhất</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Trạng Thái</label>
                            <select class="custom-select" name="" id="blog__filter--active">
                                <option value="0">Tất Cả</option>
                                <option value="1">Đang Đăng</option>
                                <option value="2">Đã Gỡ</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="form-group">
                            <label for="">Tiêu đề hoặc ID bài viết</label>
                            <input type="text" class="form-control" name="" id="blog__filter--name"
                                placeholder="Tìm theo tiêu đề hoặc id bài viết">
                        </div>
                    </div>

                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Danh Mục Chính</label>
                            <select class="custom-select" name="" id="blog__filter--cat">
                                <option value="0">Tất Cả</option>
                                @foreach ( App\Models\CatBlog::all() as $cat )
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Danh Mục Phụ </label>
                            <select class="custom-select" name="" id="blog__filter--cat_s1">
                                <option value="0">Tất Cả</option>
                                @foreach ( App\Models\CatBlog::all() as $cat )
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-3 mb-4 pl-0">
                        <div class="form-group">
                            <label for="">Tìm theo Tác Giả</label>
                            <input type="text" class="form-control" name="" id="blog__filter--author"
                                aria-describedby="helpId" placeholder="Nhập tên tác giả">
                        </div>
                    </div>
                    <div class="col-3 mb-4 pl-0" >
                        <label for="">Chọn Ngày Đăng (trở về trước)</label>
                        <div id="dateprev" class="positon-relative">
                            <input type="text" class="form-control">
                       <span id="show_date_1">
                        <i class="fas fa-calendar"></i>
                       </span>
                        </div>
                    </div>
                    <div class="col-3 mb-4 pl-0" >
                        <label for="">Chọn Ngày Đăng (trở về sau)</label>
                        <div id="datenext" class="positon-relative">
                            <input type="text" class="form-control">
                       <span id="show_date_2">
                        <i class="fas fa-calendar"></i>
                       </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
 <div class="col-12 mt-4 p-0">
            <div class="w-100">
                <div class="card">
                    <div class="card-header text-center">
                       Danh Sách Bài Viết
                    </div>
                    <div class="card-body" id="outputTableBlog">
                         <x-admin.table.blog :blogs="$blogs" :number="$number_page" :page="$page" />
                    </div>
                </div>
            </div>
        </div>

@endsection
