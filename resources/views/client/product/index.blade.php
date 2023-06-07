@extends('layouts.app')
@section('title', $category->title)
@section('meta-desc', $category->desc)
@section('meta-keyword', $category->keywords)
@section('news_keywords', $category->keywords)
@section('og-title', $category->title)
@section('og-desc', $category->desc)
@if ($category->img != null)
    @section('og-image', $file->ver_img($category->img))
@endif
@section('import_css')
    <link rel="stylesheet" href="{{ asset('plugin/skelton/index.min.css') }}">
@endsection

@section('twitter-title', $category->title)
{{-- end seo meta og twitt --}}

@section('import_js')
    <script src="{{ $file->ver('client/zoom-master/jquery.zoom.min.js') }}"></script>
    <script src="{{ $file->import_js('scrollReval.js') }}"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script>
        var category = {{ Js::from($category->toArray()) }};
    </script>
@endsection
{{-- end import js --}}
@section('margin') dtl__margin @endsection
@section('content')
    <div id="breadCrumb">
        <div class="container">
            <ol class="b__crumb">
                <li class="b__crumb--item">
                    <i class="fas fa-home"></i>
                </li>
                <li class="b__crumb--item">
                    <i class="fas fa-long-arrow-alt-right"></i>
                </li>
                @php
                    $index = count($bc);
                @endphp
                @foreach ($bc as $key => $b)
                    @php
                        $name = App\Models\Category::select('name')
                            ->where('slug', $b)
                            ->first();
                    @endphp
                    @if ($name)
                        @if ($key != $index && $key != 0)
                            <li class="b__crumb--item">
                                <i class="fas fa-long-arrow-alt-right"></i>
                            </li>
                        @endif

                        <li class="b__crumb--item">
                            <h1>{{ $name->name }}</h1>
                        </li>
                    @endif
                @endforeach

            </ol>
        </div>
    </div>

    <div class="container">
        <div class="row mx-0">
            <div id="category" class="@if ($is_game) col-md-10 col-12 @else col-md-12 @endif pr-0">
                <div id="category__header">
                    <h1> {{ $category->name }} </h1>
                </div>
                @if ($category->img != null)
                    <div id="category__banner">
                        <img src="{{ $file->ver_img($category->img) }}" class="lazy" height="auto" width="100%"
                            alt="{{ $category->name }}">
                    </div>
                @endif
                @if (count($list_banner) > 0)
                    <div class="owl-carousel owl-theme mb-2" id="list__banner">
                        @foreach ($list_banner as $banner)
                            <div class="item">
                                <a href="{{ url('category/' . $banner->link) }}" class="d-block">
                                    <img src="{{ $file->ver_img($banner->path) }}" class="img-fluid lazy"
                                        alt="{{ $category->name }}">
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
                <div id="category__filter" class="w-100 container">
                    <div class="d-flex align-items-center justify-content-between" id="category__filter--box">
                        <div class="view d-flex align-items-center nav" role="tablist">
                            <span id="gridProduct"
                                class="nav-item item-view @if ($view == 'grid') active @endif" data-type="grid"
                                role="presentation" data-toggle="tab" href="#grid" role="tab" aria-selected="true">
                                <i class="fas fa-th" data-toggle="tooltip" data-placement="top" title="Grid"></i>
                            </span>
                            <span id="listProduct"
                                class="nav-item item-view @if ($view == 'list') active @endif" data-type="list"
                                role="presentation" data-toggle="tab" href="#list" role="tab" aria-selected="true">
                                <i class="fas fa-list" data-toggle="tooltip" data-placement="top" title="List"></i>
                            </span>
                        </div>
                        <div class="sort d-flex align-items-center">
                            <label for="">Sắp xếp theo</label>
                            <select class="" name="sort" data-view="{{ $view }}" id="sort"
                                data-id="{{ $id }}">
                                <option value="id" ord="desc" @if ($sort == 'id' && $ord == 'desc') selected @endif>Mặc
                                    định</option>
                                <option value="id" ord="asc" @if ($sort == 'id' && $ord == 'asc') selected @endif>Cũ
                                    đến mới</option>
                                <option value="price" ord="asc" @if ($sort == 'price' && $ord == 'asc') selected @endif>Giá
                                    thấp > cao</option>
                                <option value="price" ord="desc" @if ($sort == 'price' && $ord == 'desc') selected @endif>Giá
                                    cao > thấp</option>
                                <option value="name" ord="asc" @if ($sort == 'name' && $ord == 'asc') selected @endif>Từ
                                    A-Z
                                </option>
                                <option value="name" ord="desc" @if ($sort == 'name' && $ord == 'desc') selected @endif>Từ
                                    Z-A
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div id="products" class="container">
                    <div class="tab-content">
                        <div class="tab-pane @if ($view == 'grid') active @endif animate__animated animate__zoomIn"
                            id="grid" role="tabpanel">
                            @if ($products->count > 0)
                                <div class="row mx-0" id="outputGrid">
                                    {{-- @if (App\Models\Category::where('id', '=', $id)->first()->is_game == 1) col-md-4
                            @else col-md-3 @endif --}}
                                    @foreach ($products->data as $prd)
                                        <x-product.itemgrid class="prdcat" classWp="col-lg-3 col-md-4 col-12 col-sm-6 item"
                                            :message="$prd" />
                                    @endforeach
                                </div>
                                @if ($products->count > 1)
                                    <div class="products__page mt-4">
                                        <div class="products__page mt-4">
                                            <x-pagination :number_page="$products->number_page" :page="$products->page"
                                                classWp="pagination-sm justify-content-center mt-4" />
                                        </div>
                                    </div>
                                @endif
                            @else
                                <strong>Hiện chưa có sản phẩm nào thuộc danh mục này</strong>
                            @endif
                        </div>
                        <div class="tab-pane @if ($view == 'list') active @endif animate__animated animate__zoomIn"
                            id="list" role="tabpanel">
                            @if ($products->count > 0)
                                <div class="row flex-column mx-0" id="outputList">
                                    @foreach ($products->data as $prd)
                                        <x-listitem classWp="item w-100" :message="$prd" />
                                    @endforeach
                                </div>
                                @if ($products->count > 1)
                                    <div class="products__page mt-4">
                                        <x-pagination :number_page="$products->number_page" :page="$products->page"
                                            classWp="pagination-sm justify-content-center mt-4" />
                                    </div>
                                @endif
                            @else
                                <strong>Hiện chưa có sản phẩm nào thuộc danh mục này</strong>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            {{-- end category --}}
            @if ($is_game)
                <div id="filter_genre" class="col-md-2 pr-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2>Bộ lọc</h2>
                        <a class="clear d-block"><i class="fas fa-times-circle"></i> Clear</a>
                    </div>
                    <div id="filter_genre--filter">
                        <a class="genre" data-toggle="collapse" data-target="#collapseGenre" aria-expanded="false"
                            aria-controls="collapseGenre"><span class="d-block">Thể loại</span> <i
                                class="fas fa-angle-down"></i></a>
                        <div class="box__filter--genre" class="collapse" id="collapseGenre">
                            @if (count($genre) > 0)
                                @foreach ($genre as $gen)
                                    <div class="form-check mb-3">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input game_genre"
                                                value="{{ $gen->name }}"
                                                @if (in_array($gen->name, $genres)) checked @endif>
                                            {{ $gen->name }}
                                        </label>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>
            @endif

            {{-- end sidebar filter game --}}
        </div>
    </div>

@endsection
