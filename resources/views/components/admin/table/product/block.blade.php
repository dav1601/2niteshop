<table class="table-borderless table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tiêu Đề</th>
            <th scope="col">Thêm</th>
            <th scope="col">Xem</th>
            <th scope="col">Edit</th>
            <th scope="col">Xoá</th>
            <th scope="col">Created_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($vadata->blocks as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td>
                    <a block-id=" {{ $item->id }}  " data-model="prd" relaName="block" relaId="{{ $item->id }}"
                        role="button" class="add__prd cursor-poniter init__select text-center"
                        id="isbid{{ $item->id }}">
                        <i class="fa-solid fa-plus"></i>
                    </a>
                    <div class="spinner-border text-primary d-none init__select__loading" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </td>
                <td>
                    <a block-id=" {{ $item->id }} " class="prev__block cursor-poniter">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                </td>
                <td>
                    <a href="{{ route('product_block_view', ['type' => 'edit', 'block_id' => $item->id]) }}">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </td>
                <td>
                    <a role="button" data-id=" {{ $item->id }} " class="block__product--delete">
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
    {!! navi_ajax_page($vadata->number_page, 1, '', 'justify-content-center', 'mt-2') !!}
</div>
