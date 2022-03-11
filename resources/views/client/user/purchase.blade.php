@extends('layouts.user.app')
@section('import_js')
<script src="{{ $file->ver('client/app/js/user.js') }}"></script>
@endsection
@section('margin') option__profile @endsection
@section('b_crumb')
Đơn hàng của bạn
@endsection
@section('purchase')
<div id="wp__purchase">
    <input type="hidden" name="" id="url__origin--purchase" value="{{ $origin }}">
    <div id="purchase__layout">
        <x-client.account.purchase.layout :type="$type" />
    </div>
</div>
@endsection
