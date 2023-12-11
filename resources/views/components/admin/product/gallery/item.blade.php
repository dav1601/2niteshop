@props(['key' => '', 'productact' => 'add', 'id' => '', 'large' => '', 'thumb' => ''])
@php
    $name700 = 'galleries[' . $key . ']' . '[700]';
    $name80 = 'galleries[' . $key . ']' . '[80]';
    $id_large = 'gallery-large-' . $key;
    $id_thumb = 'gallery-thumb-' . $key;
    $isEdit = $productact === 'edit';
    $id = $id ? $id : $key;
    $nameLarge = $isEdit ? 'media_700' : 'gallery[' . $key . '][700]';
    $nameThumb = $isEdit ? 'media_80' : 'gallery[' . $key . '][80]';
@endphp
<div class="col-10 row a-product-gallery-item position-relative mx-auto mb-3 p-5" data-id="{{ $isEdit ? $id : null }}">

    <div class="d-flex align-items-center justify-content-start a-product-gallery-action position-absolute">
        <button data-key="{{ $key }}" type="button" class="btn btn-sm btn-outline-info gallery-delete"><i
                class="fa-solid fa-trash" style="color: #f4f7fa;"></i></button>
    </div>

    <div class="d-flex justify-content-start col-7">
        <x-admin.ui.form.image width="240px" avMedia="true" classInput="product_gallery_input" height="240px"
            label="Hình Ảnh Chi Tiết Lớn (700x700)" name="{{ $nameLarge }}" image="{{ urlImg($large, 'media') }}"
            id="{{ $id_large }}">
            <x-slot name="input" data-index="{{ $key }}" data-type="large">

            </x-slot>
        </x-admin.ui.form.image>
    </div>
    <div class="d-flex justify-content-start col-5">
        <x-admin.ui.form.image width="80px" avMedia="true" height="80px" classInput="product_gallery_input"
            label="Hình Ảnh Chi Tiết Nhỏ (80x80)" name="{{ $nameThumb }}" image="{{ urlImg($thumb, 'media') }}"
            id="{{ $id_thumb }}">
            <x-slot name="input" data-index="{{ $key }}">

            </x-slot>
        </x-admin.ui.form.image>
    </div>
</div>
