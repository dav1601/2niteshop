@extends('admin.layout.app')
@section('import_css')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endsection
@section('import_js')
    <script
        src="{{ asset('admin/app/js/dashboard.js') }}?ver=@php echo filemtime('admin/app/js/dashboard.js') @endphp">
    </script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="{{ $file->ver('admin/app/js/show_home.js') }}"></script>
    <script>
        var showId = {{ Js::from($id) }};
        var section = [];
    </script>
@endsection
@section('name')
    Dashboard
@endsection

@section('content')
    @if (session('ok'))
        <script>
            toastr.success("Cập nhật Config Thành Công");
        </script>
    @endif

    <div class="row mx-0">
        <div class="col-12 mt-4 p-0">
            <div class="w-100">
                <div class="card">
                    <div class="card-header text-center">
                        Update Config Home
                    </div>
                    <div class="card-body" id="config__home--add">
                        {!! Form::open([
                            'url' => route('edit_cofhome_handle', ['id' => $config->id]),
                            'method' => 'POST',
                            'files' => true,
                        ]) !!}
                        <div class="d-flex justify-content-end align-items-center mb-4">
                            <input type="checkbox" name="active" value="1"
                                @if ($config->active == 1) checked @endif class="toggle-active"
                                data-id={{ $config->id }} data-toggle="toggle" data-width="100">
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Tên</label>
                            <input type="text" class="form-control" name="name" id=""
                                value="{{ $config->name }}" placeholder="">
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
                            <div class="custom-file">
                                <input type="file" name="main_img" class="custom-file-input" id="main_img">
                                <label class="custom-file-label" for="main_img" id="forMain">Không sửa đổi để
                                    trống</label>
                            </div>
                            @error('main_img')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                            <div class="show_main mt-4">
                                <img src="{{ $file->ver_img($config->main_img) }}" alt="">
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Link Main</label>
                            <input type="text" class="form-control" name="link_main" id=""
                                value="{{ $config->main_link }}" placeholder="Link Banner Chính">
                            @error('link_main')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <div class="custom-file">
                                <input type="file" name="use_img" class="custom-file-input" id="use_img">
                                <label class="custom-file-label" for="use_img" id="forUse">Banner cẩm nang sử dụng
                                    (Không
                                    sửa đổi để trống)</label>
                            </div>
                            @error('use_img')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                            <div class="show_main mt-4">
                                <img src="{{ $file->ver_img($config->use_img) }}" alt="">
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Link Usage</label>
                            <input type="text" class="form-control" name="link_use" id=""
                                value="{{ $config->use_link }}" placeholder="Link Banner cẩm nang sử dụng">
                            @error('link_use')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <div class="custom-file">
                                <input type="file" name="instruct_img" class="custom-file-input" id="instruct_img">
                                <label class="custom-file-label" for="instruct_img" id="forinstruct">Banner hướng dẫn tạo
                                    tài khoản (Khong cap nhat bo qua)</label>
                            </div>
                            @error('instruct_img')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                            <div class="show_main mt-4">
                                <img src="{{ $file->ver_img($config->instruct_img) }}" alt="">
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Link Hướng dẫn</label>
                            <input type="text" class="form-control" name="link_instruct" id=""
                                value="{{ $config->instruct_link }}" placeholder="Link Banner hướng dẫn tạo tài khoản ">
                            @error('link_instruct')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <div class="custom-file">
                                <input type="file" name="access_img" class="custom-file-input" id="access_img">
                                <label class="custom-file-label" for="access_img" id="foraccess">Banner phụ kiện khuyên
                                    dùng</label>
                            </div>
                            @error('access_img')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                            <div class="show_main mt-4">
                                <img src="{{ $file->ver_img($config->access_img) }}" alt="">
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Link phụ kiện</label>
                            <input type="text" class="form-control" name="link_access" id=""
                                value="{{ $config->access_link }}" placeholder="Link Banner phụ kiện khuyên dùng">
                            @error('link_access')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <div class="custom-file">
                                <input type="file" name="fix_img" class="custom-file-input" id="fix_img">
                                <label class="custom-file-label" for="fix_img" id="forfix">Banner lỗi và cách khắc
                                    phục</label>
                            </div>
                            @error('fix_img')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                            <div class="show_main mt-4">
                                <img src="{{ $file->ver_img($config->fix_img) }}" alt="">
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Link Fix</label>
                            <input type="text" class="form-control" name="link_fix" id=""
                                value="{{ $config->fix_link }}" placeholder="Link Banner lỗi và cách khắc phục ">
                            @error('link_fix')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Color</label>
                            <input type="text" class="form-control" name="color" value="{{ $config->color }}"
                                id="" placeholder="Color">
                            @error('color')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12 my-4 p-0">
                            <div class="w-100">
                                <div class="card">
                                    <div class="card-header text-center">
                                        Thêm Section
                                    </div>
                                    <div class="card-body text-center">
                                        <button type="button" id="add__section" class="btn btn-primary"><i
                                                class="fa-solid fa-plus"></i></button>
                                        <input type="hidden" name="section" value="" id="count__section">
                                    </div>
                                </div>
                                <div id="home__section">

                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-4 p-0">
                            <div class="w-100">
                                <div class="card">
                                    <div class="card-header text-center">
                                        Danh mục digital
                                    </div>
                                    <div class="card-body">
                                        @php
                                            $cat_digital = explode(',', $config->cat_digital);
                                        @endphp
                                        <x-admin.product.categories name="category__digital[]" class="category__digital"
                                            id="category__digital" idard="digital" :selected="$cat_digital" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-5">
                            <input type="submit" value="CẬP NHẬT" class="btn navi_btn w-100">
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        {{-- --------------------- --}}

        {{-- ------------------------------ --}}
    </div>
@endsection
