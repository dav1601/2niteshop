<table class="table table-borderless">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên khách hàng</th>
            <th scope="col">Wallet</th>
            <th scope="col">VIP</th>
            <th scope="col">Email</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Tỉnh</th>
            <th scope="col">Quận/Huyện</th>
            <th scope="col">Phường/Xã</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($customers as $cus)
        <tr>
            <td>
                {{ $cus->id }}
            </td>
            <td>
                {{ $cus->name }}
            </td>
            <td>
                {{ crf($cus->wallet) }}
            </td>
            <td>
                <div class="buttons">
                    <div class="button-admin all button-vip-{{ $cus->vip }}">
                     <span class="admin">
                       VIP {{ $cus->vip }}
                     </span>
                    </div>
                    <br/>
                  </div>
            </td>
            <td>
                {{ $cus->email }}
            </td>
            <td>
                {{ $cus->phone }}
            </td>
            <td>
                {{ $cus->p }}
            </td>
            <td>
                {{ $cus->d }}
            </td>
            <td>
                {{ $cus->w }}
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
<div class="card-footer p-0" id="customers_show--page">
    {!! navi_ajax_page($number , $page , "","justify-content-center" , "mt-2") !!}
</div>
