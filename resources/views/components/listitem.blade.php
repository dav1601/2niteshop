<div class="product__item--list d-flex reval-item flex-wrap" data-id="{{ $message->id }}">
    <div class="image position-relative" data-id="{{ $message->id }}">
        <a href="{{ route('detail_product', ['slug'=>$message->slug]) }}" class="image__main">
            <img src="{{ $file->ver_img($message ->main_img) }}" alt="{{ $message->name }}" class="img-fluid">
        </a>
        <a href="{{ route('detail_product', ['slug'=>$message->slug]) }}" class="image__sub">
            <img src="{{ $file->ver_img($message ->sub_img) }}" alt="{{ $message->name }}" class="img-fluid">
        </a>
        <div class="quick__view qv__{{ $message->id }}" data-toggle="tooltip" data-placement="top" title="Xem Nhanh" class="open__modal--qview"
            data-id="{{ $message->id }}">
            <i class="fas fa-plus"></i>
        </div>
        <x-productlabels :product="$message" />
    </div>
    <div class="info__product">
        <div class="prdcer">
            <span>Nhà sản xuất: <a href="{{ route('producer', ['slug'=>$message->producer_slug]) }}">{{
                    App\Models\Producer::where('id', '=' ,$message->producer_id )->first()->name }}</a></span>
        </div>
        <div class="name">
            <a href="{{ route('detail_product', ['slug'=>$message->slug]) }}" class="d-block">{{ $message -> name }}</a>
        </div>
        <div class="des">
            <p>{{ $message -> des }}</p>
        </div>
        <div class="price">
            @if ($message -> price != 0)
            <span id="price__{{ $message->id }}">{{ crf($message->price) }}</span>
            @else
            <span id="price__{{ $message->id }}">CALL-{{ getVal("switchboard")->value }}</span>
            @endif
        </div>
        <div class="prd__dtl--cart row mx-0">
            <div class="qty col-1 p-0 d-flex w-100">
                <input type="text" name="qty[{{ $message->id }}]" data-id="{{ $message->id }}" value="1"
                    id="dtl__prd--qty" min="1" max="1000" class="w-100 input-number" data-prd="{{ $message ->price}}">
                <div class="btn__type d-flex flex-column">
                    <a class="btn-number py-0" data-type="plus" data-field="qty[{{ $message->id }}]"><i
                            class="fas fa-plus"></i></a>
                    <a class="btn-number py-0" data-type="minus" data-field="qty[{{ $message->id }}]"><i
                            class="fas fa-minus"></i></a>
                </div>
            </div>
            <a class="btn-cart btn-cart-{{ $message->id }} col-11 p-0" data-id="{{ $message->id }}" id="button-cart" data-qty="1"
                data-price="{{ $message->price }}" data-op="0">
                <i class="fas fa-shopping-bag"></i>
                <span>Thêm Giỏ Hàng</span>
            </a>
        </div>
    </div>
</div>
