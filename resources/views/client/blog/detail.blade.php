@extends('layouts.app')
@section('title', $blog->title)
@section('meta-desc', $blog->desc)
@section('meta-keyword',
    '2nite shop, 2niteshop, 2nite channel, tin tuc cong nghe, tin tuc game, game moi, game news,
    tech news, game hot, review, unbox, iphone moi, macbook moi, surface moi, tips, huong dan va thu thuat')
@section('news_keywords',
    '2nite shop, 2niteshop, 2nite channel, tin tuc cong nghe, tin tuc game, game moi, game news,
    tech news, game hot, review, unbox, iphone moi, macbook moi, surface moi, tips, huong dan va thu thuat')
@section('og-title', $blog->title)
@section('og-desc', $blog->desc)
@section('og-image', urlImg($blog->img))
@section('twitter-title', $blog->title)
@section('og-type', 'blog')
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
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- Your share button code -->
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
    @if ($blog->type_content === 'text-editor')
        <div id="blog__detail">
            <div class="blog__detail container" style="max-width: 1030px !important;">
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
                                $slug = url('tin-tuc/' . App\Models\CatBlog::where('id', '=', $blog->cat_id)->first()->slug);
                                if ($blog->cat_sub_id != null) {
                                    $slug_2 = url('tin-tuc/' . App\Models\CatBlog::where('id', '=', $blog->cat_sub_id)->first()->slug);
                                }
                            @endphp
                            <a
                                href="{{ $slug }}">{{ App\Models\CatBlog::where('id', '=', $blog->cat_id)->first()->name }}</a>
                            @if ($blog->cat_sub_id != null)
                                <a href="{{ $slug_2 }}">,
                                    {{ App\Models\CatBlog::where('id', '=', $blog->cat_sub_id)->first()->name }}</a>
                            @endif
                        </span>
                        <span data-url="{{ url()->current() }}" class="d-block ml-3">
                            <div class="fb-share-button" data-href="{{ url()->current() }}" data-layout="button_count">
                            </div>
                        </span>
                    </div>
                </div>
                <div class="blog__detail--content w-100">

                    {!! $blog->content !!}




                </div>
                <div class="blog__detail--involve mt-5">
                    <h1 class="mb-4">Bài Viết Liên Quan</h1>
                    <div class="row mx-0">
                        @foreach ($involve as $invo)
                            <div class="col-md-4 col-sm-6 col-12 w-100 va-fix-padding">
                                <x-blogsubitem :blog="$invo" />
                            </div>
                        @endforeach
                    </div>
                </div>



            </div>

        </div>
    @else
        <x-pagebuilder.render :payload="$blog->pgbs->first()->pgb_data->data" />
    @endif


@endsection
