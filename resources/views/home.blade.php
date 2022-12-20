@extends('layouts.app')
@section('import_js')
    <script src="{{ $file->import_js('home.js') }}"></script>
@endsection
@section('banner')
    <div class="banner">
        <a href="{{ url($banner->link) }}" class="d-block">
            <img src="{{ $file->ver_img($banner->img) }}" alt="{{ $banner->name }}" class="img-fluid lazy">
        </a>
    </div>
@endsection
@section('content')
    @if (getVal('background')->value != null)
        @php
            $bg = $file->ver_img(getVal('background')->value);
        @endphp
        <style>
            body {
                background-image: url({{ $bg }});
                background-attachment: fixed;
                background-repeat: no-repeat;
            }

            #biad__content--home {
                background: white;
                padding-left: 0;
                padding-right: 0;
            }

            #biad__header--bot {
                background: white;
            }

            #biad__header--bot>div {
                padding-left: 0;
                padding-right: 0;
            }

            .show__home {
                padding-left: 10px;
                padding-right: 10px;
            }

            .show__home--box:last-child {
                margin-bottom: 0 !important;
                padding-bottom: 100px;
            }
        </style>
    @endif
    <div id="biad__content--home" class="container">
        <div class="w-100 home">
            <div class="home__left">
                <x-client.menu.menu />
            </div>
            <div class="home__right">
                <div class="home__right--slide">
                    <div id="homeSlide" class="carousel slide w-100" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @for ($i = 0; $i < count($slides); $i++)
                                @if ($i == 0)
                                    <li data-target="#homeSlide" data-slide-to="{{ $i }}" class="active">
                                    </li>
                                @else
                                    <li data-target="#homeSlide" data-slide-to="{{ $i }}"></li>
                                @endif
                            @endfor
                        </ol>
                        <div class="carousel-inner">
                            @foreach ($slides as $key => $slide)
                                @if ($loop->first)
                                    <div class="carousel-item active">
                                        <a href="{{ url($slide->link) }}" class="d-block">
                                            <img class="d-block w-100 img-fluid lazy" alt="{{ $slide->name }}"
                                                src="{{ $file->ver_img($slide->img) }}">
                                        </a>
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <a href="{{ url($slide->link) }}" class="d-block">
                                            <img class="d-block w-100 img-fluid lazy" alt="{{ $slide->name }}"
                                                src="{{ $file->ver_img($slide->img) }}">
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <button class="slide__btn --prev" type="button" data-target="#homeSlide" data-slide="prev">
                            <i class="fas fa-angle-left"></i>
                        </button>
                        <button class="slide__btn --next" type="button" data-target="#homeSlide" data-slide="next">
                            <i class="fas fa-angle-right"></i>
                        </button>
                    </div>
                </div>
                <div class="home__right--banner">
                    @foreach ($banners as $bn)
                        @if ($bn->position == 'Phải')
                            <a href="{{ url($bn->link) }}" class="d-block">
                                <img src="{{ $file->ver_img($bn->img) }}" class="lazy" alt="{{ $bn->name }}"
                                    width="100%" height="auto" alt="{{ $bn->name }}">
                            </a>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
        {{-- END HOME MENU + SLIDE --}}
        <div class="w-100 bot__banner owl-carousel owl-theme">
            @foreach ($banners as $bt)
                @if ($bt->position == 'Dưới')
                    <div class="item bot__banner--item">
                        <a href="{{ url($bt->link) }}" class="d-block w-100">
                            <img src="{{ $file->ver_img($bt->img) }}" class="img-fluid lazy" alt="{{ $bt->name }}">
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
        {{-- END BOTTOM BANNER --}}
        <div class="w-100 owl-carousel owl-theme mb-4">
            <div class="item">
                <a class="d-block w-100">
                    <img src="{{ $file->ver_img_local('client/images/plc-1.png') }}" class="img-fluid lazy" alt="plc-1">
                </a>
            </div>
            <div class="item">
                <a class="d-block w-100">
                    <img src="{{ $file->ver_img_local('client/images/plc-2.png') }}" class="img-fluid lazy" alt="policy">
                </a>
            </div>
            <div class="item">
                <a class="d-block w-100">
                    <img src="{{ $file->ver_img_local('client/images/plc-3.png') }}" class="img-fluid lazy" alt="policy">
                </a>
            </div>
            <div class="item">
                <a class="d-block w-100">
                    <img src="{{ $file->ver_img_local('client/images/plc-4.png') }}" class="img-fluid lazy" alt="policy">
                </a>
            </div>
        </div>
        {{-- --------------- --}}
        <div class="w-100 show__home">
            @foreach ($config as $cf)
                @php
                    $id = $cf->cat;
                    $id_2 = $cf->cat_2;
                    $list_products = [];
                    foreach (
                        App\Models\Category::find($id)
                            ->products()
                            ->select('products_id')
                            ->get()
                            ->toArray()
                        as $item
                    ) {
                        $list_products[] = $item['products_id'];
                    }
                    $list_products_2 = [];
                    if ($cf->cat_2 != null) {
                        foreach (
                            App\Models\Category::find($id_2)
                                ->products()
                                ->select('products_id')
                                ->get()
                                ->toArray()
                            as $item
                        ) {
                            $list_products_2[] = $item['products_id'];
                        }
                    }
                    $machine = App\Models\Products::select('id', 'name', 'slug', 'price', 'main_img', 'sub_img', 'stock', 'new', 'highlight', 'usage_stt')->where(function ($query) use ($id, $list_products) {
                        $query
                            ->where('cat_id', '=', $id)
                            ->orWhere('sub_1_cat_id', '=', $id)
                            ->orWhere('sub_2_cat_id', '=', $id)
                            ->orWhereIn('id', $list_products);
                    });
                    $machine = $machine->where('type', 'LIKE', 'machine')->get();
                    // ////////////////////////////
                    $access = App\Models\Products::select('id', 'name', 'slug', 'price', 'main_img', 'sub_img', 'stock', 'new', 'highlight', 'usage_stt')->where(function ($query) use ($id, $list_products) {
                        $query->where('cat_id', '=', $id)->orWhereIn('id', $list_products);
                    });
                    $access = $access->where('type', 'LIKE', 'access')->get();
                    // ////////////////////////////
                    $machine_2 = App\Models\Products::select('id', 'name', 'slug', 'price', 'main_img', 'sub_img', 'stock', 'new', 'highlight', 'usage_stt')
                        ->where(function ($query) use ($id_2, $list_products_2) {
                            $query->where('cat_id', '=', $id_2)->orWhereIn('id', $list_products_2);
                        })
                        ->where('type', 'LIKE', 'machine')
                        ->get();
                    // ////////////////////////////
                    $access_2 = App\Models\Products::select('id', 'name', 'slug', 'price', 'main_img', 'sub_img', 'stock', 'new', 'highlight', 'usage_stt')->where(function ($query) use ($id_2, $list_products_2) {
                        $query->where('cat_id', '=', $id_2)->orWhereIn('id', $list_products_2);
                    });
                    $access_2 = $access_2
                        ->where('type', 'LIKE', 'access')
                        ->orderBy('id', 'DESC')
                        ->get();
                    // ////////////////////////////
                    if ($cf->tab == 'second') {
                        $access = App\Models\Products::select('id', 'name', 'slug', 'price', 'main_img', 'sub_img', 'stock', 'new', 'highlight', 'usage_stt')
                            ->where('usage_stt', '=', 2)
                            ->where('cat_id', '=', $cf->cat)
                            ->orderBy('id', 'DESC')
                            ->get();
                    }
                    // ////////////////////////////
                    $option = explode(',', $cf->option);
                    // ////////////////////////////
                    $game = App\Models\Products::select('id', 'name', 'slug', 'price', 'main_img', 'sub_img', 'stock', 'new', 'highlight', 'usage_stt')->where(function ($query) use ($id, $id_2, $list_products, $list_products_2) {
                        $query
                            ->where('cat_id', '=', $id)
                            ->orWhereIn('id', $list_products)
                            ->orWhere('cat_id', '=', $id_2)
                            ->orWhereIn('id', $list_products_2);
                    });
                    // ////////////////////////////
                    $game_2 = App\Models\Products::select('id', 'name', 'slug', 'price', 'main_img', 'sub_img', 'stock', 'new', 'highlight', 'usage_stt')->where(function ($query) use ($id, $id_2, $list_products, $list_products_2) {
                        $query
                            ->where('cat_id', '=', $id)
                            ->orWhereIn('id', $list_products)
                            ->orWhere('cat_id', '=', $id_2)
                            ->orWhereIn('id', $list_products_2);
                    });
                    // ////////////////////////////
                    $game_hot = $game
                        ->where('highlight', '=', 2)
                        ->where('type', 'LIKE', 'game')
                        ->orderBy('id', 'DESC')
                        ->get();
                    // ////////////////////////////
                    $game_new = $game_2
                        ->where('new', '=', 1)
                        ->where('stock', '!=', 2)
                        ->where('type', 'LIKE', 'game')
                        ->orderBy('id', 'DESC')
                        ->get();
                    // ////////////////////////////
                    $game_future = App\Models\Products::select('id', 'name', 'slug', 'price', 'main_img', 'sub_img', 'stock', 'new', 'highlight', 'usage_stt')->where(function ($query) use ($id, $id_2) {
                        $query->where('cat_id', '=', $id)->orWhere('cat_id', '=', $id_2);
                    });
                    $game_future = $game_future
                        ->where('stock', '=', 2)
                        ->where('type', 'LIKE', 'game')
                        ->orderBy('id', 'DESC')
                        ->get();
                    // ////////////////////////////

                    if ($cf->cat_digital != null) {
                        $list_digital = [];
                        foreach (
                            App\Models\Category::find($cf->cat_digital)
                                ->products()
                                ->select('products_id')
                                ->get()
                                ->toArray()
                            as $item
                        ) {
                            $list_digital[] = $item['products_id'];
                        }
                        $cat_digital = $cf->cat_digital;
                        $digital = App\Models\Products::select('id', 'name', 'slug', 'price', 'main_img', 'sub_img', 'stock', 'new', 'highlight', 'usage_stt')->where(function ($query) use ($cat_digital, $list_digital) {
                            $query->where('cat_id', '=', $cat_digital)->orWhereIn('id', $list_digital);
                        });
                        $digital = $digital->orderBy('id', 'DESC')->get();
                    } else {
                        $digital = [];
                    }
                    ////////////////////////////
                @endphp
                {{-- end php --}}
                <div class="show__home--box box__{{ $cf->id }} mb-5">
                    <div class="box__banner">
                        <div class="box__banner--main">
                            <a href="{{ url($cf->main_link) }}" class="d-block">
                                <img src="{{ $file->ver_img($cf->main_img) }}" alt="{{ $cf->name }}"
                                    class="img-fluid lazy">
                            </a>
                        </div>
                        <div class="box__banner--sub owl-carousel owl-theme">
                            @if ($cf->use_img != null)
                                <div class="item pl-0">
                                    <a href="{{ $cf->use_link }}" class="d-block">
                                        <img src="{{ $file->ver_img($cf->use_img) }}" alt="{{ $cf->name }}"
                                            class="img-fluid lazy">
                                    </a>
                                </div>
                            @endif
                            @if ($cf->instruct_img != null)
                                <div class="item">
                                    <a href="{{ $cf->instruct_link }}" class="d-block">
                                        <img src="{{ $file->ver_img($cf->instruct_img) }}" alt="{{ $cf->name }}"
                                            class="img-fluid lazy">
                                    </a>
                                </div>
                            @endif
                            @if ($cf->access_img != null)
                                <div class="item">
                                    <a href="{{ $cf->access_link }}" class="d-block">
                                        <img src="{{ $file->ver_img($cf->access_img) }}" alt="{{ $cf->name }}"
                                            class="img-fluid lazy">
                                    </a>
                                </div>
                            @endif
                            @if ($cf->fix_img != null)
                                <div class="item pr-0">
                                    <a href="{{ $cf->fix_link }}" class="d-block">
                                        <img src="{{ $file->ver_img($cf->fix_img) }}" alt="{{ $cf->name }}"
                                            class="img-fluid lazy">
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                    {{-- end box banner --}}
                    <div class="box__cat">
                        {{-- end php box cat --}}
                        {{-- start box cat -item --}}
                        <div class="box__cat--item">
                            @if ($cf->tab != 'none')
                                {{-- danh mục có tab --}}
                                <ul class="nav cat__tab" id="myTab__{{ $cf->id }}" role="tablist">
                                    {{-- @include('client.component.style' , $cf) --}}
                                    <x-styletabs type="cat" :cf="$cf" />
                                    <li class="nav-item" role="presentation">
                                        <a class="active active-{{ $cf->cat }}" data-toggle="tab"
                                            href="#tab__mh--{{ $cf->id }}" role="tab" aria-controls="home"
                                            aria-selected="true">Máy
                                            {{ App\Models\Category::where('id', '=', $cf->cat)->first()->name }}</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="active-{{ $cf->cat }}" data-toggle="tab"
                                            href="#tab__aces--{{ $cf->id }}" role="tab"
                                            aria-controls="profile" aria-selected="false">
                                            @if ($cf->tab != 'second')
                                                Phụ Kiện
                                            @else
                                                Máy PS4 SECOND HAND
                                            @endif
                                            {{-- phân biệt second hand ps4 và phụ kiện nintendo --}}
                                        </a>
                                    </li>
                                </ul>
                                {{-- end ul tabs --}}
                                {{-- start tabs content --}}
                                <div class="tab-content" id="myTabContent__{{ $cf->id }}">
                                    <div class="tab-pane active" id="tab__mh--{{ $cf->id }}" role="tabpanel">
                                        @if (count($machine) > 0)
                                            <div class="owl-carousel owl-theme">
                                                @foreach ($machine as $m)
                                                    <div class="item">
                                                        <x-product.itemgrid type="1" class="prdhome"
                                                            :message="$m" />
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <strong>Hiện chưa có sản phẩm nào</strong>
                                        @endif
                                        {{-- end machine > 0 --}}
                                    </div>
                                    {{-- end tabs machine --}}
                                    <div class="tab-pane" id="tab__aces--{{ $cf->id }}" role="tabpanel">
                                        @if (count($access) > 0)
                                            <div class="owl-carousel owl-theme">
                                                @foreach ($access as $aces)
                                                    <div class="item">
                                                        <x-product.itemgrid type="1" class="prdhome"
                                                            :message="$aces" />
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            @if ($cf->tab == 'second')
                                                <strong>Chưa có sản phẩm second hand!</strong>
                                            @else
                                                <strong>Chưa có phụ kiện nào!</strong>
                                            @endif
                                        @endif
                                        {{-- end tabs access --}}
                                    </div>
                                    {{-- end tabs access --}}
                                </div>
                                {{-- end tabs content --}}
                            @else
                                {{-- danh mục không tabs 1 --}}
                                @if (count($machine) + count($option) > 0)
                                    <div class="owl-carousel owl-theme">
                                        @foreach ($machine as $m)
                                            <div class="item">
                                                <x-product.itemgrid type="1" class="prdhome" :message="$m" />
                                            </div>
                                        @endforeach
                                        {{-- ---- foreach main --}}
                                        @if ($cf->option != null)
                                            @foreach ($option as $op)
                                                @php
                                                    $prd = App\Models\Products::where('id', '=', $op)->first();
                                                @endphp
                                                <div class="item">
                                                    <x-product.itemgrid type="1" class="prdhome"
                                                        :message="$prd" />
                                                </div>
                                            @endforeach
                                        @endif
                                        {{-- end option --}}
                                    </div>
                                @else
                                    <strong>Hiện chưa có sản phẩm nào</strong>
                                @endif
                                {{-- end machine > 0 --}}

                                {{-- end danh mục không tabs 1 --}}
                            @endif
                        </div>
                        {{-- end box cat item 1 --}}
                        @if ($cf->cat_2 != null)
                            {{-- start box cat item 2 --}}
                            <div class="box__cat--item --item-2 mt-5">
                                @if ($cf->tab != 'none')
                                    {{-- danh mục có tab --}}
                                    <ul class="nav cat__tab" id="myTab__{{ $cf->cat_2 }}" role="tablist">
                                        <x-styletabs type="cat_2" :cf="$cf" />
                                        <li class="" role="presentation">
                                            <a class="active active-{{ $cf->cat_2 }}" data-toggle="tab"
                                                href="#tab__mh--{{ $cf->cat_2 }}" role="tab" aria-controls="home"
                                                aria-selected="true">Máy
                                                {{ App\Models\Category::where('id', '=', $cf->cat_2)->first()->name }}</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="active-{{ $cf->cat_2 }}" data-toggle="tab"
                                                href="#tab__aces--{{ $cf->cat_2 }}" role="tab"
                                                aria-controls="profile" aria-selected="false">
                                                @if ($cf->tab != 'second')
                                                    Phụ Kiện
                                                @else
                                                    Máy PS4 SECOND HAND
                                                @endif
                                                {{-- phân biệt second hand ps4 và phụ kiện nintendo --}}
                                            </a>
                                        </li>
                                    </ul>
                                    {{-- end ul tabs --}}
                                    {{-- start tabs content --}}
                                    <div class="tab-content" id="myTabContent__{{ $cf->cat_2 }}">
                                        <div class="tab-pane active" id="tab__mh--{{ $cf->cat_2 }}" role="tabpanel">
                                            @if (count($machine_2) > 0)
                                                <div class="owl-carousel owl-theme">
                                                    @foreach ($machine_2 as $m_2)
                                                        <div class="item">
                                                            <x-product.itemgrid type="1" class="prdhome"
                                                                :message="$m_2" />
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @else
                                                <strong>Hiện chưa có sản phẩm nào</strong>
                                            @endif
                                            {{-- end machine > 0 --}}
                                        </div>
                                        {{-- end tabs machine --}}
                                        <div class="tab-pane" id="tab__aces--{{ $cf->cat_2 }}" role="tabpanel">
                                            @if (count($access_2) > 0)
                                                <div class="owl-carousel owl-theme">
                                                    @foreach ($access_2 as $aces_2)
                                                        <div class="item">
                                                            <x-product.itemgrid type="1" class="prdhome"
                                                                :message="$aces_2" />
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @else
                                                @if ($cf->tab == 'second')
                                                    <strong>Chưa có sản phẩm second hand!</strong>
                                                @else
                                                    <strong>Chưa có phụ kiện nào!</strong>
                                                @endif
                                            @endif
                                            {{-- end tabs access --}}
                                        </div>
                                        {{-- end tabs access --}}
                                    </div>
                                    {{-- end tabs content --}}
                                @else
                                    {{-- danh mục không tab --}}
                                @endif
                                {{-- endif --}}
                            </div>
                            {{-- end box cat item-2 --}}
                        @endif
                        {{-- end box cat --}}
                    </div>
                    {{-- end box cat --}}
                    <div class="box__game mt-5">
                        <div class="box__game--1">
                            <ul class="nav cat__tab" id="gameTab__{{ $cf->id }}" role="tablist">
                                <x-styletabs type="cat" :cf="$cf" />
                                <li class="" role="presentation">
                                    <a class="active active-{{ $cf->id }}" data-toggle="tab"
                                        href="#tab__gameNew--{{ $cf->id }}" role="tab" aria-controls="home"
                                        aria-selected="true">Game Mới</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="active-{{ $cf->id }}" data-toggle="tab"
                                        href="#tab__gameHot--{{ $cf->id }}" role="tab" aria-controls="profile"
                                        aria-selected="false">
                                        Game hot
                                    </a>
                                </li>
                                @if ($cf->cat_digital != null)
                                    <li class="nav-item" role="presentation">
                                        <a class="active-{{ $cf->id }}" data-toggle="tab"
                                            href="#tab__digital--{{ $cf->id }}" role="tab"
                                            aria-controls="profile" aria-selected="false">
                                            {{ App\Models\Category::where('id', '=', $cf->cat_digital)->first()->name }}
                                        </a>
                                    </li>
                                @endif
                            </ul>
                            {{-- start content tabs game 1 --}}
                            <div class="tab-content" id="myTabGame__{{ $cf->id }}">
                                <div class="tab-pane active" id="tab__gameNew--{{ $cf->id }}" role="tabpanel">
                                    @if (count($game_new) > 0)
                                        <div class="owl-carousel owl-theme">
                                            @foreach ($game_new as $gn)
                                                <div class="item">
                                                    <x-product.itemgrid type="1" class="prdhome"
                                                        :message="$gn" />
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <strong>Hiện chưa có game nào</strong>
                                    @endif
                                    {{-- endfif game new --}}
                                </div>
                                <div class="tab-pane" id="tab__gameHot--{{ $cf->id }}" role="tabpanel">
                                    @if (count($game_hot) > 0)
                                        <div class="owl-carousel owl-theme">
                                            @foreach ($game_hot as $gh)
                                                <div class="item">
                                                    <x-product.itemgrid type="1" class="prdhome"
                                                        :message="$gh" />
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <strong>Hiện chưa có game hot nào</strong>
                                    @endif
                                </div>
                                @if ($cf->cat_digital != null)
                                    <div class="tab-pane" id="tab__digital--{{ $cf->id }}" role="tabpanel">
                                        @if (count($digital) > 0)
                                            <div class="owl-carousel owl-theme">
                                                @foreach ($digital as $dgt)
                                                    <div class="item">
                                                        <x-product.itemgrid type="1" class="prdhome"
                                                            :message="$dgt" />
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <strong>Hiện chưa có thẻ
                                                {{ App\Models\Category::where('id', '=', $cf->cat_digital)->first()->name }}
                                                nào</strong>
                                        @endif
                                    </div>
                                @endif
                            </div>
                            {{-- end tabs box game 1 --}}
                        </div>
                        <div class="box__game--2 mt-5">
                            <ul class="nav cat__tab" id="gameTabFut__{{ $cf->id }}" role="tablist">
                                <x-styletabs type="id" :cf="$cf" />
                                <li class="" role="presentation">
                                    <a class="active active-{{ $cf->id }}" data-toggle="tab"
                                        href="#tab__gameFut--{{ $cf->id }}" role="tab" aria-controls="home"
                                        aria-selected="true">game sắp phát hành</a>
                                </li>

                            </ul>
                            {{-- start content tabs game 1 --}}
                            <div class="tab-content" id="myTabGameFut__{{ $cf->id }}">
                                <div class="tab-pane active" id="tab__gameFut--{{ $cf->id }}" role="tabpanel">
                                    @if (count($game_future) > 0)
                                        <div class="owl-carousel owl-theme">
                                            @foreach ($game_future as $gf)
                                                <div class="item">
                                                    <x-product.itemgrid type="1" class="prdhome"
                                                        :message="$gf" />
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <strong>Hiện chưa có game nào</strong>
                                    @endif
                                </div>
                            </div>
                            {{-- end tabs box game 1 --}}
                        </div>
                        {{-- end bõ game 2 --}}
                    </div>
                    @if ($cf->tab == 'none')
                        @php
                            $access_items = App\Models\Products::where(function ($query) use ($id, $list_products) {
                                $query->where('cat_id', '=', $id)->orWhereIn('id', $list_products);
                            });
                            $access_items = $access_items->where('type', 'LIKE', 'access')->get();
                        @endphp
                        <div class="box__access mt-5">
                            <ul class="nav cat__tab" id="accessTabFut__{{ $cf->id }}" role="tablist">
                                <x-styletabs type="id" :cf="$cf" />
                                <li class="" role="presentation">
                                    <a class="active active-{{ $cf->id }}" data-toggle="tab"
                                        href="#tab__accessFut--{{ $cf->id }}" role="tab" aria-controls="home"
                                        aria-selected="true">Phụ kiện đi kèm</a>
                                </li>
                            </ul>
                            {{-- start content tabs game 1 --}}
                            <div class="tab-content" id="myTabAccessFut__{{ $cf->id }}">
                                <div class="tab-pane active" id="tab__accessFut--{{ $cf->id }}" role="tabpanel">
                                    @if (count($access_items) > 0)
                                        <div class="owl-carousel owl-theme">
                                            @foreach ($access_items as $aci)
                                                <div class="item">
                                                    <x-product.itemgrid type="1" class="prdhome"
                                                        :message="$aci" />
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <strong>Hiện chưa có phụ kiện nào</strong>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                    {{-- end box game --}}
                    {{-- end show home box --}}
                </div>
            @endforeach
        </div>
    </div>
    {{-- start home__blogs --}}
    <div id="home__blogs">
        <div id="home__blogs--content" class="container">
            <a href="{{ url('tin-tuc') }}" id="home__blogs--title">
                <img src="{{ $file->ver_img_local('client/images/bang-tin-home-banner-1280x80.jpg') }}" alt="Bảng Tin"
                    class="img-fluid lazy">
            </a>
            <div id="area__blogs">
                <div class="tab-content" id="myTabContent__blogs">
                    <div class="tab-pane active" id="tab__blogs" role="tabpanel">
                        <div class="owl-carousel owl-theme owl-6">
                            @foreach (App\Models\Blogs::select('id', 'title', 'slug', 'desc', 'img', 'cat_id', 'cat_sub_id', 'author', 'views', 'active', 'created_at', 'updated_at')->where('active', '=', 1)->orderBy('id', 'DESC')->limit(8)->get() as $invo)
                                <div class="item">
                                    <x-blogsubitem :blog="$invo" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end home__blogs --}}

@endsection
