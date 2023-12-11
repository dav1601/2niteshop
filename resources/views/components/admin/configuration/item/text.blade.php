@props(['config' ])
<div class="cfg-item-text row justify-content-start align-items-center w-100 mb-4">
    <div class="col-2 name text-capitalize text-center">
        {{ $config->name }}
    </div>
    <div class="col-8 content">
        <input type="text" class="form-control" value="{{ $config->value }}" name="{{ $config->name }}"
            id="cfg-{{ $config->id }}">
    </div>
</div>
