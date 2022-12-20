@extends('admin.layout.app')
@section('import_css')
@endsection
@section('import_js')
<script src="{{ asset('admin/app/js/tinymce.js')}}?ver=@php echo filemtime('public/admin/app/js/tinymce.js') @endphp">
</script>
<script
    src="{{ asset('admin/app/js/dashboard.js') }}?ver=@php echo filemtime('public/admin/app/js/dashboard.js') @endphp">
</script>
@endsection
@section('name')
Dashboard
@endsection

@section('content')
@if (session('success'))
<script>
    toastr.success("Thêm Config Thành Công");
</script>
@endif
@if (session('error'))
<script>
    toastr.error("Thêm Config Thất Bại");
</script>
@endif
@if (session('delete'))
<script>
    toastr.success("Xoá Config Thành Công");
</script>
@endif
@if (session('error_delete'))
<script>
    toastr.error("Xoá Config Thất Bại");
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
                    {!! Form::open(['url' => route('add_cofinfor_handle') , 'method' => "POST" ,'files' => true ]) !!}
                    <div class="form-group mb-5">
                        <label for="">Tên</label>
                        <input type="text" class="form-control" name="name" id="" placeholder="Nhập tên config">
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
                        <label for="">Tên</label>
                        <select class="custom-select" name="type" id="type">
                            <option value="">Chọn loại cho config </option>
                            @foreach (config('orders.type') as $key=>$val )
                            <option value="{{ $val }}">{{ $val }}</option>
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
                    <div class="form-group mb-5 img d-none">
                        <label for="">Value Image</label>
                        <div class="custom-file">
                            <input type="file" name="value_img" class="custom-file-input" id="val_img">
                            <label class="custom-file-label" for="val_img" id="forVImg">Hình Ảnh</label>
                        </div>
                        @error('value_img')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5 html d-none">
                        <label for="">Value HTML</label>
                        <textarea name="value" id="value_config_infor"
                            class="form-control my-editor">{!! old('value') !!}</textarea>
                        @error('value')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group not-html mb-5 d-none">
                        <label for="">VALUE NOT HTML</label>
                        <textarea class="form-control" name="value" id="" rows="4">{!! old('value') !!}</textarea>
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
                        <input type="submit" value="THÊM THÔNG TIN" class="btn navi_btn w-100">
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
                    Danh sách config thông tin
                </div>
                <div class="card-body" id="config__home--show">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Value</th>
                                <th scope="col">Type</th>
                                <th scope="col">Sửa</th>
                                <th scope="col">Xoá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $config_info as $conf )
                            <tr>
                                <th scope="row">{{ $conf->id }}</th>
                                <td>{{ $conf->name }}</td>
                                <td style="width:300px !important;">
                                    {!! $conf->value !!}
                                </td>
                                <td>
                                    {{ $conf->type }}
                                </td>
                                <td>
                                    <a href="{{ route('edit_info_view', ['id'=> $conf->id]) }}" class="d-block">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('delete_cofinfor_handle', ['id'=> $conf->id]) }}" class="d-block delete_conf" data-id="{{ $conf->id }}">
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
