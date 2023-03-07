@foreach ($categories as $category)
    <li data-lv="{{ $category->level }}" style="margin-left: {{ $category->level * 30 }}px"
        class="admin-cate-dd {{ $category->parent_id == 0 ? 'col-4 px-4 my-2' : '' }}"
        data-sort="{{ $category->position }}" data-parent="{{ $category->parent_id }}" data-id="{{ $category->id }}"
        data-sort="{{ $category->position }}" id="admin-cate-dd-{{ $category->id }}">
        <div class="admin-cate-item --lv-{{ $category->level }}" data-id="{{ $category->id }}">
            {{ $category->name }}
        </div>
        @if (count($category->children) > 0)
            <x-admin.category.dd.collapse :category="$category" />
        @endif
    </li>
@endforeach
