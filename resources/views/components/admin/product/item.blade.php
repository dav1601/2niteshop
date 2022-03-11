<div class="col-3 prd__s--item mb-4">
    <div class="card">
        <div class="prd-img">
            <img src="{{ $file->ver_img($prd->main_img) }}" alt="" class="prd-img--main">
            <img src="{{ $file->ver_img($prd->sub_img) }}" alt="" class="prd-img--sub">
        </div>
        <div class="prd-info p-3">
            <span class="name d-block">{{ $prd->name }}</span>
            <div class="accordion" style="margin-bottom:15px" id="parent_category-{{ $prd->id }}">
                <div class="d-flex justify-content-between align-items-center category" data-toggle="collapse"
                    data-target="#item-category-{{ $prd->id }}" aria-controls="item-category">
                    <span><img src="{{ $file->ver_img(App\Models\Category::where('id', '=' , $prd->cat_id)->first()->icon) }}"
                            width="40px" alt="" class="pr-2"> {{ $prd->cat_name }}</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div id="item-category-{{ $prd->id }}" class="collapse" style="padding: 5px;"
                    aria-labelledby="headingOne" data-parent="#parent_category-{{ $prd->id }}">
                    <span class="d-block mb-0 pt-2">---- {{ $prd->sub_1_cat_name }}</span>
                    @if ($prd->sub_2_cat_name != NULL)
                    <span class="d-block mb-0 pt-2">-------- {{ $prd->sub_2_cat_name }}</span>
                    @endif
                </div>
            </div>
            <span class="price d-block"><i class="fas fa-tags pr-1"></i>Giá bán: {{ crf($prd->price)
                }}</span>
            <span class="price__cost price d-block" style="color:#dd991b;"><i class="fas fa-tags pr-1"></i>Giá gốc: {{ crf($prd->historical_cost)
                }}</span>
            <span class="prdcer d-block"><i class="fas fa-building pr-1"></i>Producer: {{
                App\Models\Producer::where('id', '=' , $prd->producer_id)->first()->name
                }}</span>
            <span class="model d-block"><i class="fab fa-unity pr-1"></i>Model: {{ $prd->model
                }}</span>
            <span class="usage d-block"><i class="fas fa-box-open pr-1"></i> {{
                usage_stt($prd->usage_stt) }}</span>
            <div class="row mx-0 mt-3">
                <div class="form-group col-6 p-0">
                    <select class="custom-select" name="" id="product__show--new" data-id="{{ $prd->id }}">
                        <option value="{{ $prd->new }}">{{ new_stt($prd->new) }}</option>
                        @foreach ( Config::get('product.new') as $new1)
                        @if ($new1 != $prd->new)
                        <option value="{{ $new1 }}">{{ new_stt($new1) }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-6 pr-0">
                    <select class="custom-select" name="" id="product__show--hl" data-id="{{ $prd->id }}">
                        <option value="{{ $prd->highlight }}">{{ highlight_stt($prd->highlight)
                            }}</option>
                        @foreach ( Config::get('product.highlight') as $highlight)
                        @if ( $highlight != $prd->highlight)
                        <option value="{{  $highlight }}">{{ highlight_stt( $highlight) }}
                        </option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group mt-2">
                <select class="custom-select" name="" id="product__show--stock" data-id="{{ $prd->id }}">
                    <option value="{{ $prd->stock }}">{{ stock_stt($prd->stock )
                        }}</option>
                    @foreach ( Config::get('product.stock') as $stock )
                    @if ( $stock != $prd->stock )
                    <option value="{{  $stock  }}">{{ stock_stt( $stock ) }}
                    </option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="prd-date d-flex justify-content-between align-items-center mb-2 mt-2">
                <div class="date">
                    <i class="far fa-calendar pr-1"></i>
                    <span>{{ $prd->created_at -> toFormattedDateString() }}</span>
                </div>
                <div class="author">
                    <span>{{ $prd->author }}</span>
                </div>
            </div>
            <div class="action d-flex justify-content-center align-items-center mt-4">
                <div class="action-edit mx-2">
                    <a target="_blank" href="{{ route('product_view_edit', ['id'=>$prd->id]) }}"
                        class="d-block btn navi_btn"><i class="fas fa-edit pr-1"></i>
                        Chỉnh Sửa</a>
                </div>
                <div class="action-delete">
                    <a data-url="{{ route('delete_product', ['id'=>$prd->id]) }}" class="d-block btn navi_btn mx-3 remove__product"><i
                            class="fas fa-trash pr-1"></i>
                        Xoá</a>
                </div>
            </div>
        </div>
    </div>
</div>
