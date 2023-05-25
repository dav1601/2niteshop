@php
    $pl = $package['payload'];
    $content = $pl['content'] ?? [];
@endphp
<div class="pgb-module-gllYt {{ renderAdvanced($package['advanced']) }}">
    <div class="swiper module-swiper" id="swp-{{ $package['id'] }}" data-items="{{ $content['number_item'] }}">
        <div class="swiper-wrapper" id="module-gallery-video-{{ $package['id'] }}">
            @if (isset($content['items']))
                @if (count($content['items']) > 0)
                    @foreach ($content['items'] as $link)
                        @php
                            $videoId = getIdYt($link);
                            $title = get_youtube_title($videoId);

                        @endphp
                        <div class="swiper-slide pgb-module-gllYt-item position-relative cursor-pointer"
                            data-src="{{ $link }}"
                            data-poster="http://img.youtube.com/vi/{{ $videoId }}/hqdefault.jpg"
                            data-sub-html="<h4>{{ $title }}</h4>">
                            <img src="http://img.youtube.com/vi/{{ $videoId }}/hqdefault.jpg" class="w-100"
                                height="auto" alt="Thumbnail {{ $title }}">
                            <i class="fa-brands fa-youtube centered-axis-xy"
                                style="color: #d52410; font-size: 60px"></i>
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
