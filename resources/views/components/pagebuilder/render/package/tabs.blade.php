@php
    $p = $package['payload'];
    $content = $p['content'];
    $s = $package['style'];
    $select = ['id', 'name', 'slug', 'price', 'main_img', 'sub_img', 'stock', 'highlight', 'usage_stt', 'created_at', 'num_orders'];
@endphp
<div class="pgb-render-package-tabs a-my-15 w-100 {{ rC($p['class']) }} {{ renderAdvanced($package['advanced']) }}"
    id="{{ $package['id'] }}">
    <ul class="nav pgb-render-nav-tab" id="tabs-nav-{{ $package['id'] }}" role="tablist">
        @if (count($content) > 0)
            @foreach ($content as $key_nav => $tab_nav)
                @php
                    $tab_nav_id = $package['id'] . '-tab-' . $key_nav;
                @endphp
                <style>
                    .pgb-nav-tab-title.active.--{{ $tab_nav_id }} {
                        border-bottom: 1px solid {{ $s['activeColor'] }};
                        color: {{ $s['activeColor'] }};
                    }

                    .pgb-nav-tab-title.--{{ $tab_nav_id }}:hover {
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
                                <a class="pgb-nav-tab-title --{{ $tab_nav_id }} {{ $key_nav === 0 ? 'active' : '' }} cursor-pointer"
                                    id="text-{{ $tab_nav_id }}" role="tab" data-toggle="tab"
                                    data-target="#tab-pane-{{ $tab_nav_id }}">
                                    {{ $tab_nav['title'] ? $tab_nav['title'] : $cat->name }} </a>
                            </li>
                        @else
                            <li class="nav-item" role="presentation">
                                <a class="pgb-nav-tab-title --{{ $tab_nav_id }} {{ $key_nav === 0 ? 'active' : '' }} cursor-pointer"
                                    id="text-game-new-{{ $tab_nav_id }}" role="tab" data-toggle="tab"
                                    data-target="#tab-pane-game-new-{{ $tab_nav_id }}">
                                    Game mới </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="pgb-nav-tab-title --{{ $tab_nav_id }} cursor-pointer"
                                    id="text-game-coming-soon-{{ $tab_nav_id }}" role="tab" data-toggle="tab"
                                    data-target="#tab-pane-game-coming-soon-{{ $tab_nav_id }}">
                                    Game sắp phát hành </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="pgb-nav-tab-title --{{ $tab_nav_id }} cursor-pointer"
                                    id="text-game-hot-{{ $tab_nav_id }}" role="tab" data-toggle="tab"
                                    data-target="#tab-pane-game-hot-{{ $tab_nav_id }}">
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
                            $category = App\Models\Category::with([
                                'products' => function ($query) {
                                    $query->orderBy('id', 'desc')->take(16);
                                },
                            ])->find($tab_pane['value']);
                        @endphp
                        @if ($category->is_game !== 1)
                            <div class="tab-pane pgb-tab-pane {{ $key_pane === 0 ? 'active' : '' }}"
                                id="tab-pane-{{ $tab_pane_id }}" role="tabpanel" aria-labelledby="text-{{ $tab_pane_id }}">
                                <x-client.products.slides :products="$category->products" />

                            </div>
                        @else
                            @php
                                $game_new = [];
                                $game_hot = [];
                                $now = $carbon->now();
                                $game_new = App\Models\Category::with([
                                    'products' => function ($query) {
                                        $query->orderBy('id', 'desc')->take(16);
                                    },
                                ])->find($tab_pane['value']);
                                $game_cms = App\Models\Category::with([
                                    'products' => function ($query) use ($now) {
                                        $query
                                            ->where('date_sold', '>', $now)
                                            ->orderBy('id', 'desc')
                                            ->take(16);
                                    },
                                ])->find($tab_pane['value']);
                                $game_hot = App\Models\Category::with([
                                    'products' => function ($query) {
                                        $query
                                            ->where('num_orders', '>=', 25)
                                            ->orderBy('num_orders', 'desc')
                                            ->take(16);
                                    },
                                ])->find($tab_pane['value']);

                            @endphp
                            <div class="tab-pane pgb-tab-pane {{ $key_pane === 0 ? 'active' : '' }}"
                                id="tab-pane-game-new-{{ $tab_pane_id }}" role="tabpanel"
                                aria-labelledby="text-game-new-{{ $tab_pane_id }}">
                                <x-client.products.slides :products="$game_new->products" />

                            </div>
                            <div class="tab-pane pgb-tab-pane" id="tab-pane-game-coming-soon-{{ $tab_pane_id }}"
                                role="tabpanel" aria-labelledby="text-game-coming-soon-{{ $tab_pane_id }}">
                                <x-client.products.slides :products="$game_cms->products" />

                            </div>
                            <div class="tab-pane pgb-tab-pane" id="tab-pane-game-hot-{{ $tab_pane_id }}" role="tabpanel"
                                aria-labelledby="text-game-hot-{{ $tab_pane_id }}">
                                <x-client.products.slides :products="$game_hot->products" />
                            </div>
                        @endif
                    @break

                    @case('products')
                        @php
                            $products = explode(',', $tab_pane['value']);
                            array_shift($products);
                            $products = App\Models\Products::exclude(['info', 'content'])
                                ->whereIn('id', $products)
                                ->get();
                        @endphp
                        <div class="tab-pane pgb-tab-pane {{ $key_pane === 0 ? 'active' : '' }}"
                            id="tab-pane-{{ $tab_pane_id }}" role="tabpanel" aria-labelledby="text-{{ $tab_pane_id }}">
                            @dump($products)
                            <x-client.products.slides :products="$products" />
                        </div>
                    @break

                    @default
                @endswitch
            @endforeach
        @endif


    </div>

</div>
