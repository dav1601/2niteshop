@props(['categories' => [], 'col' => '12', 'id' => '', 'name' => '', 'attrcus' => []])
@if (count($categories) > 0)
    @foreach ($categories as $category)
        @php
            $hasChild = count($category->children) > 0;
        @endphp

        <li style="margin-left: {{ $category->level * 30 }}px" class="col-{{ $col }} justify-between"
            id="category-acheckbox-{{ $category->id }}">
            @if ($hasChild)
                <div class="d-flex w-100 bg-primary justify-between rounded p-1">
                    <span class="d-block">
                        {{ $category->name }}
                    </span>
                    <div class="--action mr-2" style="z-index:100; ">
                        @if ($hasChild)
                            <i class="fa-solid fa-plus admin-cate-show ml-3" data-toggle="collapse"
                                data-target="#category-select-collapse-{{ $category->id }}"
                                data-id="{{ $category->id }}"></i>
                        @endif
                    </div>
                </div>
            @else
                <x-admin.layout.form.acheckbox :customattr="$attrcus" :id="$id . $category->id">
                    <x-slot name="input" :name="$name" :value="$category->id">
                    </x-slot>
                    <x-slot name="label">
                        {{ $category->name }}
                    </x-slot>
                </x-admin.layout.form.acheckbox>
            @endif
            @if ($hasChild)
                <x-admin.accord.categories.collapse :id="$id" :name="$name" :attr="$attrcus"
                    :col="$col" :category="$category" />
            @endif
        </li>
    @endforeach

@endif
