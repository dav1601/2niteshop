@props(['image', 'active' => false, 'selected' => false])
@php
    $image->full_path = $image->full_path;
    $size = getSizeMedia($image->path);
@endphp
<div class="a-media-item cursor-pointer">
    <label class="image-checkbox {{ $active ? 'active' : '' }} {{ $selected ? 'image-checkbox-checked' : '' }} m-0"
        id="image-checkbox-{{ $image->id }}" data-id="{{ $image->id }}" uuid="{{ $image->uuid }}">
        <img class="img-responsive a-media-item-image {{ $size['width'] < 150 ? 'w-auto' : '' }} {{ $size['height'] < 150 ? 'h-auto' : '' }}"
            src="{{ $image->full_path }}" alt="{{ $image->alt }}" />
        {{-- <img class="img-responsive a-media-item-image media-lazy {{ $size['width'] < 150 ? 'w-auto' : '' }} {{ $size['height'] < 150 ? 'h-auto' : '' }}"
            src="{{ $image->full_path }}" alt="{{ $image->alt }}" /> --}}

        <input type="checkbox" name="a-media-images[]" class="a-media-image-checkbox"
            id="a-media-image-{{ $image->id }}" data-path="{{ $image->path }}" value="{{ $image->id }}" />
        <i class="fa fa-check d-none"></i>
    </label>
</div>
