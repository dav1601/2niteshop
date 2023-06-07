@props(['media' => []])
@php
    $models = App\Models\AMedia::select('model')
        ->whereNotNull('model')
        ->distinct()
        ->get()
        ->pluck('model')
        ->toArray();
    $collections = App\Models\AMedia::select('collection')
        ->whereNotNull('collection')
        ->distinct()
        ->get()
        ->pluck('collection')
        ->toArray();
@endphp

<div class="w-100" id="a-media-layout">
    <div class="row no-gutters">
        <div class="col-12" id="a-media-layout-l">
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
            <div class="tab-content" id="a-media-tab-content">
                <div class="tab-pane fade" id="a-media-uf-content" role="tabpanel" aria-labelledby="a-media-upload-tab">
                    {{-- @isset($upload)
                        {{ $upload }}
                    @endisset --}}
                    <x-admin.media.upload />
                </div>
                <div class="tab-pane fade show active" id="a-media-media-content" role="tabpanel"
                    aria-labelledby="a-media-media-tab">
                    <x-admin.media.media :media="$media" />
                </div>

            </div>
        </div>

    </div>
</div>
