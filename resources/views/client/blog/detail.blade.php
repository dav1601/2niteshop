@extends('layouts.app')
@section('title' , $blog->title)
@section('meta-desc' , $blog->desc)
@section('meta-keyword' , "2nite shop, 2niteshop, 2nite channel, tin tuc cong nghe, tin tuc game, game moi, game news, tech news, game hot, review, unbox, iphone moi, macbook moi, surface moi, tips, huong dan va thu thuat")
@section('og-title' , $blog->title)
@section('og-desc' , $blog->desc)
@section('og-image' , $file->ver_img($blog->img))
@section('twitter-title' , $blog->title)
@section('og-type' , 'blog')
{{-- end seo meta og twitt --}}

{{-- end section meta seo --}}
@section('import_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css"
    integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
{{-- end section css --}}
@section('import_js')
<script src="{{ $file->ver('client/app/js/cart.js') }}"></script>
@endsection
{{-- end section js --}}
@section('margin') dtl__margin option_blog_detail @endsection
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
                {{ $blog->title }}
            </li>
        </ol>
    </div>
</div>

<div id="blog__detail">
    <div class="container  blog__detail" style="max-width: 1030px !important;">
        <div class="blog__detail--title">
            <h1>{{ $blog->title }}</h1>
        </div>
        <div class="blog__detail--info d-flex align-items-center">
            <div class="box-author box">
                <span class="b-posted">Tác Giả:</span>
                <span class="b-author">
                    <i class="far fa-user-circle"></i>
                    <span>{{ $blog->author }}</span>
                </span>
            </div>
            <div class="box-view box">
                <i class="far fa-eye"></i>
                <span class="b-view">
                    {{ $blog->views }} Lượt Xem
                </span>
            </div>
            <div class="box-cat box">
                <span class="b-icon-cat"><i class="far fa-newspaper"></i></span>
                <span class="b-cat">
                    @php
                        $slug = url('tin-tuc/'. App\Models\CatBlog::where('id', '=' , $blog->cat_id)->first()->slug);
                    if ($blog->cat_sub_id != NULL) {
                        $slug_2 = url('tin-tuc/'.App\Models\CatBlog::where('id', '=' , $blog->cat_sub_id)->first()->slug);
                    }
                    @endphp
                    <a href="{{  $slug }}">{{ App\Models\CatBlog::where('id', '=' , $blog->cat_id)->first()->name }}</a>
                    @if ($blog->cat_sub_id != NULL)
                    <a href="{{ $slug_2 }}">, {{
                        App\Models\CatBlog::where('id', '=' , $blog->cat_sub_id)->first()->name }}</a>

                    @endif
                </span>
            </div>
        </div>
        <div class="blog__detail--content w-100">
          {!! $blog->content !!}
        </div>
        <div class="blog__detail--involve mt-5">
          <h1 class="mb-4">Bài Viết Liên Quan</h1>
          <div class="row mx-0">
              @foreach ($involve as $invo )
                  <div class="col-md-4 col-sm-6 col-12 w-100 va-fix-padding">
                      <x-blogsubitem :blog="$invo" />
                  </div>
              @endforeach
          </div>
        </div>



    </div>

</div>

@endsection
