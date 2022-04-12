@extends('layouts.app')
@section('title' , $category->title)
@section('meta-desc' , $category->desc)
@section('meta-keyword' , $category->keywords)
@section('og-title' , $category->title)
@section('og-desc' , $category->desc)
@if ($category->img != NULL)
@section('og-image' ,$file->ver_img($category->img))
@else
@section('og-image' , $file->main_banner())
@endif
@section('import_css')
<link rel="stylesheet" href="{{ asset('plugin/skelton/index.min.css') }}">
@endsection

@section('twitter-title' , $category->title)
{{-- end seo meta og twitt --}}
@section('import_js')
<script src="{{ $file->ver('client/zoom-master/jquery.zoom.min.js') }}"></script>
<script src="{{ $file->import_js('scrollReval.js') }}"></script>
<script src="https://unpkg.com/scrollreveal"></script>
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
            $index = count($bc)
            @endphp
            @foreach ($bc as $key => $b )
            @php
            $name = App\Models\Category::select('name')->where('slug', $b )->first();
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
        <div id="category"
            class="@if( App\Models\Category::where('id', '=' , $id)->first()->is_game == 1 ) col-md-10 col-12 @else col-md-12 @endif pr-0">
            <div id="category__header">
                <h1> {{ $category->name }} </h1>
            </div>
            @if ($category->img != NULL)
            <div id="category__banner">
                <img src="{{ $file->ver_img($category->img) }}" class="lazy" height="auto" width="100%" alt="{{ $category->name }}">
            </div>
            @endif
            @if (count($list_banner) > 0)
            <div class="owl-carousel owl-theme mb-2" id="list__banner">
                @foreach ($list_banner as $banner )
                <div class="item">
                    <a href="{{ url('category/'.$banner->link) }}" class="d-block">
                        <img src="{{ $file->ver_img($banner->path) }}" class="img-fluid lazy" alt="{{ $category->name }}">
                    </a>
                </div>
                @endforeach
            </div>
            @endif
            <div id="category__filter" class="container w-100">
                <div class="d-flex align-items-center justify-content-between" id="category__filter--box">
                    <div class="view d-flex align-items-center nav" role="tablist">
                        <span id="gridProduct" class="nav-item item-view  @if ($view == 'grid') active @endif"
                            data-type="grid" role="presentation" data-toggle="tab" href="#grid" role="tab"
                            aria-selected="true">
                            <i class="fas fa-th" data-toggle="tooltip" data-placement="top" title="Grid"></i>
                        </span>
                        <span id="listProduct" class="nav-item item-view @if ($view == 'list') active @endif"
                            data-type="list" role="presentation" data-toggle="tab" href="#list" role="tab"
                            aria-selected="true">
                            <i class="fas fa-list" data-toggle="tooltip" data-placement="top" title="List"></i>
                        </span>
                    </div>
                    <div class="sort d-flex align-items-center">
                        <label for="">Sắp xếp theo</label>
                        <select class="" name="sort" data-view="{{ $view }}" id="sort" data-id="{{ $id }}">
                            <option value="id" ord="DESC" @if ($sort==0 && $ord=="" ) selected @endif>Mặc định</option>
                            <option value="price" ord="ASC" @if ($sort=="price" && $ord=="ASC" ) selected @endif>Giá
                                thấp > cao</option>
                            <option value="price" ord="DESC" @if ($sort=="price" && $ord=="DESC" ) selected @endif>Giá
                                cao > thấp</option>
                            <option value="name" ord="ASC" @if ($sort=="name" && $ord=="ASC" ) selected @endif>Từ A-Z
                            </option>
                            <option value="name" ord="DESC" @if ($sort=="name" && $ord=="DESC" ) selected @endif>Từ Z-A
                            </option>
                        </select>
                    </div>
                </div>
            </div>
            <div id="products" class="container">
                <div class="tab-content">
                    <div class="tab-pane @if ($view == 'grid') active @endif animate__animated animate__zoomIn"
                        id="grid" role="tabpanel">
                        @if (count($products) > 0 )
                        <div class="row mx-0" id="outputGrid">
                            {{-- @if( App\Models\Category::where('id', '=' , $id)->first()->is_game == 1 ) col-md-4
                            @else col-md-3 @endif --}}
                            @foreach ($products as $prd )
                            <div class="col-lg-3 col-md-4 col-12 col-sm-6 item w-100">
                                <x-product.itemgrid type="2" class="prdcat" :message="$prd" />
                            </div>
                            @endforeach
                        </div>
                        @if ($number_page > 1 )
                        <div class="products__page mt-4">
                            {!! navi_ajax_page($number_page, $page, $size = "pagination-sm", "justify-content-center",
                            $mt = "mt-4") !!}
                        </div>
                        @endif
                        @else
                        <strong>Hiện chưa có sản phẩm nào thuộc danh mục này</strong>
                        @endif
                    </div>
                    <div class="tab-pane @if ($view == 'list') active @endif animate__animated animate__zoomIn"
                        id="list" role="tabpanel">
                        @if (count($products) > 0 )
                        <div class="row mx-0 flex-column" id="outputList">
                            @foreach ($products as $prd )
                            <div class="item w-100">
                                <x-listitem :message="$prd" />
                            </div>
                            @endforeach
                        </div>
                        @if ($number_page > 1 )
                        <div class="products__page mt-4">
                            {!! navi_ajax_page($number_page, $page, $size = "pagination-sm", "justify-content-center",
                            $mt = "mt-4") !!}
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
        @if( App\Models\Category::where('id', '=' , $id)->first()->is_game == 1 )
        <div id="filter_genre" class="col-md-2 pr-0">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Bộ lọc</h2>
                <a class="clear d-block"><i class="fas fa-times-circle"></i> Clear</a>
            </div>
            <div id="filter_genre--filter">
                <a class="genre" data-toggle="collapse" data-target="#collapseGenre" aria-expanded="false"
                    aria-controls="collapseGenre"><span class="d-block">Thể loại</span> <i
                        class="fas fa-angle-down"></i></a>
                @php

                $genre = App\Models\Products::select('cat_game_id')->where(function ($query) use ($id
                ,$list_products ) {
                $query->where('cat_id', '=', $id)
                ->orWhere('sub_1_cat_id', '=', $id)
                ->orWhere('sub_2_cat_id', '=', $id)
                ->orWhereIn('id', $list_products);
                });
                $genre = $genre->distinct()->get();
                @endphp
                <div class="box__filter--genre" class="collapse" id="collapseGenre">
                    @foreach ($genre as $gen )
                    @if ($gen->cat_game_id != NULL)
                    <div class="form-check mb-3">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input game_genre" value="{{ $gen->cat_game_id }}"
                                @if (in_array($gen->cat_game_id, $genres)) checked @endif >
                            {{ $gen->cat_game_id }}
                        </label>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        @endif

        {{-- end sidebar filter game --}}
    </div>
</div>

@endsection
