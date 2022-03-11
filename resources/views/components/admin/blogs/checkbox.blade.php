<div class="va-checkbox va-checkbox-{{ $blog->id }} d-flex align-items-center w-100">
    <input type="checkbox" name="{{ $name }}[]" value="{{ $blog -> id }}"
        id="{{ $prefix }}__{{ $blog -> id }}" class="check_plc {{ $class }}" @if (in_array($blog->id , $array)) checked @endif >
    <label for="{{ $prefix }}__{{ $blog -> id }}" >
        {{ $blog -> title }} 
    </label>
</div>

