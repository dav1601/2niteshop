@php
    $p = $package['payload'];
    $content = $p['content'];
    $s = $package['style'];
    $select = ['id', 'name', 'slug', 'price', 'main_img', 'sub_img', 'stock', 'highlight', 'usage_stt', 'created_at'];
@endphp
<div class="pgb-render-package-tabs w-100 {{ rC($p['class']) }} {{ renderAdvanced($package['advanced']) }}"
    id="{{ $package['id'] }}">
    <ul class="nav pgb-render-nav-tab" id="tabs-nav-{{ $package['id'] }}" role="tablist">
        @if (count($content) > 0)
            @foreach ($content as $key_nav => $tab_nav)
                @php
                    $tab_nav_id = $package['id'] . '-tab-' . $key_nav;
                @endphp
                <style>
                    .pgb-nav-tab-title.active {
                        border-bottom: 1px solid {{ $s['activeColor'] }};
                        color: {{ $s['activeColor'] }};
                    }

                    .pgb-nav-tab-title:hover {
                        text-decoration: none;
                        border-bottom: 1px solid {{ $s['activeColor'] }};
                        color: {{ $s['activeColor'] }};
                    }
                </style>
                @switch($tab_nav['type'])
                    @case('category')
                        @php
                            $cat = App\Models\Category::where('id', '=', $tab_nav['value'])->first();

                        @endphp
                        @if ($cat->is_game != 1)
                            <li class="nav-item" role="presentation">
                                <a class="pgb-nav-tab-title {{ $key_nav === 0 ? 'active' : '' }} cursor-pointer"
                                    id="text-{{ $tab_nav_id }}" role="tab" data-toggle="tab"
                                    data-target="#tab-pane-{{ $tab_nav_id }}">
                                    {{ $tab_nav['title'] }} </a>
                            </li>
                        @else
                            <li class="nav-item" role="presentation">
                                <a class="pgb-nav-tab-title {{ $key_nav === 0 ? 'active' : '' }} cursor-pointer"
                                    id="text-game-new-{{ $tab_nav_id }}" role="tab" data-toggle="tab"
                                    data-target="#tab-pane-game-new-{{ $tab_nav_id }}">
                                    Game mới </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="pgb-nav-tab-title cursor-pointer" id="text-game-hot-{{ $tab_nav_id }}"
                                    role="tab" data-toggle="tab" data-target="#tab-pane-game-hot-{{ $tab_nav_id }}">
                                    Game hot </a>
                            </li>
                        @endif
                    @break

                    @case('products')
                        <li class="nav-item" role="presentation">
                            <a class="pgb-nav-tab-title {{ $key_nav === 0 ? 'active' : '' }} cursor-pointer"
                                id="text-{{ $tab_nav_id }}" role="tab" data-toggle="tab"
                                data-target="#tab-pane-{{ $tab_nav_id }}">
                                {{ $tab_nav['title'] }} </a>
                        </li>
                    @break

                    @default
                @endswitch
            @endforeach
        @endif

    </ul>
    <div class="tab-content mt-4" id="tabs-content-{{ $package['id'] }}">
        @if (count($content) > 0)

            @foreach ($content as $key_pane => $tab_pane)
                @php
                    $tab_pane_id = $package['id'] . '-tab-' . $key_pane;
                @endphp
                @switch($tab_pane['type'])
                    @case('category')
                        @php

                            $category = App\Models\Category::where('id', $tab_pane['value'])->first();
                        @endphp
                        @if ($category->is_game != 1)
                            @php
                                $products = App\Models\ProductCategories::with([
                                    'product' => function ($query) use ($select) {
                                        $query->select($select);
                                    },
                                ])
                                    ->where('category_id', '=', $tab_pane['value'])
                                    ->get();
                            @endphp
                            <div class="tab-pane pgb-tab-pane {{ $key_pane === 0 ? 'active' : '' }}"
                                id="tab-pane-{{ $tab_pane_id }}" role="tabpanel" aria-labelledby="text-{{ $tab_pane_id }}">
                                <x-client.products.slides :products="$products" />
                            </div>
                        @else
                            @php
                                $game_new = [];
                                $game_hot = [];
                                $game_new = App\Models\ProductCategories::with([
                                    'product' => function ($query) use ($select) {
                                        $query->select($select);
                                    },
                                ])
                                    ->where('category_id', $tab_pane['value'])
                                    ->orderBy('products_id', 'desc')
                                    ->take(16)
                                    ->get();
                                $game_hot = App\Models\ProductCategories::whereHas('product', function ($query) use ($select) {
                                    $query->select($select)->where('highlight', '=', 2);
                                })
                                    ->with([
                                        'product' => function ($query) use ($select) {
                                            $query->select($select)->where('highlight', '=', 2);
                                        },
                                    ])

                                    ->where('category_id', $tab_pane['value'])
                                    ->orderBy('products_id', 'desc')
                                    ->get();

                            @endphp
                            <div class="tab-pane pgb-tab-pane {{ $key_pane === 0 ? 'active' : '' }}"
                                id="tab-pane-game-new-{{ $tab_pane_id }}" role="tabpanel"
                                aria-labelledby="text-game-new-{{ $tab_pane_id }}">
                                <x-client.products.slides :products="$game_new" />

                            </div>
                            <div class="tab-pane pgb-tab-pane" id="tab-pane-game-hot-{{ $tab_pane_id }}" role="tabpanel"
                                aria-labelledby="text-game-hot-{{ $tab_pane_id }}">
                                <x-client.products.slides :products="$game_hot" />
                            </div>
                        @endif
                    @break

                    @case('products')
                        @php
                            $products = explode(',', $tab_pane['value']);
                            array_shift($products);
                            $products = App\Models\Products::select($select)
                                ->whereIn('id', $products)
                                ->get();
                        @endphp
                        <div class="tab-pane pgb-tab-pane {{ $key_pane === 0 ? 'active' : '' }}"
                            id="tab-pane-{{ $tab_pane_id }}" role="tabpanel" aria-labelledby="text-{{ $tab_pane_id }}">
                            <x-client.products.slides :products="$products" />
                        </div>
                    @break

                    @default
                @endswitch
            @endforeach
        @endif


    </div>

</div>
