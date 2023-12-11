@extends('layouts.user.app')
@section('import_js')
    <script>
        var currentAvatar = {{ Js::from(urlImg(Auth::user()->avatar)) }};
    </script>
    <script src="{{ $file->ver('client/app/js/user.js') }}"></script>
@endsection
@section('margin')
    option__profile
@endsection
@section('b_crumb')
    Tài khoản của bạn
@endsection
@section('rh__left')
    <h1 class="my__pro5 mb-1">Hồ Sơ Của Tôi</h1>
    <span class="note">Quản lý thông tin hồ sơ để bảo mật tài khoản</span>
@endsection
@section('rc')
    {!! Form::open([
        'url' => route('client.update.profile', Auth::id()),
        'method' => 'post',
        'files' => true,
        'id' => 'formUpdateProfile',
    ]) !!}
    <div class="row edit__pro5 mx-0">
        <div class="col-12 col-sm-8 edit__pro5--left pl-0">
            <div class="dvBp5 row mx-0">
                <div class="col-3 dvBp5L pl-0">
                    <span>Email Đăng Nhập:</span>
                </div>
                <div class="col-9 dvBp5R px-0">
                    <span>{{ Auth::user()->email }}</span>
                </div>
            </div>
            <div class="dvBp5 row mx-0">
                <div class="col-3 dvBp5L pl-0">
                    <span>Số điện thoại:</span>
                </div>
                <div class="col-9 dvBp5R px-0">
                    <input type="text" name="phone" id="" value="{{ Auth::user()->phone }}"
                        class="form-control">

                </div>
            </div>
            <div class="dvBp5 row mx-0">
                <div class="col-3 dvBp5L pl-0">
                    <span>Tên:</span>
                </div>
                <div class="col-9 dvBp5R px-0">
                    <input type="text" name="name" id="" value="{{ Auth::user()->name }}"
                        class="form-control">

                </div>
            </div>
            <div class="dvBp5 row mx-0">
                <div class="col-3 dvBp5L pl-0">
                </div>
                <div class="col-9 dvBp5R px-0">
                    <button type="submit" class="davi_btn mx-auto" style="border: none; width:50%">Lưu</button>
                </div>
            </div>

        </div>
        <div class="col-12 col-sm-4 edit__pro5--right pr-0">
            <div class="plborder d-flex flex-column align-items-center">
                <img src="{{ urlImg(Auth::user()->avatar) }}" width="100" height="100" class="rounded-circle"
                    id="davishop__avatar--edit" alt="user avatar edit">
                <input type="file" name="avatar" id="dvsAvatar" class="d-none">
                <button id="target__file" class="btn">Chọn Ảnh</button>
                <span class="note d-block mt-3">Dụng lượng file tối đa 1 MB</span>
                <span class="note d-block">Định dạng:.JPEG, .PNG, .JPG, .TIFF</span>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
