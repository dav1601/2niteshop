@extends('admin.layout.app')
@section('import_css')
@endsection
@section('import_js')
<script
    src="{{ asset('admin/app/js/dashboard.js') }}?ver=@php echo filemtime('public/admin/app/js/dashboard.js') @endphp">
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
<input type="hidden" name="" value="{{ route('handle_search') }}" id="url__handle--search">
<input type="hidden" name="" value="{{ route('handle_cat') }}" id="url__handle--cat">
<input type="hidden" name="" value="{{ route('handle_reload') }}" id="url__handle--reload">
<div class="row mx-0">
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Thêm Config
                </div>
                <div class="card-body" id="config__home--add">
                    {!! Form::open(['url' => route('add_cofhome_handle') , 'method' => "POST" ,'files' => true ]) !!}
                    <div class="form-group mb-5">
                        <label for="">Tên</label>
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
                        <div class="custom-file">
                            <input type="file" name="main_img" class="custom-file-input" id="main_img">
                            <label class="custom-file-label" for="main_img" id="forMain">Banner Chính</label>
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
                        <label for="">Link Main</label>
                        <input type="text" class="form-control" name="link_main" id="" placeholder="Link Banner Chính">
                        @error('link_main')
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
                            <input type="file" name="use_img" class="custom-file-input" id="use_img">
                            <label class="custom-file-label" for="use_img" id="forUse">Banner cẩm nang sử dụng</label>
                        </div>
                        @error('use_img')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
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
                            <input type="file" name="instruct_img" class="custom-file-input" id="instruct_img">
                            <label class="custom-file-label" for="instruct_img" id="forinstruct">Banner hướng dẫn tạo
                                tài khoản</label>
                        </div>
                        @error('instruct_img')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
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
                            <input type="file" name="access_img" class="custom-file-input" id="access_img">
                            <label class="custom-file-label" for="access_img" id="foraccess">Banner phụ kiện khuyên
                                dùng</label>
                        </div>
                        @error('access_img')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
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
                            <input type="file" name="fix_img" class="custom-file-input" id="fix_img">
                            <label class="custom-file-label" for="fix_img" id="forfix">Banner lỗi và cách khắc
                                phục</label>
                        </div>
                        @error('fix_img')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
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
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Danh Mục Chính</label>
                        <select class="custom-select" name="cat" id="cat">
                            <option value="">Chọn Danh Mục Chính</option>
                            @foreach ( $category as $cate )
                            <option value="{{ $cate->id }}">{{ str_repeat('--' , $cate->level) }}{{ $cate->name }}</option>
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
                        <label for="">Danh Mục Chính 2 </label>
                        <select class="custom-select" name="cat_2" id="cat_2">
                            <option value="">Chọn Danh Mục Chính 2</option>
                            @foreach ( $category as $cate )
                            <option value="{{ $cate->id }}">{{ str_repeat('--' , $cate->level) }}{{ $cate->name }}</option>
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
                        <label for="">Phụ Kiện Đi Kèm</label>
                        <div class="box_access row mx-0">
                            <span>Chưa Chọn Danh Mục Chính.....</span>
                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Color</label>
                        <input type="text" class="form-control" name="color" id="" placeholder="Color">
                        @error('color')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Tab danh mục</label>
                        <select class="custom-select" name="tab" id="">
                            @foreach (Config::get('navi.tab') as $tab )
                            <option value="{{ $tab }}">{{ $tab }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Vị trí</label>
                        <select class="custom-select" name="position" id="">
                            @foreach (Config::get('navi.position_home') as $pos )
                            <option value="{{ $pos }}">{{ $pos }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Danh Mục Digital</label>
                        <select class="custom-select" name="cat_digital" id="">
                            <option value="0">Chọn Danh Mục</option>
                            @foreach (App\Models\Category::OneCatTree(141)[0]->children as $cat_digital )
                            <option value="{{ $cat_digital->id }}">{{ $cat_digital->name }}</option>
                            @endforeach
                        </select>
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
            <div class="card">
                <div class="card-header text-center">
                    Danh sách config home
                </div>
                <div class="card-body" id="config__home--show">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Danh mục 1</th>
                                <th scope="col">Danh mục 2</th>
                                <th scope="col">Màu sắc</th>
                                <th scope="col">Tab</th>
                                <th scope="col">Vị trí</th>
                                <th scope="col">TG cập nhật</th>
                                <th scope="col">Sửa</th>
                                <th scope="col">Xoá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $config as $conf )
                            <tr>
                                <th scope="row">{{ $conf->id }}</th>
                                <td>{{ $conf->name }}</td>
                                <td>{{ App\Models\Category::where('id', '=' , $conf->cat)->first()->name }}</td>
                                <td>
                                    @if ($conf->cat_2 != NULL)
                                    {{ App\Models\Category::where('id', '=' , $conf->cat_2)->first()->name }}
                                    @else
                                    Không có
                                    @endif
                                </td>
                                <td>
                                    <div class="box" style="width:20px; height:20px; background:{{ $conf->color }}">
                                    </div>
                                </td>
                                <td>
                                    {{ $conf->tab }}
                                </td>
                                <td>{{ $conf->position }}</td>
                                <td>{{ $carbon -> create($conf->updated_at) ->
                                    diffForHumans($carbon -> now('Asia/Ho_Chi_Minh')) }}</td>
                                <td>
                                    <a href="{{ route('edit_cofhome_view', ['id'=> $conf->id]) }}" class="d-block">
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
