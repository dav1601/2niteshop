@extends('layouts.app')
@section('import_js')
    <script src="{{ $file->ver('client/app/js/cart.js') }}"></script>
@endsection
@section('margin')
    dtl__margin option_cart
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
                    Giỏ Hàng
                </li>
            </ol>
        </div>
    </div>

    <div id="cart">
        <div class="container" id="cart__show">
            <x-client.cart.show />

        </div>
    </div>
@endsection
