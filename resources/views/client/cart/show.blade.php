@extends('layouts.app')
@section('import_js')
<script src="{{ $file->ver('client/app/js/cart.js') }}"></script>
@endsection
@section('margin') dtl__margin  option_cart @endsection
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
               Giỏ Hàng
            </li>
        </ol>
    </div>
</div>

<div id="cart" >
<div class="container" id="empty_output">
    @if (Cart::instance('shopping')->count() > 0)
    <div id="cart__show" class="cartShow row mx-0">
        <div class="col-12 col-lg-8" id="wp_cartShow_left">
            <div class="w-100 cartShow--left">
                @foreach (Cart::instance('shopping')->content()->sortBy('id') as $cart )
                <x-Cart :cart="$cart" />
                @endforeach
            </div>
        </div>
        <div class="col-12 col-lg-4 pr-0 " id="wp_cartShow_right">
              <div class="w-100 cartShow--right">
                <span class="d-block plus_cart">cộng giỏ hàng</span>
                <div class="box-total bt-qty d-flex justify-content-between align-items-center">
                      <span>Số Lượng sản phẩm</span>
                      <strong>{{ Cart::instance('shopping')->count() }}</strong>
                </div>
                <div class="box-total bt-price d-flex justify-content-between align-items-center">
                  <span>Tổng giỏ hàng</span>
                  <strong> {{ crf(total()) }}</strong>
              </div>
              <div class="box-total">
                  <a href="{{ route('checkout') }}" class="davi_btn w-100">Thanh toán</a>
              </div>
              </div>
        </div>
  </div>
    @else

        <div id="cart__empty" class="d-flex flex-column align-items-center">
             <img src="{{ $file->ver_img('client/images/empty-cart.png') }}" alt="">
             <span class="d-block my-2 text-uppercase mr-4" style="font-size: 20px; font-weight:600;">Giỏ hàng bạn đang trống</span>
        </div>
    @endif

</div>
</div>

@endsection
