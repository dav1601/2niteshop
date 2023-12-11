@props(['item', 'selected' => false])
@if ($item)
    <option value="{{ $item->_name }}" @selected($selected) data-id="{{ $item->id }}">
        {{ $item->_name }}
    </option>
@endif
