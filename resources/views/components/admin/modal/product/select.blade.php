@php
    $id_btn = 'modal__select--save-' . $btn;
@endphp
<div class="modal fade" id="modal__select" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content vadark">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Chọn liên kết</h5>
                <button type="button" class="close rs__params--select" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {{-- LÀM CÁI NÀY THÀNH COMPONENT --}}
                    <ul id="modal__select--tags" class="form-control h-100 d-flex flex-wrap pb-4">
                        <x-admin.tags.select :selected="$selected" />
                    </ul>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Nhập id hoặc tên sản phẩm" class="form-control"
                        id="modal__select--search">
                </div>
                <div id="modal__select--body">
                    <x-admin.product.select.table :m="$model" :page="$page" :selected="$selected" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rs__params--select"> Đóng
                </button>
                <button type="button" class="btn btn-primary select__btn--save" id="{{ $id_btn }}">Lưu</button>
                <button class="btn btn-primary select__btn--loading d-none" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Loading...
                </button>
            </div>
        </div>
    </div>
</div>
