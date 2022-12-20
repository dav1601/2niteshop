@extends('layouts.user.app')
@section('import_js')
<script src="{{ $file->ver('client/app/js/user.js') }}"></script>
@endsection
@section('margin') option__profile @endsection
@section('b_crumb')
Tài khoản của bạn
@endsection
@section('rh__left')
<h1 class="my__pro5 mb-1">Hồ Sơ Của Tôi</h1>
<span class="note">Quản lý thông tin hồ sơ để bảo mật tài khoản</span>
@endsection
@section('rc')
<input type="hidden" name="" id="ajax__avatar--loading" value="{{ url('public/client/images/fire.svg') }}">
{!! Form::open(['url' => route('hanle_edit_profile' , ['id'=>Auth::id()]) , 'method' => "POST" , 'files' => true]) !!}
@if (session('ok'))
<script>
    const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 4000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});

Toast.fire({
  icon: 'success',
  title: 'Cập Nhật Tài Khoản Thành Công'
})
</script>
@endif
<div class="row mx-0 edit__pro5">
    <div class="col-12 col-sm-8 edit__pro5--left pl-0">
        <div class="dvBp5 row mx-0">
            <div class="col-3 pl-0 dvBp5L">
                <span>Email Đăng Nhập:</span>
            </div>
            <div class="col-9 px-0 dvBp5R">
                <span>{{ Auth::user()->email }}</span>
            </div>
        </div>
        <div class="dvBp5 row mx-0">
            <div class="col-3 pl-0 dvBp5L">
                <span>Số điện thoại:</span>
            </div>
            <div class="col-9 px-0 dvBp5R">
                <input type="text" name="phone" id="" value="{{ Auth::user()->phone }}" class="form-control">
                @error('phone')
                <div class="alert alert-danger  alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @enderror
            </div>
        </div>
        <div class="dvBp5 row mx-0">
            <div class="col-3 pl-0 dvBp5L">
                <span>Tên:</span>
            </div>
            <div class="col-9 px-0 dvBp5R">
                <input type="text" name="name" id="" value="{{ Auth::user()->name }}" class="form-control">
                @error('name')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @enderror
            </div>
        </div>
        <div class="dvBp5 row mx-0">
            <div class="col-3 pl-0 dvBp5L">
            </div>
            <div class="col-9 px-0 dvBp5R">
                <input type="submit" value="Lưu" class="davi_btn" style="border: none; width:50%">
            </div>
        </div>

    </div>
    <div class="col-12 col-sm-4 edit__pro5--right pr-0 ">
           <div class="plborder d-flex flex-column align-items-center">
            <img src="{{ $daviUser->getAvatarUser(Auth::id()) }}" width="100" height="100" class=" rounded-circle " id="davishop__avatar--edit" alt="user avatar edit">
            <input type="file" name="avatar" id="dvsAvatar" class="d-none">
            <button id="target__file" class="btn">Chọn Ảnh</button>
            @error('avatar')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @enderror
            <span class="note d-block mt-3">Dụng lượng file tối đa 1 MB</span>
            <span class="note d-block">Định dạng:.JPEG, .PNG, .JPG, .TIFF</span>
           </div>
    </div>
</div>
{!! Form::close() !!}
@endsection
