@php
    $pl = $package['payload'];
    $content = $pl['content'] ?? [];
@endphp
<div class="pgb-module-gllYt {{ renderAdvanced($package['advanced']) }}">
    <div class="swiper module-swiper" id="swp-{{ $package['id'] }}" data-items="{{ $content['number_item'] }}">
        <div class="swiper-wrapper">
            @if (isset($content['items']))
                @if (count($content['items']) > 0)
                    @foreach ($content['items'] as $link)
                        @php
                            $videoId = getIdYt($link);
                        @endphp
                        <div class="swiper-slide pgb-module-gllYt-item">
                            <img src="http://img.youtube.com/vi/{{ $videoId }}/hqdefault.jpg" class="w-100"
                                height="auto" alt="image youtube">
                        </div>
                    @endforeach
                @endif
            @endif
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>

</div>
{{-- làm nốt cái này --}}
