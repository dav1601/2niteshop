@props(['config'])
<div class="cfg-item-html row justify-content-center align-items-start w-100 flex-column mb-4">
    <div class="col-2 name text-capitalize mb-2">
        {{ $config->name }}:
    </div>
    <div class="col-8 content">
        <textarea name="{{ $config->name }}" id="cfg-{{ $config->id }}" class="cfg-html">
        {!! $config->value !!}
        </textarea>
        {{-- <input type="text" class="form-control" value="{{ $config->value }}" name="{{ $config->name }}"
            id="cfg-{{ $config->id }}"> --}}
    </div>
</div>
