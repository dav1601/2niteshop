<div class="va-checkbox va-checkbox-{{ $product->id }} d-flex align-items-center w-100">
    <input type="checkbox" name="{{ $name }}[]" value="{{ $product -> id }}"
        id="{{ $prefix }}__{{ $product -> id }}" class="check_plc {{ $class }}" @if (in_array($product->id , $array)) checked @endif >
    <label for="{{ $prefix }}__{{ $product -> id }}" >
        {{ $product -> name }} 
    </label>
</div>

