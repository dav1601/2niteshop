<input type="hidden" name="" id="edit-package-type" value="{{ $type }}">
<input type="hidden" name="" id="edit-package-id" value="{{ $package['id'] }}">
<x-admin.pagebuilder.layout.tabs :isPack="true" :adv="$package['advanced']">
    <x-slot name="content">
        @switch($type)
            @case('image')
                <div class="form-group my-3">
                    <x-admin.form.file.upload.lfm id="package-edit-image" :images="$package['payload']['content']" />
                </div>
                <div class="form-group">
                    <label for="pack-edit-image-href">Link</label>
                    <input type="text" class="form-control" value="{{ $package['payload']['options']['href'] }}"
                        name="" id="pack-edit-href" placeholder="">
                </div>

                <x-slot name="style">
                    <x-admin.pagebuilder.style.border :package="$package" />
                </x-slot>
            @break

            @case('video')
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="pgb-m-content-type">Chọn Nền Tảng Video</label>
                    </div>

                    <select class="custom-select" name="video-platform" id="pgb-m-video-platform">
                        <option @if ($package['payload']['options']['pf'] == 'def') selected @endif value="0">Chọn Platform</option>
                        <option @if ($package['payload']['options']['pf'] == 'yt') selected @endif value="yt">YouTube
                            (<strong>Recommended</strong>)</option>
                        <option @if ($package['payload']['options']['pf'] == 'drive') selected @endif value="drive">Google Drive</option>
                        <option @if ($package['payload']['options']['pf'] == 'other') selected @endif value="other">Khác</option>

                    </select>
                </div>
                <div class="form-group">
                    <label for="pack-edit-video-source">Source</label>
                    <input type="text" class="form-control" name="" value="{{ $package['payload']['content'] }}"
                        id="pack-edit-video-source" placeholder="">
                </div>
            @break

            @case('texteditor')
                <div class="form-group">
                    <label for="pack-edit-tiny">Editor</label>
                    <textarea name="content" id="pgb-package-edit-tiny" style="z-index: 20000;" class="my-editor position-relative">  {{ $package['payload']['content'] }}  </textarea>
                </div>
            @break

            @case('tabs')
                <div class="form-group">
                    <label>TABS</label>
                </div>
                <div id="form-group mt-4">
                    <div class="row align-items-center" id="pack-edit-tabs-output">
                        <x-layout.loading :center="true" />
                    </div>
                </div>
                <div class="form-group border-bottom-1 bb-g-1 mt-3 pb-5 text-center">
                    <button type="button" id="pack-edit-tabs-add" style="width:200px;" class="btn btn-primary"><i
                            class="fa-solid fa-plus"></i>
                        TAB</button>
                </div>
                <x-slot name="style">
                    <div class="form-group mt-5">
                        <div class="form-group mb-4">
                            <label for="color-active-tabs">Màu active</label>
                            <div class="input-group myColorPicker">
                                <input type="text" class="form-control color-picker"
                                    value="{{ $package['style']['activeColor'] }}" id="color-active-tabs">
                            </div>
                        </div>
                    </div>
                </x-slot>
            @break

            @case('crsimages')
                <div class="form-group mb-4">
                    <label for="pack-edit-carousel-images">Items</label>
                    <div class="input-group">
                        <input type="number" min="1" max="16" value="1" class="form-control"
                            id="pack-edit-crs-image-number">
                        <div class="input-group-append">
                            <button type="button" id="pack-edit-crs-image-add" style="width:200px;" class="btn btn-primary"><i
                                    class="fa-solid fa-plus"></i>
                                Item</button>
                        </div>
                    </div>
                    <span class="d-block mt-4">Total Item: <strong id="p-e-items">0</strong></span>
                    <div class="b-g-1 row my-4 py-4" id="pack-edit-crs-image-items">
                        <x-layout.loading :center="true" />
                    </div>
                </div>
            @break

            @case('category')
                @php
                    $categories = App\Models\Category::tree(false);
                @endphp
                <div class="form-group mb-5">
                    <label for="">Danh Mục</label>
                    @php
                        $selected = $package['payload']['content'] ? $package['payload']['content'] : 'none';
                    @endphp
                    <select class="custom-select" id="pack-edit-category">
                        <x-admin.form.select.option :selected="$selected" :categories="$categories" />
                    </select>
                </div>
            @break

            @case('header')
                <div class="form-group mb-2">
                    <label for="pack-edit-header">Nội Dung</label>
                    <input type="text" class="form-control" name="" value="{{ $package['payload']['content'] }}"
                        id="pack-edit-header" placeholder="">
                </div>
            @break

            @case('googlemap')
                <div class="form-group mb-2">
                    <label for="pack-edit-ggmap">Nhúng mã html google map - Xem hướng dẫn tại đây: <strong><a
                                href="https://support.google.com/maps/answer/144361?hl=vi" target="_blank">Hướng dẫn lấy mã
                                nhúng</a></strong></label>
                    <input type="text" class="form-control" name="" value="{{ $package['payload']['content'] }}"
                        id="pack-edit-ggmap" placeholder="">
                </div>
            @break

            @case('blogs')
                <div class="form-group mb-2">
                    <label for="pack-edit-blogs">Số lượng bài viết hiển thị</label>
                    <input type="number" max="100" min="1" class="form-control" name=""
                        value="{{ $package['payload']['content'] }}" id="pack-edit-blogs" placeholder="">
                </div>
            @break

            @case('banners')
                <div class="form-group mb-4">
                    <div class="row no-gutters my-4">
                        <div class="col-6">
                            <label for="pack-edit-carousel-images">Số banners muốn thêm</label>
                            <div class="input-group">
                                <input type="number" min="1" max="8" value="1" class="form-control"
                                    id="pack-edit-banners-number">
                                <div class="input-group-append">
                                    <button type="button" id="pack-edit-banners-add" style="width:200px;"
                                        class="btn btn-primary"><i class="fa-solid fa-plus"></i>
                                        Item</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 form-group px-4">
                            <label for="">Hiển thị tối thiểu:</label>
                            <input type="number" min="0" max="0"
                                value="{{ $package['payload']['content']['min'] }}" class="form-control"
                                id="pack-edit-banners-min" aria-describedby="pack-edit-banners-help-min">
                            <small id="pack-edit-banners-help-min" class="form-text text-muted">Số item nằm trên 1 hàng ở
                                thiết bị nhỏ</small>
                        </div>
                        <div class="col-3 form-group">
                            <label for="">Hiển thị tối đa:</label>
                            <input type="number" min="0" max="0"
                                value="{{ $package['payload']['content']['max'] }}" class="form-control"
                                id="pack-edit-banners-max" aria-describedby="pack-edit-banners-help-max">
                            <small id="pack-edit-banners-help-max" class="form-text text-muted">Số item nằm trên 1 hàng ở
                                thiết bị to</small>
                        </div>
                    </div>
                    <div class="b-g-1 row my-4 py-4" id="pack-edit-banners-items">
                        <x-layout.loading :center="true" />
                    </div>
                </div>
                <x-slot name="style">
                    <x-admin.pagebuilder.style.border :package="$package" />
                </x-slot>
            @break

            @case('galleryyt')
                <div class="form-group mb-4">
                    <div class="row no-gutters my-4">
                        <div class="col-6">
                            <label for="pack-edit-carousel-images">Số video muốn thêm</label>
                            <div class="input-group">
                                <input type="number" min="1" max="16" value="1" class="form-control"
                                    id="pack-edit-banners-number">
                                <div class="input-group-append">
                                    <button type="button" id="pack-edit-gll-yt-add" style="width:200px;"
                                        class="btn btn-primary"><i class="fa-solid fa-plus"></i>
                                        Video</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 pl-4">
                            <label for="">Số video hiển thị:</label>
                            <input type="number" min="1" max="8"
                                value="{{ $package['payload']['content']['number_item'] }}" class="form-control"
                                id="pack-edit-gll-yt-items" aria-describedby="pack-edit-gll-yt-help-max">
                            <small id="pack-edit-gll-yt-help-max" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="b-g-1 row my-4 py-4" id="pack-edit-gll-yt">
                        <div class="d-flex justify-content-center w-100 my-4">
                            <x-layout.loading :center="true" />
                        </div>
                    </div>
                </div>
            @break

            @default
        @endswitch
    </x-slot>
    <x-slot name="advanced">
        <div class="form-group mb-4">
            <label for="edit-package-class">Classes</label>
            <input type="text" class="form-control" value="{{ $package['payload']['class'] }}"
                data-role="tagsinput" name="" id="edit-package-class" aria-describedby="helpId"
                placeholder="">

        </div>
    </x-slot>
</x-admin.pagebuilder.layout.tabs>
