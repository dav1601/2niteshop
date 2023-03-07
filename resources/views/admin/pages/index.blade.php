@extends('admin.layout.app')
@section('import_css')
@endsection
@section('import_js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="{{ asset('admin/app/js/tinymce.js')}}?ver=@php echo filemtime('admin/app/js/tinymce.js') @endphp">
</script>
@endsection

@section('name')
Quản Lý Trang
@endsection
@section('content')
@if (session('ok'))
<script>
    toastr.success("Thêm Page Thành Công");
</script>
@endif
@if (session('not-ok'))
<script>
    toastr.success("Thêm Page Không Thành Công");
</script>
@endif
@if (session('delete-ok'))
<script>
    toastr.success("Xoá Page Thành Công");
</script>
@endif
@if (session('delete-not-ok'))
<script>
    toastr.success("Xoá Page Không Thành Công");
</script>
@endif
<div class="row mx-0">

    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Thêm Trang
                </div>
                <div class="card-body">
                    {!! Form::open(['url' => route('handle_add_page') , 'method' => "POST" ,'files' => true ]) !!}
                    <div class="form-group mb-5">
                        <label for="">Tiêu đề</label>
                        <input type="text" class="form-control" name="title" id="" value="{{ old('title') }}"
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
                            class="form-control my-editor">{!! old('content') !!}</textarea>
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
                        <input type="submit" value="THÊM TRANG" class="btn w-100 text-center navi_btn">
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Danh sách trang
                </div>
                <div class="card-body" id="table__pages">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tiêu Đề</th>
                                <th scope="col">Người Đăng</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Xoá</th>
                                <th scope="col">Created_at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pages as $page)
                            <tr>
                                <td>{{ $page -> id }}</td>
                                <td>{{ $page -> title }}</td>
                                <td>{{ App\Models\User::where('id', '=' ,$page->users_id )->first()->name }}</td>
                                <td>
                                    <a href="{{ route('edit_page', ['id'=>$page->id]) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('handle_delete_page', ['id'=>$page->id]) }}">
                                        <i class="fa-solid fa-delete-left"></i>
                                    </a>
                                </td>
                                <td>
                                    {{ $carbon -> create($page->created_at)->diffForHumans($carbon->now()) }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
