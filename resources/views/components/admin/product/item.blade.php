<div class="col-3 prd__s--item mb-4">
    <div class="card">
        <div class="prd-img">
            <img src="{{ $file->ver_img($prd->main_img) }}" alt="" class="prd-img--main">
            <img src="{{ $file->ver_img($prd->sub_img) }}" alt="" class="prd-img--sub">
        </div>
        <div class="prd-info p-3">
            <span class="name d-block text-truncate">{{ $prd->name }}</span>
            <span class="price d-block info-item"><i class="fas fa-tags"></i>Giá bán: {{ crf($prd->price) }}</span>
            <span class="price__cost price d-block info-item" style="color:#dd991b;"><i class="fas fa-tags"></i>Giá
                gốc:
                {{ crf($prd->historical_cost) }}</span>
            <span class="prdcer d-block info-item"><i class="fas fa-building"></i>Producer:
                {{ $prd->producer->name }}</span>
            <span class="model d-block info-item"><i class="fab fa-unity"></i>Model: {{ $prd->model }}</span>
            <span class="usage d-block info-item"><i class="fas fa-box-open"></i>
                {{ usage_stt($prd->usage_stt) }}</span>
            <span class="inventory d-block info-item"><i class="fa-solid fa-warehouse"></i>
                {{ stock_stt($prd->status) }}</span>
            <div class="row mx-0 mt-3">
                <div class="form-group col-12 pr-0 pl-0">
                    <select class="custom-select" name="" id="product__show--hl" data-id="{{ $prd->id }}">
                        <option value="{{ $prd->highlight }}">{{ highlight_stt($prd->highlight) }}</option>
                        @foreach (Config::get('product.highlight') as $highlight)
                            @if ($highlight != $prd->highlight)
                                <option value="{{ $highlight }}">{{ highlight_stt($highlight) }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="prd-date d-flex justify-content-between align-items-center mb-2 mt-2 pl-0">
                <div class="date">
                    <i class="far fa-calendar pr-1"></i>
                    <span>{{ $prd->created_at->toFormattedDateString() }}</span>
                </div>

            </div>
            <div class="action d-flex justify-content-center align-items-center mt-4">
                <div class="action-edit mx-2">
                    <a target="_blank" href="{{ route('product_view_edit', ['id' => $prd->id]) }}"
                        class="d-block btn btn-primary"><i class="fas fa-edit pr-1"></i>
                        Chỉnh Sửa</a>
                </div>
                <div class="action-delete">
                    <a data-url="{{ route('delete_product', ['id' => $prd->id]) }}"
                        class="d-block btn btn-primary remove__product mx-3"><i class="fas fa-trash pr-1"></i>
                        Xoá</a>
                </div>
            </div>
        </div>
    </div>
</div>
