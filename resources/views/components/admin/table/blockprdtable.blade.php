@dd($data)
<table class="table-borderless table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tiêu Đề</th>
            <th scope="col">Edit</th>
            <th scope="col">Xoá</th>
            <th scope="col">Created_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data->blocks as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td>
                    <a href="{{ route('product_block_handle', ['type' => 'edit', 'block_id' => $item->id]) }}">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </td>
                <td>
                    <a href="{{ route('product_block_handle', ['block_id' => $item->id, 'type' => 'delete']) }}">
                        <i class="fa-solid fa-delete-left"></i>
                    </a>
                </td>
                <td>
                    {{ $carbon->create($item->created_at)->diffForHumans($carbon->now()) }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="card-footer" id="product__block">
    {!! navi_ajax_page($data->number_page, 1, '', 'justify-content-center', 'mt-2') !!}
</div>
