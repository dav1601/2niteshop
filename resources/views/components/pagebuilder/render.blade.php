@php
    $payload = json_decode($payload, true);
@endphp

@foreach ($payload as $section)
    <x-pagebuilder.render.section :section="$section" />
@endforeach
