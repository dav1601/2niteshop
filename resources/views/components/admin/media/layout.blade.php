<div class="w-100 h-100" id="a-media-layout">
    <div class="row no-gutters h-100">
        <div class="col-12 h-100" id="a-media-layout-l">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="btn btn-outline-secondary btn-tab-media" id="a-media-upload-tab" data-toggle="tab"
                        data-target="#a-media-uf-content" type="button" role="tab" aria-controls="upload"
                        aria-selected="false">Upload</button>
                </li>
                <li class="nav-item ml-2" role="presentation">
                    <button class="btn btn-outline-secondary active btn-tab-media" id="a-media-media-tab"
                        data-toggle="tab" data-target="#a-media-media-content" type="button" role="tab"
                        aria-controls="media" aria-selected="true">Media</button>
                </li>

            </ul>
            <div class="tab-content h-100" id="a-media-tab-content">
                <div class="tab-pane fade h-100" id="a-media-uf-content" role="tabpanel"
                    aria-labelledby="a-media-upload-tab">
                    {{-- @isset($upload)
                        {{ $upload }}
                    @endisset --}}
                    <x-admin.media.upload />
                </div>
                <div class="tab-pane fade show active h-100" id="a-media-media-content" role="tabpanel"
                    aria-labelledby="a-media-media-tab">
                    <x-admin.media.media />
                </div>

            </div>
        </div>

    </div>
</div>
