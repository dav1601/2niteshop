@php
    $p = $package['payload'];
    $blogs = App\Models\Blogs::where('active', 1)
        ->orderBy('id', 'DESC')
        ->take((int) $p['content'])

        ->get();
@endphp

<div
    class="pgb-module-blog pgb-module-blog-{{ $package['id'] }} {{ rC($p['class']) }} {{ renderAdvanced($package['advanced']) }}">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper swiper-blogs">
            @foreach ($blogs as $blog)
                <div class="swiper-slide">
                    <x-blogsubitem :blog="$blog" />
                </div>
                @php
                    unset($blog);
                @endphp
            @endforeach
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
</div>
