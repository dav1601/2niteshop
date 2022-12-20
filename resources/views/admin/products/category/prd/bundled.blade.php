@extends('admin.layout.app')
@section('import_css')
@endsection
@section('import_js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="{{ asset('admin/app/js/products.js')}}?ver=@php echo filemtime('public/admin/app/js/category.js') @endphp">
</script>
<script src="{{ asset('admin/app/js/tinymce.js')}}?ver=@php echo filemtime('public/admin/app/js/tinymce.js') @endphp">
</script>
@endsection

@section('name')
Thêm Sản Phẩm
@endsection

@section('content')
@if (session('ok'))
<script>
    toastr.success("Thêm Bundled Thành Công");
</script>
@endif
@if (session('delete'))
<script>
    toastr.success("Xoá Bundled Thành Công");
</script>
@endif
<div class="row mx-0">
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Thêm Bundled
                </div>
                <div class="card-body">
                    {!! Form::open(['url' => route('handle_add_bundled') , 'method' => "POST" ,'files' => true ]) !!}
                    <div class="form-group mb-5">
                        <label for="">Danh Mục Chính</label>
                        <select class="custom-select" name="cat" id="cat">
                            <option value="">Chọn Danh Mục Chính</option>
                            @foreach ( $category as $cate )
                            <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                            @endforeach
                        </select>
                        @error('cat')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Danh mục Bundled</label>
                        <select class="custom-select" name="cat_id" id="cat_id">
                            <option value="0">Chưa Chọn Danh Mục Chính</option>
                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Danh mục Skin đi kèm</label>
                        <select class="custom-select" name="bundled_skin" id="bundled_skin">
                            <option value="0">Chưa Chọn Danh Mục Chính</option>
                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Phụ Kiện Đi Kèm</label>
                        <div class="box_access row mx-0">
                            <span>Chưa Chọn Danh Mục Chính.....</span>
                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <input type="submit" value="Thêm Bundled" class="btn navi_btn w-100">
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    {{-- -------------------------- --}}
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Danh Sách Bundled
                </div>
                <div class="card-body" id="bundled_show">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Bundle Skin</th>
                                <th scope="col">Bundled Accessory</th>
                                <th scope="col">Bundled Danh Mục</th>
                                <th scope="col">Sửa</th>
                                <th scope="col">Xoá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bundled as $bdl)
                            <tr>
                                <td>
                                    {{ $bdl->id }}
                                </td>
                                <td>
                                   @if ($bdl->bundled_skin != 0)
                                   {{ App\Models\Category::where('id', '=' , $bdl->bundled_skin)->first()->name}}
                                   @else
                                       Không có danh mục skin
                                   @endif
                                </td>
                                <td>
                                    @php
                                    $ba = explode(",",$bdl-> bundled_accessory);
                                    @endphp
                                    @if (count($ba) > 0)
                                    <ul>
                                        @foreach ($ba as $k => $b )
                                        <li class="d-flex align-items-center"><i class="fas fa-circle pr-2 mt-0" style="font-size: 8px !important;"></i> {{ App\Models\Products::where('id', '=' , $b)->first()->name }},</li>
                                        @endforeach
                                    </ul>
                                    @else
                                    Không có phụ kiện đi kèm
                                    @endif

                                </td>
                                <td>
                                    {{ App\Models\Category::where('id', '=' , $bdl->cat_id)->first()->name }}
                                </td>
                                <td>
                                    <a href="">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('handle_delete_bundled', ['id'=>$bdl->id]) }}">
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
