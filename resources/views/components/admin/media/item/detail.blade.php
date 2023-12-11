@props(['file', 'collections' => []])

@php
    $size = getSizeMedia($file->path);
@endphp
<div id="a-media-detail" data-id="{{ $file->id }}">
    <div class="attach-detail w-100 mb-3">
        <x-admin.layout.form.label text="Chi tiết đính kèm" class="mb-3" />
        <div class="attach-detail-img">
            <img class="a-media-item-image img-responsive {{ $size['width'] < 150 ? 'w-auto' : '' }} h-auto"
                src="{{ $file->full_path }}" alt="{{ $file->alt }}" />
        </div>
        <div class="attach-detail-content">
            <strong class="d-block text-break">{{ $file->file_name }}</strong>
            <span>{{ $file->created_at }}</span>
            <span>{{ formatSizeUnits($file->size) }}</span>
            <span>{{ $size['height'] }} dài và rộng {{ $size['width'] }} pixel</span>
        </div>
        <div class="attach-detail-actions">
            <button type="button" data-src="{{ $file->full_path }}"
                class="btn btn-outline-primary btn-sm a-media-view-image mr-2">Xem</button>
            <button type="button" id="a-media-detail-replace-btn" class="btn btn-outline-primary btn-sm mr-2">Thay
                Ảnh</button>
            <input type="file" class="d-none" id="a-media-detail-replace-input" uuid="{{ $file->uuid }}">
            <button type="button" id="a-media-detail-delete" uuid="{{ $file->uuid }}"
                class="btn btn-outline-danger btn-sm">Xoá Ảnh</button>
        </div>
    </div>
    {!! Form::open(['url' => route('a-media.update', ['id' => $file->uuid]), 'id' => 'a-media-form-detail']) !!}
    <div class="form-group">
        <x-admin.layout.form.label text="Model" />
        <select class="custom-select" name="model" id="">
            <option value="" @selected(!$file->model)>No Model</option>
            @foreach (config('avmedia.models') as $model)
                <option @selected($file->model === $model) value="{{ $model }}">{{ $model }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <x-admin.layout.form.label text="Collection" />
        <input type="text" class="form-control" name="collection" value="{{ $file->collection }}"
            id="a-media-detail-collection" aria-describedby="helpId" placeholder="">
        <small id="helpId" class="form-text text-muted">NếU collection không có sẵn thì hệ thống sẽ thêm vào</small>
    </div>
    <div class="form-group">
        <x-admin.layout.form.label text="văn bản thay thế" />
        <input type="text" class="form-control" value="{{ $file->alt }}" name="alt" id=""
            placeholder="">
    </div>
    <div class="form-group">
        <x-admin.layout.form.label text="Tiêu đề" />
        <input type="text" class="form-control" value="{{ $file->name }}" name="name" id=""
            placeholder="">
    </div>
    <div class="form-group">
        <x-admin.layout.form.label text="Chú thích" />
        <textarea class="form-control" name="note" id="" rows="3">{{ $file->note }}</textarea>
    </div>
    <div class="form-group mb-4">
        <x-admin.layout.form.label text="file url" />
        <div class="input-group">
            <input type="text" class="form-control" disabled value="{{ $file->full_path }}" id="a-media-detail-fp">
            <div class="input-group-append">
                <button type="button" id="a-media-detail-copy" class="btn btn-outline-primary btn-sm">Copy</button>
            </div>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" uuid="{{ $file->uuid }}" file-name="{{ $file->file_name }}"
            id="a-media-detail-download" class="btn btn-primary ml-2"><i
                class="fa-solid fa-file-arrow-down"></i></button>
    </div>
    {!! Form::close() !!}

</div>
