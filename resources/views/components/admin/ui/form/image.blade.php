@props(['id' => '', 'image' => '', 'note' => '', 'name' => '', 'width' => 'auto', 'height' => 'auto', 'label' => 'Upload Image', 'required' => false, 'classImage' => '', 'blockEventDef' => 'false', 'classUpload' => '', 'classClear' => '', 'classInput' => '', 'classWp' => '', 'media_id' => ''])
@php
    $isEdit = $image ? true : false;
    $note = $note ? $note : 'Hình ảnh size không vượt quá 1mb , Các đuôi cho phép: jpeg,png,jpg,tiff,svg';
    $image = $image ? $image : 'https://res.cloudinary.com/vanh-tech/image/upload/v1684567283/logo/blank-image_tgsc4d.svg';
@endphp
<div class="w-100 a-ui-file-upload-wp {{ $classWp }}">
    <x-admin.layout.form.label :text="$label" :required="$required" class="mb-3" />
    <div class="flex-column a-ui-file-upload d-flex justify-content-center align-items-center">
        <div class="a-ui-file-upload-image">
            <img @isset($attrImage)
            {{ $attrImage->attributes }}
        @endisset
                src="{{ $image }}"
                style="width:{{ $width }} ;
            height:{{ $height }} ; max-width:100%;"
                original-image="{{ $image }}" alt="preview_image" class="{{ $classImage }} rounded"
                data-target="#{{ $id }}">
        </div>
        <small class="form-text text-muted my-3 text-center">{{ $note }}</small>
        <div class="a-ui-file-upload-actions d-flex">
            <button @isset($btn_upload)
            {{ $btn_upload->attributes }}
        @endisset
                data-block="{{ $blockEventDef }}" type="button"
                class="btn btn-outline-primary a-ui-file-upload-add {{ $classUpload }}"
                data-target="#{{ $id }}"><i class="fa-regular fa-image mr-1"></i> Upload
            </button>
            {{-- ----- button clear --}}
            <button
                @isset($btn_clear)
                {{ $btn_clear->attributes }}
            @endisset
                data-block="{{ $blockEventDef }}" type="button"
                class="btn btn-outline-danger a-ui-file-upload-clear {{ !$isEdit ? 'd-none' : '' }} {{ $classClear }} ml-2"
                data-target="#{{ $id }}" id="clear-{{ $id }}"><i
                    class="fa-regular fa-image mr-1"></i>
                Delete
            </button>
        </div>
        <input type="hidden" id="input-media-{{ $id }}" value="{{ $media_id }}"
            name="media_id_{{ $name }}" data-id="{{ $id }}">
        <input @isset($input)
        {{ $input->attributes }}
    @endisset
            data-block="{{ $blockEventDef }}" type="file" name="{{ $name }}"
            accept="{{ config('app.allow_mimes') }}"
            class="custom-file-input a-ui-file-upload-input d-none {{ $classInput }}" id="{{ $id }}">
        <x-admin.layout.form.error :name="$name" />
    </div>
</div>
