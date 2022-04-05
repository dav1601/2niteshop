@php
$fullset = 0;
$policies = array();
$policy = App\Models\Products::find($product->id)->policies;
foreach ($policy as $item) {
if (App\Models\Policy::where('id', '=', $item->plc_id)->first()->fullset == 1) {
$fullset = $item->plc_id;
} else {
$policies[] = App\Models\Policy::where('id', '=', $item->plc_id)->first();
}
}
$policies = collect($policies);
$policies = $policies->sortBy('position');
$product_ins = collect(App\Models\Products::find($product->id)->ins()->get()->toArray())->groupBy('group_id');
if (count($product_ins) > 0) {
$price = $product->price + App\Models\Insurance::where('id', '=' , $product_ins->first()[0]['ins_id'])->first()->price;
} else {
$price = $product->price;
}
@endphp
<div class="box__sub--btn    @if ($product->stock==3) d-none @endif">
    <div class="prd__dtl--cart row mx-0">
        @if($product->stock == 1 && $product->price != 0)
        <div class="qty col-1 p-0 d-flex w-100">
            <input type="text" name="qty[{{ $product->id }}]" data-id="{{ $product->id }}" value="1" id="dtl__prd--qty"
                min="1" max="1000" class="w-100 input-number">
            <div class="btn__type d-flex flex-column">
                <a class="btn-number py-0" data-type="plus" data-field="qty[{{ $product->id }}]"><i
                        class="fas fa-plus"></i></a>
                <a class="btn-number py-0" data-type="minus" data-field="qty[{{ $product->id }}]"><i
                        class="fas fa-minus"></i></a>
            </div>
        </div>
        <a class="btn-cart col-11 p-0" data-id="{{ $product->id }}" id="button-cart" data-qty="1"
            data-price="{{ $price }}" data-op="0">
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
<div id="wrapperr" class="position-relative">
    <div id="wrapper__detail">
        <div class="row mx-0 w-100 dtl__sub mb-4 pb-4">
            <div class="col-12  col-lg-6 pl-lg-0 dtl__sub--l">
                <div class="w-100" id="wrapper_slide">
                    <div class="control__prev controls">
                        <i class="fas fa-chevron-left"></i>
                    </div>
                    <div class="control__next controls">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                    <ul id="detailSubGallery">
                        @foreach (App\Models\Products::find($product->id)->gll as $gll )
                        @if ($gll -> size == 700)
                        @php
                        if (App\Models\gllProducts::where('products_id' , '=' , $gll->products_id) -> where('index',
                        '=', $gll->index) -> where('size' , '=' , 80) -> first()) {
                        $link_80 = App\Models\gllProducts::where('products_id' , '=' , $gll->products_id) ->
                        where('index' , '=' , $gll->index) -> where('size' , '=' , 80) -> first()->link;
                        } else {
                        $link_80 = $gll->link;
                        }
                        @endphp
                        <li data-thumb="{{ $file->ver_img($link_80) }}" class="position-relative">
                            <img src="{{ $file->ver_img($gll->link) }}" />
                            <x-productlabels :product="$product" />
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-12 mt-lg-0 mt-3 col-lg-6 pr-lg-0 dtl__sub--r">
                <div class="w-100" class="prd__dtl">
                    <div class="prd__dtl--name">
                        <span>{{ $product->name }}</span>
                    </div>
                    <div class="prd__dtl--stats">
                        <ul>
                            <li><span>Nhà Sản Xuất:</span> <a href="{{ url('producer/'.$product->producer_slug) }}"
                                    class="">{{ App\Models\Producer::where('id', '=' ,
                                    $product->producer_id)->first()->name }}</a></li>
                            <li><span>Models: {{ $product->model }}</span></li>
                        </ul>
                    </div>


                    <input type="hidden" name="" id="price_prd" value="{{ $product->price }}">
                    <div class="prd__dtl--price">
                        <span class="d-block  @if ($product->stock == 2 ) call @endif"
                            data-price="{{ $price }}">@if($product->stock!=2)
                            {{ crf($price) }}
                            @else
                            CALL-{{ getVal('switchboard') ->value }}
                            @endif</span>
                    </div>
                    @foreach ($product_ins as $group => $item )
                    <div class="prd__dtl--insur">
                        <span class="d-block">{{ App\Models\bundled_product::where('id', $group)->first()->name }}:
                            <strong>*</strong></span>
                        <ul class="insur">
                            @foreach ( $item as $key => $ins )
                            <li class="insur__item @if ($key == 0) insur__item-active @endif"
                                data-price="{{ App\Models\Insurance::where('id', '=' ,  $ins['ins_id'])->first()->price }}"
                                data-id="{{ $ins['ins_id'] }}">
                                <span>{{ App\Models\Insurance::where('id', '=' , $ins['ins_id'])->first()->name }} (+ {{
                                    crf(App\Models\Insurance::where('id', '=' , $ins['ins_id'])->first()->price)
                                    }})</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                    <div class="w-100 prd__dtl--contact">
                        <div class="contact">
                            <div class="contact__top">
                                <span class="d-block"><i class="fas fa-phone-alt"></i> Mua Hàng Liên Hệ Tổng Đài: <a
                                        href="tel:{{str_replace(' ', '', getVal('switchboard')->value)}}">{{
                                        getVal('switchboard')->value }}</a></span>
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
                        @if ($fullset != 0)
                        @php
                        $fs = App\Models\Policy::where('id', '=' , $fullset)->first();
                        @endphp
                        <div class="fullset mb-1 d-flex align-items-center">
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
                                <a href="tel:{{str_replace(' ', '', getVal('switchboard')->value)}}"><i
                                        class="fas fa-phone-volume"></i> Tổng đài {{ getVal('switchboard')->value }}</a>
                                <a href="tel:{{ str_replace('.', '', getVal('hotline')->value)}}"><i
                                        class="fas fa-mobile-alt"></i> HOTLINE {{ getVal('hotline')->value }}</a>
                            </div>
                            <ul class="plc">
                                @foreach ($policies as $plc )
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
