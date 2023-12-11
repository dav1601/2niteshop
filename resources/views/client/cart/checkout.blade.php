@extends('layouts.app')
@section('import_js')
    <script src="{{ $file->ver('client/app/js/cart.js') }}"></script>
    <script src="{{ $file->ver('client/app/js/user.js') }}"></script>
@endsection
@section('margin')
    dtl__margin option_checkout
@endsection

@section('content')
    <div id="breadCrumb">
        <div class="container">
            <ol class="b__crumb">
                <li class="b__crumb--item">
                    <i class="fas fa-home"></i>
                </li>
                <li class="b__crumb--item">
                    <i class="fas fa-long-arrow-alt-right"></i>
                </li>
                <li class="b__crumb--item">
                    Thanh toán
                </li>
            </ol>
        </div>
    </div>
    <div id="wp_checkout">
        <div class="container">
            {!! Form::open(['url' => route('handle_checkout'), 'method' => 'POST']) !!}
            <div class="checkout row mx-0">
                <div class="col-12 col-lg-4 pl-lg-0 checkout__left">
                    @guest


                        <div class="section__checkout section__info">

                            <div class="section__checkout--title">
                                Thông tin cá nhân
                            </div>
                            <div class="section__checkout--body">
                                <div class="form-group">
                                    <label for="">Họ Và Tên <strong class="pl-1">*</strong></label>
                                    <input type="text" class="form-control" name="fullname" value="{{ old('fullname') }}"
                                        placeholder="Họ và Tên">
                                    @error('fullname')
                                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                            {{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">E-Mail <strong class="pl-1">*</strong></label>
                                    <input type="text" class="form-control" name="email" value="{{ old('email') }}"
                                        placeholder="E-Mail">
                                    @error('email')
                                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                            {{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Số Điện Thoại <strong class="pl-1">*</strong></label>
                                    <input type="text" class="form-control" value="{{ old('phone') }}" name="phone"
                                        placeholder="Số điện thoại">
                                    @error('phone')
                                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                            {{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- end info user --}}
                        <div class="section__checkout section__info">
                            <div class="section__checkout--title">
                                Địa chỉ nhận hàng
                            </div>
                            <div class="section__checkout--body">
                                <div class="form-group">
                                    <label for="">Tỉnh: <strong class="pl-1">*</strong></label>
                                    <select name="prov" id="prov" class="custom-select">
                                        <option value="">Chọn Tỉnh</option>
                                        @foreach ($prov as $pr)
                                            <option value="{{ $pr->id }}">{{ $pr->_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('prov')
                                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                            {{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Quận <strong class="pl-1">*</strong></label>
                                    <select name="dist" id="dist" class="custom-select">
                                        <option value="">Bạn chưa chọn Tỉnh</option>
                                    </select>
                                    @error('dist')
                                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                            {{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Phường/Xã <strong class="pl-1">*</strong></label>
                                    <select name="ward" id="ward" class="custom-select">
                                        <option value="">Bạn chưa chọn Quận</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Địa chỉ cụ thể: <strong class="pl-1">*</strong></label>
                                    <textarea name="address" id="" cols="30" rows="5" class="form-control">{{ old('address') }}</textarea>
                                    @error('address')
                                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                            {{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group d-flex">
                                    <input type="checkbox" style="margin-top: 3px;" name="conform" id="conform" checked>
                                    <label for="conform" class="conform">Địa chỉ nhận hàng và địa chỉ thanh toán của tôi
                                        giống
                                        nhau.</label>
                                </div>
                            </div>

                        </div>
                        {{-- end address --}}
                    @endguest
                    {{-- auth --}}
                    @auth
                        <div class="section__checkout section-select-address">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h3 class="title section-title mb-0">Chọn địa chỉ</h3>
                                <button type="button" data-toggle="modal" data-target="#modal-address"
                                    class="nite-btn --fixh">
                                    mới
                                    <i class="fa-solid fa-plus ml-1"></i>
                                </button>
                            </div>
                            <div class="section-select-address-list">
                                <x-client.checkout.address.radio />
                            </div>

                        </div>
                    @endauth

                </div>
                <div class="col-12 col-lg-8 pr-lg-0 checkout__right">
                    <div class="section__checkout section__move">
                        <div class="row mx-0">
                            <div class="col-6 pl-0">
                                <div class="title section-title">
                                    Phương thức giao hàng
                                </div>
                                <div class="section__checkout--body d-flex align-items-center">
                                    <i class="fas fa-shipping-fast"></i>
                                    <input type="radio" name="shipping" class="mx-1" id="shipping" checked>
                                    <label for="shipping" class="conform pl-0">Phí vận chuyển linh hoạt</label>
                                </div>
                            </div>
                            <div class="col-6 pr-0">
                                <div class="title section-title">
                                    Phương thức thanh toán
                                </div>
                                <div class="section__checkout--body">
                                    <div class="form-group">
                                        <i class="fas fa-wallet"></i>
                                        <input type="radio" name="payment" class="mx-1" id="cod"
                                            value="cod" checked>
                                        <label for="cod" class="conform pl-0">Thu tiền khi giao hàng</label>
                                    </div>
                                    <div class="form-group">
                                        <i class="fas fa-money-check-alt"></i>
                                        <input type="radio" name="payment" class="mx-1" id="bank"
                                            value="transfer">
                                        <label for="bank" class="conform pl-0">Chuyển khoản ngân hàng</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- -------- --}}
                    <div class="section__checkout section__cp">
                        <div class="title section-title">
                            Coupon / Voucher / Điểm thưởng
                        </div>
                        <div class="section__checkout--body">
                            <div class="form-group row mx-0">
                                <label for="" class="col-12 col-sm-4 pl-0">Nhập mã Coupon tại đây <strong
                                        class="pl-1">*</strong></label>
                                <div class="col-sm-8 col-12 d-flex px-0">
                                    <input type="text" style="flex: 1" class="form-control" name="coupon"
                                        placeholder="Nhập mã Coupon tại đây ">
                                    <a class="check_cp cp">Kiểm Tra</a>
                                </div>
                            </div>
                            <div class="form-group row mx-0">
                                <label for="" class="col-12 col-sm-4 pl-0">Nhập mã quà tặng tại đây <strong
                                        class="pl-1">*</strong></label>
                                <div class="col-sm-8 col-12 d-flex px-0">
                                    <input type="text" style="flex: 1" class="form-control" name="gift_code"
                                        placeholder="Nhập mã quà tặng tại đây">
                                    <a class="check_cp cp_gift">Kiểm Tra</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end section cp --}}
                    <div id="cart__checkout">
                        <x-layout.loading />
                        {{-- ajax --}}
                    </div>

                    {{-- end section cart --}}
                    <div class="section__checkout section__cart">
                        <div class="title section-title">
                            Xác nhận đơn hàng
                        </div>
                        <div class="section__checkout--body">
                            <div class="form-group">
                                <textarea name="note" id="note" cols="30" rows="4" class="form-control" style="max-width: 100%"
                                    placeholder="Thêm ghi chú cho đơn hàng của bạn">{{ old('note') }}</textarea>
                            </div>
                            <div class="form-group d-flex">
                                <input type="checkbox" style="margin-top: 3px;" name="reg_blog" id="reg_blog"
                                    value="1" checked>
                                <label for="reg_blog" class="conform">Tôi muốn đăng ký nhận bản tin 2NITE GAME
                                    Store.</label>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Xác Nhận Đơn Hàng" class="davi_btn" style="border: none">
                            </div>
                        </div>
                    </div>
                    {{-- end conform checkout --}}
                    {{-- -------- --}}
                </div>
            </div>
            {!! Form::close() !!}
        </div>

    </div>
    <x-client.modal.address />
@endsection
