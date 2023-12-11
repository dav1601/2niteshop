@foreach ($categories as $category)
    <li class="nite__menu--item">
        <div class="d-flex align-items-center justify-content-between wp__iconName">
            <a href="{{ route('index_product', ['slug' => $category->slug]) }}">
                <div class="icon-name">
                    @if ($category->icon != null)
                        <img src="{{ urlImg($category->icon) }}" width="25" height="25" alt="{{ $category->name }}">
                    @endif
                    <span>{{ $category->name }}</span>
                </div>
            </a>
            @if (count($category->children) > 0)
                <span class="icon-toggle" data-id="{{ $category->id }}">
                    <i class="fa-solid fa-circle-plus"></i>
                </span>
            @endif
        </div>
        @if (count($category->children) > 0)
            <x-category.arcord :category="$category->children" :id="$category->id" :level="$category->level" />
        @endif
    </li>
@endforeach
