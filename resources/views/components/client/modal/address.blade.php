<div class="modal show" id="addAddress" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="addAddressLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width:700px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-bold" id="addAddressLabel">Thêm Địa Chỉ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="outputAddress">
                <div class="row mx-0 mb-4">
                    <div class="col-12 col-sm-6 pl-sm-0">
                        <input type="text" name="" id="name" value="" class="form-control" placeholder="Họ Và Tên">
                    </div>
                    <div class="col-12 col-sm-6 my-3 my-sm-0 pr-sm-0">
                        <input type="text" name="" id="phone" value="" class="form-control" placeholder="Số Điện Thoại">
                    </div>
                </div>
                {{-- --}}
                <div class="row mx-0 mb-4">
                    <div class="col-12 col-sm-4 pl-sm-0 mb-4 mb-sm-0">
                        <label for="">Tỉnh</label>
                        <select name="" id="prov" class="custom-select">
                            <option value="0">Chọn Tỉnh</option>
                            @foreach (App\Models\Province::all() as $prov )
                            <option value="{{ $prov->_name }}" data-id="{{ $prov->id }}">{{ $prov->_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-sm-4 mb-4 mb-sm-0 pl-sm-0">
                        <label for="">Quận/Huyện</label>
                        <select name="" id="dist" class="custom-select">
                            <option value="0">Bạn Chưa Chọn Tỉnh</option>
                        </select>
                    </div>
                    <div class="col-12 col-sm-4 px-sm-0 mb-3 mb-sm-0">
                        <label for="">Phường/Xã</label>
                        <select name="" id="ward" class="custom-select">
                            <option value="0">Bạn Chưa Chọn Quận/Huyện</option>
                        </select>
                    </div>
                    <div class="col-12 px-0 mt-4">
                        <textarea class="form-control w-100" style="max-width: 100%" name="" id="detail" rows="4"
                            placeholder="Địa chỉ cụ thể....."></textarea>
                    </div>
                    <div class="row mx-0 mt-4">
                        <label for="">Loại Địa Chỉ:</label><br>
                        <div class="col-12 px-0 type d-flex align-items-center">
                            <span class="type__item type__item--active " data-type="home">Nhà Riêng</span>
                            <span class="type__item" data-type="office">Văn Phòng</span>
                        </div>
                        <div class="col-12 px-0 mt-4">
                            <div class="va-checkbox  d-flex align-items-center w-100">
                                <input type="checkbox" name="" value="1" id="set__def">
                                <label for="set__def">
                                    Đặt Làm Địa Chỉ Mặc Định
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary disabled" style="cursor: not-allowed"
                        disabled="disabled" id="add__address">Lưu Địa Chỉ</button>
                </div>



            </div>
        </div>
    </div>
</div>
