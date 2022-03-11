@extends('admin.layout.app')
@section('import_css')
@endsection
@section('import_js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="{{ asset('admin/app/js/tinymce.js')}}?ver=@php echo filemtime('public/admin/app/js/tinymce.js') @endphp">
</script>
<script src="{{ asset('admin/app/js/prd_related.js')}}?ver=@php echo filemtime('public/admin/app/js/prd_related.js') @endphp">
</script>
@endsection

@section('name')
Danh Mục Bài Viết
@endsection

@section('content')
@if (session('ok'))
<script>
    toastr.success("Cập Nhật Liên Kết Thành Công");
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
    <input type="hidden" name="" id="url__handle--related" value="{{ route('prd_handle_related') }}">
    <input type="hidden" name="" id="url__handle--relatedFor" value="{{ route('prd_handle_related_for') }}">
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Cập Nhật Liên Kết Sản Phẩm
                </div>
                <div class="card-body">
                    {!! Form::open(['url' => route('prd_edit_handle_related' , ['id' => $related->id]) , 'method' => "POST" ,'files' => true ]) !!}
                    <div id="selected" class="mb-4">
                        <h1 class="mb-3" style="font-size: 20px">Danh Sách Sản Phẩm Đã Chọn</h1>
                        @if ($selected != "")
                        @foreach (explode("," , $selected) as $id )
                        @php
                        $product = App\Models\Products::where('id', '=' , $id)->first();
                        $array = explode("," , $selected);
                        @endphp
                        <x-admin.product.checkbox :product="$product" class="select__product" name="products" prefix="product" :array="$array" />
                        @endforeach
                        @else
                        <span>Chưa có bài viết nào được chọn</span>
                        @endif
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Tìm Sản Phẩm</label>
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
                            <option value="{{ $related->for }}">{{ config('navi.realted_products.'.$related->for) }}
                            </option>
                            @foreach ( config('navi.realted_products') as $key => $val )
                            @if ($key != $related->for)
                            <option value="{{ $key }}">{{ config('navi.realted_products.'.$key) }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group outputFor mb-5">
                        @if ($related->for == "blog")
                        <label for="">Chọn Bài Viết</label>
                        <select class="custom-select mb-3" name="rFPrd" id="realatedForPrd">';
                            <option value="{{ $related->blog_id }}">{{ App\Models\Blogs::where('id', '=' , $related->blog_id )->first()->title }}i</option>
                        </select>
                        <input type="text" name=""  class="form-control" id="search__blog" placeholder="Nhập tên bài viết muốn thay đổi vào đây">
                        @else
                        <label for="">Chọn Sản Phẩm</label>
                        <select class="custom-select mb-3" name="rFPrd" id="realatedForPrd">';
                            <option value="{{ $related->product_id }}">{{ App\Models\Products::where('id', '=' , $related->product_id )->first()->name }}i</option>
                        </select>
                        <input type="text" name=""  class="form-control" id="search__product" placeholder="Nhập tên sản phẩm muốn thay đổi vào đây">
                        @endif
                    </div>
                    <div class="form-group mb-5">
                        <input type="submit" value="Cập Nhật Liên Kết" class="btn w-100 text-center navi_btn">
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
