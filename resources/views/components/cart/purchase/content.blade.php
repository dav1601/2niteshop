@php
    $orders_all = App\Models\Orders::where('users_id', Auth::id());
    if ($kw) {
        $orders_all = $orders_all->where('id', 'LIKE', $kw . '%');
    }
    $orders_all = $orders_all->get();
@endphp

<div class="tab-pane fade show @if ($type == 0) active @endif" id="type__0" role="tabpanel"
    aria-labelledby="purchase__tab--0">

    <div class="wp__all">
        @if (count($orders_all) > 0)
            @foreach ($orders_all as $order_all)
                <x-client.account.purchase.item :item="$order_all" :type="0" />
            @endforeach
        @else
            <div class="empty__orders">
                <div class="empty__orders--cont">
                    <img src="https://res.cloudinary.com/vanh-tech/image/upload/v1676483824/empty-orders_vvqy5d.png"
                        alt="empty orders">

                </div>
            </div>
        @endif
    </div>
</div>
@foreach (config('orders.status') as $key => $stt)
    <div class="tab-pane fade show @if ($type == $key) active @endif" id="type__{{ $key }}"
        role="tabpanel" aria-labelledby="purchase__tab--{{ $key }}">
        @php
            $orders = App\Models\Orders::orderBy('id', 'DESC')
                ->where('status', '=', $key)
                ->where('users_id', '=', Auth::id())
                ->get();
        @endphp
        <div class="wp__item--{{ $key }}">
            @if (count($orders) > 0)
                @foreach ($orders as $order)
                    <x-client.account.purchase.item :item="$order" :type="$key" />
                @endforeach
            @else
                <div class="empty__orders">
                    <div class="empty__orders--cont">
                        <img src="https://res.cloudinary.com/vanh-tech/image/upload/v1676483824/empty-orders_vvqy5d.png"
                            alt="empty orders">

                    </div>
                </div>
            @endif
        </div>
    </div>
@endforeach
