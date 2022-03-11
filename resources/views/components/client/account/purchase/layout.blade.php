@php
$orders_all = App\Models\Orders::orderBy('id' , 'DESC')-> where('users_id' , '=' , Auth::id()) -> get();
@endphp
<div class="" id="myTabPurchase" role="tablist">
  <a class="stt__item stt__item--0 @if ($type == 0 ) active @endif" id="purchase__tab--0" data-type="0"
    data-toggle="tab" href="#type__0" role="tab" aria-controls="all" aria-selected="true">Tất Cả</a>
  @foreach (config('orders.status') as $key => $stt )
  <a class="stt__item stt__item--{{ $key }} @if ($type == $key ) active @endif" data-type="{{ $key }}"
    id="purchase__tab--{{ $key }}" data-toggle="tab" href="#type__{{ $key }}" role="tab" aria-controls="{{ $key }}"
    aria-selected="true">{{ $stt }}</a>
  @endforeach
</div>
<div class="tab-content" id="myTabContentPurchase" style="margin-top:10px">
  <div class="tab-pane fade show @if ($type == 0 ) active @endif" id="type__0" role="tabpanel"
    aria-labelledby="purchase__tab--0">
    <div class="_1MmTVs">
      <i class="fas fa-search"></i>
      <input type="text" name="" id="searchBill" placeholder="Tìm kiếm theo ID đơn hàng">
    </div>
    <div class="wp__all">
      @if (count($orders_all) > 0 )
      @foreach ($orders_all as $order_all )
      <x-client.account.purchase.item :item="$order_all" :type="0" />
      @endforeach
      @else
      <div class="empty__orders">
        <div class="empty__orders--cont">
          <img src="{{ $file->ver_img('client/images/empty-orders.png') }}" alt="">
          <span class="d-block mt-2">Chưa có đơn hàng</span>
        </div>
      </div>
      @endif
    </div>
  </div>
  @foreach (config('orders.status') as $key => $stt )
  <div class="tab-pane fade show @if ($type == $key ) active @endif" id="type__{{ $key }}" role="tabpanel"
    aria-labelledby="purchase__tab--{{ $key }}">
    @php
    $orders = App\Models\Orders::orderBy('id' , 'DESC')-> where('status' , '=' , $key) -> where('users_id' , '=' ,
    Auth::id()) -> get();
    @endphp
    <div class="wp__item--{{ $key }}">
      @if (count($orders) > 0 )
      @foreach ($orders as $order )
      <x-client.account.purchase.item :item="$order" :type="$key" />
      @endforeach
      @else
      <div class="empty__orders">
        <div class="empty__orders--cont">
          <img src="{{ $file->ver_img('client/images/empty-orders.png') }}" alt="">
          <span class="d-block mt-2">Chưa có đơn hàng</span>
        </div>
      </div>
      @endif
    </div>
  </div>
  @endforeach
</div>
