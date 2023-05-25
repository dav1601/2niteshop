@props(['value' => '', 'name' => '', 'append', 'type' => 'text', 'label' => '', 'required' => false])
@php
    $is_group = isset($append);
@endphp
@if ($label)
    <x-admin.layout.form.label text="{{ $label }}" :required="$required" />
@endif
<div class="{{ $is_group ? 'input-group' : '' }}">
    <input type="{{ $type }}" required="{{ $required }}" class="form-control" name="{{ $name }}"
        value="{{ old($name, null) !== null ? old($name, null) : $value }}"
        {{ $attributes->merge(['class' => 'form-control']) }}>
    @isset($append)
        <div class="input-group-append">
            {{ $append }}
        </div>
    @endisset
</div>
@error($name)
    <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
        {{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@enderror
