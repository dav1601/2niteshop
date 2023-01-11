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
    $options = implode(',', $data_op);
@endphp
<div class="box__sub--btn @if ($product->stock == 3) d-none @endif">
    <x-client.cart.add.btn :product="$product" :options="$options" />
</div>
<div id="wrapperr" class="position-relative">
    <div id="wrapper__detail">
        <div class="row w-100 dtl__sub mx-0 mb-4 pb-4">
            <div class="col-12 col-lg-6 pl-lg-0 dtl__sub--l">
                <div class="w-100" id="wrapper_slide">
                    <div class="control__prev controls">
                        <i class="fas fa-chevron-left"></i>
                    </div>
                    <div class="control__next controls">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                    <ul id="detailSubGallery">
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
            </div>
            <div class="col-12 mt-lg-0 col-lg-6 pr-lg-0 dtl__sub--r mt-3">
                <div class="w-100" class="prd__dtl">
                    <div class="prd__dtl--name">
                        <span>{{ $product->name }}</span>
                    </div>
                    <div class="prd__dtl--stats">
                        <ul>
                            <li><span>Nhà Sản Xuất:</span> <a href="{{ url('producer/' . $product->producer->slug) }}"
                                    class="">{{ $product->producer->name }}</a>
                            </li>
                            <li><span>Models: {{ $product->model }}</span></li>
                        </ul>
                    </div>


                    <input type="hidden" name="" id="price_prd" value="{{ $product->price }}">
                    <div class="prd__dtl--price">

                        <span class="d-block {{ 'price-' . $product->id }} @if ($product->stock == 2) call @endif"
                            data-price="{{ $price }}">
                            @if ($product->stock != 2)
                                {{ crf($price) }}
                            @else
                                CALL-{{ getVal('switchboard')->value }}
                            @endif
                        </span>
                    </div>
                    @if ($product->stock == 1)
                    <div class="prd__dtl--insur">
                        @foreach ($arrIns as $key => $group)
                            @php
                                $g = App\Models\bundled_product::where('id', $key)->first();
                            @endphp
                            <span class="d-block">{{ $g->name }}:
                                <strong>*</strong></span>
                            <ul class="insur" id="{{ 'insur-' . $key }}">
                                @foreach ($group as $key => $ins)
                                    <li class="insur__item @if ($key == 0) insur__item-active @endif"
                                        data-group="{{ $key }}" data-id="{{ $ins['id'] }}">
                                        <span>{{ $ins['name'] }}
                                            (+
                                            {{ crf($ins['price']) }})
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        @endforeach

                    </div>
                    @endif

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
                    {{-- --}}
                    <div class="w-100 prd__dtl--policy">
                        @if ($fullset)
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
                    {{-- --}}
                    {{-- --}}

                </div>
            </div>
        </div>
        {{-- end dtl sub --}}
        <div id="dtl__info--wrapper" class="w-100" style="overflow: hidden">
            <h1 class="info-title">Thông Tin Sản Phẩm</h1>
            {!! $product->content !!}
        </div>

        {{-- end content product --}}

        {{-- end box btn --}}
    </div>
</div>
