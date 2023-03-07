@extends('admin.layout.app')
@section('import_css')
@endsection
@section('import_js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="{{ asset('admin/app/js/banners.js')}}?ver=@php echo filemtime('admin/app/js/banners.js') @endphp">
</script>
@endsection

@section('name')
Quản Lý Banners
@endsection

@section('content')
@if (session('ok'))
<script>
    toastr.success("Thêm Banner Thành Công");
</script>
@endif
<div class="row mx-0">

    {{-- ---------------------- --}}
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Danh sách banner
                </div>
                <div class="card-body" id="show__banners">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Link</th>
                                <th scope="col">Vị trí</th>
                                <th scope="col">Thứ tự</th>
                                <th scope="col">Ngày đăng</th>
                                <th scope="col">Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $banners as $banner )
                            <tr>
                                <th scope="row">{{ $banner -> id }}</th>
                                <td>{{ $banner -> name }}</td>
                                <td>{{ $banner -> link }}</td>
                                <td class="text-center">{{ $banner -> position }}</td>
                                <td class="text-center">{{ $banner -> index }}</td>
                                <td class="text-center">{{ $carbon -> create($banner->created_at) ->
                                    diffForHumans($carbon -> now('Asia/Ho_Chi_Minh')) }}</td>
                                <td class="text-center">
                                    <a href="{{ route('banner_view_edit', ['id'=>$banner->id]) }}" class="d-block">
                                        <i class="fas fa-edit"></i>
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
</div>
@endsection
