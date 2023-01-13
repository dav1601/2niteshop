@php
    $options = explode(',', $cartsub->options->ins);
@endphp

<div class="card__item--sub d-flex justify-content-between align-items-center position-relative">
    <div class="img">

        <a href="{{ route('detail_product', ['slug' => $cartsub->options->slug]) }}">
            <img src="{{ $file->ver_img($cartsub->options->image) }}" width="60" alt=" {{ $cartsub->name }} ">
        </a>
    </div>
    <div class="info">
        <div class="name">
            <a href="{{ route('detail_product', ['slug' => $cartsub->options->slug]) }}">
                {{ $cartsub->name }}
            </a>
        </div>
        @if (count($options) > 0)
            <div class="option">
                @foreach ($options as $key => $op)
                    @php
                        $ins = App\Models\Insurance::where('id', '=', $cartsub->options->ins)->first();
                    @endphp
                    @if ($ins)
                        <strong>{{ $ins->name }}</strong>
                    @endif
                @endforeach
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
