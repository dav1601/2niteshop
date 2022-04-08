<?php
$list_dist = App\Models\District::where('_province_id' , '=' , $data_edit->prov_id)->get();
$list_ward = App\Models\Ward::where('_district_id' , '=' , $data_edit->dist_id)->get();
?>
<div class="row mx-0 mb-4">
  <div class="col-12 col-sm-6 pl-sm-0">
    <input type="text" name="" id="name" value="<?php echo e($data_edit->name); ?>" class="form-control" placeholder="Họ Và Tên">
  </div>
  <div class="col-12 col-sm-6 my-3 my-sm-0 pr-sm-0">
    <input type="text" name="" id="phone" value="<?php echo e($data_edit->phone); ?>" class="form-control" placeholder="Số Điện Thoại">
  </div>
</div>
<div class="row mx-0 mb-4">
  <div class="col-12 col-sm-4 pl-0 mb-3 mb-sm-0">
    <label for="">Tỉnh</label>
    <select name="" id="prov" class="custom-select">
      <option value="<?php echo e($data_edit->prov); ?>" data-id="<?php echo e($data_edit->id); ?>"><?php echo e($data_edit->prov); ?></option>
      <?php $__currentLoopData = App\Models\Province::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prov): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($prov->id != $data_edit->prov_id): ?>
      <option value="<?php echo e($prov->_name); ?>" data-id="<?php echo e($prov->id); ?>"><?php echo e($prov->_name); ?></option>
      <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
  </div>
  <div class="col-12 col-sm-4 pl-0 mb-3 mb-sm-0">
    <label for="">Quận/Huyện</label>
    <select name="" id="dist" class="custom-select">
      <option value="<?php echo e($data_edit->dist); ?>" data-id="<?php echo e($data_edit->dist_id); ?>"><?php echo e($data_edit->dist); ?></option>
      <?php $__currentLoopData = $list_dist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ld): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($ld->id != $data_edit->dist_id): ?>
      <option value="<?php echo e($ld->_name); ?>" data-id="<?php echo e($ld->id); ?>"><?php echo e($ld->_name); ?></option>
      <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
  </div>
  <div class="col-12 col-sm-4 px-0 mb-3 mb-sm-0">
    <label for="">Phường/Xã</label>
    <select name="" id="ward" class="custom-select">
      <option value="<?php echo e($data_edit->ward); ?>" data-id="<?php echo e($data_edit->ward_id); ?>"><?php echo e($data_edit->ward); ?></option>
      <?php $__currentLoopData = $list_ward; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($lw->id != $data_edit->ward_id): ?>
      <option value="<?php echo e($lw->_name); ?>" data-id="<?php echo e($lw->id); ?>"><?php echo e($lw->_name); ?></option>
      <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
  </div>
  <div class="col-12 px-0 mt-4">
    <textarea class="form-control w-100" style="max-width: 100%" name="" id="detail" rows="4"
      placeholder="Địa chỉ cụ thể....."><?php echo e($data_edit->detail); ?></textarea>
  </div>
  <div class="row mx-0 mt-4">
    <label for="">Loại Địa Chỉ:</label><br>
    <div class="col-12 px-0 type d-flex align-items-center">
      <span class="type__item <?php if($data_edit->type == "home"): ?> type__item--active <?php endif; ?>" data-type="home">Nhà Riêng</span>
      <span class="type__item <?php if($data_edit->type == "office"): ?> type__item--active <?php endif; ?>" data-type="office">Văn
        Phòng</span>
    </div>
    <div class="col-12 px-0 mt-4">
      <div class="va-checkbox  d-flex align-items-center w-100">
        <input type="checkbox" name="" value="1" id="set__def" <?php if($data_edit->def == 1): ?> checked <?php endif; ?>>
        <label for="set__def">
          Đặt Làm Địa Chỉ Mặc Định
        </label>
      </div>


    </div>
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
  <button type="button" class="btn btn-primary" id="update__address" data-id="<?php echo e($data_edit->id); ?>">Lưu Địa Chỉ</button>
</div>
<?php /**PATH E:\xampp\htdocs\nava\resources\views\components\client\modal\contentaddress.blade.php ENDPATH**/ ?>