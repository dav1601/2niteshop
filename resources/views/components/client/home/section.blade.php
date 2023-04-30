<div class="show__home--box box__{{ $homeItem->id }}">
    <div class="box__banner">
        <div class="box__banner--main">
            <a href="{{ url($homeItem->main_link) }}" class="d-block px-2">
                <img src="{{ $file->ver_img($homeItem->main_img) }}" alt="{{ $homeItem->name }}" class="w-100">
            </a>
        </div>
        <div class="box__banner--sub swiper mySwiper">
            <div class="swiper-wrapper">
                @if ($homeItem->use_img != null)
                    <div class="swiper-slide">
                        <a href="{{ $homeItem->use_link }}" class="d-block pl-2">
                            <img src="{{ $file->ver_img($homeItem->use_img) }}" alt="{{ $homeItem->name }}"
                                class="w-100">
                        </a>
                    </div>
                @endif
                @if ($homeItem->instruct_img != null)
                    <div class="swiper-slide">
                        <a href="{{ $homeItem->instruct_link }}" class="d-block">
                            <img src="{{ $file->ver_img($homeItem->instruct_img) }}" alt="{{ $homeItem->name }}"
                                class="w-100">
                        </a>
                    </div>
                @endif
                @if ($homeItem->access_img != null)
                    <div class="swiper-slide">
                        <a href="{{ $homeItem->access_link }}" class="d-block">
                            <img src="{{ $file->ver_img($homeItem->access_img) }}" alt="{{ $homeItem->name }}"
                                class="w-100">
                        </a>
                    </div>
                @endif
                @if ($homeItem->fix_img != null)
                    <div class="swiper-slide">
                        <a href="{{ $homeItem->fix_link }}" class="d-block">
                            <img src="{{ $file->ver_img($homeItem->fix_img) }}" alt="{{ $homeItem->name }}"
                                class="w-100">
                        </a>
                    </div>
                @endif

            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>
{{-- end box banner --}}
@foreach ($sections as $key => $section)
    @php
        $id = 'section-' . $homeItem->id . $key;
    @endphp
    <div class="box__cat pl-1">
        {{-- end php box cat --}}
        {{-- start box cat -item --}}
        <div class="box__cat--item">
            {{-- danh mục có tab --}}
            <ul class="nav cat__tab" id="myTab__{{ $id }}" role="tablist">
                {{-- @include('client.component.style' , $cf) --}}
                <x-styletabs type="cat" :color="$homeItem->color" />
                @if (count($section) > 0)
                    @foreach ($section as $key_1 => $item_1)
                        @php
                            $id_tab = $id . '-tab-' . $item_1->category->id;
                            $id_nav = $id . '-nav-' . $item_1->category->id;
                        @endphp
                        @if ($item_1->category->is_game)
                            <li class="nav-item" role="presentation">
                                <a class="active" data-toggle="tab" href="#tab__mh--game-hot-{{ $id_tab }}"
                                    role="tab" aria-controls="game-hot" aria-selected="true"
                                    id="{{ 'game-new-' . $id_nav }}">
                                    game hot</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="" data-toggle="tab" href="#tab__mh--game-new-{{ $id_tab }}"
                                    role="tab" aria-controls="game-hot" aria-selected="false"
                                    id="{{ 'game-new-' . $id_nav }}">
                                    game mới</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="" data-toggle="tab" href="#tab__mh--game-future-{{ $id_tab }}"
                                    role="tab" aria-controls="game-future" aria-selected="false"
                                    id="{{ 'game-future-' . $id_nav }}">
                                    game sắp phát hành</a>
                            </li>
                        @else
                            <li class="nav-item" role="presentation">
                                <a class="{{ $key_1 === 0 ? 'active' : '' }}" data-toggle="tab"
                                    href="#tab__mh--{{ $id_tab }}" role="tab" id="{{ $id_nav }}"
                                    aria-controls="{{ 'control-' . $id_tab }}"
                                    aria-selected="{{ $key_1 === 0 ? 'true' : 'false' }}">
                                    {{ $item_1->category->name }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
            {{-- end ul tabs --}}
            {{-- start tabs content --}}
            <div class="tab-content" id="myTabContent__{{ $id }}">
                @if (count($section) > 0)
                    @foreach ($section as $key_2 => $item_2)
                        @php
                            $id_pane = $id . '-tab-' . $item_2->category->id;
                            $id_pane_nav = $id . '-nav-' . $item_2->category->id;
                            $select = ['id', 'name', 'slug', 'price', 'main_img', 'sub_img', 'stock', 'highlight', 'usage_stt', 'created_at'];
                            $game_new = [];
                            $game_hot = [];
                            $game_future = [];
                            if ($item_2->category->is_game) {
                                $game_new = App\Models\ProductCategories::with(['product'])
                                    ->where('category_id', $item_2->category->id)
                                    ->orderBy('products_id', 'desc')
                                    ->take(16)
                                    ->get();
                                $game_hot = App\Models\ProductCategories::with([
                                    'product' => function ($query) use ($select, $carbon) {
                                        $query->select($select)->where('highlight', '=', 2);
                                    },
                                ])
                                    ->whereHas('product', function ($query) use ($select, $carbon) {
                                        $query->select($select)->where('highlight', '=', 2);
                                    })
                                    ->where('category_id', $item_2->category->id)
                                    ->orderBy('products_id', 'desc')
                                    ->get();
                                $game_future = App\Models\ProductCategories::with([
                                    'product' => function ($query) use ($select, $carbon) {
                                        $query->select($select)->where('stock', '=', 2);
                                    },
                                ])
                                    ->whereHas('product', function ($query) use ($select, $carbon) {
                                        $query->select($select)->where('stock', '=', 2);
                                    })
                                    ->where('category_id', $item_2->category->id)
                                    ->orderBy('products_id', 'desc')
                                    ->get();
                            } else {
                                $products = App\Models\ProductCategories::with([
                                    'product' => function ($q) use ($select) {
                                        $q->select($select);
                                    },
                                ])
                                    ->where('category_id', $item_2->category->id)
                                    ->orderBy('products_id', 'desc')
                                    ->take(16)
                                    ->get();
                            }

                        @endphp

                        @if ($item_2->category->is_game)
                            <div class="tab-pane fade {{ $key_2 === 0 ? 'show active' : '' }}"
                                id="tab__mh--game-hot-{{ $id_pane }}" role="tabpanel">
                                <x-client.products.slides :products="$game_hot" />
                            </div>
                            <div class="tab-pane fade" id="tab__mh--game-new-{{ $id_pane }}" role="tabpanel">
                                <x-client.products.slides :products="$game_new" />

                            </div>
                            <div class="tab-pane fade" id="tab__mh--game-future-{{ $id_pane }}" role="tabpanel">
                                <x-client.products.slides :products="$game_future" />

                            </div>
                        @else
                            <div class="tab-pane fade {{ $key_2 === 0 ? 'show active' : '' }}"
                                id="tab__mh--{{ $id_pane }}" role="tabpanel"
                                aria-labelledby="{{ $id_pane_nav }}">
                                <x-client.products.slides :products="$products" />

                            </div>
                        @endif
                    @endforeach
                @endif

            </div>
        </div>

    </div>
@endforeach
</div>
