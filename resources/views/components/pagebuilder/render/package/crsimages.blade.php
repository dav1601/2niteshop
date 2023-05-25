@php
    $p = $package['payload'];
@endphp
@if (array_key_exists('content', $p))
    <div class="pgn-module-carsousel-images w-100 {{ renderAdvanced($package['advanced']) }}" id="{{ $package['id'] }}">
        <div id="module-carousel-{{ $package['id'] }}" class="carousel slide w-100 {{ rC($p['class']) }} module-carousel"
            data-ride="carousel" data-pause="hover">
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
                                <a href="{{ config('app.url') . $carousel['link'] }}" target="_blank"
                                    class="d-block w-100">
                                    <img class="w-100" src="{{ $carousel['value'] }}" alt="First slide">
                                </a>
                            @else
                                <img class="d-block w-100" src="{{ $carousel['value'] }}" alt="First slide">
                            @endif

                        </div>
                        @php
                            unset($carousel);
                            unset($key);
                        @endphp
                    @endforeach

                @endif
            </div>
            <button class="carousel-control-prev" type="button" data-target="#module-carousel-{{ $package['id'] }}"
                data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#module-carousel-{{ $package['id'] }}"
                data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>

        </div>
    </div>
@endif
