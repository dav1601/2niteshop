@props(['id' => '', 'customattr' => [], 'checked' => false])


<div
    @if (isset($main)) {{ $main->attributes->merge(['class' => 'va-checkbox d-flex align-items-center w-100']) }} @else class="va-checkbox d-flex align-items-center w-100" @endif>
    <input type="checkbox" @if ($checked) checked @endif
        @if (isset($input)) {{ $input->attributes->merge(['id' => $id, 'class' => 'a-checkbox-input']) }} @else class="a-checkbox-input" @endif
        @isset($customattr)
        {{ $input->attributes->merge($customattr) }}
    @endisset>
    @isset($label)
        <label {{ $label->attributes->merge(['for' => $id]) }}>
            {{ $label }}
        </label>
    @endisset

</div>
