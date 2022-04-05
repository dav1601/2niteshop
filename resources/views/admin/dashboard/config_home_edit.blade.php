@extends('admin.layout.app')
@section('import_css')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endsection
@section('import_js')
<script
    src="{{ asset('admin/app/js/dashboard.js') }}?ver=@php echo filemtime('public/admin/app/js/dashboard.js') @endphp">
</script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
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
<input type="hidden" name="" value="{{ route('handle_search') }}" id="url__handle--search">
<input type="hidden" name="" value="{{ route('handle_cat') }}" id="url__handle--cat">
<input type="hidden" name="" value="{{ route('handle_reload') }}" id="url__handle--reload">
<div class="row mx-0">
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Sửa Config
                </div>
                <div class="card-body" id="config__home--add">
                    {!! Form::open(['url' => route('edit_cofhome_handle' , ['id' => $config->id]) , 'method' => "POST"
                    ,'files' => true ]) !!}
                    <div class="d-flex justify-content-end align-items-center mb-4">
                        <input type="checkbox" name="active" value="1" @if ($config->active == 1) checked @endif class="toggle-active" data-id={{ $config->id }} data-toggle="toggle"  data-width="100">
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Tên</label>
                        <input type="text" class="form-control" name="name" id="" value="{{ $config->name }}"
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
                        <div class="custom-file">
                            <input type="file" name="main_img" class="custom-file-input" id="main_img">
                            <label class="custom-file-label" for="main_img" id="forMain">Không sửa đổi để trống</label>
                        </div>
                        @error('main_img')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                        <div class="show_main mt-4">
                            <img src="{{ asset($config->main_img) }}" alt="">
                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Link Main</label>
                        <input type="text" class="form-control" name="link_main" id="" value="{{ $config->main_link }}"
                            placeholder="Link Banner Chính">
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
                            <label class="custom-file-label" for="use_img" id="forUse">Banner cẩm nang sử dụng (Không
                                sửa đổi để trống)</label>
                        </div>
                        @error('use_img')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                        <div class="show_main mt-4">
                            <img src="{{ asset($config->use_img) }}" alt="">
                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Link Usage</label>
                        <input type="text" class="form-control" name="link_use" id="" value="{{ $config->use_link }}"
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
                                tài khoản (Khong cap nhat bo qua)</label>
                        </div>
                        @error('instruct_img')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                        <div class="show_main mt-4">
                            <img src="{{ asset($config->instruct_img) }}" alt="">
                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Link Hướng dẫn</label>
                        <input type="text" class="form-control" name="link_instruct" id=""
                            value="{{ $config->instruct_link }}" placeholder="Link Banner hướng dẫn tạo tài khoản ">
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
                        <div class="show_main mt-4">
                            <img src="{{ asset($config->access_img) }}" alt="">
                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Link phụ kiện</label>
                        <input type="text" class="form-control" name="link_access" id=""
                            value="{{ $config->access_link }}" placeholder="Link Banner phụ kiện khuyên dùng">
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
                        <div class="show_main mt-4">
                            <img src="{{ asset($config->fix_img) }}" alt="">
                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Link Fix</label>
                        <input type="text" class="form-control" name="link_fix" id="" value="{{ $config->fix_link }}"
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
                            <option value="{{ $config->cat }}">{{ App\Models\Category::where('id', '=' ,
                                $config->cat)->first()->name }}</option>
                            @foreach ( $category as $cate )
                            @if ($cate->id != $config->cat)
                            <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                            @endif
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
                            @if ($config->cat_2 != NULL)
                            <option value="{{ $config->cat_2 }}">{{ App\Models\Category::where('id', '=' ,
                                $config->cat_2)->first()->name }}</option>
                            @foreach ( $category as $cate )
                            @if ($cate->id != $config->cat_2)
                            <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                            @endif
                            @endforeach
                            @else
                            <option value="">Chọn Danh Mục Chính 2</option>
                            @foreach ( $category as $cate )
                            <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                            @endforeach
                            @endif

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
                        @if (count($access) > 0)
                        <div class="row mx-0">
                            @foreach ($access as $as )
                            <div class="mb-4 col-3 acs_item">
                                <div class="va-checkbox d-flex align-items-center w-100">
                                    <input type="checkbox" name="access[]" value="{{ $as->id }}" id="acs__{{ $as->id }}"
                                        class="check_acs" @if (in_array($as->id, explode(",",$config->option))) checked
                                    @endif >
                                    <label for="acs__{{  $as->id }}">
                                        {{ $as->name }}
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <div class="box_access row mx-0">
                            <span>Không có phụ kiện nào thuộc danh mục 1.....</span>
                        </div>
                        @endif

                    </div>
                    <div class="form-group mb-5">
                        <label for="">Color</label>
                        <input type="text" class="form-control" name="color" value="{{ $config->color }}" id=""
                            placeholder="Color">
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
                            <option value="{{ $config->tab }}">{{ $config->tab }}</option>
                            @foreach (Config::get('navi.tab') as $tab )
                            @if ( $config->tab != $tab)
                            <option value="{{ $tab }}">{{ $tab }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Vị trí</label>
                        <select class="custom-select" name="position" id="">
                            <option value="{{ $config->position }}">{{ $config->position }}</option>
                            @foreach (Config::get('navi.position_home') as $pos )
                            @if ($config->position != $pos)
                            <option value="{{ $pos }}">{{ $pos }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Danh Mục Digital</label>
                        <select class="custom-select" name="cat_digital" id="">
                            @if ($config->cat_digital == NULL)
                            <option value="0">Chọn Danh Mục</option>
                            @foreach (App\Models\Category::OneCatTree(141)[0]->children as $cat_digital )
                            <option value="{{ $cat_digital->id }}">{{ $cat_digital->name }}</option>
                            @endforeach
                            @else
                            <option value="{{ $config->cat_digital }}">{{ App\Models\Category::where('id', '=' ,
                                $config->cat_digital)->first()->name }}</option>
                            @foreach (App\Models\Category::OneCatTree(141)[0]->children as $cat_digital )
                            @if ($cat_digital->id != $config->cat_digital)
                            <option value="{{ $cat_digital->id }}">{{ $cat_digital->name }}</option>
                            @endif
                            @endforeach
                            <option value="0">Trống</option>
                            @endif

                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <input type="submit" value="Cập nhật Config Home" class="btn navi_btn w-100">
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
