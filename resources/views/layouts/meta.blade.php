@cloudinaryJS
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta property="fb:admins" content="100007446334009" />
<meta property="fb:app_id" content="349901006628885" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="shortcut icon" href="{{ $file->ver_img(getVal('favicon')->value) }}" type="image/x-icon">
<title>
    @if (isset($title))
        {{ $title }}
    @else
        @yield('title', getVal('title')->value)
    @endif
</title>
<link rel="canonical" href="{{ URL::current() }}">
<meta name='description' itemprop='description' content='@yield('meta-desc', getVal('desc')->value)' />
<meta name='keywords' content='@yield('meta-keyword', getVal('keywords')->value)' />
<meta name="news_keywords" content="@yield('news_keywords', getVal('news_keywords')->value)">
<meta property="og:description" content="@yield('og-desc', getVal('desc')->value)" />
<meta property="og:title" content="@yield('og-title', getVal('title')->value)" />
<meta property="og:image" content="@yield('og-image', getVal('banner_cover')->value)" />
<meta property="og:site_name" content="@yield('site_name', getVal('title')->value)" />
<meta property="og:type" content="@yield('og-type', 'website')" />
<meta property="og:url" content="{{ Url::current() }}" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="@yield('twitter-title', getVal('title')->value)" />
