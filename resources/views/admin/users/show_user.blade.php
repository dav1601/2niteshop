@extends('admin.layout.app')
@section('import_css')
@endsection
@section('import_js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('admin/app/js/user.js') }}?ver=@php echo filemtime('admin/app/js/user.js') @endphp"></script>
@endsection
@section('name')
    Danh Sách Sản Phẩm
@endsection
@section('content')
    @if (session('ban'))
        <script>
            toastr.success("Ban User Thành Công");
        </script>
    @endif
    @if (session('unban'))
        <script>
            toastr.success("Gỡ Ban cho User Thành Công");
        </script>
    @endif
    <div class="row mx-0">
        <div class="col-12 mt-4 p-0">
            <div class="w-100">
                <div class="card">
                    <div class="card-header text-center">
                        Bảng Lọc
                    </div>
                    <div class="card-body row mx-0" id="user_filter">
                        <div class="col-2 mb-4 pl-0">
                            <div class="form-group">
                                <label for="">Sắp xếp</label>
                                <select class="custom-select" name="" id="user_filter--sort">
                                    <option value="DESC" sort="id">Mới nhất</option>
                                    <option value="ASC" sort="id">Cũ nhất</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-2 mb-4 pl-0">
                            <div class="form-group">
                                <label for="">Role</label>
                                <select class="custom-select" name="" id="user_filter--role">
                                    <option value="0">Tất Cả</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3 mb-4">
                            <div class="form-group">
                                <label for="">Tên , id , email user</label>
                                <input type="text" class="form-control" name="" id="user_filter--nameId"
                                    placeholder="Tìm tên, id, email user">
                            </div>
                        </div>
                        <div class="col-3 mb-4 pl-0">
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="text" class="form-control" name="" id="user_filter--phone"
                                    aria-describedby="helpId" placeholder="Nhập số điện thoại">
                            </div>
                        </div>
                        <div class="col-2 mb-4 pl-0">
                            <div class="form-group">
                                <label for="">Provider</label>
                                <input type="text" class="form-control" name="" id="user_filter--provider"
                                    aria-describedby="helpId" placeholder="Nhập nền tảng login">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        {{-- end filter --}}
        <div class="col-12 mt-4 p-0">
            <div class="w-100">
                <div class="card">
                    <div class="card-header text-center">
                        Danh sách User
                    </div>
                    <div class="card-body" class="user_show" id="show__user">
                        <x-admin.users.table.showusers :users="$users->data" :number="$users->number_page" :page="$users->page" />
                    </div>

                </div>
            </div>
        </div>

        {{-- end show --}}
    </div>
@endsection
