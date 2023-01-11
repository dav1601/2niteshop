@extends('admin.layout.app')
@section('import_css')
@endsection
@section('import_js')
    <script
        src="{{ asset('admin/app/js/dashboard.js') }}?ver=@php echo filemtime('public/admin/app/js/dashboard.js') @endphp">
    </script>
    <script src="{{ $file->ver('admin/app/js/show_home.js') }}"></script>
    <script>
        var section = [];
    </script>
@endsection
@section('name')
    Dashboard
@endsection

@section('content')
    @if (session('ok'))
        <script>
            toastr.success("Thêm Config Thành Công");
        </script>
    @endif

    <div class="row mx-0">
        <div class="col-12 mt-4 p-0">
            <div class="w-100">
                <div class="card">
                    <div class="card-header text-center">
                        Thêm Config
                    </div>
                    <div class="card-body" id="config__home--add">
                        {!! Form::open(['url' => route('add_cofhome_handle'), 'method' => 'POST', 'files' => true]) !!}
                        <div class="form-group mb-5">
                            <label for="">Tên</label>
                            <input type="text" class="form-control" name="name" id="" placeholder="">
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
                                <label class="custom-file-label" for="main_img" id="forMain">Banner Chính</label>
                            </div>
                            @error('main_img')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Link Main</label>
                            <input type="text" class="form-control" name="link_main" id=""
                                placeholder="Link Banner Chính">
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
                                <label class="custom-file-label" for="use_img" id="forUse">Banner cẩm nang sử
                                    dụng</label>
                            </div>
                            @error('use_img')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Link Usage</label>
                            <input type="text" class="form-control" name="link_use" id=""
                                placeholder="Link Banner cẩm nang sử dụng">
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
                                    tài khoản</label>
                            </div>
                            @error('instruct_img')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Link Hướng dẫn</label>
                            <input type="text" class="form-control" name="link_instruct" id=""
                                placeholder="Link Banner hướng dẫn tạo tài khoản ">
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
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Link phụ kiện</label>
                            <input type="text" class="form-control" name="link_access" id=""
                                placeholder="Link Banner phụ kiện khuyên dùng">
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
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Link Fix</label>
                            <input type="text" class="form-control" name="link_fix" id=""
                                placeholder="Link Banner lỗi và cách khắc phục ">
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
                            <input type="text" class="form-control" name="color" id=""
                                placeholder="Color">
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
                                        <input type="hidden" name="section" value="0" id="count__section">
                                    </div>
                                </div>
                                <div id="home__section">

                                </div>
                            </div>
                        </div>

                        {{-- <div class="form-group mb-5">
                            <label for="">Tab danh mục</label>
                            <select class="custom-select" name="tab" id="">
                                @foreach (Config::get('navi.tab') as $tab)
                                    <option value="{{ $tab }}">{{ $tab }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Vị trí</label>
                            <select class="custom-select" name="position" id="">
                                @foreach (Config::get('navi.position_home') as $pos)
                                    <option value="{{ $pos }}">{{ $pos }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="col-12 mb-4 p-0">
                            <div class="w-100">
                                <div class="card">
                                    <div class="card-header text-center">
                                        Danh mục digital
                                    </div>
                                    <div class="card-body">
                                        <x-admin.product.categories name="category__digital[]" class="category__digital"
                                            id="category__digital" idard="digital" />
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group mb-5">
                            <input type="submit" value="THÊM" class="btn navi_btn w-100">
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        {{-- --------------------- --}}
        <div class="col-12 mt-4 p-0">
            <div class="w-100">
                <div class="card" id="c-show-home">
                    <div class="card-header text-center">
                        Danh sách config home
                    </div>
                    <div class="card-body" id="config__home--show">
                        <table class="table-bordered table-center table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Số Section</th>
                                    <th scope="col">Màu sắc</th>
                                    <th scope="col">Vị trí</th>
                                    <th scope="col">Sửa</th>
                                    <th scope="col">Xoá</th>
                                </tr>
                            </thead>
                            <tbody id='sortable__show__home'>

                                @foreach ($config as $conf)
                                    @php
                                        $count_section = collect($conf->sections)
                                            ->groupBy('section')
                                            ->count();

                                    @endphp
                                    <tr data-id="{{ $conf->id }}">
                                        <td>{{ $conf->id }}</td>
                                        <td>{{ $conf->name }}</td>
                                        <td>{{ $count_section }}</td>
                                        <td>
                                            <div class="box w-100 d-flex justify-content-center"
                                                style="width:20px; height:20px; background:{{ $conf->color }}">
                                            </div>
                                        </td>
                                        <td class="sh__pos">{{ $conf->position }}</td>
                                        <td>
                                            <a href="{{ route('edit_cofhome_view', ['id' => $conf->id]) }}"
                                                class="d-block">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" class="d-block">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
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
        {{-- ------------------------------ --}}
    </div>
@endsection
