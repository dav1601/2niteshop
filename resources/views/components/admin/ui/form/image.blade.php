@props(['id' => '', 'image' => '', 'note' => '', 'name' => '', 'width' => 'auto', 'height' => 'auto', 'label' => 'Upload Image', 'required' => false, 'classImage' => '', 'blockEventDef' => 'false', 'classUpload' => '', 'classClear' => '', 'classInput' => '', 'classWp' => '', 'media_id' => '', 'avMedia' => 'false'])
@php
    $isEdit = $image ? true : false;
    $note = $note ? $note : 'Hình ảnh size không vượt quá 20mb , Các đuôi cho phép: jpeg,png,jpg,tiff,svg';
    $image = $image ? $image : config('app.no_image');
    $classAvMedia = '';
    $classClearAvMedia = '';
    if ($avMedia === 'true') {
        $blockEventDef = 'true';
        $classAvMedia = 'initAvMedia';
        $classClearAvMedia = 'avMediaClear';
    }
@endphp

<div class="w-100 a-ui-file-upload-wp {{ $classWp }}">
    <x-admin.layout.form.label :text="$label" :required="$required" class="mb-3" />
    <div class="flex-column a-ui-file-upload d-flex justify-content-center align-items-center">
        <div class="a-ui-file-upload-image">
            {{-- IMG --}}
            <img @isset($attrImage)
            {{ $attrImage->attributes }}
        @endisset
                src="{{ $image }}"
                style="width:{{ $width }} ;
            height:{{ $height }} ; max-width:100%;"
                original-image="{{ $image }}" alt="preview_image" class="{{ $classImage }} rounded"
                data-target="#{{ $id }}" a-media="#{{ $id }}">
            {{-- END IMG --}}
        </div>
        <small class="form-text text-muted my-3 text-center">{{ $note }}</small>
        <div class="a-ui-file-upload-actions d-flex">
            {{-- BTN UPLOAD --}}
            <button @isset($btn_upload)
            {{ $btn_upload->attributes }}
        @endisset
                data-block="{{ $blockEventDef }}" type="button"
                class="btn btn-outline-primary a-ui-file-upload-add {{ $classAvMedia }} {{ $classUpload }}"
                data-target="#{{ $id }}"><i class="fa-regular fa-image mr-1"></i>
                {{ $isEdit ? 'Update' : 'Upload' }}
                {{-- BTN CLEAR --}}
                <button
                    @isset($btn_clear)
                {{ $btn_clear->attributes }}
            @endisset
                    data-block="{{ $blockEventDef }}" type="button"
                    class="btn btn-outline-danger a-ui-file-upload-clear {{ $classClearAvMedia }} {{ !$isEdit ? 'd-none' : '' }} {{ $classClear }} ml-2"
                    data-target="#{{ $id }}" id="clear-{{ $id }}"><i
                        class="fa-regular fa-image mr-1"></i>
                    Delete
                </button>
        </div>
        {{-- INPUT MEDIA --}}

        {{-- INPUT DEF --}}
        @if ($avMedia === 'true')
            <input @isset($input)
            {{ $input->attributes }}
        @endisset
                type="text" id="{{ $id }}" class="{{ $classInput }} d-none"
                value="{{ $media_id }}" name="{{ $name }}" a-media="#{{ $id }}">
        @else
            <input @isset($input)
        {{ $input->attributes }}
    @endisset
                data-block="{{ $blockEventDef }}" type="file" name="{{ $name }}"
                accept="{{ config('app.allow_mimes') }}"
                class="custom-file-input a-ui-file-upload-input d-none {{ $classInput }}" id="{{ $id }}">
            <x-admin.layout.form.error :name="$name" />
        @endif


    </div>
</div>
