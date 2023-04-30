@php
    $p = $package['payload'];
@endphp
<div class="{{ rC($p['class']) }} {{ renderAdvanced($package['advanced']) }} pgb-render-package-ggmap"
    id="{{ $package['id'] }}">
    {!! $p['content'] !!}
</div>
{{-- sửa lại edit package image +  làm database --}}
