@props(['category', 'col', 'id' => '', 'name' => '', 'attrcus' => []])
<div id="category-select-collapse-{{ $category->id }}" class="multi-collapse collapse" data-id="{{ $category->id }}"
    data-lv="{{ $category->level + 1 }}">
    <ul class="category-select-collapse-wp">
        <x-admin.accord.categories.item :col="$col" :name="$name" :id="$id" :attrcus="$attrcus"
            :categories="$category->children" />
    </ul>
</div>
