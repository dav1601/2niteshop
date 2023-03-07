@extends('admin.layout.app')
@section('import_css')
@endsection
@section('import_js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="{{ asset('admin/app/js/category.js')}}?ver=@php echo filemtime('admin/app/js/category.js') @endphp">
</script>
<script src="{{ asset('admin/app/js/tinymce.js')}}?ver=@php echo filemtime('admin/app/js/tinymce.js') @endphp">
</script>
@endsection

@section('name')
Chinh sách của shop
@endsection

@section('content')
@if (session('ok'))
<script>
    toastr.success("Cập Nhật Chính Sách Thành Công");
</script>
@endif

<div id="plc" class="row mx-0">
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Thêm Chính Sách
                </div>
                <div class="card-body" id="plc__add">
                    {!! Form::open(['url' => route('handle_edit_plc' , ['id' => $policy -> id]) , 'method' => "POST"
                    ,'files' => true ]) !!}
                    <div class="form-group mb-5">
                        <label for="">Tiêu Đề Chính Sách </label>
                        <input type="text" class="form-control" name="name" value="{{ $policy -> title }}" id=""
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
                        <label for="">Icon</label>
                        <input type="text" class="form-control" value="{{  $policy -> icon  }}" name="icon" id=""
                            placeholder="">
                        @error('icon')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Vị trí</label>
                        <select class="custom-select" name="position" id="">
                            <option value="{{ $policy->position }}">{{ $policy->position }}</option>
                           @foreach (Config::get('product.position'); as $p )
                           @if ($policy->position != $p )
                           <option value="{{ $p }}">{{ $p }}</option>
                           @endif
                           @endforeach

                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Nội Dung</label>
                        <textarea name="content" id="plc__tiny"
                            class="form-control my-editor">{!! $policy -> content !!}</textarea>
                        @error('content')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <label for="">FullSet</label>
                        <select class="custom-select" name="fullset" id="">
                            <option value="{{ $policy->fullset }}">{{ $policy->fullset }}</option>
                            @for ($i =0 ; $i <= 1 ; $i++) @if ($policy->fullset != $i)
                                <option value="{{ $i }}">{{ $i }}</option>
                                @endif
                                @endfor
                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <input type="submit" value="Cập Nhật Chính Sách" class="btn w-100 text-center navi_btn">
                    </div>
                    <div class="form-group mb-5">
                        <a href="{{ route('plc') }}" class="btn w-100 text-center navi_btn d-block">Quay Về Trang Chính
                            Sách</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    {{-- --------------------------- --}}

    {{-- --}}
</div>
@endsection
