@extends('layouts.app')
@section('title', $product->name)
@section('meta-desc', $product->des)
@section('meta-keyword', $product->keywords)
@section('news_keywords', $product->keywords)
@section('og-title', $product->name)
@section('og-desc', $product->des)
@if ($product->banner)
    @section('og-image', $file->ver_img($product->banner_link))
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
    @php
        $arrGll = collect($product->gll)
            ->groupBy('size')
            ->toArray();
        $arrIns = collect($product->ins)
            ->groupBy('group')
            ->toArray();
        $list_active = [];
        $data_op = [];
        if (count($arrIns) > 0) {
            foreach ($arrIns as $group => $item_ins) {
                $list_active[$group] = $item_ins[0];
            }
        }
        $policies = collect($product->policies)->filter(function ($plc) {
            return $plc->fullset == 0;
        });
        $fullset = collect($product->policies)
            ->filter(function ($plc) {
                return $plc->fullset != 0;
            })
            ->first();
        $price = 0;
        if (count($arrIns) > 0) {
            if (count($list_active) > 0) {
                foreach ($list_active as $group => $value) {
                    $price += (int) $product->price + (int) $value['price'];
                    $data_op[] = $value['id'];
                }
            }
        } else {
            if ($product->stock != 2) {
                $price = (int) $product->price;
            }
        }
    @endphp

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
                    {{-- @php
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
        @endforeach --}}
                    {{-- <li class="b__crumb--item">
            <i class="fas fa-long-arrow-alt-right"></i>
        </li> --}}
                    <li class="b__crumb--item">
                        {{ $product->name }}
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
                                @foreach ($arrGll[700] as $key => $gll)
                                    <li data-thumb="{{ $file->ver_img($arrGll[80][$key]['link']) }}?now={{ $carbon->now()->timestamp }}"
                                        alt="{{ $product->name }}">
                                        <img src="{{ $file->ver_img($gll['link']) }}?now={{ $carbon->now()->timestamp }}"
                                            alt="{{ $product->name }}" />
                                        <x-productlabels :product="$product" />
                                    </li>
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
                                {{ $product->name }}
                            </div>
                            <div class="prd__dtl--stats">
                                <ul>
                                    <li><span>Nhà Sản Xuất:</span> <a
                                            href="{{ url('producer/' . $product->producer->slug) }}"
                                            class="">{{ $product->producer->name }}</a>
                                    </li>
                                    <li><span>Models: {{ $product->model }}</span></li>
                                </ul>
                            </div>

                            <div class="prd__dtl--price">
                                <span
                                    class="d-block {{ 'price-' . $product->id }} @if ($product->stock == 2) call @endif"
                                    data-price="{{ $price }}">
                                    @if ($product->stock != 2)
                                        {{ crf($price) }}
                                    @else
                                        CALL-{{ getVal('switchboard')->value }}
                                    @endif
                                </span>
                            </div>


                            <div class="prd__dtl--insur">
                                @foreach ($arrIns as $key => $group)
                                    @php
                                        $g = App\Models\bundled_product::where('id', $key)->first();
                                    @endphp
                                    <span class="d-block">{{ $g->name }}:
                                        <strong>*</strong></span>
                                    <ul class="insur" id="{{ 'insur-' . $key }}">
                                        @foreach ($group as $key_2 => $ins)
                                            @php
                                                $active = $list_active[$key]['id'];
                                            @endphp

                                            <li class="insur__item @if ($ins['id'] == $active) insur__item-active @endif"
                                                data-group="{{ $ins['group'] }}" data-id="{{ $ins['id'] }}">
                                                <span>{{ $ins['name'] }}
                                                    (+
                                                    {{ crf($ins['price']) }})
                                                </span>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endforeach

                            </div>

                            <div class="prd__dtl--cart row mx-0">
                                @php
                                    $options = implode(',', $data_op);
                                @endphp
                                <x-client.cart.add.btn :product="$product" :options="$options" />

                            </div>

                        </div>
                        {{-- khuyến mãi đặc biệt --}}
                        @if (count($product->blocks) > 0)
                            <x-client.product.block.module :contents="$product->blocks" />
                        @endif

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
                            @if ($fullset != null)
                                <div class="fullset d-flex align-items-center mb-1">
                                    <div class="fs__left">
                                        {!! $fullset->icon !!}
                                    </div>
                                    <div class="fs__right">
                                        <div class="name">
                                            <span>{{ $fullset->title }}</span>
                                        </div>
                                        <div class="content">
                                            {!! $fullset->content !!}
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

        </div>
        {{-- blog lien quan --}}
        @if (count($product->related_blogs) > 0)
            <div id="home__blogs">
                <div id="home__blogs--content" class="container">
                    <h2 class="related__blogs--title font-weight-bold text-uppercase mb-3" style="font-size: 17px">Bài
                        viết liên
                        quan :</h1>
                        <div id="area__blogs">
                            <div class="tab-content" id="myTabContent__blogs">
                                <div class="tab-pane active" id="tab__blogs" role="tabpanel">
                                    <div class="owl-carousel owl-theme owl-6">
                                        @foreach ($product->related_blogs as $blog_item)
                                            <div class="item">
                                                <x-blogsubitem :blog="$blog_item" />
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
