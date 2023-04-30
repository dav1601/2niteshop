@extends('admin.layout.app')
@section('import_css')
@endsection
@section('import_js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('admin/app/js/banners.js') }}?ver=@php echo filemtime('admin/app/js/banners.js') @endphp">
    </script>
@endsection

@section('name')
    Quản Lý Banners
@endsection

@section('content')
    @if (session('ok'))
        <script>
            toastr.success("Cập Nhật Banner Thành Công");
        </script>
    @endif
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Thêm Banner
                </div>
                <div class="card-body" id="banner__add">
                    {!! Form::open([
                        'url' => route('banner_handle_edit', ['id' => $banner->id]),
                        'method' => 'POST',
                        'files' => true,
                    ]) !!}
                    <div class="form-group mb-5">
                        <label for="">Tên Banner</label>
                        <input type="text" class="form-control" name="name" id="" value="{{ $banner->name }}"
                            placeholder="">
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
                        <label for="">Link Banner</label>
                        <input type="text" class="form-control" name="link" value="{{ $banner->link }}" id=""
                            placeholder="">
                        @error('link')
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
                            <input type="file" name="img" class="custom-file-input" id="imgBanner">
                            <label class="custom-file-label" for="img" id="forBanner">Đổi hình ảnh Banner , Hình ảnh
                                size
                                không quá 500kb , Các
                                đuôi ảnh
                                cho phép: jpeg,png,jpg,tiff,svg</label>
                        </div>
                        @error('img')
                            <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror
                        <div class="show_main mt-4">
                            <img src="{{ $file->ver_img($banner->img) }}" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Vị trí</label>
                        <select class="custom-select" name="position" id="" disabled>
                            <option value="{{ $banner->position }}">{{ $banner->position }}</option>
                        </select>
                        @error('position')
                            <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror
                        @if (session('index'))
                            <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                Vị trí này đã tồn tại
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Thứ Tự</label>
                        <select class="custom-select" name="index" id="" disabled>
                            <option value="{{ $banner->index }}">{{ $banner->index }}</option>
                        </select>
                        @error('index')
                            <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror
                        @if (session('index'))
                            <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                Thứ tự này đã tồn tại
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="form-group mb-5">
                        <input type="submit" value="Cập Nhật Banner" class="btn navi_btn w-100">
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
