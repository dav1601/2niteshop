@extends('layouts.app')
@section('import_js')
<script src="{{ $file->ver('client/app/js/home.js') }}"></script>
<script src="{{ $file->ver('client/app/js/scrollReval.js') }}"></script>
<script src="https://unpkg.com/scrollreveal"></script>

@endsection
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
            <li class="b__crumb--item">
               Tìm Kiếm
            </li>
        </ol>
    </div>
</div>
<input type="hidden" name="" value="{{ route('search_main_ajax') }}" id="search_main_ajax">
<div class="container">
<div class="row mx-0">
<div id="category" class="col-12 pr-0">
    <div id="category__header">
        <h1> Tìm Kiếm - {{ $kw }} </h1>
    </div>
    <div id="category__filter" class="container w-100">
        <div class="d-flex align-items-center justify-content-between" id="category__filter--box">
            <div class="view d-flex align-items-center nav" role="tablist">
                <span id="gridProduct" class="nav-item item-view  @if ($view == "grid") active @endif" data-type="grid" role="presentation" data-toggle="tab" href="#grid"
                    role="tab"  aria-selected="true" >
                    <i class="fas fa-th"  data-toggle="tooltip" data-placement="top" title="Grid"></i>
                </span>
                <span id="listProduct" class="nav-item item-view @if ($view == "list") active @endif" data-type="list" role="presentation" data-toggle="tab" href="#list"
                    role="tab"  aria-selected="true"  >
                    <i class="fas fa-list" data-toggle="tooltip" data-placement="top" title="List"></i>
                </span>
            </div>
            <div class="sort d-flex align-items-center">
                <label for="">Sắp xếp theo</label>
                <select class="" name="sort" data-view="{{ $view }}" id="sort__search--main" data-kw="{{ $kw }}">
                    <option value="id" ord="DESC" @if ($sort == 0 && $ord == "") selected @endif>Mặc định</option>
                    <option value="price" ord="ASC" @if ($sort == "price" && $ord == "ASC") selected @endif>Giá thấp > cao</option>
                    <option value="price" ord="DESC" @if ($sort == "price" && $ord == "DESC") selected @endif>Giá cao > thấp</option>
                    <option value="name" ord="ASC"  @if ($sort == "name" && $ord == "ASC") selected @endif>Từ A-Z</option>
                    <option value="name" ord="DESC" @if ($sort == "name" && $ord == "DESC") selected @endif>Từ Z-A</option>
                </select>
            </div>
        </div>
    </div>
    <div id="products" class="container">
<div class="tab-content">
    <div class="tab-pane @if ($view == "grid") active @endif" id="grid"  role="tabpanel">
     @if (count($products) > 0 )
     <div class="row mx-0" id="outputGrid" >
         @foreach ($products as $prd )
             <div class="col-lg-3 col-md-4 col-12 col-sm-6 item w-100">
                <x-product.itemgrid type="2" class="prdcat"   :message="$prd"/>
             </div>
         @endforeach
        </div>
        @if ($number_page > 1 )
            <div class="products__page  page__search--main mt-4">
                {!!  navi_ajax_page($number_page, $page, $size = "pagination-sm", "justify-content-start", $mt = "mt-4") !!}
            </div>
        @endif
     @else
         <strong>Hiện chưa có sản phẩm nào thuộc  từ khoá {{ $kw }}</strong>
     @endif
    </div>
    <div class="tab-pane @if ($view == "list") active @endif"  id="list" role="tabpanel">
        @if (count($products) > 0 )
     <div class="row mx-0 flex-column" id="outputList" >
         @foreach ($products as $prd )
             <div class="item w-100">
                <x-listitem   :message="$prd"/>
             </div>
         @endforeach
        </div>
        @if ($number_page > 1 )
            <div class="products__page  page__search--main mt-4">
                {!!  navi_ajax_page($number_page, $page,  "pagination-sm", "justify-content-start",  "mt-4") !!}
            </div>
        @endif
     @else
         <strong>Hiện chưa có sản phẩm nào cho từ khoá {{ $kw }}</strong>
     @endif
    </div>
</div>
    </div>
</div>

</div>
</div>

@endsection
