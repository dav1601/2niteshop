<div class="product__item  w-100 reval-item mb-3 {{ $class }}" data-id="{{ $message->id }}">
    <x-productlabels :product="$message" />
    <div class="product__item--img" data-id="{{ $message->id }}">
        <a href="{{ route('detail_product', ['slug'=>$message->slug]) }}" class="d-block img_show">
            <img src="{{ $file->ver_img($message->main_img) }}" alt="{{ $message->name }}" class="img-fluid">
        </a>
        <a href="{{ route('detail_product', ['slug'=>$message->slug]) }}" class="d-none img_hide">
            <img src="{{ $file->ver_img($message->sub_img) }}" alt="{{ $message->name }}" class="img-fluid">
        </a>
        <div class="quick__view qv__{{ $message->id }}" data-toggle="tooltip" data-placement="top" title="Xem Nhanh" class="open__modal--qview"
            data-id="{{ $message->id }}">
            <i class="fas fa-plus"></i>
        </div>
    </div>
    <div class="product__item--content">
        <a href="{{ route('detail_product', ['slug'=>$message->slug]) }}" class="name d-block">
            {{ $message->name }}
        </a>
        @if ($message->stock != 2 )
        <span class="price text-center d-block">
            {{ crf($message->price) }}
        </span>
        @else
        <span class="price text-center d-block">
            CALL-{{ getVal("switchboard") ->value }}
        </span>
        @endif
    </div>
</div>
{{-- write modal here --}}


{{-- ----------------- --}}


{{-- ----------------- --}}
