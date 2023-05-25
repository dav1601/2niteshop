@props(['key', 'item', 'productact'])
@php
    $name700 = 'galleries[' . $key . ']' . '[700]';
    $name80 = 'galleries[' . $key . ']' . '[80]';
    $isEdit = $productact === 'edit';
@endphp
<div class="col-10 row a-product-gallery-item position-relative mx-auto mb-3 p-5"
    data-id="{{ $isEdit ? $item['id'] : null }}">
    @if ($isEdit)
        <div class="d-flex align-items-center justify-content-start a-product-gallery-action position-absolute">
            {{-- <button type="button" data-key="{{ $key }}" class="btn btn-sm btn-outline-info gallery-move mr-2"><i
                    class="fa-solid fa-up-down-left-right" style="color: #f4f7fa;"></i></button> --}}
            <button data-key="{{ $key }}" type="button" class="btn btn-sm btn-outline-info gallery-delete"><i
                    class="fa-solid fa-trash" style="color: #f4f7fa;"></i></button>
        </div>
    @endif
    <div class="d-flex justify-content-start col-7">
        <x-admin.ui.form.image width="240px" blockEventDef="{{ $isEdit ? 'true' : 'false' }}" height="240px"
            data-size="700" classUpload="{{ $isEdit ? 'gallery-upload' : '' }}"
            classClear="{{ $item['image_700'] && $isEdit ? 'd-block gallery-clear' : 'd-none' }}"
            classInput="{{ $isEdit ? 'gallery-input' : '' }}" :name="$name700" id="imgProduct700-{{ $key }}"
            label="Hình Ảnh Chi Tiết Lớn (700x700)" :image="$item['image_700'] ? $file->ver_img($item['image_700']) : ''">
            <x-slot name="btn_clear" :data-index="$key" data-size="700"></x-slot>
            <x-slot name="btn_upload" :data-index="$key" data-size="700"></x-slot>
            <x-slot name="input" :data-index="$key" data-size="700"></x-slot>
        </x-admin.ui.form.image>
    </div>
    <div class="d-flex justify-content-start col-5">
        <x-admin.ui.form.image width="80px" blockEventDef="{{ $isEdit ? 'true' : 'false' }}" height="80px"
            data-size="80" classUpload="{{ $isEdit ? 'gallery-upload' : '' }}"
            classClear="{{ $item['image_80'] && $isEdit ? 'd-block gallery-clear' : 'd-none' }}"
            classInput="{{ $isEdit ? 'gallery-input' : '' }}" :name="$name80" id="imgProduct80-{{ $key }}"
            label="Hình Ảnh Chi Tiết Lớn (80x80)" :image="$item['image_80'] ? $file->ver_img($item['image_80']) : ''">
            <x-slot name="btn_clear" :data-index="$key" data-size="80"></x-slot>
            <x-slot name="btn_upload" :data-index="$key" data-size="80"></x-slot>
            <x-slot name="input" :data-index="$key" data-size="80"></x-slot>
        </x-admin.ui.form.image>
    </div>
</div>
