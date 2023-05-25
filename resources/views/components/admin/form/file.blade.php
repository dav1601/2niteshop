@props(['label', 'class', 'required' => false])
@php
    $idFor = 'for' . $id;
@endphp

<div class="form-group {{ $class }}">
    @isset($label)
        <x-admin.layout.form.label :text="$label" :required="$required" />
    @endisset
    <div class="custom-file">
        jpeg,png,jpg,tiff,svg
        <input type="file" name="{{ $multiple ? $name . '[]' : $name }}"
            accept="image/png, image/jpeg, image/svg, image/tiff, image/jpg " class="custom-file-input dav-input-file"
            @if ($multiple) multiple @endif id="{{ $id }}">
        <label class="custom-file-label" for="{{ $id }}" id="{{ $idFor }}"> {{ $custom['plh'] }} </label>
    </div>
    @php
        $name = $multiple ? $name . '.*' : $name;
    @endphp
    @error($name)
        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
</div>
