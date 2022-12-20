@extends('admin.layout.app')
@section('import_css')
@endsection
@section('import_js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="{{ asset('admin/app/js/user.js')}}?ver=@php echo filemtime('public/admin/app/js/user.js') @endphp">
</script>
@endsection

@section('name')
Chinh sách của shop
@endsection

@section('content')
@if (session('ok'))
<script>
    toastr.success("Cập Nhật User Thành Công");
</script>
@endif
@if (session('not-ok'))
<script>
    toastr.success("Cập Nhật User Thất Bại");
</script>
@endif
<input type="hidden" name="" id="ajax__avatar--loading" value="{{ url('public/client/images/fire.svg') }}">
{!! Form::open(['url' => route('save_setting_profile' , ['id' => $id]) , 'method' => "POST" ,'files' => true ]) !!}
<div id="plc" class="row mx-0">
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Public info
                </div>
                <div class="card-body" id="setting_profile">
                    <div class="row mx-0">
                        <div class="col-8 pl-0">
                            <div class="form-group mb-5">
                                <label for="">Tên</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}" id=""
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
                                <label for="">Tiểu sử</label>
                                <textarea class="form-control" name="biography" id=""
                                    placeholder="Giới thiệu điều gì đó về bản thân bạn"
                                    rows="5">{{ $profile->biography }}</textarea>
                            </div>
                        </div>
                        <div class="col-4 ml-0 mr-0 edit__pro5--right d-flex justify-content-center align-items-center">
                            <div class="plborder d-flex flex-column align-items-center">
                                @if (Auth::user()->avatar != NULL)
                                <img src="{{ asset(Auth::user()->avatar) }}" width="128" height="128"
                                    class=" rounded-circle " id="davishop__avatar--edit" alt="">
                                @else
                                <img src="{{ asset('client/images/user-large.png') }}" width="100" height="100"
                                    class=" rounded-circle " id="davishop__avatar--edit" alt="">
                                @endif
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
                </div>
            </div>
        </div>
        {{-- --------------------------- --}}
        <div class="col-12 mt-4 p-0">
            <div class="w-100">
                <div class="card">
                    <div class="card-header text-center">
                        Private Info
                    </div>
                    <div class="card-body" id="setting_profile">
                        <div class="row mx-0">
                            <div class="col-12">
                                <div class="form-group mb-5">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" name="name" disabled
                                        value="{{ $user->email }}" id="" placeholder="">
                                </div>
                            </div>

                            @if ($daviUser->ApiExists())
                            <div class="col-12">
                                <div class="form-group mb-5">
                                    <button type="button" class="btn btn-primary mr-3" data-toggle="modal"
                                        data-target="#getSecurityCode">
                                        Lấy Mã Bảo Vệ
                                    </button>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#getApiToken">
                                        Lấy Token Và Truy Cập Api
                                    </button>
                                </div>
                            </div>
                            @endif
                            <div class="col-12">
                                <div class="form-group mb-5">
                                    <label for="">Số điện thoại</label>
                                    <input type="text" class="form-control" name="phone" value="{{ $user->phone }}"
                                        id="" placeholder="">
                                    @error('phone')
                                    <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-5">
                                    <label for="">Địa Chỉ 1</label>
                                    <input type="text" class="form-control" placeholder="1234 Main St" name="address_1"
                                        value="{{ $profile->address_1 }}" id="" placeholder="">
                                    @error('address_1')
                                    <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-5">
                                    <label for="">Địa Chỉ 2</label>
                                    <input type="text" class="form-control" placeholder="Chung cư , studio......"
                                        name="address_2" value="{{ $profile->address_2 }}" id="" placeholder="">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Tỉnh</label>
                                    @if ($profile->city == NULL)
                                    <select class="custom-select" name="city" id="prov">
                                        <option value="">Chọn Tỉnh</option>
                                        @foreach (App\Models\Province::all() as $prov )
                                        <option value="{{ $prov->id }}">{{ $prov->_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @else
                                    <select class="custom-select" name="city" id="prov">
                                        <option value="{{ $profile->city }}">{{ App\Models\Province::where('id', '=' ,
                                            $profile->city)->first()->_name }}</option>
                                        @foreach (App\Models\Province::all() as $prov )
                                        @if($prov->id != $profile->city)
                                        <option value="{{ $prov->id }}">{{ $prov->_name }}
                                        </option>
                                        @endif
                                        @endforeach
                                    </select>
                                    @endif
                                    @error('city')
                                    <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            {{-- --}}
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Quận/Huyện</label>
                                    <select class="custom-select" name="dist" id="dist">
                                        @if ($profile->city == NULL)
                                        <option value="">Chưa Chọn Tỉnh</option>
                                        @else
                                        <option value="{{ $profile->d }}">{{ App\Models\District::where('id', '=' ,
                                            $profile->d)->first()->_name }}</option>
                                        @foreach (App\Models\District::where('_province_id', '=', $profile->city)->get()
                                        as $dist )
                                        @if ($dist->id != $profile->d)
                                        <option value="{{ $dist->id }}">{{ $dist->_name }}</option>
                                        @endif
                                        @endforeach
                                        @endif
                                    </select>
                                    @error('dist')
                                    <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            {{-- --}}
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Phường/Xã</label>
                                    <select class="custom-select" name="ward" id="ward">
                                        @if ($profile->city == NULL)
                                        <option value="">Chưa Quận/Huyện</option>
                                        @else
                                        <option value="{{ $profile->w }}">{{ App\Models\Ward::where('id', '=' ,
                                            $profile->w)->first()->_name }}</option>
                                        @foreach (App\Models\Ward::where('_district_id', '=', $profile->d)->get() as
                                        $ward )
                                        @if ($ward->id != $profile->w)
                                        <option value="{{ $ward->id }}">{{ $ward->_name }}</option>
                                        @endif
                                        @endforeach
                                        @endif
                                    </select>
                                    @error('ward')
                                    <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            {{-- --}}
                            <div class="col-6">
                                <div class="form-group mb-5">
                                    <label for="">Facebook</label>
                                    <input type="text" class="form-control" name="facebook"
                                        value="{{ $profile->facebook }}" id="" placeholder="Có thể để trống">
                                </div>
                            </div>
                            {{-- --}}
                            {{-- --}}
                            <div class="col-6">
                                <div class="form-group mb-5">
                                    <label for="">Instagram</label>
                                    <input type="text" class="form-control" name="instagram"
                                        value="{{ $profile->instagram }}" id="" placeholder="Có thể để trống">
                                </div>
                            </div>
                            {{-- --}}
                            {{-- --}}
                            <div class="col-6">
                                <div class="form-group mb-5">
                                    <label for="">Zalo</label>
                                    <input type="text" class="form-control" name="zalo" value="{{ $profile->zalo }}"
                                        id="" placeholder="Có thể để trống">
                                </div>
                            </div>
                            {{-- --}}
                            {{-- --}}
                            <div class="col-6">
                                <div class="form-group mb-5">
                                    <label for="">Twitter</label>
                                    <input type="text" class="form-control" name="twitter"
                                        value="{{ $profile->twitter }}" id="" placeholder="Có thể để trống">
                                </div>
                            </div>
                            {{-- --}}
                            {{-- --}}
                            <div class="col-6">
                                <div class="form-group mb-5">
                                    <label for="">Github</label>
                                    <input type="text" class="form-control" name="github" value="{{ $profile->github }}"
                                        id="" placeholder="Có thể để trống">
                                </div>
                            </div>
                            {{-- --}}
                            {{-- --}}
                            <div class="col-6">
                                <div class="form-group mb-5">
                                    <label for="">LinkedIn</label>
                                    <input type="text" class="form-control" name="linkedIn"
                                        value="{{ $profile->linkedIn }}" id="" placeholder="Có thể để trống">
                                </div>
                            </div>
                            {{-- --}}
                            <div class="col-12">
                                <div class="form-group mb-5">
                                    <input type="submit" value="Lưu Thay Đổi" class="btn btn-primary">
                                </div>
                            </div>
                            {{-- --}}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@if ($daviUser->ApiExists())
<!-- Modal -->
<div class="modal fade" id="getSecurityCode" tabindex="-1" aria-labelledby="getSecurityCodeLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background-color: #222e3c !important;">
            <div class="modal-header">
                <h5 class="modal-title" id="getSecurityCodeLabel">Lấy Mã Bảo Vệ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group mb-5">
                    <label for="emailSec">Email</label>
                    <input type="text" name="" id="emailSec" class="form-control">
                </div>
                <div class="form-group mb-5">
                    <label for="emailS">Passowrd</label>
                    <input type="password" name="" id="passSec" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="getSeCode" class="btn btn-primary">Lấy Mã Bảo Vệ</button>
            </div>
        </div>
    </div>
</div>
{{-- -------- --}}
<div class="modal fade" id="getApiToken" tabindex="-1" aria-labelledby="getApiTokenLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background-color: #222e3c !important;">
            <div class="modal-header">
                <h5 class="modal-title" id="getApiTokenLabel">Lấy Token Và Truy Cập Api</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group mb-5">
                    <label for="security_code">SECURITY CODE</label>
                    <input type="password" name="" id="secode" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="getApiTokenBtn" class="btn btn-primary">Lấy Token Và Truy Cập Api</button>
            </div>
        </div>
    </div>
</div>
@endif
