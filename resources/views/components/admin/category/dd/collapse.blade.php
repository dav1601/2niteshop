<div id="admin-cate-collapse-{{ $category->id }}" class="multi-collapse admin-cate-collapse collapse"
    data-id="{{ $category->id }}" data-lv="{{ $category->level + 1 }}">
    <ul class="admin-cate admin-cate-connect lv-{{ $category->level + 1 }}" data-id="{{ $category->id }}"
        data-lv="{{ $category->level + 1 }}" id="admin-cate-{{ $category->id }}">
        <x-admin.category.dd.item :categories="$category->children" />
    </ul>
</div>
