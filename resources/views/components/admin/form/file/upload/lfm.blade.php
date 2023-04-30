@php
    if ($images) {
        if (is_array($images)) {
            $images = implode(',', $images);
        }
    } else {
        $images = '';
    }
@endphp
<div class="form-group w-100 lfm-upload my-4">
    <label for="{{ $id }}" class="mb-3">Source Image (File Manager / Link)</label>
    <div class="input-group w-100">
        <input type="text" data-mutiple="{{ $mutiple }}" value="{{ $images }}"
            class="form-control lfm-upload-input {{ $class }}" {{ $attr }} name="{{ $name }}"
            id="{{ $id }}"
            placeholder="Nếu không upload thì bạn nhập link vào đây (Nếu nhiều link thì cách nhau dấu PHẨY)"
            aria-label="Image Source">
        <div class="input-group-append">
            <button type="button" {{ $attr }} data-input="{{ $id }}"
                class="btn lfm-upload-btn btn-primary" style="min-width:100px">
                <i class="fa-solid fa-upload"></i>
            </button>
            {{-- Lam lfm cho cai nut nay --}}
        </div>
    </div>
    <div class="form-group w-100 lfm-upload-preview mt-4" id="{{ $id ? 'preview-' . $id : '' }}">
        <span class="text-muted">Không có hình ảnh</span>
    </div>
</div>
