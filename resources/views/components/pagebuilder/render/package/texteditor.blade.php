@php
    $p = $package['payload'];
@endphp
<div class="pgb-module-text-editor {{ rC($p['class']) }} {{ renderAdvanced($package['advanced']) }}" id="{{ $package['id'] }}">
    {!! $p['content'] !!}
</div>
