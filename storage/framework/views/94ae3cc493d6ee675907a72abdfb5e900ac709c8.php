<div class="row mx-0 mb-4">
    <div class="col-6 pl-0">
        <input type="text" name="" id="name" value="" class="form-control" placeholder="Họ Và Tên">
    </div>
    <div class="col-6 pr-0">
        <input type="text" name="" id="phone" value="" class="form-control" placeholder="Số Điện Thoại">
    </div>
</div>

<div class="row mx-0 mb-4">
    <div class="col-12 col-sm-4 pl-sm-0 mb-4 mb-sm-0">
        <label for="">Tỉnh</label>
        <select name="" id="prov" class="custom-select">
            <option value="0">Chọn Tỉnh</option>
            <?php $__currentLoopData = App\Models\Province::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prov): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($prov->_name); ?>" data-id="<?php echo e($prov->id); ?>"><?php echo e($prov->_name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="col-12 col-sm-4 mb-4 mb-sm-0 pl-sm-0">
        <label for="">Quận/Huyện</label>
        <select name="" id="dist" class="custom-select">
            <option value="0">Bạn Chưa Chọn Tỉnh</option>
        </select>
    </div>
    <div class="col-12 col-sm-4 px-sm-0 mb-4 mb-sm-0">
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
    <button type="button" class="btn btn-primary disabled" style="cursor: not-allowed" disabled="disabled"
        id="add__address">Lưu Địa Chỉ</button>
</div>
<?php /**PATH E:\xampp\htdocs\nava\resources\views\components\client\modal\contaddress.blade.php ENDPATH**/ ?>