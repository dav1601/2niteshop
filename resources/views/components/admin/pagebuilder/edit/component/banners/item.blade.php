@if ($item)
    <div class="p-e-component-banner card col-6">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Photo-{{ $index + 1 }}</span>
            <span class="p-e-banners-remove hover-action d-block cursor-pointer" data-index="{{ $index }}"><i
                    class="fa-solid fa-trash"></i></span>
        </div>
        <div class="card-body">
            <div class="form-group my-3">
                <x-admin.form.file.upload.lfm class="p-e-banners-image" :images="$item['value']" />
            </div>
            <div class="form-group">
                <label>Link</label>
                <input type="text" class="form-control p-e-banners-link" value="{{ $item['link'] }}" name=""
                    placeholder="">
            </div>
        </div>
    </div>
@endif
