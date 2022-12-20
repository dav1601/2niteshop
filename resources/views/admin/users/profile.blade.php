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
Hồ sơ
@endsection

@section('content')
<input type="hidden" name="" value="{{ $id }}" id="IdUser">
<div id="admin__profile">
    <div class="row mx-0">
        <div class="col-4 pl-0">
            <div class="w-100">
                <div class="card">
                    <div class="card-header text-center">
                        Chi tiết hồ sơ
                    </div>
                    <div class="card-body avatar__name text-center">
                        <img src="{{ $daviUser->getAvatarUser($id) }}" class="rounded-circle mb-2"
                            alt="{{ $user->name  }}" width="128" height="128">
                        <h5 class="card-title mb-0">{{ $user->name }}</h5>
                        <div class="text-muted mb-2">{{ $daviUser ->getRoleUser($id) }}</div>
                    </div>
                    <hr>
                    <div class="card-body address">
                        <h5 class="h6 card-title">About</h5>
                        <ul id="address" class="about__contact">
                            <li class="mb-1">
                                <span><i class="fa-solid fa-house"></i> Sống tại : </span><a href="#">
                                    @if ($profile->city != NULL)
                                    {{
                                    $profile->address_1 }}
                                    @else
                                    Chưa cập nhật
                                    @endif
                                </a>
                            </li>
                            <li class="mb-1">
                                <span><i class="fa-solid fa-building"></i> Làm việc tại : </span><a href="#">N1TE
                                    COMPANY</a>
                            </li>
                            <li class="mb-1">
                                <span><i class="fa-solid fa-location-dot"></i> Đến Từ : </span><a href="#">
                                    @if ($profile->city != NULL)
                                    {{ $daviUser
                                    ->
                                    getNameWard($profile->w) }} , {{ $daviUser -> getNameDist($profile->d) }} , {{
                                    $daviUser -> getNameCity($profile->city) }}
                                    @else
                                    Chưa cập nhật
                                    @endif
                                </a>
                            </li>
                        </ul>
                    </div>
                    <hr>
                    <div class="card-body contact">
                        <h5 class="h6 card-title">Liên Hệ</h5>
                        <ul id="contact" class="about__contact">
                            <li class="mb-1">
                                <span><i class="fa-solid fa-phone"></i> Số điện thoại : </span><a
                                    href="tel:{{ $user->phone }}">{{ $user->phone }}</a>
                            </li>
                            <li class="mb-1">
                                <span><i class="fa-solid fa-envelope"></i> Email : </span><a
                                    href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                            </li>
                            <li class="mb-1">
                                <span><i class="fa-brands fa-facebook"></i></span>
                                @if ($profile->facebook != NULL)
                                <a href="{{ $profile->facebook }}">Facebook</a>
                                @else
                                <a href="#">Chưa cập nhật</a>
                                @endif

                            </li>
                            <li class="mb-1">
                                <span><i class="fa-brands fa-instagram-square"></i> </span>
                                @if ($profile->instagram != NULL)
                                <a href="{{ $profile->instagram }}">Instagram</a>
                                @else
                                <a href="#">Chưa cập nhật</a>
                                @endif
                            </li>
                            <li class="mb-1">
                                <span><i class="fa-brands fa-twitter"></i></span>
                                @if ($profile->twitter != NULL)
                                <a href="{{ $profile->twitter }}">Twitter</a>
                                @else
                                <a href="#">Chưa cập nhật</a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8 pr-0">
            <div class="w-100">
                <div class="card">
                    <div class="card-header text-center">
                        Hoạt động
                    </div>
                    <div class="card-body" id="wp__activities">
                        <div id="activities">
                          <x-admin.profile.itemactivities :sorted="$sorted" />
                        </div>
                        @if ($number_page > 1 )
                        <div id="button">
                            <button class="btn w-100 text-center navi_btn" id="load__more--activities">Xem Thêm</button>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
