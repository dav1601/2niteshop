@foreach ($categories as $category)
    <li data-lv="{{ $category->level }}" style="margin-left: {{ $category->level * 30 }}px"
        class="admin-cate-dd {{ $category->parent_id == 0 ? 'col-4 px-4 my-2' : '' }} justify-between"
        data-sort="{{ $category->position }}" data-parent="{{ $category->parent_id }}" data-id="{{ $category->id }}"
        data-sort="{{ $category->position }}" id="admin-cate-dd-{{ $category->id }}">
        <div class="admin-cate-item d-flex w-100 --{{ $category->id }} --lv-{{ $category->level }} justify-between">
            <span class="d-block">
                {{ $category->name }}
            </span>
            <div class="--action mr-2" style="z-index:100; ">
                <i class="fa-solid fa-pen-to-square admin-cate-edit" data-id="{{ $category->id }}"></i>
                @if (count($category->children) > 0)
                    <i class="fa-solid fa-plus admin-cate-show ml-3" data-id="{{ $category->id }}"></i>
                @endif
            </div>
        </div>
        @if (count($category->children) > 0)
            <x-admin.category.dd.collapse :category="$category" />
        @endif
    </li>
@endforeach
