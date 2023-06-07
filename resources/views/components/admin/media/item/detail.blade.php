@props(['file'])
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
            <span>{{ round($file->size * 0.000977) }} Kb</span>
            <span>{{ $size['height'] }} dài và rộng {{ $size['width'] }} pixel</span>
        </div>
        <div class="attach-detail-actions">
            <button type="button" data-src="{{ $file->full_path }}"
                class="btn btn-outline-primary btn-sm a-media-view-image mr-2">Xem</button>
            <button type="button" class="btn btn-outline-primary btn-sm mr-2">Thay Ảnh</button>
            <button type="button" class="btn btn-outline-danger btn-sm">Xoá Ảnh</button>
        </div>
    </div>
    {!! Form::open(['url' => route('a-media.update'), 'id' => 'a-media-form-detail']) !!}
    <div class="form-group">
        <x-admin.layout.form.label text="văn bản thay thế" />
        <input type="text" class="form-control" :value="{{ $file->alt }}" name="alt" id=""
            aria-describedby="helpId" placeholder="">
    </div>
    <div class="form-group">
        <x-admin.layout.form.label text="Tiêu đề" />
        <input type="text" class="form-control" value="{{ $file->name }}" name="name" id=""
            aria-describedby="helpId" placeholder="">
    </div>
    <div class="form-group">
        <x-admin.layout.form.label text="Chú thích" />
        <textarea class="form-control" name="note" id="" rows="3">{{ $file->note }}</textarea>
    </div>
    <div class="form-group d-flex">
        <button type="submit" class="btn btn-primary ml-auto">Save</button>
    </div>
    {!! Form::close() !!}

</div>
