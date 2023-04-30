@php
    $p = $package['payload'];
@endphp
<div class="module-banners" id="{{ $package['id'] }}">
    <style>
        .module-banner-item {
            flex: 0 0 calc(100% / {{ $p['content']['max'] }});
            max-width: calc(100% / {{ $p['content']['max'] }});
            padding: 5px;
        }

        @media (max-width:768px) {
            .module-banner-item {
                flex: 0 0 calc(100% / {{ $p['content']['min'] }});
                max-width: calc(100% / {{ $p['content']['min'] }});
            }
        }
    </style>
    @if (isset($p['content']['images']) && count($p['content']['images']) > 0)
        <div class="d-flex align-items-center w-100 flex-wrap">
            @foreach ($p['content']['images'] as $index => $banner)
                <div class="module-banner-item item-{{ $index }}">
                    <a href="{{ $banner['link'] }}" class="d-block w-100 overflow-hidden">
                        <img src="{{ $banner['value'] }}" alt="{{ $banner['value'] }}" class="w-100 hover-scale"
                            height="auto">
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</div>
 
        