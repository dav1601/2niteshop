@extends('admin.layout.app')
@section('import_css')
<link rel="stylesheet" href="{{ asset('admin/plugin/tags/tagsinput.css') }}">
@endsection
@section('import_js')
<script src="{{ asset('admin/app/js/category.js')}}?ver=@php echo filemtime('public/admin/app/js/category.js') @endphp">
</script>
<script src="{{ asset('admin/app/js/related_all.js') }}"></script>
<script src="{{ asset('admin/plugin/tags/tagsinput.js') }}">
</script>
@endsection
@section('name')
Cập Nhật Danh Mục
@endsection

@section('content')
<input type="hidden" name="" id="url__selected" value="{{ $url }}">
<input type="hidden" name="" id="array__selected--blog" value="{{ $selected_js_blog }}">
<input type="hidden" name="" id="product_id" value="{{ $id }}">
<div id="cat__add--product">
    <div class="row mx-0">
        <div class="col-12 mt-4 p-0">
            <div class="w-100">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Cập Nhật Danh Mục</h2>
                    </div>
                    @if (session('update'))
                    <script>
                        toastr.success("Cập Nhật Danh Mục Thành Công");
                    </script>
                    @endif
                    @if (session('error'))
                    <script>
                        toastr.error("Bạn Chỉ Được Cập Nhật Icon Cho Danh Mục Chính");
                    </script>
                    @endif
                    <div class="card-body">
                        {!! Form::open(['url' => route('handle_edit_cat') , 'method' => "POST" ,'files' => true ]) !!}
                        <input type="hidden" name="id" value="{{ $id }}">
                        <div class="form-group mb-5">
                            <label for="">Tên Danh Mục</label>
                            <input type="text" class="form-control" name="name" id="" value="{{ $cat -> name }}"
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
                            <label for="">Title</label>
                            <input type="text" class="form-control" name="title" id="" placeholder="Title Danh Mục"
                                value="{{ $cat->title }}">
                            @error('title')
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
                            <input type="text" class="form-control" name="slug" value="{{ $cat -> slug }}" id=""
                                placeholder="">
                            @error('slug')
                            <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror
                        </div>
                        {{-- --}}
                        <div class="form-group mb-5">
                            <label for="">Description</label>
                            <textarea type="text" class="form-control" name="desc" id=""
                                placeholder="Description danh mục" rows="4">{{ $cat->desc }}</textarea>
                            @error('desc')
                            <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror
                        </div>
                        {{-- --}}
                        <div class="form-group mb-5">
                            <label for="">Keywords</label>
                            <input type="text" data-role="tagsinput" class="form-control" name="keywords"
                                value="{{ $cat->keywords }}">
                            @error('keywords')
                            <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror
                        </div>
                        {{-- --}}
                        <div class="form-group mb-4">
                            <label for="">Danh Mục Cha</label>
                            <select class="custom-select" name="parent" id="">
                                @if ($cat -> parent_id == 0 )
                                <option value="0">Là Danh Mục Chính (Không Được Chỉnh Sửa Lại Danh Mục Khác Chỉ có thể
                                    XOÁ)</option>
                                @else
                                <option value="{{ $cat -> parent_id }}">{{ App\Models\Category::where('id','=' , $cat ->
                                    parent_id) -> first() -> name}}</option>
                                @foreach ( $categories as $cate )
                                @if ($cate -> id != $cat -> parent_id )
                                <option value="{{ $cate->id }}">{{ str_repeat('--' , $cate->level) }} {{ $cate->name }}
                                </option>
                                @endif
                                @endforeach
                                @endif


                            </select>
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Banner</label>
                            <div class="custom-file">
                                <input type="file" name="img" class="custom-file-input" id="img">
                                <label class="custom-file-label" for="img" id="forImg">Cập Nhật Hình Ảnh (Không update
                                    bỏ trống)</label>
                            </div>
                            @error('img')
                            <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror
                            <div class="mt-4">
                                @if (empty($cat -> img))
                                <span>Chưa Có Hình Ảnh Banner Hoặc Không Có Hình Ảnh Banner</span>
                                @else
                                <img src="{{ asset($cat->img) }}" class="w-100 va-radius-fb" alt="">
                                @endif
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Icon</label>
                            <div class="custom-file">
                                <input type="file" name="icon" class="custom-file-input" id="icon">
                                <label class="custom-file-label" for="icon" id="forIcon">Cập Nhật Icon (Không update bỏ
                                    trống)</label>
                            </div>
                            @error('icon')
                            <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror
                            <div class="mt-4">
                                @if (empty($cat -> icon))
                                <span>Chưa Có Hình Ảnh Icon Hoặc Không Có Hình Ảnh Icon</span>
                                @else
                                <img src="{{ asset($cat->icon) }}" class="va-radius-fb" alt="">
                                @endif
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Galley Banner (Chỉ Dành Cho Digital)</label>
                            <div class="custom-file">
                                <input type="file" name="gll" class="custom-file-input" id="gll" multiple>
                                <label class="custom-file-label" for="gll" id="forGll"></label>
                            </div>
                            @error('gll')
                            <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror
                        </div>
                        {{-- end galley banner --}}
                        <div class="form-group mb-5">
                            <label for="">Danh mục Skin đi kèm</label>
                            <select class="custom-select" name="bundled_skin" id="bundled_skin">
                                @if ($bundled_skin)
                                <option value="{{ $bundled_skin->skin_cat_id }}">{{ App\Models\Category::where('id', '='
                                    , $bundled_skin->skin_cat_id)->first()->name }}</option>
                                <option value="">Trống</option>
                                @foreach (category_child(App\Models\Category::all() , 0) as $category )
                                @if ($category->id != $bundled_skin->skin_cat_id)
                                <option value="{{ $category->id }}">{{ str_repeat("--", $category->level) }}{{
                                    $category->name }}</option>
                                @endif
                                @endforeach
                                @else
                                <option value="">Chọn Danh Mục Skin Đi Kèm</option>
                                @foreach (category_child(App\Models\Category::all() , 0) as $category )
                                <option value="{{ $category->id }}">{{ str_repeat("--", $category->level) }}{{
                                    $category->name }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        {{-- chỉnh sửa sản phẩm đi kèm --}}

                        <div class="col-12 mt-4 p-0">
                            <div class="w-100">
                                <div class="card">
                                    <div class="card-header text-center">
                                        Chỉnh sửa Phụ Kiện Mua Kèm
                                    </div>
                                    <div class="card-body">
                                        <div id="selected" class="mb-4">
                                            <h1 class="mb-3" style="font-size: 20px">Danh Sách Phụ Kiện Đã Chọn</h1>
                                            @if (count($array_products) > 0 )
                                            @foreach ($array_products as $item )
                                            @php
                                            $product = App\Models\Products::where('id', $item)->first();
                                            @endphp
                                            <x-admin.product.checkbox :product="$product" class="select__product"
                                                name="products" prefix="product" :array="$array_products" />
                                            @endforeach
                                            @else

                                            <span>Chưa có sản phẩm nào được chọn</span>
                                            @endif
                                        </div>
                                        <div class="form-group mb-5">
                                            <label for="">Tìm Phụ Kiện</label>
                                            <input type="text" class="form-control" name="related_products"
                                                id="search__name" placeholder="Nhập tên sản phẩm">
                                            <div id="result" class="mt-4">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- bài viết đi kèm --}}

                        <div class="col-12 mt-4 p-0">
                            <div class="w-100">
                                <div class="card">
                                    <div class="card-header text-center">
                                        Chỉnh sửa bài viết liên quan
                                    </div>
                                    <div class="card-body">
                                        <div id="selected_blog" class="mb-4">
                                            <h1 class="mb-3" style="font-size: 20px">Danh Sách Bài Viết Đã Chọn</h1>
                                            @if (count($array_blogs) > 0 )
                                            @foreach ($array_blogs as $item_2)
                                            @php
                                            $blog = App\Models\Blogs::where('id', '=' , $item_2)->first();
                                            @endphp
                                            <x-admin.blogs.checkbox :blog="$blog" class="select__blog" name="blogs"
                                                prefix="blog" :array="$array_blogs" />
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
                                            <div class="alert alert-danger mt-4 alert-dismissible fade show"
                                                role="alert">
                                                {{ $message }}
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="form-group mb-5">
                            <input type="submit" value="Cập Nhật Danh Mục" class="btn w-100 text-center navi_btn">
                        </div>
                        <div class="form-group mb-5">
                            <a href="{{ route('cat') }}" class="btn w-100 d-none text-center navi_btn">Quay Về Danh Mục
                                Sản Phẩm</a>
                        </div>
                        {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>
        {{-- END ADD --}}


        {{-- END SHOW --}}
    </div>
</div>
@endsection
