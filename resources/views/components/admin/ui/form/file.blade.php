@props(['id' => '', 'image' => '', 'note' => 'Hình ảnh size không vượt quá 500kb , Các đuôi cho phép: jpeg,png,jpg,tiff,svg', 'name' => '', 'width' => 305, 'height' => 305, 'label' => 'Upload Image', 'required' => false])
@php
    $isEdit = $image !== '';
    $defautImage = 'https://res.cloudinary.com/vanh-tech/image/upload/v1684567283/logo/blank-image_tgsc4d.svg';
    $image = $isEdit ? $image : $defautImage;
@endphp

<x-admin.layout.form.label :text="$label" :required="$required" />
<div class="flex-column a-ui-file-upload d-flex justify-content-center align-items-center w-100">
    <div class="a-ui-file-upload-image" style="width:{{ $width }}px ;
        height:{{ $height }}px">
        <img src="{{ $image }}" original-image="{{ $image }}" alt="preview_image" class="w-100 h-100 rounded"
            data-target="#{{ $id }}">
    </div>
    <small class="form-text text-muted my-3">{{ $note }}</small>
    <div class="a-ui-file-upload-actions">
        <button type="button" class="btn btn-outline-primary a-ui-file-upload-add"
            data-target="#{{ $id }}"><i class="fa-regular fa-image mr-2"></i> Upload
        </button>
        <button type="button" class="btn btn-outline-danger a-ui-file-upload-clear d-none ml-2"
            data-target="#{{ $id }}" id="clear-{{ $id }}"><i class="fa-regular fa-image mr-2"></i>
            Clear
        </button>
    </div>
    <input type="file" name="{{ $name }}" accept="image/png, image/jpeg, image/svg, image/tiff, image/jpg "
        class="custom-file-input a-ui-file-upload-input" id="{{ $id }}">
    <x-admin.layout.form.error :name="$name" />
</div>
