<div class="col-4 pack-edit-tab-component" index="{{ $index }}">
    <div class="wp" style="padding:15px;">
        <div class="pack-edit-tab-component-header d-flex justify-content-between align-items-center mb-3">
            <h5 class="card-title">Tab {{ $index + 1 }} </h5>
            <span class="pack-edit-tab-component-remove d-block cursor-pointer" data-index="{{ $index }}"><i
                    class="fa-solid fa-trash"></i></span>
        </div>
        <div class="form-group mb-4">
            <label>Tiêu đề</label>
            <input type="text" class="form-control p-e-tab-comp-title" value="{{ $payload['title'] }}">
        </div>

        <div class="form-group mb-4">
            <label for="">Kiểu Tab</label>
            <select class="custom-select p-e-tab-comp-type type-tabs" data-index="{{ $index }}">
                <option @if ($payload['type'] === 'none') selected @endif value="none">Chọn</option>
                <option @if ($payload['type'] === 'category') selected @endif value="category">Danh Mục</option>
                <option @if ($payload['type'] === 'products') selected @endif value="products">Sản Phẩm</option>
            </select>
        </div>
        <div class="form-group" id="type-tabs-output-{{ $index }}">
            <x-layout.loading :center="true" />
        </div>
    </div>
</div>
