@extends('admin.layout.app')
@section('import_css')
    <link rel="stylesheet" href="{{ asset('admin/plugin/tags/tagsinput.css') }}">
@endsection
@section('import_js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script
        src="{{ asset('admin/app/js/category.js') }}?ver=@php echo filemtime('public/admin/app/js/category.js') @endphp">
    </script>
    <script src="{{ asset('admin/app/js/related_all.js') }}"></script>
    <script src="{{ asset('admin/plugin/tags/tagsinput.js') }}"></script>
@endsection

@section('name')
    Danh Mục Sản Phẩm
@endsection

@section('content')
    <input type="hidden" name="" id="array__selected" value="{{ $selected }}">
    <input type="hidden" name="" id="url__selected" value="{{ $url }}">
    <input type="hidden" name="" id="array__selected--blog" value="{{ $selected_blog }}">
    <div id="cat__add--product">
        <div class="row mx-0">
            <div class="col-12 mt-4 p-0">
                <div class="w-100">
                    <div class="card">
                        <div class="card-header text-center">
                            Thêm Danh Mục
                        </div>
                        @if (session('ok'))
                            <script>
                                toastr.success("Thêm Danh Mục Thành Công");
                            </script>
                        @endif
                        @if (session('error'))
                            <script>
                                toastr.error("Bạn Chỉ Được Thêm Icon Cho Danh Mục Chính");
                            </script>
                        @endif
                        @if (session('delete'))
                            <script>
                                toastr.success("Xoá Danh Mục Thành Công");
                                $(function() {
                                    $(document).scrollTop($('.offset_cat').offset().top);
                                    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
                                });
                            </script>
                        @endif
                        <div class="card-body">
                            {!! Form::open(['url' => route('handle_add_cat'), 'method' => 'POST', 'files' => true]) !!}
                            <div class="form-group mb-5">
                                <label for="">Tên Danh Mục</label>
                                <input type="text" class="form-control" name="name" id=""
                                    placeholder="Tên Danh Mục (!Duy Nhất)" value="{{ old('name') }}">
                                @error('name')
                                    <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-5">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title" id=""
                                    placeholder="Title Danh Mục" value="{{ old('title') }}">
                                @error('title')
                                    <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-5">
                                <label for="">Slug</label>
                                <input type="text" class="form-control" name="slug" id=""
                                    placeholder="Slug (!Duy Nhất)" value="{{ old('slug') }}">
                                @error('slug')
                                    <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
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
                                <textarea type="text" class="form-control" name="desc" id="" placeholder="Description danh mục">{{ old('desc') }}</textarea>
                                @error('desc')
                                    <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
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
                                    value="">
                                @error('keywords')
                                    <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
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
                                    <option value="0">Là Danh Mục Chính</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ str_repeat('--', $cat->level) }}
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- --}}
                            <div class="form-group mb-5">
                                <label for="">Banner</label>
                                <div class="custom-file">
                                    <input type="file" name="img" class="custom-file-input" id="img">
                                    <label class="custom-file-label" for="img" id="forImg">Banner Danh
                                        Mục</label>
                                </div>
                                @error('img')
                                    <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-5">
                                <label for="">Icon</label>
                                <div class="custom-file">
                                    <input type="file" name="icon" class="custom-file-input" id="icon"
                                        aria-describedby="emailHelp">
                                    <label class="custom-file-label" for="icon" id="forIcon">Icon Danh Mục (!Chỉ
                                        dành cho
                                        danh mục CHÍNH)</label>
                                </div>
                                <small id="emailHelp" class="form-text text-muted mt-3" style="font-size: 16px">Lưu Ý:
                                    Bạn
                                    Chỉ Được Thêm Icon Cho Danh Mục
                                    Chính</small>
                                @error('icon')
                                    <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-5">
                                <label for="">Galley Banner (!Chỉ Dành Cho Digital)</label>
                                <div class="custom-file">
                                    <input type="file" name="gll[]" class="custom-file-input" id="gll"
                                        multiple>
                                    <label class="custom-file-label" for="gll" id="forGll">Galley Banner (!Chỉ
                                        Dành Cho
                                        Digital)</label>
                                </div>
                                @error('gll')
                                    <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
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
                                    <option value="">Chọn Danh Mục Skin Đi Kèm</option>
                                    @foreach (category_child(App\Models\Category::all(), 0) as $category)
                                        <option value="{{ $category->id }}">
                                            {{ str_repeat('--', $category->level) }}{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- end danh muc skin --}}
                            {{-- san pham mua kem --}}
                            <div class="col-12 my-4 p-0">
                                <div class="w-100">
                                    <div class="card">
                                        <div class="card-header text-center">
                                            Phụ kiện mua kèm
                                        </div>
                                        <div class="card-body">
                                            <div id="selected" class="mb-4">
                                                <h1 class="mb-3" style="font-size: 20px">Danh Sách Phụ Kiện Đã Chọn</h1>
                                                @if ($selected != '')
                                                    @foreach (explode(',', $selected) as $id)
                                                        @php
                                                            $product = App\Models\Products::where('id', '=', $id)->first();
                                                            $array = explode(',', $selected);
                                                        @endphp
                                                        <x-admin.product.checkbox :product="$product" class="select__product"
                                                            name="products" prefix="product" :array="$array" />
                                                    @endforeach
                                                @else
                                                    <span>Chưa có phụ kiệnk nào được chọn</span>
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
                            {{-- end san pham mua kem --}}
                            {{-- bai viet lien quan --}}
                            <div class="col-12 my-4 p-0">
                                <div class="w-100">
                                    <div class="card">
                                        <div class="card-header text-center">
                                            Bài viết liên quan
                                        </div>
                                        <div class="card-body">
                                            <div id="selected_blog" class="mb-4">
                                                <h1 class="mb-3" style="font-size: 20px">Danh Sách Bài Viết Đã Chọn</h1>
                                                @if ($selected_blog != '')
                                                    @foreach (explode(',', $selected_blog) as $id_blog)
                                                        @php
                                                            $blog = App\Models\Blogs::where('id', '=', $id_blog)->first();
                                                            $array = explode(',', $selected_blog);
                                                        @endphp
                                                        <x-admin.blogs.checkbox :blog="$blog" class="select__blog"
                                                            name="blogs" prefix="blog" :array="$array" />
                                                    @endforeach
                                                @else
                                                    <span>Chưa có bài viết nào được chọn</span>
                                                @endif
                                            </div>
                                            <div class="form-group mb-5">
                                                <label for="">Tìm Bài Viết</label>
                                                <input type="text" class="form-control" name=""
                                                    id="search__name--blog" placeholder="Nhập tên bài viết">
                                                <div id="result_blog" class="mt-4"></div>
                                                @error('blogs')
                                                    <div class="alert alert-danger alert-dismissible fade show mt-4"
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
                            {{-- --}}
                            <div class="form-group mb-5">
                                <input type="submit" value="Thêm Danh Mục" class="btn w-100 navi_btn text-center">
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            {{-- END ADD --}}
            <div class="col-12 mt-4">
                <div class="w-100">
                    <div class="card --main">
                        <div class="card-header text-center">
                            <h2>Danh Sách Danh Mục</h2>
                        </div>
                        <div class="card-body" id="cat__show--product">
                            <table class="table-borderless table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Tên</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Hình Ảnh</th>
                                        <th scope="col">Icon</th>
                                        <th scope="col">Sửa</th>
                                        <th scope="col">Xoá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $cate)
                                        <tr>
                                            <td>{{ $cate->id }}</td>
                                            <td class="lv-{{ $cate->level }}">{{ str_repeat('------', $cate->level) }}
                                                {{ $cate->name }}</td>
                                            <td class="lv-{{ $cate->level }}">{{ $cate->slug }}</td>
                                            <td>
                                                <img src="{{ $file->ver_img($cate->img) }}" width="400"
                                                    height="100" class="va-radius-fb" alt="">
                                            </td>
                                            <td>
                                                <img src="{{ $file->ver_img($cate->icon) }}" class="va-radius-fb"
                                                    alt="">
                                            </td>
                                            <td>
                                                <a href="{{ route('edit_cat', ['id' => $cate->id]) }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a data-url="{{ route('handle_delete_cat', ['id' => $cate->id]) }}"
                                                    class="delete_cat">
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

            {{-- END SHOW --}}
        </div>
    </div>
@endsection
