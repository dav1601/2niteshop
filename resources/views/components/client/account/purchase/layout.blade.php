<div class="" id="myTabPurchase" role="tablist">
    <a class="stt__item stt__item--0 @if ($type == 0) active @endif" id="purchase__tab--0" data-type="0"
        data-toggle="tab" href="#type__0" role="tab" aria-controls="all" aria-selected="true">Tất Cả</a>
    @foreach (config('orders.status') as $key => $stt)
        <a class="stt__item stt__item--{{ $key }} @if ($type == $key) active @endif"
            data-type="{{ $key }}" id="purchase__tab--{{ $key }}" data-toggle="tab"
            href="#type__{{ $key }}" role="tab" aria-controls="{{ $key }}"
            aria-selected="true">{{ $stt }}</a>
    @endforeach
</div>
<div class="_1MmTVs">
    <i class="fas fa-search"></i>
    <input type="text" name="" value="" id="searchBill" placeholder="Tìm kiếm theo ID đơn hàng">
</div>
<div class="tab-content" id="myTabContentPurchase" style="margin-top:10px">
        <x-cart.purchase.content :type="$type" />
</div>
