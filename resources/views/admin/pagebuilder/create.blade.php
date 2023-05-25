@extends('admin.layout.app')
@section('import_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/css/lightgallery.min.css"
        integrity="sha512-F2E+YYE1gkt0T5TVajAslgDfTEUQKtlu4ralVq78ViNxhKXQLrgQLLie8u1tVdG2vWnB3ute4hcdbiBtvJQh0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/css/lg-thumbnail.min.css"
        integrity="sha512-GRxDpj/bx6/I4y6h2LE5rbGaqRcbTu4dYhaTewlS8Nh9hm/akYprvOTZD7GR+FRCALiKfe8u1gjvWEEGEtoR6g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/css/lg-video.min.css"
        integrity="sha512-89gDQOHnYjji90NPJ7+M5tgA/0E+fjL4KuSFhi6tjH6sZ54yUEogPMmOAgbI599fW1CtCyrsJbch8k/QzuoXzw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('import_js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ $file->ver('admin/app/js/page_builder.js') }}"></script>
    @if ($type === 'edit')
        @php
            $page->data = json_decode($page->data , true);
        @endphp
        <script>
            var page = {{ Js::from($page) }};
        </script>
    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/lightgallery.min.js"
        integrity="sha512-pG+XpUdyBtp28FzjpaIaj72KYvZ87ZbmB3iytDK5+WFVyun8r5LJ2x1/Jy/KHdtzUXA0CUVhEnG+Isy1jVJAbA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/plugins/thumbnail/lg-thumbnail.umd.min.js"
        integrity="sha512-hdzLQVAURjMzysJVkWaKWA2nD+V6CcBx6wH0aWytFnlmgIdTx/n5rDWoruSvK6ghnPaeIgwKuUESlpUhat2X+Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/plugins/video/lg-video.umd.min.js"
        integrity="sha512-8LEWq+IeGiCmv1c0dc/2BB6DwLpsPr4XW1WXMbGst9491vtBnQibiYmYnrTyBupmnUcJajDQFujcxlw4okbh5A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('name')
    {{ $type == 'edit' ? 'Edit' : 'Create' }}
@endsection
@section('outside-content')
    <div class="pgb-actions w-100 position-fixed w-100 p-3" style="z-index:1049; background-color:#222e3c;  top: 0">
        <div class="d-flex align-items-center">
            @if ($type === 'edit')
                <button type="button" id="pgb-preview-btn"
                    class="btn btn-primary d-flex justify-content-center align-items-center mr-3">
                    <i class="fa-solid fa-eye"></i>
                    <span class="d-block ml-2" style="padding-bottom: 2px">
                        Preview
                    </span>
                </button>
            @endif
            <button type="button" id="pgb-handle-btn"
                class="btn btn-primary d-flex justify-content-center align-items-center mr-3">
                <i class="fa-solid fa-plus"></i>
                <span class="d-block ml-2" style="padding-bottom: 2px">
                    {{ $type == 'edit' ? 'Save' : 'Create Page' }}
                </span>
            </button>
        </div>
    </div>
    {{-- -------- --}}
@endsection
@section('content')
        <input type="hidden" name="" id="pgb-handle" value="{{ $type }}">
        <div id="create-page-builder">
            @php
                $dataCreate = $type === 'create' ? [] : $page;
            @endphp
            <div id="app">
                <x-admin.pagebuilder.create :type="$type" :page="$dataCreate" />
            </div>

        </div>
    @endsection
