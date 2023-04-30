@php
    $p = $package['payload'];
@endphp
@if (array_key_exists('content', $p))
    <div class="pgn-module-carsousel-images w-100 {{ renderAdvanced($package['advanced']) }}" id="{{ $package['id'] }}">
        <div id="module-carousel-{{ $package['id'] }}" class="carousel slide w-100 {{ rC($p['class']) }} module-carousel"
            data-ride="carousel">
            <ol class="carousel-indicators">
                @if (count($p['content']) > 0)
                    @foreach ($p['content'] as $key => $carousel)
                        <li data-target="#module-carousel-{{ $package['id'] }}" data-slide-to="{{ $key }}"
                            class="{{ $key === 0 ? 'active' : '' }}"></li>
                        @php
                            unset($carousel);
                            unset($key);
                        @endphp
                    @endforeach

                @endif

            </ol>
            <div class="carousel-inner">
                @if (count($p['content']) > 0)
                    @foreach ($p['content'] as $key => $carousel)
                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                            @if ($carousel['link'])
                                <a href="{{ url($carousel['link']) }}" target="_blank"
                                    class="d-block w-100 {{ rC($p['class']) }}">
                                    <img class="w-100" src="{{ $carousel['value'] }}" alt="First slide">
                                </a>
                            @else
                                <img class="d-block w-100 {{ rC($p['class']) }}" src="{{ $carousel['value'] }}"
                                    alt="First slide">
                            @endif

                        </div>
                        @php
                            unset($carousel);
                            unset($key);
                        @endphp
                    @endforeach

                @endif
            </div>
            <a class="carousel-control-prev" href="#module-carousel-{{ $package['id'] }}" role="button"
                data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#module-carousel-{{ $package['id'] }}" role="button"
                data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
@endif
