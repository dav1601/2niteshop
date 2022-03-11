@extends('layouts.app')
@section('import_js')
<script src="{{ $file->ver('client/app/js/cart.js') }}"></script>
@endsection
@section('margin') dtl__margin  checkout_success @endsection
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
               Đặt Hàng Thành Công
            </li>
        </ol>
    </div>
</div>

<div id="ckout_s" >
<div class="container" class="cks">
    <div class="row mx-0 w-100">
        <div class="col-12 col-lg-6 pl-lg-0 cks_left d-flex flex-column align-items-center" >
          <div class="img d-flex justify-content-center">
              <img src="{{ $file->ver_img('client/images/checked-2.png') }}" alt="">
          </div>
          <div class="box my-3">
             <div class="box__title d-flex align-items-center">
                <h3 style="margin-top:12px">Cảm ơn quý khách đã đặt hàng thành công tại <strong>2NITE SHOP</strong></h3>
                <img src="{{ $file->ver_img('client/images/happy.png') }}" height="30px" class="ml-2" alt="">
             </div>
             <div class="box__content">
                 <span>ID Đơn Hàng Của Quý Khách Là: <strong>{{ $ordered->id }}</strong></span>
                 <span>Chúng tôi sẽ gửi cho bạn 1 email về chi tiết đơn hàng và trạng thái đơn hàng để khách hàng tiện theo dõi.</span>
                 <span>Nếu Khách Hàng cần hỗ trợ liên hệ ngay với E-mail: <strong>vaone6v2@gmail.com</strong> hoặc Gọi ngay đến: <strong>{{getVal('switchboard')->value }}</strong> để được hỗ trợ nhanh nhất! Cảm ơn quý khách.</span>
             </div>
             <div class="box__btn">
                <a href="{{ route('home') }}" class="davi_btn w-100">Tiếp tục mua hàng</a>
             </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 pr-lg-0 cks_right">
          <h2>Sản Phẩm Bạn Đã Đặt</h2>
          <div class="cks_right--ordered">
              @foreach ($cart as $item )
              <x-carts :cart="$item" />
              @endforeach
              <div  >
                <div class="row mx-0 mb-3  ">
                    <span class="col-6 pl-0">Chi phí vận chuyển linh hoạt:</span>
                    <strong class="col-6 pr-4 d-flex justify-content-end">CALL-{{getVal('switchboard')->value }}</strong>
                </div>
                <div class="row mx-0 mb-3">
                    <span class="col-6 pl-0">Tổng Tiền:</span>
                    <strong class="col-6 pr-4  d-flex justify-content-end" >{{ crf($ordered->total) }}</strong>
                </div>
                <div class="row mx-0">
                    <span class="col-6 pl-0">Ngày đặt</span>
                    <strong class="col-6 pr-4  d-flex justify-content-end" >{{ $ordered->created_at}}</strong>
                </div>
            </div>
          </div>
          <div id="info">
            <div class="row mx-0 w-100">
                <div class="col-12 col-sm-6 pl-sm-0">
                    <h2>Thông tin khách hàng</h2>
                    <div class="box-info">
                        <span>Tên: <strong>{{ $ordered->name }}</strong></span>
                        <span>Số điện thoại: <strong>{{ $ordered->phone }}</strong></span>
                        <span>Email: <strong>{{ $ordered->email }}</strong></span>
                        <span>Hình thức thanh toán: <strong>{{ $ordered->payment }}</strong></span>
                        <span>Note: <strong>{{ $ordered->note }}</strong></span>
                    </div>
                </div>
                <div class="col-12 col-sm-6 pr-sm-0">
                    <h2>Thông tin vận chuyển</h2>
                    <div class="box-info">
                        <span>Tỉnh: <strong>{{ $ordered->prov }}</strong></span>
                        <span>Quận/Huyện: <strong>{{ $ordered->dist }}</strong></span>
                        <span>Phường/Xã: <strong>{{ $ordered->ward }}</strong></span>
                        <span>Địa chỉ: <strong>{{ $ordered->address }}</strong></span>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
</div>

@endsection
