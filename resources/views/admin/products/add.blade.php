@extends('admin.layout.app')
@section('import_css')
<link rel="stylesheet" href="{{ asset('admin/plugin/tags/tagsinput.css') }}">
@endsection
@section('import_js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="{{ asset('admin/app/js/products.js')}}?ver=@php echo filemtime('public/admin/app/js/products.js') @endphp">
</script>
<script src="{{ asset('admin/app/js/tinymce.js')}}?ver=@php echo filemtime('public/admin/app/js/tinymce.js') @endphp">
</script>
<script src="{{ asset('admin/plugin/tags/tagsinput.js') }}"></script>
<script src="{{ asset('admin/app/js/related_all.js') }}"></script>
@endsection

@section('name')
Thêm Sản Phẩm
@endsection

@section('content')
@if (session('ok'))
<script>
    toastr.success("Thêm Sản Phẩm Thành Công");
</script>
@endif
<input type="hidden" name="" value="{{ route('handle_search') }}" id="url__handle--search">
<input type="hidden" name="" value="{{ route('handle_cat') }}" id="url__handle--cat">
<input type="hidden" name="" value="{{ route('handle_reload') }}" id="url__handle--reload">
<input type="hidden" name="" id="array__selected" value="{{ $selected }}">
<input type="hidden" name="" id="url__selected" value="{{ $url }}">
<input type="hidden" name="" id="array__selected--blog" value="{{ $selected_blog }}">
<input type="hidden" name="" id="url__handle--related" value="{{ route('handle_related_all') }}">
<div id="product" class="row mx-0">
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Thêm Sản Phẩm
                </div>
                <div class="card-body" id="product__add">
                    {!! Form::open(['url' => route('product_handle_add') , 'method' => "POST" ,'files' => true ]) !!}
                    <div class="form-group mb-5">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="name" id="" value="{{ old('name') }}"
                            placeholder="">
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
                        <label for="">Mô tả ngắn</label>
                        <textarea class="form-control" name="des" id="" rows="4"></textarea>
                        @error('des')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Keywords</label>
                        <input type="text" data-role="tagsinput" class="form-control" name="keywords" value="">
                        @error('keywords')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Giá Sản Phẩm</label>
                        <input type="text" class="form-control" name="price" value="{{ old('price') }}" id="prd_price"
                            placeholder="">
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
                    <div class="form-group mb-5">
                        <label for="">Giá gốc Sản Phẩm</label>
                        <input type="text" class="form-control" name="historical_cost"
                            value="{{ old('historical_cost') }}" id="historical_cost" placeholder="">
                        <div class="box_output mt-3">
                            <span>Bạn Đang Nhập:<strong class="output_price--cost pl-2">0đ</strong></span>
                        </div>
                        @error('historical_cost')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Model</label>
                        <input type="text" class="form-control" name="model" value="{{ old('model') }}" id=""
                            placeholder="">
                        @error('model')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Option 1: Video </label>
                        <input type="text" class="form-control" name="video" value="{{ old('video') }}" id=""
                            placeholder="Điền mã nhúng Youtube vào đây">
                        @error('video')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Thông Tin</label>
                        <textarea name="info" id="info__tiny"
                            class="form-control my-editor">{!! old('info') !!}</textarea>
                        @error('info')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Content</label>
                        <textarea name="content" id="content__tiny"
                            class="form-control my-editor">{!! old('content') !!}</textarea>
                        @error('content')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <div class="custom-file">
                            <input type="file" name="main_img" class="custom-file-input" id="main_img">
                            <label class="custom-file-label" for="main_img" id="forMain">Hình Ảnh Chính 305x305</label>
                        </div>
                        @error('main_img')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <div class="custom-file">
                            <input type="file" name="sub_img" class="custom-file-input" id="sub_img">
                            <label class="custom-file-label" for="sub_img" id="forSub">Hình Ảnh Phụ 305x305</label>
                        </div>
                        @error('sub_img')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <div class="custom-file">
                            <input type="file" name="bg" class="custom-file-input" id="bg_product">
                            <label class="custom-file-label" for="bg_product" id="forBg">Hình Ảnh Backgroud (Không có bỏ
                                qua)</label>
                        </div>
                        @error('bg')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <div class="custom-file">
                            <input type="file" name="gll700[]" class="custom-file-input" id="gll700" multiple>
                            <label class="custom-file-label" for="gll700" id="for700">Hình Ảnh Chi Tiết 700x700</label>
                        </div>
                        @error('gll700.*')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <div class="custom-file">
                            <input type="file" name="gll80[]" class="custom-file-input" id="gll80" multiple>
                            <label class="custom-file-label" for="gll80" id="for80">Hình Ảnh Chi Tiết 80x80</label>
                        </div>
                        @error('gll80.*')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="row mx-0">
                        <div class="form-group mb-5 col-6 pl-0">
                            <div class="custom-file">
                                <input type="file" name="banner" class="custom-file-input" id="banner_prd">
                                <label class="custom-file-label" for="banner_prd" id="forBannerPrd">Option 2: Banner Đi
                                    kèm</label>
                            </div>
                            @error('banner')
                            <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-5 col-6 pr-0">
                            <input type="text" class="form-control" name="banner_link" id=""
                                placeholder="Option 2: Link Banner">
                            @error('banner_link')
                            <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-5">
                        <div class="row mx-0">
                            <div class="col-4 pl-0 mb-5">
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
                            <div class="col-4 mb-5">
                                <label for="">Danh Mục Phụ 1</label>
                                <select class="custom-select" name="cat_1" id="cat_1">
                                    <option value="">Chưa Chọn Danh Mục Chính</option>
                                </select>
                                @error('cat_1')
                                <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @enderror
                            </div>
                            {{-- end cat_2 --}}

                            {{-- end products categories --}}
                            <div class="col-4 pr-0">
                                <label for="">Danh Mục Phụ 2</label>
                                <select class="custom-select" name="cat_2" id="cat_2">
                                    <option value="0">Chưa Chọn Danh Mục Phụ 1</option>
                                </select>
                            </div>
                            {{-- end cat_2 --}}
                            <div class="accordion col-6 pl-0" id="accordionExample">
                                <div class="card">
                                    <div class="card-header p-0" id="headingOne">
                                        <h2 class="mb-0">
                                            <button
                                                class="btn btn-link btn-block navi_btn text-left d-flex justify-content-between align-items-center text-light"
                                                type="button" data-toggle="collapse" data-target="#collapseOne"
                                                aria-expanded="true" aria-controls="collapseOne" >
                                                Danh Mục Khác
                                                <i class="fa-solid fa-angles-down"></i>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            @foreach (category_child(App\Models\Category::all() , 0) as $cate_other)
                                            <div class="va-checkbox d-flex align-items-center w-100" style="margin-left: calc({{ $cate_other->level }} * 25px);">
                                                <input type="checkbox" name="categories[]"
                                                    value="{{ $cate_other -> id }}" id="category__{{ $cate_other->id}}"
                                                    class="check_ins ">
                                                <label for="category__{{ $cate_other -> id }}">
                                                    {{ $cate_other -> name }}
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- end danh muc khac --}}

                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <div class="row mx-0">
                            <div class="col-4 pl-0">
                                <label for="">Kho</label>
                                <select class="custom-select" name="stock">
                                    @foreach (Config::get('product.stock', '1'); as $stock )
                                    <option value="{{ $stock }}">{{ stock_stt($stock) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="">Tình Trạng Sử Dụng</label>
                                <select class="custom-select" name="usage_stt">
                                    @foreach (Config::get('product.usage_stt', '1'); as $us )
                                    <option value="{{ $us }}">{{ usage_stt($us) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4 pr-0">
                                <label for="">Highlight</label>
                                <select class="custom-select" name="highlight">
                                    @foreach (Config::get('product.highlight', '2'); as $hl )
                                    <option value="{{ $hl }}">{{ highlight_stt($hl) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <div class="row mx-0">
                            <div class="col-12 p-0">
                                <label for="">Nhà Sản Xuất</label>
                                <select class="custom-select" name="producer" id="producer">
                                    <option value="">Chọn NSX</option>
                                    @foreach ($producer as $pdc )
                                    <option value="{{  $pdc->id }}">{{ $pdc->name }}</option>
                                    @endforeach
                                </select>
                                @error('producer')
                                <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @enderror
                                <div class="form-group row mx-0 mt-4">
                                    <input type="text" id="search_pdc" class="form-control col-6"
                                        placeholder="Nhập Tên Nhà sản xuất">
                                    <div class="col-3 pr-0">
                                        <button class="btn navi_btn w-100" id="reload__pdc"><i
                                                class="fas fa-sync-alt pr-2"></i> Làm
                                            Mới</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <div class="row mx-0">
                            <div class="col-4 pl-0">
                                <label for="">Danh Mục Game</label>
                                <select class="custom-select" name="cat_game" id="">
                                    <option value="0">Không Có</option>
                                    @foreach ($cat_game as $cg )
                                    <option value="{{  $cg->id }}">{{ $cg->name }}</option>
                                    @endforeach
                                </select>
                                @error('cat_game')
                                <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label for="">Loại sản phẩm</label>
                                <select class="custom-select" name="type" id="type">
                                    <option value="">Chọn loại sản phẩm</option>
                                    @foreach ($type as $t )
                                    <option value="{{   $t->id }}">{{ $t->name }}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label for="">Loại Phụ</label>
                                <select class="custom-select" name="sub_type" id="sub_type">
                                    <option value="0">Bạn chưa chọn loại sản phẩm</option>
                                </select>
                                @error('sub_type')
                                <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-5">
                        <div class="d-flex mx-0 mb-4 align-items-center">
                            <label for="" class="p-0 mb-0">Chinh sách bảo hành </label>
                            <button class="btn navi_btn ml-3" id="reload__ins"><i class="fas fa-sync-alt pr-2"></i>Làm
                                Mới</button>
                        </div>
                        <div class="row mx-0 inner-cis">
                            @foreach ( $ins as $in )
                            <div class="mb-4 col-3 cis_item">
                                <div class="va-checkbox d-flex align-items-center w-100">
                                    <input type="checkbox" name="ins[]" value="{{ $in -> id }}" id="ci__{{ $in -> id }}"
                                        class="check_ins ">
                                    <label for="ci__{{ $in -> id }}" data-toggle="tooltip" data-placement="top"
                                        title="Giá Bảo Hành: {{ crf($in -> price) }} ">
                                        {{ $in -> name }}
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                    <div class="form-group mb-5">
                        <div class="d-flex mx-0 mb-4 align-items-center">
                            <label for="" class="p-0 mb-0">Chinh sách của shop</label>
                            <button class="btn navi_btn ml-3" id="reload__plc"><i class="fas fa-sync-alt pr-2"></i>Làm
                                Mới</button>
                        </div>
                        <div class="row mx-0 inner-plc">
                            @foreach ( $policy as $plc )
                            <div class="mb-4 col-3 plc_item">
                                <div class="va-checkbox d-flex align-items-center w-100">
                                    <input type="checkbox" name="plc[]" value="{{ $plc -> id }}"
                                        id="plc__{{ $plc -> id }}" class="check_plc">
                                    <label for="plc__{{ $plc -> id }}" data-toggle="tooltip" data-html="true"
                                        data-placement="top" title="{{ $plc -> content }}">
                                        {{ $plc -> title }} (Pos: {{ $plc->position }})
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- --}}
                    <div class="col-12 my-4 p-0">
                        <div class="w-100">
                            <div class="card">
                                <div class="card-header text-center">
                                    Thêm Sản Phẩm Mua Kèm
                                </div>
                                <div class="card-body">
                                    <div id="selected" class="mb-4">
                                        <h1 class="mb-3" style="font-size: 20px">Danh Sách Sản Phẩm Đã Chọn</h1>
                                        @if ($selected != "")
                                        @foreach (explode("," , $selected) as $id )
                                        @php
                                        $product = App\Models\Products::where('id', '=' ,$id)->first();
                                        $array = explode("," , $selected);
                                        @endphp
                                        <x-admin.product.checkbox :product="$product" class="select__product"
                                            name="products" prefix="product" :array="$array" />
                                        @endforeach
                                        @else
                                        <span>Chưa có sản phẩm nào được chọn</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="">Tìm Sản Phẩm</label>
                                        <input type="text" class="form-control" name="related_products"
                                            id="search__name" placeholder="Nhập tên sản phẩm">
                                        <div id="result" class="mt-4">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- --}}
                    <div class="col-12 my-4 p-0">
                        <div class="w-100">
                            <div class="card">
                                <div class="card-header text-center">
                                    Bài viết liên quan
                                </div>
                                <div class="card-body">
                                    <div id="selected_blog" class="mb-4">
                                        <h1 class="mb-3" style="font-size: 20px">Danh Sách Bài Viết Đã Chọn</h1>
                                        @if ($selected_blog != "")
                                        @foreach (explode("," , $selected_blog) as $id_blog )
                                        @php
                                        $blog = App\Models\Blogs::where('id', '=' , $id_blog)->first();
                                        $array = explode("," , $selected_blog);
                                        @endphp
                                        <x-admin.blogs.checkbox :blog="$blog" class="select__blog" name="blogs"
                                            prefix="blog" :array="$array" />
                                        @endforeach
                                        @else
                                        <span>Chưa có bài viết nào được chọn</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="">Tìm Bài Viết</label>
                                        <input type="text" class="form-control" name="" id="search__name--blog"
                                            placeholder="Nhập tên bài viết">
                                        <div id="result_blog" class="mt-4"></div>
                                        @error('blogs')
                                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                                            {{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- --}}
                    <div class="form-group mb-5">
                        <input type="submit" value="Thêm Sản Phẩm" class="btn navi_btn w-100">
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
