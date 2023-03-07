@extends('admin.layout.app')
@section('import_css')
@endsection
@section('import_js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="{{ asset('admin/app/js/tinymce.js')}}?ver=@php echo filemtime('admin/app/js/tinymce.js') @endphp">
</script>
<script src="{{ asset('admin/app/js/related.js')}}?ver=@php echo filemtime('admin/app/js/related.js') @endphp">
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
    <input type="hidden" name="" id="array__selected" value="{{ $selected }}">
    <input type="hidden" name="" id="url__selected" value="{{ $url }}">
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Thêm Liên Kết
                </div>
                <div class="card-body">
                    {!! Form::open(['url' => route('add_handle_related') , 'method' => "POST" ,'files' => true ]) !!}
                    <div id="selected" class="mb-4">
                        <h1 class="mb-3" style="font-size: 20px">Danh Sách Bài Viết Đã Chọn</h1>
                        @if ($selected != "")
                        @foreach (explode("," , $selected) as $id )
                        @php
                        $blog = App\Models\Blogs::where('id', '=' , $id)->first();
                        $array = explode("," , $selected);
                        @endphp
                        <x-admin.blogs.checkbox :blog="$blog" class="select__blog" name="blogs" prefix="blog"
                            :array="$array" />
                        @endforeach
                        @else
                        <span>Chưa có bài viết nào được chọn</span>
                        @endif
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Tìm Bài Viết</label>
                        <input type="text" class="form-control" name="" id="search__name"
                            placeholder="Nhập tên bài viết">
                        <div id="result" class="mt-4">

                        </div>
                        @error('blogs')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Liên Kết Cho:</label>
                        <select class="custom-select" name="realatedFor" id="realatedFor">
                            <option value="">Chọn</option>
                            <option value="category">Danh Mục</option>
                            <option value="product">Sản Phẩm</option>
                        </select>
                    </div>
                    <div class="form-group outputFor mb-5">

                    </div>
                    <div class="form-group mb-5">
                        <input type="submit" value="Thêm Liên Kết" class="btn w-100 text-center navi_btn">
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    {{-- //////////////// --}}
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Thêm Thể Loại
                </div>
                <div class="card-body" id="cssTableRL">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Posts</th>
                                <th scope="col">Product Id</th>
                                <th scope="col">Cat Id</th>
                                <th scope="col">For</th>
                                <th scope="col">Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\Models\RelatedPosts::all() as $ord)
                            <tr>
                                <td>
                                   {{ $ord->id }}
                                </td>
                                <td>
                                    {{ $ord->posts }}
                                </td>
                                <td>
                                    @if ($ord->product_id != NULL)
                                    {{ App\Models\Products::where('id', '=' , $ord->product->id)->first()->name }}
                                        @else
                                        Không Có
                                    @endif
                                </td>
                                <td>
                                    @if ($ord->cat_id != NULL)
                                    {{ App\Models\Category::where('id', '=' , $ord->cat_id)->first()->name }}
                                        @else
                                        Không Có
                                    @endif
                                </td>
                                <td>
                                    {{ $ord->for }}
                                </td>
                                <td>
                                    <a href="{{ route('edit_related_view' , ['id' => $ord->id , 'selected' => "?selected=".$ord->posts]) }}">
                                        <i class="fas fa-eye"></i>
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
