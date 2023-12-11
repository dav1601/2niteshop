<table class="table-borderless table">
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
            {{-- <th scope="col">Xuất hoá đơn</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($orders->data as $ord)
            <tr>
                <td>{{ $ord->id }}</td>
                <td class="text-name-email">{{ $ord->name }}</td>
                <td>{{ crf($ord->total) }}</td>
                <td class="text-name-email">{{ $ord->email }}</td>
                <td>{{ $ord->phone }}</td>
                <td>
                    {{ $ord->payment }}
                </td>
                <td>
                    {!! Config::get('orders.badges.' . $ord->status) !!}
                </td>
                <td>
                    {!! Config::get('orders.badges_paid.' . $ord->paid) !!}
                </td>
                <td>
                    {{ $ord->prov }}
                </td>
                <td>
                    <a href="{{ route('detail_order', ['id' => $ord->id]) }}">
                        <i class="fas fa-eye"></i>
                    </a>
                </td>
                {{-- @if ($ord->status == 3)
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('export_invoice', ['id' => $ord->id]) }}" class="export_invoice text-center"
                            target="_blank">
                            <i class="fa-solid fa-file-export"></i>
                        </a>
                    </td>
                @endif --}}
            </tr>
        @endforeach
    </tbody>

</table>
<div class="card-footer p-0" id="orders_show--page">
    <x-pagination :number_page="$orders->number_page" :page="$orders->page" />
</div>
