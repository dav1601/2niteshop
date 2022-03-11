@foreach ( $categories as $category )
@if ($category->id != 120)
<li class="hm__item lv-{{ $category->level }}" data-lv={{ $category->level }}>
    <a href="{{ url('category/'.$category->slug) }}">
        <div class="icon-name">
            @if ($category ->parent_id == 0)
            <img src="{{ $file->ver_img($category->icon) }}" width="25" height="25" alt="">
            @endif
            <span>{{ $category->name }}</span>
        </div>
        @if (count($category->children) > 0 && $category->parent_id !== 0)
        <i class="fas fa-caret-right"></i>
        @endif
    </a>
    @if (count($category->children) > 0 )
    <ul class="sub__menu lv-{{ $category->level + 1  }}">
        <x-client.menu.category :category="$category->children" />
    </ul>
    @endif
</li>
@if ($loop->last && $category->level == 0)
@php
$categories_blog = App\Models\CatBlog::all();
@endphp
<li class="hm__item">
    <a href="{{ url('tin-tuc') }}">
        <div class="icon-name">
            <img src="{{ $file->ver_img('admin/images/category/icon/news.png') }}" width="25" height="25" alt="">
            <span>Bản Tin</span>
        </div>
    </a>
    <ul class="sub__menu">
        @foreach ($categories_blog as $item )
        <a href="{{ url('tin-tuc/'.$item->slug) }}">
            <div class="icon-name">
                <span>{{ $item->name }}</span>
            </div>
        </a>
        @endforeach
    </ul>
</li>
@endif
@endif
{{-- end if category != 120 --}}
@if ($category->id == 112)
@php
$categories_120 = App\Models\Category::OneCatTree(120);
@endphp
@foreach ($categories_120 as $category_120)
<li class="hm__item lv-{{ $category_120->level }}" data-lv={{ $category_120->level }}>
    <a href="{{ url('category/'.$category_120->slug) }}">
        <div class="icon-name">
            <img src="{{ $file->ver_img('admin/images/category/icon/icons8-nintendo-switch-logo-64.png') }}" width="25"
                height="25" alt="">
            <span>{{ $category_120->name }}</span>
        </div>
    </a>
    @if (count($category_120->children) > 0 )
    <ul class="sub__menu lv-{{ $category_120->level + 1  }}">
        <x-client.menu.category :category="$category_120->children" />
    </ul>
    @endif
</li>
@endforeach
@endif
{{-- --}}

@endforeach
