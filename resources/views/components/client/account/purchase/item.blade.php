@php
    if ($item->status == 1) {
        $tooltip = 'Đơn Hàng đã đặt lúc ' . $item->created_at;
    } elseif ($item->status == 2) {
        $tooltip = 'Đơn Hàng đã bắt đầu vận chuyển lúc ' . $item->updated_at;
    } elseif ($item->status == 3) {
        $tooltip = 'Đơn Hàng đã giao thành công lúc ' . $item->updated_at;
    }
    $cart = unserialize($item->cart);
@endphp
<div class="purchase__item">
    <div class="purchase__item--info">
        <div class="IdStt d-flex justify-content-between">
            <div class="idItem">
                <span>ID Đơn Hàng: {{ $item->id }}</span>
            </div>
            <div class="sttItem d-flex align-items-center sttItem-{{ $item->status }}">
                @if ($item->status != 4)
                    <i class="fas fa-truck"></i>
                @endif
                <span class="stt stt-{{ $item->status }}">
                    {{ Config::get('orders.status.' . $item->status) }}
                </span>
                @if ($item->status != 4)
                    <div class="tooltipItem" data-toggle="tooltip" data-placement="bottom" title="{{ $tooltip }}">
                        <i class="far fa-question-circle"></i>
                    </div>
                @endif
            </div>
        </div>
        <div class="products">
            @foreach ($cart as $product)
                <div class="product d-flex justify-content-between mb-3">
                    <img src="{{ $file->ver_img($product->options->image) }}" width="100"
                        alt=" {{ $product->name }} ">
                    <div class="content d-block">
                        <a href="{{ route('detail_product', ['slug' => Str::slug($product->name)]) }}" class="name">
                            {{ $product->name }}
                        </a>
                        <span class="d-block mt-2 font-normal" style="font-size:16px">
                            Giá sản phẩm: {{ crf($product->price) }}
                        </span>
                        @if ($product->options->ins)
                            @php
                                $arrIns = explode(',', $product->options->ins);
                            @endphp
                            @foreach ($arrIns as $ins_id)
                                @php
                                    $ins = App\Models\Insurance::where('id', '=', $ins_id)->first();
                                @endphp
                                @if ($ins)
                                    <span class="d-block ins my-2">
                                        {{ App\Models\bundled_product::where('id', $ins->group)->first()->name }}:
                                        {{ $ins->name }}(+ {{ crf($ins->price) }})
                                    </span>
                                @endif
                            @endforeach
                        @endif
                        <span class="qty d-block mt-2">
                            x{{ $product->qty }}
                        </span>
                    </div>

                    <span class="sub_total d-flex align-items-center">
                        {{ crf($product->options->sub_total) }}
                    </span>
                </div>
            @endforeach
        </div>
    </div>
    <div class="_1J7vLy"></div>
    <div class="purchase__item--stats">
        <div class="_37UAJO d-flex justify-content-end align-items-center">
            <div class="d-flex align-items-center">
                <div class="d-flex align-items-center total mr-2">
                    <i class="fas fa-dollar-sign mr-1"></i>
                    <span>Tổng số tiền:</span>
                </div>
                <span class="total_price">{{ crf($item->total) }}</span>
            </div>
        </div>
        @if ($item->status == 1)
            <div class="_37UAJO action d-flex justify-content-end align-items-end flex-column">
                <button class="stardust-button-not-main update__cancel" data-type="{{ $type }}"
                    data-id="{{ $item->id }}">Huỷ Đơn
                    Hàng</button>
                <!-- section-warning -->
                <div class="wrapper-warning mt-2">
                    <div class="card-2">
                        <div class="icon"><i class="fas fa-exclamation-circle"></i></div>
                        <div class="subject">
                            <h3>Lưu Ý:</h3>
                            <p>Khách hàng Nhấn vào <strong class="update__orders" data-type="{{ $type }}">CẬP
                                    NHẬT</strong> Trước khi <strong>HUỶ</strong> để cập nhật trạng thái mới nhất của
                                toàn bộ đơn hàng</p>
                        </div>
                    </div>
                </div>
                <!-- section-warning -->
            </div>
        @endif
    </div>

</div>
