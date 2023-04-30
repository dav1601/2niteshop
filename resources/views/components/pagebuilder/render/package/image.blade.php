@php
    $p = $package['payload'];
@endphp
{{-- @dump($p) --}}
@if ($p['options']['href'])
    <a href="{{ $p['options']['href'] }}" target="_blank"
        class="pgb-module-image w-100 {{ renderAdvanced($package['advanced']) }}" id="{{ $package['id'] }}">
        <img src="{{ $p['content'] }}" class="{{ rC($p['class']) }} w-100" alt="{{ $p['content'] }}">
    </a>
@else
    <img src="{{ $p['content'] }}" class="{{ rC($p['class']) }} pgb-module-image w-100" id="{{ $package['id'] }}"
        alt="{{ $p['content'] }}">
@endif

{{-- <a target="_blank" href="{{ $p['options']['href'] }}" class="pgb-package-image" id="{{ $package['id'] }}">
    <img src="{{ isset($p['content']) }}"
        class="{{ rC($p['class']) }}" alt="">
</a> --}}
