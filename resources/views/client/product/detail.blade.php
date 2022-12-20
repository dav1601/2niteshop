@extends('layouts.app')
@section('title', $product->name)
@section('meta-desc', $product->des)
@section('meta-keyword', $product->keywords)
@section('news_keywords', $product->keywords)
@section('og-title', $product->name)
@section('og-desc', $product->des)
@if ($banner)
    @section('og-image', $file->ver_img($banner->link))
@endif
@section('og-type', 'detail product')
@section('twitter-title', $product->name)
{{-- end seo meta og twitt --}}
@section('import_js')
    <script src="{{ $file->ver('client/app/js/slide.js') }}"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
@endsection
@section('margin')
@endsection
@section('content')
    @if ($product->bg != null)
        @php
            $bg = asset($product->bg);
        @endphp
        <style>
            body {
                background-image: url({{ $bg }});
                background-attachment: fixed;
                background-repeat: no-repeat;

            }

            #breadCrumb .b__crumb {
                margin-bottom: 0px !important;
            }

            #detail__product--content {
                background: white;
            }

            #biad__header--bot {
                background: white;
                padding-left: 0;
                padding-right: 0;
            }
        </style>
    @endif
    <div id="detail__product" class="dtl__prd">
        <div id="breadCrumb">
            <div class="container">
                <ol class="b__crumb">
                    <li class="b__crumb--item">
                        <i class="fas fa-home"></i>
                    </li>
                    <li class="b__crumb--item">
                        <i class="fas fa-long-arrow-alt-right"></i>
                    </li>
                    @php
                        $index = count($bc);
                    @endphp
                    @foreach ($bc as $key => $b)
                        @php
                            $name = App\Models\Category::select('name')
                                ->where('slug', $b)
                                ->first();
                        @endphp
                        @if ($name)
                            @if ($key != $index && $key != 0)
                                <li class="b__crumb--item">
                                    <i class="fas fa-long-arrow-alt-right"></i>
                                </li>
                            @endif
                            <li class="b__crumb--item">
                                <h1>{{ $name->name }}</h1>
                            </li>
                        @endif
                    @endforeach
                    <li class="b__crumb--item">
                        <i class="fas fa-long-arrow-alt-right"></i>
                    </li>
                    <li class="b__crumb--item">
                        <h1>{{ $product->name }}</h1>
                    </li>
                </ol>
            </div>
        </div>
        <div id="detail__product--content" class="container">
            <div class="w-100">
                <div class="row dtl__prd mx-0">
                    <div class="dtl__prd--left col-md-6 p-0">
                        <div class="w-100 position-relative">
                            <a class="my__action--prev my__action">
                                <i class="fas fa-chevron-up"></i>
                            </a>
                            <a class="my__action--next my__action">
                                <i class="fas fa-chevron-down"></i>
                            </a>
                            <ul id="vertical">
                                @foreach (App\Models\Products::find($product->id)->gll as $gll)
                                    @if ($gll->size == 700)
                                        @php
                                            if (
                                                App\Models\gllProducts::where('products_id', '=', $gll->products_id)
                                                    ->where('index', '=', $gll->index)
                                                    ->where('size', '=', 80)
                                                    ->first()
                                            ) {
                                                $link_80 = App\Models\gllProducts::where('products_id', '=', $gll->products_id)
                                                    ->where('index', '=', $gll->index)
                                                    ->where('size', '=', 80)
                                                    ->first()->link;
                                            } else {
                                                $link_80 = $gll->link;
                                            }
                                        @endphp
                                        <li data-thumb="{{ $file->ver_img($link_80) }}?now={{ $carbon->now()->timestamp }}"
                                            alt="{{ $product->name }}">
                                            <img src="{{ $file->ver_img($gll->link) }}?now={{ $carbon->now()->timestamp }}"
                                                alt="{{ $product->name }}" />
                                            <x-productlabels :product="$product" />
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="w-100 banner__video">
                            @if ($product->banner != null)
                                <div class="prd__banner">
                                    <a href="{{ url($product->banner_link) }}" class="d-block">
                                        <img src="{{ $file->ver_img($product->banner) }}" class="img-fluid"
                                            alt="{{ $product->name }}">
                                    </a>
                                </div>
                            @endif
                            @if ($product->video != null)
                                <div class="prd__video mt-4">
                                    {!! $product->video !!}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="dtl__prd--right col-md-6 pr-0">
                        <div class="w-100" id="prd" class="prd__dtl">

                            <div class="prd__dtl--name">
                                <h1>{{ $product->name }}</h1>
                            </div>
                            <div class="prd__dtl--stats">
                                <ul>
                                    <li><span>Nhà Sản Xuất:</span> <a
                                            href="{{ url('producer/' . $product->producer_slug) }}"
                                            class="">{{ App\Models\Producer::where('id', '=', $product->producer_id)->first()->name }}</a>
                                    </li>
                                    <li><span>Models: {{ $product->model }}</span></li>
                                </ul>
                            </div>
                            @php
                                if ($product->insurance != null) {
                                    $insurance = explode(',', $product->insurance);
                                    $price = $product->price + App\Models\Insurance::where('id', '=', $insurance[0])->first()->price;
                                } else {
                                    if ($product->stock != 2) {
                                        $price = $product->price;
                                    } else {
                                        $price = 0;
                                    }
                                }
                            @endphp
                            <input type="hidden" name="" id="price_prd" value="{{ $product->price }}">
                            <div class="prd__dtl--price">
                                <span class="d-block @if ($product->stock == 2) call @endif"
                                    data-price="{{ $price }}">
                                    @if ($product->stock != 2)
                                        {{ crf($price) }}
                                    @else
                                        CALL-{{ getVal('switchboard')->value }}
                                    @endif
                                </span>
                            </div>

                            @foreach ($product_ins as $group => $item)
                                <div class="prd__dtl--insur">
                                    <span
                                        class="d-block">{{ App\Models\bundled_product::where('id', $group)->first()->name }}:
                                        <strong>*</strong></span>
                                    <ul class="insur">
                                        @foreach ($item as $key => $ins)
                                            <li class="insur__item @if ($key == 0) insur__item-active @endif"
                                                data-price="{{ App\Models\Insurance::where('id', '=', $ins['ins_id'])->first()->price }}"
                                                data-id="{{ $ins['ins_id'] }}">
                                                <span>{{ App\Models\Insurance::where('id', '=', $ins['ins_id'])->first()->name }}
                                                    (+
                                                    {{ crf(App\Models\Insurance::where('id', '=', $ins['ins_id'])->first()->price) }})
                                                </span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                            <div class="prd__dtl--cart row mx-0">
                                @if ($product->stock == 1 && $product->price != 0)
                                    <div class="qty col-1 d-flex w-100 p-0">
                                        <input type="text" name="qty[{{ $product->id }}]"
                                            data-id="{{ $product->id }}" value="1" id="dtl__prd--qty" min="1"
                                            max="1000" class="w-100 input-number">
                                        <div class="btn__type d-flex flex-column">
                                            <a class="btn-number py-0" data-type="plus"
                                                data-field="qty[{{ $product->id }}]"><i class="fas fa-plus"></i></a>
                                            <a class="btn-number py-0" data-type="minus"
                                                data-field="qty[{{ $product->id }}]"><i class="fas fa-minus"></i></a>
                                        </div>
                                    </div>
                                    <a class="btn-cart col-11 p-0" data-id="{{ $product->id }}" id="button-cart"
                                        data-qty="1" data-price="{{ $price }}" data-op="0">
                                        <i class="fas fa-shopping-bag"></i>
                                        <span>Thêm Giỏ Hàng</span>
                                    </a>
                                @else
                                    <a class="col-12 btn-preOrder" data-id="{{ $product->id }}" id="preOrder">
                                        <i class="fas fa-shopping-bag"></i>
                                        <span>Đặt Hàng Ngay</span>
                                    </a>
                                @endif
                            </div>

                        </div>
                        {{-- khuyến mãi đặc biệt --}}
                        <x-client.product.block.module :contents="$blocks" />
                        {{-- trả góp --}}
                        <div class="d-flex w-100 m-0 mb-3 overflow-hidden">
                            <div class="col-6 nblock__installment">
                                <b>trả góp qua thẻ</b>
                                <span>visa,master card</span>
                            </div>
                            <div class="col-6 nblock__installment">
                                <b>trả góp hdsaigon</b>
                                <span>30p nhận máy,chỉ cần cmnd</span>
                            </div>
                        </div>

                        {{-- end detail product --}}
                        <div class="w-100 prd__dtl--contact">
                            <div class="contact">
                                <div class="contact__top">
                                    <span class="d-block"><i class="fas fa-phone-alt"></i> Mua Hàng Liên Hệ Tổng Đài: <a
                                            href="tel:{{ str_replace(' ', '', getVal('switchboard')->value) }}">{{ getVal('switchboard')->value }}</a></span>
                                </div>
                                <div class="contact__bot">
                                    <span>Vui lòng gọi kiểm tra số lượng trước khi tới cửa hàng</span>
                                </div>
                            </div>
                        </div>
                        <div class="w-100 prd__dtl--stars d-flex align-items-center">
                            <div class="rating">
                                <span class="stack">
                                    <i class="far fa-star"></i>
                                </span>
                                <span class="stack">
                                    <i class="far fa-star"></i>
                                </span>
                                <span class="stack">
                                    <i class="far fa-star"></i>
                                </span>
                                <span class="stack">
                                    <i class="far fa-star"></i>
                                </span>
                                <span class="stack">
                                    <i class="far fa-star"></i>
                                </span>
                            </div>
                            <div class="reviews ml-3">
                                <span>Dựa trên 0 Đánh Giá. - Viết đánh giá</span>
                            </div>
                        </div>
                        <div class="w-100 prd__dtl--policy">
                            @if ($fullset != 0)
                                @php
                                    $fs = App\Models\Policy::where('id', '=', $fullset)->first();
                                @endphp
                                <div class="fullset d-flex align-items-center mb-1">
                                    <div class="fs__left">
                                        {!! $fs->icon !!}
                                    </div>
                                    <div class="fs__right">
                                        <div class="name">
                                            <span>{{ $fs->title }}</span>
                                        </div>
                                        <div class="content">
                                            {!! $fs->content !!}
                                        </div>

                                    </div>
                                </div>
                            @endif
                            <div class="policy position-relative">
                                <div class="call position-absolute">
                                    <a href="tel:{{ str_replace(' ', '', getVal('switchboard')->value) }}"><i
                                            class="fas fa-phone-volume"></i> Tổng đài
                                        {{ getVal('switchboard')->value }}</a>
                                    <a href="tel:{{ str_replace('.', '', getVal('hotline')->value) }}"><i
                                            class="fas fa-mobile-alt"></i> HOTLINE {{ getVal('hotline')->value }}</a>
                                </div>
                                <ul class="plc">
                                    @foreach ($policies as $plc)
                                        <li class="plc__item">
                                            <span class="plc__item--icon">
                                                {!! $plc->icon !!}
                                            </span>
                                            <div class="plc__item--content">
                                                <div class="name">
                                                    <span class="d-block"> {{ $plc->title }}</span>
                                                </div>
                                                <div class="content">
                                                    {!! $plc->content !!}
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>

                        {{-- end policy --}}
                        @if ($product->info != null)
                            <div class="w-100 prd__dtl--info">
                                <div class="see__detail w-100 position-absolute">
                                    <a class="see__detail--btn d-block"><i class="fas fa-long-arrow-alt-down pr-1"></i>
                                        <span>Xem chi tiết thông số kỹ thuật</span></a>
                                </div>
                                <div class="info__wrapper w-100">
                                    {!! $product->info !!}
                                </div>
                            </div>
                        @endif
                        {{-- end wp detail right product --}}
                    </div>
                </div>
            </div>
            {{-- end detail product --}}
            <div class="w-100" id="dtlContent">
                <nav>
                    <div class="nav" id="dtl__tabs" role="tablist">
                        <a class="active" data-toggle="tab" href="#dtl__info" role="tab" aria-selected="true">Thông
                            tin chi
                            tiết</a>
                        <a class="" data-toggle="tab" href="#dtl__review" role="tab"
                            aria-selected="false">Đánh giá</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-dtlContent">
                    <div class="tab-pane active w-100" id="dtl__info" role="tabpanel">
                        <div class="see__detail w-100 position-absolute">
                            <a class="see__full--btn d-block"><i class="fas fa-long-arrow-alt-down pr-1"></i>
                                <span>Xem chi tiết bài viết</span></a>
                        </div>
                        <div id="dtl__info--wrapper">
                            {!! $product->content !!}
                        </div>

                    </div>
                    <div class="tab-pane w-100" id="dtl__review" role="tabpanel">2</div>
                </div>
            </div>
            {{-- end detail content product --}}
            <div class="w-100 dtl__bundled">
                @if ($product->type != 'game')
                    @if ($bundled_skin != null || count($bundled_accessory) > 0)
                        <ul class="nav cat__tab" id="myTab__bundled" role="tablist">

                            <li class="" role="presentation">
                                <a class="active active-bundled" data-toggle="tab" href="#tab__aces" role="tab"
                                    aria-controls="home" aria-selected="true">Phụ kiện đi kèm</a>
                            </li>
                            @if ($bundled_skin != null)
                                <li class="nav-item" role="presentation">
                                    <a class="active-bundled" data-toggle="tab" href="#tab__skin" role="tab"
                                        aria-controls="profile" aria-selected="false">
                                        Skin đi kèm
                                        {{-- phân biệt second hand ps4 và phụ kiện nintendo --}}
                                    </a>
                                </li>
                            @endif
                        </ul>
                        <div class="tab-content" id="myTabContent__bundled">
                            <div class="tab-pane active" id="tab__aces" role="tabpanel">
                                @if (count($bundled_accessory) > 0)
                                    <div class="owl-carousel owl-theme owl-6">
                                        @foreach ($bundled_accessory as $aces)
                                            @php
                                                $m = App\Models\Products::where('id', '=', $aces->products_id)->first();
                                            @endphp
                                            <div class="item">
                                                <x-product.itemgrid type="2" class="prddetail" :message="$m" />
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                @endif
                                {{-- endif san pham > 4 --}}

                                {{-- end machine > 0 --}}
                            </div>
                            {{-- end tabs machine --}}
                            @if ($bundled_skin != null)
                                @php
                                    $skin_cat_id = $bundled_skin->skin_cat_id;
                                    $bundled_k = App\Models\Products::where(function ($q) use ($skin_cat_id) {
                                        $q->where('sub_1_cat_id', $skin_cat_id)->orWhere('sub_2_cat_id', $skin_cat_id);
                                    })->get();
                                @endphp
                                <div class="tab-pane" id="tab__skin" role="tabpanel">
                                    @if (count($bundled_k) > 0)
                                        {{-- @if (count($bundled_k) > 4) --}}
                                        <div class="owl-carousel owl-theme owl-6">
                                            @foreach ($access as $aces)
                                                <div class="item">
                                                    <x-product.itemgrid type="2" class="prddetail"
                                                        :message="$aces" />
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <strong>Chưa có skin nào thuộc danh mục này!</strong>
                                    @endif

                                    {{-- end tabs access --}}
                                </div>
                            @endif
                            {{-- end tabs access --}}
                        </div>
                        {{-- end tabs content --}}
                    @endif
                    {{-- end if bundled isset --}}
                @else
                    {{-- end else type game --}}
                    @php
                        $sub_1_cat_id = $product->sub_1_cat_id;
                        $games = App\Models\Products::where('sub_1_cat_id', '=', $sub_1_cat_id);
                        $games = $games
                            ->where('type', 'LIKE', 'game')
                            ->orderBy('id', 'DESC')
                            ->get();
                    @endphp
                    @if (count($games) > 0)
                        <ul class="nav cat__tab" id="myTab__bundled" role="tablist">
                            <li class="" role="presentation">
                                <a class="active active-bundled" data-toggle="tab" href="#tab__games" role="tab"
                                    aria-controls="home" aria-selected="true">Games Liên Quan</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="dtlTabsGamesContent">
                            <div class="tab-pane active" id="tab__games" role="tabpanel">
                                @if (count($games) > 0)
                                    <div class="owl-carousel owl-theme owl-6">
                                        @foreach ($games as $game)
                                            @if ($game->id != $product->id)
                                                <div class="item">
                                                    <x-product.itemgrid type="2" class="prddetail"
                                                        :message="$game" />
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @else
                                @endif
                                {{-- endif san pham > 4 --}}

                                {{-- end machine > 0 --}}
                            </div>
                        </div>
                    @else
                        <strong>Không có games nào liên quan</strong>
                    @endif
                @endif
                @if (count($related_product) > 0)
                    <ul class="nav cat__tab" id="myTab__relate" role="tablist">
                        <li class="" role="presentation">
                            <a class="active active-bundled" data-toggle="tab" href="#tab__relate" role="tab"
                                aria-controls="home" aria-selected="true">Sản Phẩm Mua Kèm</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="dtlTabsRelateContent">
                        <div class="tab-pane active" id="tab__relate" role="tabpanel">
                            @if (count($related_product) > 0)
                                <div class="owl-carousel owl-theme owl-6">
                                    @foreach ($related_product as $rlp)
                                        @php
                                            $prd = App\Models\Products::where('id', '=', $rlp->products_id)->first();
                                        @endphp
                                        @if ($rlp->products_id != $product->id)
                                            <div class="item">
                                                <x-product.itemgrid type="2" class="prddetail" :message="$prd" />
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @else
                            @endif
                            {{-- endif san pham > 4 --}}

                            {{-- end machine > 0 --}}
                        </div>
                    </div>
                @endif
            </div>
            {{-- end phu kien game + skin --}}
            {{-- start bài viết liên quan --}}


            {{-- end bài viết liên quan --}}
        </div>
        {{-- blog lien quan --}}
        @if (count($related_cat_blog) > 0)
            <div id="home__blogs">
                <div id="home__blogs--content" class="container">
                    <h2 class="related__blogs--title font-weight-bold text-uppercase mb-3" style="font-size: 17px">Bài
                        viết liên
                        quan :</h1>
                        <div id="area__blogs">
                            <div class="tab-content" id="myTabContent__blogs">
                                <div class="tab-pane active" id="tab__blogs" role="tabpanel">
                                    <div class="owl-carousel owl-theme owl-6">
                                        @foreach ($related_cat_blog as $blog_item)
                                            @php
                                                $blog = App\Models\Blogs::where('id', '=', $blog_item->posts)->first();
                                            @endphp
                                            <div class="item">
                                                <x-blogsubitem :blog="$blog" />
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        @endif
    </div>



@endsection
