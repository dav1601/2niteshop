<table class="table table-borderless">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên</th>
            <th scope="col">SĐT</th>
            <th scope="col">SP</th>
            <th scope="col">TT</th>
            <th scope="col">TT SP</th>
            <th scope="col">TT Cọc</th>
            <th scope="col">Số tiền cọc</th>
            <th scope="col">TT Giao</th>
            <th scope="col">TG Nhận</th>
            <th scope="col">TG Đặt</th>
            <th scope="col">Update</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($customers as $cus)
        <tr>
            <td>
                {{ $cus->id }}
            </td>
            <td>
                {{ $cus->name_cus }}
            </td>
            <td>
                {{ $cus->phone }}
            </td>
            <td>
                {{ App\Models\Products::where('id', '=' , $cus->products_id)->first()->name }}
            </td>
            <td>
                {{ Config::get('orders.pre_orders.status.'.$cus->status) }}
                </div>
            </td>
            <td>
                {{ Config::get('orders.pre_orders.status_product.'.$cus->status_product) }}
            </td>
            <td>
                {{ Config::get('orders.pre_orders.deposit.'.$cus->deposit) }}
            </td>
            <td>
                {{ crf($cus->price_deposit) }}
            </td>
            <td>
                {{ Config::get('orders.pre_orders.delivered.'.$cus->delivery_status) }}
            </td>
            <td>
                @if ($cus->delivery_time == NULL)
                Trống
                @else
                @if ($carbon -> create($cus->delivery_time) -> isToday())
                {{ 'Hôm Nay' }}
                @else
                {{ $cus->delivery_time }}
                @endif
                {{-- ------------ --}}
                @endif
            </td>
            <td>
                {{ $cus->created_at }}
            </td>
            <td>
                <a href="{{ route('update_preOrders' , ['id'=>$cus->id]) }}">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
<div class="card-footer p-0" id="preOrder__show--page">
    {!! navi_ajax_page($number , $page , "","justify-content-center" , "mt-2") !!}
</div>
