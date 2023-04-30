{{-- @dump(handleStyle($payload)) --}}
@php
    $time = url('pgb/pgb.css') . '?ver=' . filemtime(public_path('pgb/pgb.css'));
@endphp
<script>
    $(document).ready(function() {
        let time = "{{ $time }}";
        $("#pgb-link").attr("href", time)
    });
</script>
@if (is_array($payload))

    <div id="pgb-preview">
        @foreach ($payload as $section)
            <x-pagebuilder.render.section :section="$section" />
        @endforeach
    </div>
@endif
