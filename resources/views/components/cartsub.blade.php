@php
$prd = App\Models\Products::where('id', '=' , $cartsub->id)->first();
if($cartsub->options->ins != 0){
$group = App\Models\Insurance::where('id' , $cartsub->options->ins)->first()->group;
} else {
$group = 0;
}
@endphp
<div class="card__item--sub d-flex justify-content-between align-items-center position-relative">
    <div class="img">
        <a href="{{ route('detail_product', ['slug'=>$prd->slug]) }}">
            <img src="{{ $file->ver_img($prd->main_img) }}" width="60" alt=" {{ $prd->name }} ">
        </a>
    </div>
    <div class="info">
        <div class="name">
            <a href="{{ route('detail_product', ['slug'=>$prd->slug]) }}">
                {{ $cartsub->name }}
            </a>
        </div>
        @if ($cartsub->options->ins != 0 )
        <div class="option">
            <span>{{ $group == 1 ? "Thời gian bảo hành":"Phụ kiện mua kèm" }}: <strong>{{
                    App\Models\Insurance::where('id', '=' , $cartsub->options->ins
                    )->first()->name }}</strong></span>
        </div>
        @endif
    </div>
    <div class="qty">
        <span class="d-block">
            x{{ $cartsub->qty }}
        </span>
    </div>
    <div class="sub_total" style="text-transform: none">
        <span class="d-block">
            {{ crf($cartsub->options->sub_total) }}
        </span>
    </div>
    <div class="remove">
        <span class="d-block delete__cart" data-rowId="{{ $cartsub->rowId }}">
            <i class="fas fa-times"></i>
        </span>
    </div>
</div>
