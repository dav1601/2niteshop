{{-- bis: Blog Item Sub --}}
@php
    $href = url('tin-tuc/' . $blog->category->slug . '/' . $blog->slug);
@endphp
<div class="bis w-100">
    <div class="bis__image position-relative overflow-hidden">
        <span class="bis__time">
            {{ $carbon->create($blog->created_at)->day }}
            <i>{{ $carbon->create($blog->created_at)->format('M') }}</i>
        </span>
        <a href="{{ $href }}" class="d-block">
            <img src="{{ $file->ver_img($blog->img) }}" alt="{{ $blog->title }}" class="img-fluid lazy">
        </a>
    </div>
    <div class="bis__stats">
        <div class="bis__stats--item --auth">
            <i class="far fa-user-circle"></i>
            <span>{{ $blog->author }}</span>
        </div>
        <div class="bis__stats--item --cmts">
            <i class="far fa-comments"></i>
            <span>0</span>
        </div>
        <div class="bis__stats--item --views">
            <i class="far fa-eye"></i>
            <span>{{ $blog->views }}</span>
        </div>
    </div>
    <div class="bis__title">
        <a href="{{ $href }}" class="d-block">{{ $blog->title }}</a>
    </div>


    <div class="bis__desc">
        <span class="d-block">{!! ltrim(Str::limit(strip_tags($blog->content), 200, '..'), '&nbsp;') !!}</span>
    </div>
</div>
