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
    toastr.success("Cập Nhật Config Thành Công");
</script>
@endif
@if (session('error'))
<script>
    toastr.error("Cập Nhật Config Thất Bại");
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
                    {!! Form::open(['url' => route('add_cofinfor_handle') , 'method' => "POST" ,'files' => true ]) !!}
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
                    <div class="form-group not-html mb-5 @if($config->type == 'html') d-none @endif">
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
                        <input type="submit" value="Sửa Config Thông Tin" class="btn navi_btn w-100">
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
