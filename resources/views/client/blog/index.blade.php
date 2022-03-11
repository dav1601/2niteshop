@extends('layouts.app')
@section('title' , $cat_blog->name)
@section('meta-desc' , "Chuyên trang tin tức bao gồm tin tức mới, đập hộp review các sản phẩm mới, hướng dẫn và thủ thuật sử dụng các sản phẩm công nghệ, game và tin khuyến mãi,... tại HALO SHOP.")
@section('meta-keyword' , "2nite shop, 2niteshop, 2nite channel, tin tuc cong nghe, tin tuc game, game moi, game news, tech news, game hot, review, unbox, iphone moi, macbook moi, surface moi, tips, huong dan va thu thuat")
@section('og-title' , $cat_blog->name)
@section('og-desc' , "2nite shop, 2niteshop, 2nite channel, tin tuc cong nghe, tin tuc game, game moi, game news, tech news, game hot, review, unbox, iphone moi, macbook moi, surface moi, tips, huong dan va thu thuat")
@section('og-image' , $file->main_banner())
@section('twitter-title' , $cat_blog->name)
{{-- end seo meta og twitt --}}

@section('import_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('import_js')
<script src="{{ $file->ver('client/app/js/cart.js') }}"></script>
@endsection
@section('margin') dtl__margin  option_blog @endsection
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
              {{ $bc }}
            </li>
        </ol>
    </div>
</div>

<div id="blog" >
<div class="container">
<div class="row mx-0">
<div class="col-12 col-lg-9 pl-lg-0 va-fix-81">
    <h1 id="blog__title">{{ $bc }}</h1>
<div id="blog__show" class="blog blog-wrapper">
    @if (count($blogs) > 0)
    @foreach ($blogs as $blog )
    <x-blogitem :blog="$blog" :cat="$cat" />
@endforeach

    @if ($kw == 0)
    <div id="pagn">
        {{ $blogs->links() }}
    </div>
    @else
    {{ $blogs->appends(['search' => $kw])->links() }}
    @endif
    @else
        <span class="no-blog text-lg">Không Có Bài Viết Nào Thuộc Danh Mục Này</span>
        @if ($kw != 0 )
            <a href="{{ $backLink }}" class="davi_btn w-100 d-block">
             Trở Lại
            </a>
        @endif
    @endif

</div>
</div>
<div class="col-12 col-lg-3 pr-lg-0 va-fix-19" id="blog__right">
    {!! Form::open(['method' => "GET" ]) !!}
    <input type="text" name="search" class="form-control w-100" id="search_blog" placeholder="Tìm bài viết" value="@if ($kw != 0 ) {{ $kw }} @endif">
    <button type="submit" class="davi_btn" ><i class="fas fa-search"></i></button>
    {!! Form::close() !!}
    <div class="category">
        <h2 class="category__title">
         Danh Mục Tin
        </h2>
        <ul class="category__menu">
            @if ($cat != 0 )
            <li class="d-flex align-items-center">
                <i class="fas fa-long-arrow-alt-right"></i>
                <a href="{{ url('tin-tuc/') }}" class="d-block">Bảng Tin</a>
            </li>
            @endif
            @foreach (App\Models\CatBlog::all() as $catB )
            <li class="d-flex align-items-center">
                <i class="fas fa-long-arrow-alt-right"></i>
                <a href="{{ url('tin-tuc/'.$catB->slug) }}" class="d-block">{{ $catB->name }}</a>
            </li>
            @endforeach

        </ul>
    </div>
</div>
</div>




</div>

</div>

@endsection
