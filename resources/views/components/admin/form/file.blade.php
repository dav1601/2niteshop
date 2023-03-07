@php
    $idFor = 'for' . $id;
@endphp
<div class="form-group {{ $class }} mb-5">
    <div class="custom-file">
        <input type="file" name="{{ $multiple ? $name . '[]' : $name }}" class="custom-file-input dav-input-file"
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
