@extends('layouts.user.app')
@section('import_js')
<script src="{{ $file->ver('client/app/js/user.js') }}"></script>
@endsection
@section('margin') option__profile @endsection
@section('b_crumb')
Tài khoản của bạn
@endsection
@section('rh__left')
<h1 class="my__address mb-1 title">Địa Chỉ Của Tôi</h1>
@endsection
@section('class_rc') wp__address @endsection
@section('rh__right')

<button class="davi_btn--address mt-0" style="width:179px" data-toggle="modal" data-target="#addAddress">
    <i class="fas fa-plus pr-2"></i>
    Thêm địa chỉ
</button>

@endsection
@section('rc')
<div id="rc__address">
    @foreach ($user_address as $address )
    <x-client.account.address.item :address="$address" />
    @endforeach
</div>
<x-client.modal.editaddress />
<x-client.modal.address />

@endsection
