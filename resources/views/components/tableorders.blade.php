<table class="table table-borderless">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên khách hàng</th>
            <th scope="col">Giá trị</th>
            <th scope="col">Email</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Hình thức TT</th>
            <th scope="col">Trạng thái ĐH</th>
            <th scope="col">Thanh Toán ĐH</th>
            <th scope="col">Tỉnh</th>
            <th scope="col">Xem</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order as $ord)
        <tr>
            <td>{{ $ord -> id }}</td>
            <td>{{ $ord -> name }}</td>
            <td>{{ crf($ord->total) }}</td>
            <td>{{ $ord->email }}</td>
            <td>{{ $ord -> phone }}</td>
            <td>
                {{ $ord->payment }}
            </td>
            <td>
                {!! Config::get('orders.badges.'.$ord->status) !!}
            </td>
            <td>
                {!! Config::get('orders.badges_paid.'.$ord->paid) !!}
            </td>
            <td>
                {{ $ord->prov }}
            </td>
            <td>
                <a href="{{ route('detail_order', ['id'=>$ord->id]) }}">
                    <i class="fas fa-eye"></i>
                </a>
            </td>

        </tr>
        @endforeach
    </tbody>

</table>
<div class="card-footer p-0" id="orders_show--page">
  @if ($number > 1)
  {!! navi_ajax_page($number , $page , "","justify-content-center" , "mt-2") !!}
  @endif
</div>

