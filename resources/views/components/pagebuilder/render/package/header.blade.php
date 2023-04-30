@php
    $p = $package['payload'];
@endphp
<h3 class="{{ rC($p['class']) }} {{ renderAdvanced($package['advanced']) }} title-red  text-uppercase text-center"
    id="{{ $package['id'] }}">
    {{ $p['content'] }}
</h3>
