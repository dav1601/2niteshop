@extends('admin.layout.app')
@section('import_css')
@endsection
@section('import_js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="{{ asset('admin/app/js/tinymce.js')}}?ver=@php echo filemtime('public/admin/app/js/tinymce.js') @endphp">
</script>
@endsection

@section('name')
Quản Lý Trang
@endsection
@section('content')
@if (session('ok'))
<script>
    toastr.success("Sửa Page Thành Công");
</script>
@endif
@if (session('not-ok'))
<script>
    toastr.success("Sửa Page Không Thành Công");
</script>
@endif

<div class="row mx-0">

    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                   Sửa Trang
                </div>
                <div class="card-body">
                    {!! Form::open(['url' => route('handle_edit_page' ,['id' => $id]) , 'method' => "POST" ,'files' => true ]) !!}
                    <div class="form-group mb-5">
                        <label for="">Tiêu đề</label>
                        <input type="text" class="form-control" name="title" id="" value="{{ $page->title }}"
                            placeholder="">
                        @error('title')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Content</label>
                        <textarea name="content" id="content__blog"
                            class="form-control my-editor">{!! $page->content !!}</textarea>
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
                        <input type="submit" value="Sửa Trang" class="btn w-100 text-center navi_btn">
                    </div>
                    {!! Form::close() !!}
                    <div class="form-group mb-5">
                        <a href="{{ route('manage_pages') }}" class="btn w-100 text-center navi_btn">
                                Quay Lại Trang Quản Lý
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
