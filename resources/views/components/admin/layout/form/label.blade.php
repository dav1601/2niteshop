@props(['for' => '', 'text' => '', 'required' => false])
<label {{ $attributes->merge(['class' => 'a-form-label', 'for' => $for]) }}>
    <span>
        {{ $text }}
        @if ($required)
            <sup>*</sup>
        @endif
    </span>

</label>

