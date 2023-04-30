@php
    $p = $package['payload'];
@endphp
<div class="{{ $package['id'] }} pgb-render-package-video {{ renderAdvanced($package['advanced']) }}">
    @switch($p['options']['pf'])
        @case('yt')
            @php
                parse_str(parse_url($p['content'], PHP_URL_QUERY), $arrayYt);
            @endphp
            <iframe class="{{ rC($p['class']) }}" src="https://www.youtube.com/embed/{{ $arrayYt['v'] }}">
            </iframe>
        @break

        @case('drive')
            @php
                $videoId = get_drive_id_from_url($p['content']);
            @endphp
            <iframe class="{{ rC($p['class']) }}" src="https://drive.google.com/file/d/{{ $videoId }}/preview"></iframe>
        @break

        <video width="100%" height="auto" class="{{ rC($p['class']) }}" controls>
            <source src="{{ $p['content'] }}">
            Your browser does not support the video tag.
        </video>

        @default
    @endswitch

</div>
{{-- TEST PREVIEW VÀ LÀM DATABASE --}}
