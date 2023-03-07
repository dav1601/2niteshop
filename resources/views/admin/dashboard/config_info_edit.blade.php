@extends('admin.layout.app')
@section('import_css')
@endsection
@section('import_js')
<script src="{{ asset('admin/app/js/tinymce.js')}}?ver=@php echo filemtime('admin/app/js/tinymce.js') @endphp">
</script>
<script
    src="{{ asset('admin/app/js/dashboard.js') }}?ver=@php echo filemtime('admin/app/js/dashboard.js') @endphp">
</script>
@endsection
@section('name')
Dashboard
@endsection

@section('content')

@if (session('success'))
<script>
    toastr.success("Cập Nhật Config Thành Công");
</script>
@endif
@if (session('error'))
<script>
    toastr.error("Cập Nhật Config Thất Bại");
</script>
@endif
<div class="row mx-0">
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Sửa Config
                </div>
                <div class="card-body" id="config__home--add">
                    {!! Form::open(['url' => route('edit_info_handle' , ['id' => $config->id]) , 'method' => "POST"
                    ,'files' => true ]) !!}
                    <div class="form-group mb-5">
                        <label for="">Tên</label>
                        <input type="text" class="form-control" name="name" id="" value="{{ $config->name }}"
                            placeholder="Nhập tên config">
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
                        <label for="">Type</label>
                        <select class="custom-select" name="type" id="type">
                            <option value="{{ $config->type }}">{{ $config->type }}</option>
                            @foreach (config('orders.type') as $key=>$val )
                            @if ($val != $config->type)
                            <option value="{{ $val }}">{{ $val }}</option>
                            @endif
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
                    {{-- ////////////////////// --}}
                    <div class="form-group mb-5 img @if($config->type != 'img') d-none @endif">
                        <label for="">Value Image</label>
                        <div class="custom-file">
                            <input type="file" name="value_img" class="custom-file-input" id="val_img">
                            <label class="custom-file-label" for="val_img" id="forVImg">Sửa/Thêm Hình Ảnh (không chỉnh sửa bỏ
                                qua )</label>
                        </div>
                        @error('value_img')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                        @if ($config->type == 'img' && $config->value != NULL)
                        <div class="custom-control custom-checkbox mt-4">
                            <input type="checkbox" name="setNull" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Tích vào để xoá ảnh</label>
                        </div>
                        @endif
                        @if ($config->type == 'img' && $config->value != NULL)
                        <div class="show_main mt-4">
                            <img src="{{ asset($config->value) }}" alt="" width="100%" height="auto">
                        </div>
                        @endif
                    </div>
                    {{-- /////// --}}
                    <div class="form-group mb-5 html @if($config->type != 'html') d-none @endif">
                        <label for="">Value HTML</label>
                        <textarea name="value" id="value_config_infor"
                            class="form-control my-editor">{!! $config->value !!}</textarea>
                        @error('value')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div
                        class="form-group not-html mb-5 @if($config->type == 'html' || $config->type == 'img') d-none @endif">
                        <label for="">VALUE NOT HTML</label>
                        <textarea class="form-control" name="value" id="" rows="4">{{ $config->value }}</textarea>
                        @error('value')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <input type="submit" value="CẬP NHẬT THÔNG TIN" class="btn navi_btn w-100">
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
